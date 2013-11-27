<?php
/* Home template */
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<div id="alpha">
  <section class="articles">
    <ul class="posts-list articles-list">
      <?php
      rewind_posts();
      $query_args = array(
        "meta_key" => "article",
        "meta_value" => 1,
        "posts_per_page" => 3
      );
      query_posts($query_args);
      $i = 0;
      while (have_posts()): the_post();
      ?>
      <li class="post-box-outer <?php echo "post-box-${i}"; ?>">
        <a href="<?php the_permalink(); ?>" class="post-box article-box">
          <div class="post-box-inner">
            <h4 class="post-title article-title"><?php the_title(); ?></h4>
            <div class="post-separator"></div>
            <div class="post-excerpt article-excerpt"><?php the_excerpt(); ?></div>
          </div>
        </a>
      </li>
      <?php $i++; ?>
      <?php endwhile; ?>
    </ul>
  </section>

  <section class="archives">
    <ul class="posts-list archives-list">
      <?php
      rewind_posts();
      $query_args = array(
        "posts_per_page" => 10
      );
      query_posts($query_args);
      while (have_posts()): the_post();
      ?>
      <li class="post-line-outer">
        <a href="<?php the_permalink(); ?>" class="post-line">
          <div class="post-date archive-date"><?php the_time("Y.m.d"); ?></div>
          <span class="post-title archive-title"><?php the_title(); ?></span>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
  </section>
</div>

<div id="beta">
  <?php get_sidebar(); ?>
</div>

<?php
  get_footer();
?>
