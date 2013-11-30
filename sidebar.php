<?php
function nav_link($page) {
  $css_class = "section-title";
  $href = get_permalink(get_page_by_title($page)->ID);
  $attr = "";
  if (allenc_is_page($page)) { $css_class .= " active"; }
  if ($page == "home") { $href = get_home_url(); }
  if ($page == "about") { $attr = "rel=\"author\""; }
  echo "<a class=\"$css_class\" href=\"$href\" $attr>";
}
?>

<section class="spine-spacer-40"></section>

<nav id="main-nav">
  <section class="spine-section spine-title spine-home">
    <?php nav_link("home") ?>
      <div class="spine-marker"></div>
      <h3 class="title-main">Home</h3>
      <div class="section-title-animated">
        <div class="title-separator"></div>
        <h3 class="title-additional">Origin</h3>
      </div>
    </a>
  </section>

  <section class="spine-spacer-10"></section>

  <section class="spine-section spine-title spine-articles">
    <?php nav_link("articles") ?>
      <div class="spine-marker"></div>
      <h3 class="title-main">Articles</h3>
      <div class="section-title-animated">
        <div class="title-separator"></div>
        <h3 class="title-additional">Noteworthy</h3>
      </div>
    </a>
  </section>

  <section class="spine-spacer-10"></section>

  <section class="spine-section spine-title spine-archives">
    <?php nav_link("archives") ?>
      <div class="spine-marker"></div>
      <h3 class="title-main">Posts</h3>
      <div class="section-title-animated">
        <div class="title-separator"></div>
        <h3 class="title-additional">Thoughtstream</h3>
      </div>
    </a>
  </section>

  <section class="spine-spacer-10"></section>

  <section class="spine-section spine-title spine-about">
    <?php nav_link("about") ?>
      <div class="spine-marker"></div>
      <h3 class="title-main">About</h3>
      <div class="section-title-animated">
        <div class="title-separator"></div>
        <h3 class="title-additional">Identity</h3>
      </div>
    </a>
  </section>
</nav>

<section class="spine-spacer-80"></section>

<section class="spine-section spine-dot">
  <ul class="social-list">
    <li class="social-icon">
      <a href="http://twitter.com/#!/allenmhc" target="_blank" title="Twitter" class="twitter" rel="me">
        <span>Twitter</span>
      </a>
    </li>
    <li class="social-icon">
      <a rel="author" target="_blank" title="Google+" class="googleplus" rel="me" href="https://profiles.google.com/allenc">
        <span>Google+</span>
      </a>
    </li>
    <li class="social-icon">
      <a href="http://www.quora.com/Allen-Cheung" target="_blank" title="Quora" class="quora" rel="me">
        <span>Quora</span>
      </a>
    </li>
    <li class="social-icon">
      <a href="http://www.linkedin.com/in/allencheung" target="_blank" title="LinkedIn" class="linkedin" rel="me">
        <span>LinkedIn</span>
      </a>
    </li>
    <li class="social-icon">
      <a href="https://github.com/allenmhc" target="_blank" title="Github" class="github" rel="me">
        <span>Github</span>
      </a>
    </li>
  </ul>
</section>

<section class="spine-spacer-80"></section>

<section class="spine-section spine-dot">
  <a id="rss" href="<?php bloginfo('rss2_url'); ?>">
    <span>subscribe to rss</span>
  </a>
</section>

<section class="spine-spacer-80"></section>

<section class="spine-section spine-dot" id="search-form">
  <?php get_search_form(); ?>
  <?php if (is_search()): ?>
    <?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    ?>
    <aside id="search-info">
      <?php echo $total_results; ?> post<?php echo ($total_results == 1) ? "" : "s" ?>
    </aside>
    <?php wp_reset_query(); ?>
  <?php endif; ?>
</section>
