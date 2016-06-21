<?php
/**
 * @package WordPress
 * @subpackage riddickart
 */
?>

    <div class="R__footer"></div>
  </div> <!-- end wrapper -->


  <!-- google analytics -->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-9319577-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>

  <?php wp_footer(); //needed by many WP plugins ?>
</body>
</html>
