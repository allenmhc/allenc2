<?php
/* Search results template */
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<div id="alpha">
  <?php if ( have_posts() ) : ?>
  <div class="search-results">
    <ul class="posts-list archives-list">

    <?php while (have_posts()): the_post(); ?>
      <li class="post-line-outer">
        <a href="<?php the_permalink(); ?>" class="post-line">
          <div class="post-date archive-date" pubdate="pubdate"><?php echo date("Y.m.d", strtotime(get_the_date())); ?></div>
          <span class="post-title archive-title"><?php the_title(); ?></span>
          <aside class="excerpt"><?php the_excerpt(); ?></aside>
        </a>
      </li>
    <?php endwhile; ?>

    </ul>

    <?php
      $paged = get_query_var('paged');
      $max_pages = $wp_query->max_num_pages;
      $curr_link = get_pagenum_link($paged);
      $next_link = get_next_posts_page_link();
      $prev_link = get_previous_posts_page_link();
    ?>
    <?php if ($max_pages > 1): ?>
      <div class="pagination-buttons prose">
      <?php
      function get_button($tag, $direction, $disabled, $href, $text) {
        return "<$tag class=\"$direction pagination-button $disabled\" $href>$text</$tag>";
      }

      $buttons = '';
      if ($paged < $max_pages) {
        $buttons .= get_button('a', 'prev', '', "href=\"$next_link\"", 'Older');
      } else {
        $buttons .= get_button('span', 'prev', 'disabled', '', 'Older');
      }
      $buttons .= "&nbsp;&nbsp;|&nbsp;&nbsp;";
      if ($paged > 1) {
        $buttons .= get_button('a', 'next', '', "href=\"$prev_link\"", 'Newer');
      } else {
        $buttons .= get_button('span', 'next', 'disabled', '', 'Newer');
      }
      echo $buttons;
      ?>
     </div>
    <?php endif; ?>

  </div>

  <?php else: ?>

  <article class="search-results prose" id="no-search-results">
    <p>Sorry, couldn't find any posts for your search "<?php echo stripcslashes($_GET['s']); ?>".</p>
    <p>Could I interest you in a few <a href="<?php echo get_permalink(get_page_by_title("articles")); ?>">articles</a> instead?</p>
  </article>

  <?php endif;?>
</div>

<div id="beta">
  <?php get_sidebar(); ?>
</div>

<?php
  get_footer();
?>
