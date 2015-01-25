<?php
/**
 * Template Name: Events
 * @package WordPress
 * @subpackage GCC Reverie
 */

get_header(); ?>

<!--
<script type="text/javascript">
	$(document).ready(function(){
	});
</script>

 -->


<section class="row">
	<div class="large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

	</div>
</section>


<section class="row">
	<div class="large-12 columns">
			<?php
			global $post;
			$current_date = date('j M Y');
			$end_date = date('j M Y', strtotime('30 days'));

			$get_posts = tribe_get_events(array('start_date'=>$current_date,'end_date'=>$end_date,'posts_per_page'=>10) );

			foreach($get_posts as $post) { setup_postdata($post); ?>

			<div class="post">
				<h4 class="post-header"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h4>

				<span class="event-date"><a href="<?php the_permalink(); ?>"><?php echo tribe_get_start_date($post->ID, true, 'M j, Y'); ?></a></span>
				<div class="post-content"><?php the_content(); ?></div>
			</div>

			<?php } //endforeach ?>
			<?php wp_reset_query(); ?>

	</div>
</section>

<!-- <section class="row">
	<div class="large-12 columns">


	</div>
</section> -->





<?php get_footer(); ?>



