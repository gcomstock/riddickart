<div class="R__main__sidebar">

  <div class="R__main__sidebar__section R__main__sidebar__section--logos">
    <a href="//fetidzombie.bandcamp.com" target="_blank">
      <img alt="Fetid Zombie Logo" src="<?php bloginfo('template_directory'); ?>/images/sidebar/logo-fetidzombie.png" />
    </a>
    <a href="//www.facebook.com/macabradeathmetal" target="_blank">
      <img alt="Macabra Logo" src="<?php bloginfo('template_directory'); ?>/images/sidebar/logo-macabra.png" />
    </a>
    <a href="//www.facebook.com/gravewaxdeathmetal" target="_blank">
      <img alt="Grave Wax Logo" src="<?php bloginfo('template_directory'); ?>/images/sidebar/logo-gravewax.png" />
    </a>
    <a href="//www.metalhit.com" target="_blank">
      <img alt="Metal Hit Logo" src="<?php bloginfo('template_directory'); ?>/images/sidebar/logo-metalhit.png" />
    </a>
  </div>

  <div class="R__main__sidebar__section R__main__sidebar__section--search">
    <h4>Search site</h4>

    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input id="s" name="s" type="text" value="<?php echo get_search_query(); ?>" />
        <input id="s-btn" type="submit" value="<?php echo esc_attr_x( 'Go', 'submit button' ); ?>" />
      </div>
    </form>
  </div>

  <div class="R__main__sidebar__section R__main__sidebar__section--calendar">
    <h4>Calendar</h4>
    <?php get_calendar(); ?>
  </div>

  <div class="R__main__sidebar__section R__main__sidebar__section--archives">
    <h4>Archives</h4>
    <ul>
      <?php wp_get_archives('type=monthly&limit=24'); ?>
    </ul>
  </div>

</div> <!--/R__main__sidebar-->