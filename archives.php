<?php
/*
Template Name: Archives
*/
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<?php
function bookend_year($is_first) {
  $d = allenc_get_bookend_post_date($is_first, true);
  return date('Y', strtotime($d));
}

function filter_by_year($where = '') {
  global $wpdb, $archives_year;
  $last_year = intval($archives_year) - 2;
  $next_year = intval($archives_year) + 1;
  $where .= $wpdb->prepare(" AND post_date >= '$last_year-01-01' AND post_date <= '$next_year-12-31'");
  return $where;
}

$current_year = date('Y');
$archives_year = intval(get_query_var('archivesyear') ? get_query_var('archivesyear') : $current_year);

$bookend_start = bookend_year(false);
$bookend_end = bookend_year(true);
if ($archives_year < $bookend_end) { $archives_year = $bookend_end; }
if ($archives_year > $bookend_start) { $archives_year = $bookend_start; }
?>
<div id="alpha">
  <?php
  add_filter('posts_where', 'filter_by_year');
  $posts = get_posts(array(
    'suppress_filters' => false,
    'posts_per_page' => -1
  ));
  remove_filter('posts_where', 'filter_by_year');

  $histogram = array();
  foreach ($posts as $post) {
    list($year, $month) = explode("-", date('Y-n', strtotime($post->post_date)));
    if (!isset($histogram[$year])) {
      $histogram[$year] = array();
      for ($i = 12; $i > 0; $i--) { $histogram[$year][strval($i)] = array(); }
    }
    $histogram[$year][$month][] = $post;
  }
  ?>
  <section class="archives">
    <ul class="histogram">
      <?php foreach ($histogram as $year => $histogram_year): ?>
      <li class="year">
        <a class="archive-link" href="<?php echo get_bloginfo('url') . "/archives/$year/"; ?>">
          <ul class="year-inner">
            <?php foreach ($histogram_year as $month => $histogram_month): ?>
            <li class="month" data-year="<?php echo $year; ?>"
                              data-month="<?php echo $month; ?>"
                              data-posts="<?php echo count($histogram_month); ?>">
              <?php for ($i = count($histogram_month)-1; $i >= 0; $i--): ?>
              <div class="histogram-bubble" style="bottom: <?php echo 7*$i;?>px"></div>
              <?php endfor; ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <div class="title"><?php echo $year; ?></div>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>

    <?php foreach ($histogram[strval($archives_year)] as $month): ?>
    <?php if (count($month) > 0): ?>
      <ul class="posts-list archives-list">
        <?php foreach ($month as $post): ?>
        <li class="post-line-outer">
          <a href="<?php echo get_permalink($post->ID); ?>" class="post-line">
            <div class="post-date archive-date"><?php echo date("Y.m.d", strtotime($post->post_date)); ?></div>
            <span class="post-title archive-title"><?php echo $post->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php endforeach; ?>
  </section>

  <?php wp_reset_query(); ?>
</div>

<div id="beta">
  <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
