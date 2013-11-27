<?php
/* Archive (category, tag, author, date) file. */
define('WP_USE_THEMES', false);
global $wp_query;

global $query_string;
// $query_args = array_merge($wp_query->query_vars, array('posts_per_page' => -1));
// query_posts($query_args);
query_posts($query_string . '&posts_per_page=-1');
?>

<?php
get_header();
?>

<div id="alpha">
  <section class="archive archives">
    <ul class="posts-list archives-list">
      <?php while (have_posts()): the_post(); ?>

      <li class="post-line-outer">
        <a href="<?php the_permalink(); ?>" class="post-line">
          <div class="post-date archive-date"><?php echo date("Y.m.d", strtotime(get_the_date())); ?></div>
          <span class="post-title archive-title"><?php the_title(); ?></span>
        </a>
      </li>

    <?php endwhile; ?>
  </section>
</div>

<div id="beta">
  <?php get_sidebar(); ?>
</div>

<?php
  get_footer();
?>
