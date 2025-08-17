<?php get_header(); ?>
<div class="container content">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="entry-meta"><?php the_time('F j, Y'); ?> — <?php the_author(); ?></div>
      <div class="entry-content"><?php the_content(); ?></div>
      <?php comments_template(); ?>
    </article>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>