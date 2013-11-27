<?php /*
Post template
Author: Allen Cheung
*/
?>
<?php if ($related_query->have_posts()):?>
<h3>Related and More</h3>
<ul class="posts-list">
	<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
  <li class="post-line-outer">
    <a class="post-line" href="<?php the_permalink(); ?>" rel="bookmark">
      <span class="post-title archive-title"><?php the_title(); ?></span>
    </a>
  </li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>

