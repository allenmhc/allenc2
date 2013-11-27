<?php
/*
Template Name: Articles
*/
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<?php
function bookend_year($is_first) {
  $d = allenc_get_bookend_post_date($is_first, false);
  return date('Y', strtotime($d));
}

$num_years_to_show = 4;
$current_year = date('Y');
$articles_year = get_query_var('articlesyear') ? get_query_var('articlesyear') : $current_year;

$bookend_start = bookend_year(false);
$bookend_end = bookend_year(true);
if ($articles_year < $bookend_end) { $articles_year = $bookend_end; }
if ($articles_year > $bookend_start) { $articles_year = $bookend_start; }

$start_year = min($bookend_start, $articles_year + floor($num_years_to_show / 2));
$end_year = max($bookend_end, $start_year - $num_years_to_show + 1);
if ($start_year-$end_year+1 < $num_years_to_show && $bookend_start > $start_year) { $start_year += 1; }
?>
<div id="alpha">
  <section class="articles">
    <ul class="year-navigator">
      <?php for ($i = $start_year; $i >= $end_year; $i--): ?>
      <li class="year">
        <a href="<?php echo get_bloginfo('url') . '/articles/' . $i; ?>" class="title-year"><?php echo $i; ?></a>
      </li>
      <?php endfor ?>
    </ul>

    <ul class="posts-list articles-list">
      <?php
      rewind_posts();
      $temp_query = clone $wp_query;
      $query_args = array(
        "meta_key" => "article",
        "meta_value" => 1,
        "posts_per_page" => -1,
        "orderby" => "date",
        "order" => "DESC",
        "year" => $articles_year
      );
      $wp_query = null;
      $wp_query = new WP_Query($query_args);
      $i = 1;
      while ($wp_query->have_posts()): $wp_query->the_post();
      ?>
      <li class="post-box-outer <?php echo "post-box-" . (($i % 2 == 0) ? "even" : "odd"); ?>">
        <a href="<?php the_permalink(); ?>" class="post-box article-box">
          <div class="post-box-inner">
            <h4 class="post-title article-title"><?php the_title(); ?></h4>
            <div class="post-separator"></div>
            <div class="post-excerpt article-excerpt"><?php the_excerpt(); ?></div>
          </div>
        </a>
      </li>
      <?php
        $i++;
        endwhile;
        $wp_query = clone $temp_query;
        wp_reset_query();
      ?>
    </ul>
  </section>
</div>

<div id="beta">
  <?php get_sidebar(); ?>
</div>

<?php
  get_footer();
?>
