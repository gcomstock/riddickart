<?php
/**
 * @package WordPress
 * @subpackage riddickart
 */
?>

<!DOCTYPE html>
<html>

<head profile="http://gmpg.org/xfn/11">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" media="screen" />

	<!--WORDPRESS HEADER-->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php //comments_popup_script(); // off by default ?>
    <?php wp_head(); ?>
	<!--/WORDPRESS HEADER-->

  <!--SEO-->
    <!--<meta name="description" content="Mark Riddick saw his first illustrations published in a small underground fanzine from Washington called, Scavenger Magazine. His first T-Shirt design, out of hundreds to come, was for Kentucky-based grindcore crust band, Son of Dog. After a few years publishing his work with bands and fanzines, Mark's name soon became synonymous with underground death and black metal music." />-->
	  <meta name="keywords" content="riddickart, the art of mark riddick, mark riddick, fossil dungeon, illustrator, grotesque, filler art, underground, death/black metal, artwork, artist, fanzines, publications, musiq, design, logo, graphics, brutal, gore, hell, satan, athiest, heavy, morbid, profane, maggot, logos from hell" />
  <!--SEO-->

  <!--FAVICONS-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/images/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/images/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
  <!--/FAVICONS-->
</head>
<body>
  <?php
    include(TEMPLATEPATH.'/warning.php');

    global $post;
    $activePage=$post->post_name;

    if ($activePage !== 'about' && $activePage !== 'gallery') {
      $activePage = 'news';
    }
  ?>

	<div class="wrapper <?php if (is_front_page()) { echo 'wrapper--frontPage'; }?>">

    <div class="R__header">
      <a class="R__header__title" href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory'); ?>/images/riddick-logo.png"></a>
      <div class="R__header__menu R__header__menu--<?php echo $activePage ?>">
        <h5>
          <a href="<?php echo site_url();?>">news</a>
          &#47;
          <a href="<?php echo site_url();?>/gallery">gallery</a>
          &#47;
          <a href="<?php echo site_url();?>/about">about</a>
          &#47;
          <a href="http://riddickart.bigcartel.com" target="_blank">store</a>
          &#47;
          <a href="http://www.boardpusher.com/riddickart" target="_blank">skateboards</a>
        </h5>
      </div>
    </div> <!--/R__header-->