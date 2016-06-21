<?php get_header(); ?>

<div class="R__main">

  <div class="R__main__blog">

    <?php if (is_search()) : ?>
      <h3>Search results for: <br/>&ldquo;<?php echo get_search_query(); ?>&rdquo;</h3>
      <hr />
    <?php endif; ?>

    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

      <div class="R__main__blog__post">
        <h3 class="R__main__blog__post__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <h6 class="R__main__blog__post__date">&gt;&gt; <?php the_time('F jS, Y') ?></h6>

        <div class="R__main__blog__post__entry">
          <?php the_content(); ?>
          <hr />
        </div>
      </div>

    <?php endwhile; ?>

      <?php //BEGIN CONDITIONS FOR ENTRY FOOTER ?>

      <?php if (is_single() || is_date()) : ?>

        <div class="R__main__blog__navigation">
          <a alt="Back to news" href="<?php echo site_url();?>" class="R__hand R__hand--back">back to news</a>
        </div>

      <?php elseif (is_search()) : ?>

        <div class="R__main__blog__navigation">
          <?php
            $searchTerm = get_search_query();
            posts_nav_link('&nbsp;','newer results for:<br />&ldquo;' . $searchTerm . '&rdquo;', 'older results for:<br />&ldquo;' . $searchTerm . '&rdquo;');
          ?>
        </div>

      <?php else : ?>

        <div class="R__main__blog__navigation">
          <?php posts_nav_link('&nbsp;','newer entries','older entries'); ?>
        </div>

      <?php endif; ?>

    <?php else : ?>

      <div class="R__main__blog__noresults">
        <h3>No results found for: <b><?php echo get_search_query(); ?></b></h3>
        <a alt="Back to news" href="<?php echo site_url();?>" class="R__hand R__hand--back">back to news</a>
      </div>

    <?php endif; ?>

  </div> <!--/R__main__blog-->

  <?php include(TEMPLATEPATH . '/sidebar.php'); ?>

</div><!--/R__main-->

<?php get_footer(); ?>