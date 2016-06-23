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
    window.onload = function(){

      var shouldFetch = true;
      var gallery = document.getElementById('R__main__gallery');
      var template = '<a href="{{link}}" class="R__main__gallery__img" style="background-image:url({{image}})" target="_blank">'+
                     '  <div class="R__main__gallery__img__caption">{{caption}}</div>'+
                     '</a>';

      function fetchMoreImages(){
        if (shouldFetch && window.scrollY > (gallery.offsetHeight - window.outerHeight/2) ) {
          shouldFetch = false;
          feed.next();
        }
      }

      var feed = new Instafeed({
        get: 'user',
        limit: 6,
        target: 'R__main__gallery',
        userId: 2344925701,
        clientId: 'ff640d6c765c443780b0b1a1fd90de43',
        accessToken: '2344925701.ff640d6.71b231fc2bc2444eb964f387e5f26a7b',
        template: template,
        resolution: 'low_resolution',
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
      window.addEventListener('scroll', fetchMoreImages);
    };
  </script>

</div>

<?php get_footer(); ?>