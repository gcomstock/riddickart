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

  <div id="R__main__gallery">
    <img src="<?php bloginfo('template_directory'); ?>/images/loader.gif"/>
  </div>

  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/instafeed.min.js?cache=jul2020"></script>

  <script type="text/javascript">
    window.onload = function(){

      var token = <?php echo json_encode($weeklyToken); ?>;
      var shouldFetch = false;
      var gallery = document.getElementById('R__main__gallery');
      var template = '<a href="{{link}}" class="R__main__gallery__img" style="background-image:url({{image}})" target="_blank">'+
                     '  <div class="R__main__gallery__img__caption">{{caption}}</div>'+
                     '</a>';

      // not working on mobile?
      function fetchMoreImages(){
        if (shouldFetch && window.scrollY > (gallery.offsetHeight - window.outerHeight) ) {
          shouldFetch = false;
          feed.next();
        }
      }

      function revealImages(){
        var tns = document.querySelectorAll('.R__main__gallery__img');

        for (var i = 0; i < tns.length; i++) {
          tns[i].offsetHeight; //force reflow
          tns[i].style.opacity = 1;
          tns[i].style.transform = 'translate3d(0,0,0)';
        };
      }

      var feed = new Instafeed({
        limit: 24,
        target: 'R__main__gallery',
        accessToken: token,
        template: template,
        error: function() {
          console.error('instagram api failed. using backup images.');

          var markup;
          fallbackData.forEach((tn) => {
            markup += `<a href="${tn.permalink}" class="R__main__gallery__img" style="background-image:url(${tn.media_url})" target="_blank">
                         <div class="R__main__gallery__img__caption">${tn.caption}</div>
                       </a>`;
          });
          gallery.innerHTML = markup;
          revealImages();
        },
        after: function() {
          revealImages();
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



<script type="text/javascript">
  var fallbackData = [
    {
      "caption": "T-Shirt illustration for CRYPT CRAWLER (Australia). @cryptcrawlermetal #cryptcrawler #cryptcrawlermetal #aussiedeathmetal #australiandeathmetal #metalmerch #metalmerchandise #metalshirt #illustration #penandink #micron #micronpens #sakurabrushpen #sharpie #deathmetal #deathmetalart #markriddick #riddickart",
      "id": "17868588100868998",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/114150270_158099999132898_8444391881702726188_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=K03B48U9xuYAX_s2c-a&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=2ef8a4c03e593c6d48b3921e4317442e&oe=5F3DE77C",
      "permalink": "https://www.instagram.com/p/CC854m9sj6c/",
      "timestamp": "2020-07-22T16:48:30+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for CARNATION (Belgium) in support of their new album, “Where Death Lies.” @carnationbandofficial @seasonofmistofficial #carnation #carnationband #carnationbandofficial #seasonofmist #seasonofmistrecords #wheredeathlies #belgiandeathmetal #deathmetal #deathmetalband #deathmetalart #deathmetalartwork #metalmerch #metalmerchandise #metalshirt #penandink #markriddick #riddickart",
      "id": "17875857418765742",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/108971353_141826844206402_758343821981815392_n.jpg?_nc_cat=104&_nc_sid=8ae9d6&_nc_ohc=qgBTWzYd5cEAX-gqSe8&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=b61334da05469d79fc76d5229f39f03d&oe=5F40E622",
      "permalink": "https://www.instagram.com/p/CCwXlJWsj3G/",
      "timestamp": "2020-07-17T19:57:51+0000",
      "username": "riddickart"
    },
    {
      "caption": "Another T-Shirt illustration for SKELETAL REMAINS in support of their new album, “The Entombment of Chaos.” @skeletalremainsofficial @centurymedia #skeletalremains #skeletalremainsband #centurymedia #centurymediarecords #theentombmentofchaos #penandink #deathmetal #deathmetalart  #brutalart #artistsoninstagram #micronart #sakurabrushpen #sharpie #congregationofflesh #markriddick #riddickart",
      "id": "18114589513136672",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/107930529_149645026734855_3164201326118510127_n.jpg?_nc_cat=105&_nc_sid=8ae9d6&_nc_ohc=lu1xTytgz68AX819nL3&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=32139806bdc3db4b250140ec0cc7f5b5&oe=5F417398",
      "permalink": "https://www.instagram.com/p/CCrLKf6s3_m/",
      "timestamp": "2020-07-15T19:33:09+0000",
      "username": "riddickart"
    },
    {
      "caption": "“Tombs of Chaos” T-Shirt illustration for SKELETAL REMAINS (USA). This illustration is based on the “The Entombment of Chaos” album cover painted by Dan Seagrave. @skeletalremainsofficial @seagraveart @centurymedia #skeletalremains #skeletalremainsband #centurymedia #centurymediarecords #theentombmentofchaos #tombsofchaos #penandink #deathmetal #deathmetalart #danseagrave #markriddick #riddickart",
      "id": "18036784384269801",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/107454184_831464930716585_7287777429053895633_n.jpg?_nc_cat=100&_nc_sid=8ae9d6&_nc_ohc=YAyYAkIJpOwAX83EE-X&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=03ab5199857c761dd57ae281210db336&oe=5F40F148",
      "permalink": "https://www.instagram.com/p/CCmBy8QMwGu/",
      "timestamp": "2020-07-13T19:35:05+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for melodic death metal band, NYKTOPHOBIA (Germany). @nyktophobiadeath #nyktophobia #whatlivesforever #deathmetal #melodicdeathmetal #melodeath #germandeathmetal #dawnofdisease #decemberflowerband #penandink #penandinkdrawing #blackandwhiteart #undergroundartist #deathmetalart #markriddick #riddickart",
      "id": "17882741392641273",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/106489807_894981887679554_6790177107383689348_n.jpg?_nc_cat=100&_nc_sid=8ae9d6&_nc_ohc=kmYY9r-CayMAX8Dp7bI&_nc_oc=AQkpwpy1hwo25_cLAY8RkEjVk7BJ-R9e7FATUVV7VVUFFl_hhayZWSReZZtqRSsE_WeDvnd2dX9hjH3Z8jHykbs5&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=092e9f9073ff38cb049516d5a1bbb06a&oe=5F40A4FD",
      "permalink": "https://www.instagram.com/p/CCWCWkNM2Px/",
      "timestamp": "2020-07-07T14:32:06+0000",
      "username": "riddickart"
    },
    {
      "caption": "“Cali Green” beer can illustration for BRASH BREWING (USA). @brashbrewing #brashbrewing #brashbrewery #brashhouston #microbrew #microbrewery #dryhop #caligreen #penandink #brutalart #micronpen #sakurabrushpen #sakuraofamerica #markriddick #riddickart",
      "id": "17958574747328686",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/106123544_553785818650932_3723772398324417090_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=h5yI4Ap5Zj0AX8Aj-w4&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=1d93dbf2ae94626c6c728a2985ff055d&oe=5F40E273",
      "permalink": "https://www.instagram.com/p/CCLt1dvMBzP/",
      "timestamp": "2020-07-03T14:20:25+0000",
      "username": "riddickart"
    },
    {
      "caption": "Coming this week (July 1st), RIDDICKART x SANGUISUGABOGG, exclusively licensed long sleeve shirt available only at riddickart.com. Printed by Pyre Press. @sanguisugabogg @pyrepress #sanguisugabogg #ohiodeathmetal #undergrounddeathmetal #brutaldeathmetal #pyrepress #metalmerch #metalshirt #penandink #deathmetalart #maggotstomp #maggotstomprecords #markriddick #riddickart",
      "id": "17872069852812648",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/82700765_282029612882878_5225976462245019048_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=QT9SrPnpcdEAX9_Smwz&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=a547b7159bf2343a9f811fcb08c81c4a&oe=5F3F2338",
      "permalink": "https://www.instagram.com/p/CCB9RyQMqoC/",
      "timestamp": "2020-06-29T19:22:57+0000",
      "username": "riddickart"
    },
    {
      "caption": "Coming next week (July 1st), RIDDICKART x UNDEATH, exclusively licensed long sleeve shirt available only at riddickart.com. Printed by Pyre Press. @undeathrochester @pyrepress #undeath #undeathrc #newyorkdeathmetal #undergrounddeathmetal #osdm #pyrepress #metalmerch #metalshirt #penandink #deathmetalart #caligarirecords #markriddick #riddickart",
      "id": "17867929075858814",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/105954337_724885064751439_1960642024903622115_n.jpg?_nc_cat=104&_nc_sid=8ae9d6&_nc_ohc=0ZF4HxkC7SYAX_LjDvA&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=dd1b51df289bbcc0d3040621073c9927&oe=5F3F8C99",
      "permalink": "https://www.instagram.com/p/CB58uhFs0jd/",
      "timestamp": "2020-06-26T16:44:13+0000",
      "username": "riddickart"
    },
    {
      "caption": "#penandink #darkart #darkartists #artistsoninstagram #artist #artwork #deathmetal #deathmetalart #blackmetal #blackmetalart #thrashmetal #thrashmetalart #heavymetal #heavymetalart #demon #demonic #markriddick #riddickart",
      "id": "17878997548678548",
      "media_type": "IMAGE",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/104286906_1415445862176304_5050526977849380942_n.jpg?_nc_cat=106&_nc_sid=8ae9d6&_nc_ohc=VZRwBSSKHOwAX-7twob&_nc_oc=AQmLkb-333Vy2AMUTJIRMgAT4XwqjHsI7kASlxK0v-u29DXCgKZNfAfxQuFihI6Kh2AB_i0wg8UWo_VsKFChoSN4&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=cd92e970abc452e7a986a0738f152e44&oe=5F3F753E",
      "permalink": "https://www.instagram.com/p/CBvw5MfMI2F/",
      "timestamp": "2020-06-22T17:48:24+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for thrash metal band, INVICTA (Canada). @invictametal #invicta #invictametal #canadianthrash #canadianthrashmetal #thrash #thrashmetal #thrashmetalband #thrashmetalart #penandink #blackandwhiteart #micron #sakurabrushpen #whitegellyrollpen #sharpie #markriddick #riddickart",
      "id": "17876477857722356",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/104104057_553977368577008_6353505222433505879_n.jpg?_nc_cat=102&_nc_sid=8ae9d6&_nc_ohc=30k3_N_uyUkAX_k9cNA&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=4d0d1e07c688894b3d6772a2c3250027&oe=5F3E4E9F",
      "permalink": "https://www.instagram.com/p/CBiyaiDsZeL/",
      "timestamp": "2020-06-17T16:51:34+0000",
      "username": "riddickart"
    },
    {
      "caption": "From the vault...T-Shirt illustration for ENDSEEKER (Germany), circa 2016. @endseeker_official @metalbladerecords #endseeker #metalbladerecords #germandeathmetal #deathmetal #deathmetalband #deathmetalart #heavymetalpedal #swedishbuzzsaw #osdmworship #guitarpedal #penandink #inkdrawing #markriddick #riddickart",
      "id": "17855501210013203",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.29350-15/103085995_258197118951044_169014984742644895_n.jpg?_nc_cat=107&_nc_sid=8ae9d6&_nc_ohc=SfkOJc-0IbkAX8mYc7J&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=58bcedab9b82c24c1332691889056108&oe=5F414F69",
      "permalink": "https://www.instagram.com/p/CBWvN6cssWD/",
      "timestamp": "2020-06-13T00:32:45+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for black metal record label, LES FLEURS DU MAL (Canada). @lesfleursdumal.productions #lesfleursdumal #lesfleursdumalproductions #blackmetal #blackmetalart #blackmetalartwork #penandink #darkart #recordlabel #metalart #reaper #handdrawn #micron #sakurabrushpen #sharpie #gellyrollpen #markriddick #riddickart",
      "id": "17868754660782521",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/102669670_121276239601625_4185736989612115057_n.jpg?_nc_cat=100&_nc_sid=8ae9d6&_nc_ohc=lhtwXYfw1asAX9HHocP&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=3598a9608063b1201e2486fb1d7af213&oe=5F3FAB50",
      "permalink": "https://www.instagram.com/p/CBGUXNFsUmT/",
      "timestamp": "2020-06-06T15:30:14+0000",
      "username": "riddickart"
    },
    {
      "caption": "From the vault...T-Shirt illustration for brutal death metal band, SPLATTERED (USA), circa 2014. @splatteredofficial @amputatedveinrecords #splattered #splatteredband #amputatedveinrecords #deathmetal #deathmetalart #brutaldeathmetal #slam #slammingbrutaldeathmetal #brutalart #darkart #penandink #inkdrawing #micronpen #sakurabrushpen #markriddick #riddickart",
      "id": "17890712746551248",
      "media_type": "IMAGE",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/101155292_688792098570848_5371315067812897593_n.jpg?_nc_cat=108&_nc_sid=8ae9d6&_nc_ohc=d54jIi5lYDIAX_wgf5k&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=61ca801e48ae37401f5cf74a958aec63&oe=5F3EF1B6",
      "permalink": "https://www.instagram.com/p/CA5amNbhVzC/",
      "timestamp": "2020-06-01T15:14:35+0000",
      "username": "riddickart"
    },
    {
      "caption": "From the vault...GRAVEYARD GHOUL (Germany) / CRYPTIC BROOD (Germany) split LP cover artwork, circa 2014. @graveyardghoulofficial @crypticbrood #graveyardghoul #crypticbrood #thegraveyardbrood #finalgaterecords #germandeathmetal #undergrounddeathmetal #deathmetal #deathmetalvinyl #metalvinyl #metalrecords #penandink #handdrawn #oldschool #markriddick #riddickart",
      "id": "17881781560614482",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/101280363_687594628750923_4944351207691946108_n.jpg?_nc_cat=102&_nc_sid=8ae9d6&_nc_ohc=0GEB4LnUnY8AX-9zYaj&_nc_oc=AQkwRp3eAeW7aOKRs2N8914VW1s_WWeaadYIpyRQbgm9PNgmmOWj2Pn27MKZ7vUTPmKs-7dXz2qI2MnUwE55kM7K&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=175da73e75c0da57375ad7ced14974d0&oe=5F40254A",
      "permalink": "https://www.instagram.com/p/CAvP0skBaL1/",
      "timestamp": "2020-05-28T16:28:02+0000",
      "username": "riddickart"
    },
    {
      "caption": "Illustration for BLAST BEAT 105 (Mexico) radio show. @blast_beat_105 #blastbeat105 #metalradio #metalradioshow #mexicocity #deathmetal #thrashmetal #blackmetal #doommetal #powermetal #heavymetal #penandink #stipplingart #markriddick #riddickart",
      "id": "17843531777192250",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/101055834_158924908966716_5310239054614813666_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=b2l44dIAF4IAX95YbnC&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=5f21ede728eaf868d6e5da5d5317a198&oe=5F3F6BEF",
      "permalink": "https://www.instagram.com/p/CAp5wDVhNO_/",
      "timestamp": "2020-05-26T14:38:58+0000",
      "username": "riddickart"
    },
    {
      "caption": "From the vault...BARGHEST (USA) T-Shirt illustration, circa 2016. @barghestsoulless @gileadmedia #barghest #gileadmedia #blackmetal #deathmetal #blackdeathmetal #blackdeath #usbm #usblackmetal #evilart #darkart #fromthevault #blackmetalart #deathmetalart #penandinkart #markriddick #riddickart",
      "id": "17857524394950776",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/98081217_230530014914839_5602416924171644231_n.jpg?_nc_cat=104&_nc_sid=8ae9d6&_nc_ohc=ttI--zqhPKEAX_z-FfF&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=fedc364437b2e43cb90f9a950696fdc1&oe=5F3EB21C",
      "permalink": "https://www.instagram.com/p/CAdG-8MBCYG/",
      "timestamp": "2020-05-21T15:24:28+0000",
      "username": "riddickart"
    },
    {
      "caption": "Deeply discounted DEATH SAVES x GAME OF THRONES short sleeve and long sleeve shirts I illustrated are available at @deathsaves in various color styles. Game of Thrones TM & © 2020 Home Box Office, Inc. Under license to Death Saves. @dieselboy @joemanganiello #deathsaves #gameofthrones #houseumber #gameofthronesart #got #penandink #streetwear #whitewalkers #gotmerch #markriddick #riddickart",
      "id": "18104381812135736",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/98065447_1095363537515495_2215875299247746915_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=T0w0sfmHJLEAX9XxkHV&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=6f8cedd08f1dbb1845d3cf2c7300911a&oe=5F3F0648",
      "permalink": "https://www.instagram.com/p/CAadhxpBGpo/",
      "timestamp": "2020-05-20T14:43:44+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for death thrashers, INSINNERATOR (USA). @insinnerator_thrash #insinnerator #texasthrash #texasdeathmetal #thrashmetal #deathmetal #speedmetal #deaththrash #thrashmetalart #deathmetalart #penandink #undergroundart #artistsoninstagram #markriddick #riddickart",
      "id": "17875466083665077",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/97966213_618855455711007_6890475657372198125_n.jpg?_nc_cat=107&_nc_sid=8ae9d6&_nc_ohc=x_EjkxtCzEIAX_fwFzn&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=c5068e388a17ad1ec2ec25041913ec1e&oe=5F40496E",
      "permalink": "https://www.instagram.com/p/CAVWdf_hEg6/",
      "timestamp": "2020-05-18T15:05:47+0000",
      "username": "riddickart"
    },
    {
      "caption": "I had the pleasure and honor of speaking with THE GROWL death metal documentary producer, Cam, to discuss old school death metal among other things via live stream. Visit @thegrowl_deathmetal for more details. #thegrowl #thegrowldeathmetaldocumentary #deathmetaldocumentary #deathmetal #undergrounddeathmetal #oldschooldeathmetal #osdm #metalhead #metalheads #scorched #idolatry #markriddick #riddickart",
      "id": "17893853410497149",
      "media_type": "IMAGE",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/97182509_660066794543834_6547476922963033463_n.jpg?_nc_cat=105&_nc_sid=8ae9d6&_nc_ohc=r-lJrdfLUEgAX9WdI1z&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=d2b748d34bf03c3aa5b3415d5ecf007c&oe=5F40C952",
      "permalink": "https://www.instagram.com/p/CANr6W4hyrm/",
      "timestamp": "2020-05-15T15:39:18+0000",
      "username": "riddickart"
    },
    {
      "caption": "From the vault...T-Shirt illustration for the now defunct death/thrash band, SLAUGHTERER (Germany), circa 2016. #slaughterer #germanthrash #germandeathmetal #deathmetal #thrashmetal #deaththrash #thrashmetalart #deathmetalart #penandink #darkart #darkartists #toxicwaste #undergroundart #markriddick #riddickart",
      "id": "18104835649092988",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/97363825_614409342485266_6993296258172708014_n.jpg?_nc_cat=101&_nc_sid=8ae9d6&_nc_ohc=1ls6L_T5wGYAX9W65jf&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=c703e205aeb66bbc29cdc6697d91f3b4&oe=5F404726",
      "permalink": "https://www.instagram.com/p/CALIbHohNei/",
      "timestamp": "2020-05-14T15:50:43+0000",
      "username": "riddickart"
    },
    {
      "caption": "T-Shirt illustration for ENCOFFINIZED (USA), available via Holy Mountain Printing. @encoffinized @holymountainprinting #encoffinized #holymountainprinting #deathmetal #brutaldeathmetal #undergrounddeathmetal #californiadeathmetal #deathmetalart #demons #penandink #micron #sakurabrushpen #micronart #darkart #markriddick #riddickart",
      "id": "17893482868507682",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/97072794_1104552039930155_7383492287754454823_n.jpg?_nc_cat=111&_nc_sid=8ae9d6&_nc_ohc=PxIW9dSu-x8AX_NKGc4&_nc_oc=AQktjO0LiwoIq4tAQ7bMLa9GZJ_SGopjss1cFX0vgBhjxhDNfAzvMh_xOuWGTxjijirW_h4_q6HCWRAI_fj5Cf7K&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=e3137096fd911a87620d5acd8d939b40&oe=5F3E5734",
      "permalink": "https://www.instagram.com/p/CADRiSpjsM5/",
      "timestamp": "2020-05-11T14:36:25+0000",
      "username": "riddickart"
    },
    {
      "caption": "DISTURBIA x RIDDICKART long sleeve T-Shirts still available via @disturbia \n#disturbia #disturbiaclothing #disturbiaclothinguk #darkstyle #gothicstyle #streetwear #metalmerch #darkart #occult #longsleeve #skullart #collab #markriddick #riddickart",
      "id": "18067437718200054",
      "media_type": "IMAGE",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/95732867_101849624835333_3146295612130562467_n.jpg?_nc_cat=107&_nc_sid=8ae9d6&_nc_ohc=LUCOm0Mvi9kAX-GVEVm&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=1b06068c0c200f6d4b1362378e8c323b&oe=5F3F74F2",
      "permalink": "https://www.instagram.com/p/B_7iyyTDTWL/",
      "timestamp": "2020-05-08T14:33:18+0000",
      "username": "riddickart"
    },
    {
      "caption": "New T-Shirt illustration for THE GROWL death metal documentary. @thegrowl_deathmetal #thegrowl #rabiddogfilms #deathmetal #undergrounddeathmetal #oldschooldeathmetal #osdm #deathmetalart #deathmetalartwork #metalmusic #extrememetal #workinprogress #penandink #micron #sakurabrushpen #diy #handdrawn #markriddick #riddickart",
      "id": "17875795888643809",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/96216301_602943790319502_1227519450265952020_n.jpg?_nc_cat=109&_nc_sid=8ae9d6&_nc_ohc=zpsskj2nvs4AX93lakh&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=19fa0277a353fdd13b42d823c3134030&oe=5F3FFC1A",
      "permalink": "https://www.instagram.com/p/B_2ix3jjW4W/",
      "timestamp": "2020-05-06T15:56:58+0000",
      "username": "riddickart"
    },
    {
      "caption": "Filler artwork for THE ASPHODEL COMPLEX table top role playing game by Warp Games (Australia). https://www.warpgames.com.au\n\n#warpgames #theasphodelcomplex #asphodelcomplex #tabletopgames #penandink #darkart #darkartists #handdrawn #micron #sakurabrushpen #markriddick #riddickart",
      "id": "17947805212339930",
      "media_type": "CAROUSEL_ALBUM",
      "media_url": "https://scontent-sjc3-1.cdninstagram.com/v/t51.2885-15/95752690_685938588839525_5054633147035822629_n.jpg?_nc_cat=107&_nc_sid=8ae9d6&_nc_ohc=sO-Z0yJ2y1cAX8wEnly&_nc_ht=scontent-sjc3-1.cdninstagram.com&oh=bb1c790cc5e2c3560deed2d6ff07f45c&oe=5F3EAF53",
      "permalink": "https://www.instagram.com/p/B_xMh_Dhxh7/",
      "timestamp": "2020-05-04T14:06:22+0000",
      "username": "riddickart"
    }
  ]
</script>


<?php get_footer(); ?>