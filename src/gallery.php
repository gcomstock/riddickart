<?php
/*
Template Name: Instagram Gallery
*/
?>

<?php
  get_header();

  // This snippet fetches and stores an instagram auth token in cache that lasts a week.
  // A fresh token is fetched every 15 mins.
  // If the cache is lost, a starter token can be generated here:
  // https://developers.facebook.com/apps/2710745775691528/instagram-basic-display/basic-display/
  // If this process is too brittle, try this instead:
  // https://www.instant-tokens.com/home

  $refreshTimer = get_transient( 'refreshTimer' );
  $weeklyToken = get_transient( 'weeklyToken' );

  if ( empty( $weeklyToken ) ) {
    // seed starter token from FB developer flow
    $weeklyToken = 'IGQVJVLUJ2M0dnN1hnQmJ...';
  }

  if ( empty( $refreshTimer ) ) {
    $response = wp_safe_remote_get( 'https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=' . $weeklyToken );
    $response_body = json_decode( $response['body'] );

    set_transient( 'weeklyToken', $response_body->access_token, WEEK_IN_SECONDS );
    set_transient( 'refreshTimer', True, HOUR_IN_SECONDS / 4 );
  }
?>




<div class="R__main">

  <div id="R__main__gallery"></div>

  <script src="<?php bloginfo('template_directory'); ?>/instafeed.min.js?cache=jul2020"></script>

  <script type="text/javascript">
    window.onload = function(){

      var token = <?php echo json_encode($weeklyToken); ?>;
      var shouldFetch = true;
      var gallery = document.getElementById('R__main__gallery');
      var template = '<a href="{{link}}" class="R__main__gallery__img" style="background-image:url({{image}})" target="_blank">'+
                     '  <div class="R__main__gallery__img__caption">{{caption}}</div>'+
                     '</a>';

      console.log(token);

      // not working on mobile?
      function fetchMoreImages(){
        if (shouldFetch && window.scrollY > (gallery.offsetHeight - window.outerHeight) ) {
          shouldFetch = false;
          feed.next();
        }
      }

      var feed = new Instafeed({
        limit: 24,
        target: 'R__main__gallery',
        accessToken: token,
        template: template,
        after: function() {
          var tns = document.querySelectorAll('.R__main__gallery__img');

          for (var i = 0; i < tns.length; i++) {
            tns[i].offsetHeight; //force reflow
            tns[i].style.opacity = 1;
            tns[i].style.transform = 'translate3d(0,0,0)';
          };

          if (this.hasNext()) {
            shouldFetch = true;
          }
        }
      });

      feed.run();

      // re-enable when this is resolved: https://github.com/stevenschobert/instafeed.js/issues/649
      // window.addEventListener('scroll', fetchMoreImages);
    };
  </script>

</div>

<?php get_footer(); ?>