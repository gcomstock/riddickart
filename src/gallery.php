<?php
/*
Template Name: Instagram Gallery
*/
?>

<?php get_header(); ?>


<div class="R__main">

  <div id="R__main__gallery"></div>

  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/instafeed.min.js"></script>

  <script type="text/javascript">
    /*
      CLIENT INFO
      CLIENT ID	8d5a6df20c714cbaa7a027fafbade629
      WEBSITE URL	riddickart.com
      REDIRECT URI	http://www.riddickart.com
      SUPPORT EMAIL	gcomstock@gmail.com
      userID: 2344925701
    */

    window.onload = function(){

      var shouldFetch = true;
      var gallery = document.getElementById('R__main__gallery');
      var template = '<a href="{{link}}" class="R__main__gallery__img" style="background-image:url({{image}})" target="_blank">'+
                     '  <div class="R__main__gallery__img__caption">{{caption}}</div>'+
                     '</a>';

      function fetchMoreImages(){
        if (shouldFetch && window.scrollY > (gallery.offsetHeight - window.outerHeight) ) {
          shouldFetch = false;
          feed.next();
        }
      }

      var feed = new Instafeed({
        get: 'user',
        limit: 6,
        target: 'R__main__gallery',
        userId: 178110804,
        clientId: '54db78126f764a879ba681b4a9db8140',
        accessToken: '178110804.54db781.e9695f2f1ddf4ce6b68cf91798e131e9',
        template: template,
        resolution: 'low_resolution',
        after: function() {
          var tns = document.querySelectorAll('.R__main__gallery__img');

          for (var i = 0; i < tns.length; i++) {
            tns[i].offsetHeight; //force reflow
            tns[i].style.opacity = 1;
            tns[i].style.transform = 'scale3d(1,1,1)';
          };

          if (this.hasNext()) {
            shouldFetch = true;
          }
        }
      });

      feed.run();
      window.addEventListener('scroll', fetchMoreImages);
    };
  </script>

</div>

<?php get_footer(); ?>