<?php
	/* Template Name: About */
?>

<?php get_header(); ?>

<div class="R__main R__main--about">

  <div class="R__about">
    <div class="R__about__bio">
      <div class="R__about__bio__cap"></div>
      <?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
    </div>

    <div class="R__about__contact">
      <div class="R__about__contact__icons">
        <a href="//www.facebook.com/riddickartillustration" target="_blank">
          <img src="<?php bloginfo('template_directory'); ?>/images/about/icon_facebook.gif" />
        </a>
        <a href="//www.twitter.com/riddickart" target="_blank">
          <img src="<?php bloginfo('template_directory'); ?>/images/about/icon_twitter.gif" />
        </a>
        <a href="//www.instagram.com/riddickart" target="_blank">
          <img src="<?php bloginfo('template_directory'); ?>/images/about/icon_instagram.gif" />
        </a>
        <a href="//www.youtube.com/channel/UC7nD3nm6oyAZy64ZFT6DBOA" target="_blank">
          <img src="<?php bloginfo('template_directory'); ?>/images/about/icon_youtube.gif" />
        </a>
      </div>

      <br />
      <h5><a href="mailto:mark@fossildungeon.com">mark@fossildungeon.com</a></h5>
    </div>
  </div>




  <div class="R__exhibits">
    <h3>Gallery Exhibits</h3>

    <div class="R__exhibits__year">2016</div>
    <div class="R__exhibits__entries">
      <b>January</b> &ldquo;Path of Dissent&rdquo; &ndash; Eridanos Tattoo & Gallery &ndash; Cambridge, MA<br>
      <b>April</b> &ldquo;Bones Exhibit&rdquo; &ndash; Galerie F &ndash; Chicago, IL<br>
      <b>April</b> &ldquo;Roadburn Festival&rdquo; &ndash; 013 Venue &ndash; Tilberg, The Netherlands<br>
      <b>May</b> &ldquo;Vile&rdquo; &ndash; Eridanos Tattoo & Gallery &ndash; Cambridge, MA<br>
    </div>

    <div class="R__exhibits__year">2014</div>
    <div class="R__exhibits__entries">
      <b>August</b> &ldquo;David Brockie/GWAR Tribute&rdquo; &ndash; MF Gallery &ndash; Brooklyn, NY<br>
      <b>October</b> &ldquo;Murmurs from the Tomb&rdquo; &ndash; Nerdiest Show Room &ndash; Los Angeles, CA<br>
      <b>December</b> &ldquo;Under the Vinyl&rdquo; &ndash; Tel Aviv, Israel<br>
    </div>

    <div class="R__exhibits__year">2013</div>
    <div class="R__exhibits__entries">
      <b>March</b> &ldquo;Goredeck&rdquo; &ndash; Gallery Excube &ndash; Osaka, Japan<br>
      <b>April</b> &ldquo;Suck It All&rdquo; &ndash; Honey’s Dead Shop &ndash; Tokyo, Japan<br>
      <b>July</b> &ldquo;MF Gallery 10th Anniversary Exhibit&rdquo; &ndash; Brooklyn, NY<br>
      <b>September</b> &ldquo;Goredeck&rdquo; &ndash; Gallery Algea &ndash; Tokyo, Japan<br>
      <b>October</b> &ldquo;Blacklist&rdquo; &ndash; Gristle Tattoo/Gallery &ndash; Brooklyn, NY<br>
      <b>October</b> &ldquo;MF Gallery 11th Annual Halloween Art Show&rdquo; &ndash; Brooklyn, NY<br>
      <b>November</b> &ldquo;Illuminator Art Festival&rdquo; &ndash; Gedung, Indonesia
    </div>

    <div class="R__exhibits__year">2012</div>
    <div class="R__exhibits__entries">
      <b>March</b> &ldquo;Gripper Heat&rdquo; &ndash; Tel Aviv, Israel<br>
      <b>November</b> &ldquo;Life &amp; Death in Black and White&rdquo; &ndash; Loren Naji Gallery &ndash; Cleveland, OH
    </div>

    <div class="R__exhibits__year">2011</div>
    <div class="R__exhibits__entries">
      <b>March</b> &ldquo;All the Colors of the Dark&rdquo; &ndash; Awful Nice Gallery &ndash; St. Louis, MO
    </div>

    <div class="R__exhibits__year">2010</div>
    <div class="R__exhibits__entries">
      <b>June</b> &ldquo;Zombies Attack Brooklyn&rdquo; &ndash; MF Gallery &ndash; Brooklyn, NY
    </div>

    <div class="R__exhibits__year">2009</div>
    <div class="R__exhibits__entries">
      <b>January</b> &ldquo;Inaugural Exhibit&rdquo; &ndash; MF Gallery Genova &ndash; Genova, Italy<br>
      <b>June</b> &ldquo;First Annual Rock &amp; Ink&rdquo; &ndash; Walls Fine Art Gallery &ndash; Norfolk, VA<br>
      <b>June</b> &ldquo;All-A-Board Skate Art Exhibit&rdquo; &ndash; Tel Aviv, Israel<br>
      <b>October</b> &ldquo;Seventh Annual Halloween Art Show&rdquo; &ndash; MF Gallery &ndash; Brooklyn, NY<br>
      <b>December</b> &ldquo;Rejoice O&rsquo; Kanibels&rdquo; &ndash; Gallery 139 &ndash; Pomona, CA<br>
      <b>Permanent Exhibit</b> MF Gallery Genova &ndash; Genova, Italy
    </div>

    <div class="R__exhibits__year">2008</div>
    <div class="R__exhibits__entries">
      <b>January</b> &ldquo;0 x 100&rdquo;  &ndash; Galeria de Muerte &ndash; Tokyo, Japan<br>
      <b>April</b> &ldquo;Zombies Attack Again&rdquo; &ndash; MF Gallery &ndash; New York City, NY<br>
      <b>April</b> &ldquo;Dia de los Muertos&rdquo; &ndash; Galeria de Muerte &ndash; Tokyo, Japan<br>
      <b>May</b> Night Gallery Ceramics &ndash; Santa Ana, CA<br>
      <b>October</b> Fontanas &ldquo;Unsound NYC&rdquo; &ndash; New York City, NY
    </div>

    <div class="R__exhibits__year">2007</div>
    <div class="R__exhibits__entries">
      <b>May</b> &ldquo;Zombies Attack&rdquo; &ndash; MF Gallery, New York City, NY<br>
      <b>June</b> &ldquo;Entartete Kunts&rdquo; &ndash; Optic Nerve Arts, Portland, OR<br>
      <b>July</b> &ldquo;Riddickart Exhibit&rdquo; &ndash; Strangeland Records, Annandale, VA<br>
      <b>September</b> &ldquo;California Death Metal Festival&rdquo; &ndash; Fresno, CA<br>
      <b>September</b> &ldquo;5th Annual Halloween Art Show&rdquo; &ndash; MF Gallery, New York City, NY
    </div>
  </div>


  <div class="R__books">
    <h3>Books</h3>

    <div class="row">
      <a class="R__books__book" target="_blank" />
        <img src="<?php bloginfo('template_directory'); ?>/images/about/book_riddick_morbid_visions.jpg" />
      </a>
      <div class="R__books__description">
        <h5>Morbid Visions</h5>
        <p>2016 / Hard cover / 376 pages</p>
        <p>Published by Doomentia Records and Press, Morbid Visions compiles underground death metal illustrator Mark Riddick's work from the past few years into one hard cover tome. Almost 400 pages boasting Riddick's best work to date including unpublished illustrations, sketches, and logos for some of the most extreme bands in the heavy metal scene. Includes an extensive and in-depth introduction by Riddick's twin brother.</p>
      </div>
    </div>

    <div class="row">
      <a class="R__books__book" target="_blank" />
        <img src="<?php bloginfo('template_directory'); ?>/images/about/book_riddick_logos_from_hell.jpg" />
      </a>
      <div class="R__books__description">
        <h5>Logos from Hell</h5>
        <p>2015 / Hard cover / 600 pages</p>
        <p>Logos from Hell offers a glimpse into the most extreme and underground movement of logo identity branding in the history of graphic design. This 600-page tome is a visual onslaught of logo illustrations—for the heaviest metal bands on the planet—conjured by over thirty of the most talented and sought-after artists in the industry, including Christophe Szpajdel, Chris Moyen, Daniel Corcuera, Putrid, Kam Lee, Steve Crow, Kris Verwimp, Alan Corpse, Christopher Horst, Alemsahim, Diego Hellbastard, Antichrist Kramer, Toshihiro Egawa, Thomas Westphal, Raoul Mazzero, and many more! Compiled by underground death metal illustrator—Mark Riddick, with foreward by Michel “Away” Langevin—of Voivod fame—Logos from Hell seeks to inspire, bewilder, and challenge the reader to embrace sound design principles guised by the monstrous. Unleashed by one of the rising leaders in extreme metal music audio/visual publishing, Doomentia Records and Press, Logos from Hell is the perfect addition to your library whether you’re a metal music fan or a visual expert.</p>
      </div>
    </div>

    <div class="row">
      <a class="R__books__book" target="_blank" />
        <img src="<?php bloginfo('template_directory'); ?>/images/about/book_riddick_compendium_of_death.jpg" />
      </a>
      <div class="R__books__description">
        <h5>Compendium of Death</h5>
        <p>2012 / Hard cover / 600 pages / Out of print</p>
        <p>A 20-year retrospective book featuring illustrations by notorious underground death metal artist, Mark Riddick. Published by Doomentia Press (www.doomentia.com), “Compendium of Death” boasts almost 600 pages, bound in hard cover format with introduction by Mike Abominator, an in-depth interview from 2011, and packed with over 700 images of unearthed corpses, mounds of entrails, and unholy rituals drawn for some of death metal’s most iconic and underground bands. First 100 copies accompanied by a signed and numbered 5-print set, first 25 copies with an original piece of art by Mark Riddick.</p>
      </div>
    </div>
  </div>


</div> <!--/R__main-->

<?php get_footer(); ?>