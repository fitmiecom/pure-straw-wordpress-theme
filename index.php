<?php get_header(); ?>

<div class="container content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="entry-meta"><?php the_time('F j, Y'); ?></div>
      <div class="entry-content">
        <?php the_excerpt(); // hoặc the_content(); ?>
      </div>
    </article>
  <?php endwhile; else: ?>
    <p>No content found.</p>
  <?php endif; ?>
</div>

<?php get_footer();