<?php
/**
 * Template Name: Statistics Template
 * @package WordPress
 * @subpackage Roots
 */


get_header(); ?>

<div id="gridSystem">
	<div class="page-header">
		<h1>Statistics</h1>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php while ( have_posts() ) : the_post(); ?>
			<nav id="nav-single">
				<h3 class="assistive-text">
					<?php _e( 'Post navigation', 'twentyeleven' ); ?>
				</h3>
				<span class="nav-previous">
				<?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?>
				</span> <span class="nav-next">
				<?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
				</span> </nav>
			<!-- #nav-single -->
			
			<?php get_template_part( 'content', 'single' ); ?>
			<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
