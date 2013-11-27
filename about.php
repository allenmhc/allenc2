<?php
/*
Template Name: About
*/
define('WP_USE_THEMES', false);
global $wp_query;
?>

<?php
get_header();
?>

<section id="alpha" class="about clearfix">
  <div class="about-photo">
    <img src="<?php echo get_bloginfo("template_directory"); ?>/images/about.jpg" alt="About me"/>
    <section class="message-me">
      <h2>contact me</h2>
      <div class="contact-form">
        <?php insert_cform("Contact me"); ?>
      </div>
    </section>
  </div>

  <div class="about-text">
    <div class="intro-paragraph">
      <p>I'm a full stack web software engineer currently employed at Square.</p>
      <p>I like clean designs, elegant code, and simple products. I voice my thoughts on this blog and take whimsically bad pictures.</p>
    </div>

    <dl class="six-questions">
      <dt>who</dt>
      <dd>allen cheung</dd>

      <dt>what</dt>
      <dd>software engineer</dd>

      <dt>where</dt>
      <dd>silicon valley</dd>

      <dt>when</dt>
      <dd>since 2004</dd>

      <dt>why</dt>
      <dd>product &times; design &times; code</dd>

      <dt>how</dt>
      <dd><a href="http://allenc.com/2013/03/blog-redesign-and-resources-code/">code</a> and <a href="http://allenc.com/2013/03/blog-redesign-and-resources-design/">design</a></dd>
    </dl>
  </div>
</section>

<section id="beta">
  <?php get_sidebar(); ?>
</section>

<?php
get_footer();
?>

<script>
(function() {
  $(document).ready(function() {
    var $messageMe = $(".message-me");
    $messageMe.find("h2").click(function() {
      $messageMe.toggleClass("show-message-me");
    });
  });
})();
</script>
