<?php
/*
Template Name: Instagram Gallery
*/
?>

<?php get_header(); ?>


<div class="R__main">

  <div id="R__main__gallery">
  </div>

  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/instafeed.min.js"></script>

  <script type="text/javascript">
    window.onload = function(){

    var template = '<a href="{{link}}" class="R__main__gallery__img" style="background-image:url({{image}})" target="_blank">'+
                   '  <div class="R__main__gallery__img__caption">{{caption}}</div>'+
                   '</a>'

      var feed = new Instafeed({
        get: 'user',
        limit: 18,
        target: 'R__main__gallery',
        userId: 178110804,
        clientId: '54db78126f764a879ba681b4a9db8140',
        accessToken: '178110804.54db781.e9695f2f1ddf4ce6b68cf91798e131e9',
        template: template,
        resolution: 'low_resolution'
      });

      feed.run();

    };
  </script>

</div>

<?php get_footer(); ?>