<?php
/**
 * @package WordPress
 * @subpackage riddickart
 */
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

  <meta name="viewport" content="width=device-width">

	<!-- begin wordpress default header strings, do not modify -->
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
	<!-- end wordpress default header strings -->
    
  <meta name="description" content="Mark Riddick saw his first illustrations published in a small underground fanzine from Washington called, Scavenger Magazine. His first T-Shirt design, out of hundreds to come, was for Kentucky-based grindcore crust band, Son of Dog. After a few years publishing his work with bands and fanzines, Mark�s name soon became synonymous with underground death and black metal music." />
	<meta name="keywords" content="riddickart, the art of mark riddick, mark riddick, fossil dungeon, illustrator, grotesque, filler art, underground, death/black metal, artwork, artist, fanzines, publications, musiq, design, logo, graphics, brutal, gore, hell, satan, athiest, heavy, morbid, profane, maggot, logos from hell" />

  <link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon"/>
</head>
<body>
  <?php include(TEMPLATEPATH.'/warning.php'); ?>


	<div class="wrapper <?php if (is_front_page()) { echo 'wrapper--frontPage'; }?>">

    <div class="R__header">
      <a class="R__header__title" href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory'); ?>/images/riddick-logo.png"></a>

      <div class="R__header__menu">
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
    </div> <!--/header-->