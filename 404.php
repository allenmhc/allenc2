<?php
/* 404 template */
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<section class="page-404">
  <hgroup>
    <h1>404</h1>
    <h2>Page. Not. Found.</h2>
  </hgroup>

  <svg class="lines">
    <path class="line-path" fill="none" stroke="#C0AD6B">
      <animate class="line-path-animation" begin="0" attributeName="stroke-dashoffset" to="0" dur="100s" fill="freeze" />
    </path>
  </svg>
</section>

<?php
  wp_footer();
?>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/scripts/lines.js"></script>
