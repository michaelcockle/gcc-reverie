<?php
/**
 * Template Name: GCC Home
 * @package WordPress
 * @subpackage Roots
 * http://twitter.github.com/bootstrap/scaffolding.html
 */

get_header(); ?>


<section class="header-img">
<?php echo get_new_royalslider(2); ?>
<!-- 	<div class="header-img">
		<img src="http://goldsboroughcricketclub.co.uk/wp-content/themes/gcc/images/goldsborough-cricket-club-1170.jpg" alt="goldsborough cricket club">
	</div> -->
</section>

<div class="row">






	<div class="home-blog-info small-12 medium-12 large-4 columns">
		<div class="box">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
		</div>
	</div>





	<aside id="sidebar" class="small-12 medium-6 large-4 columns">
		<?php dynamic_sidebar("Sidebar"); ?>
	</aside>





	<div class="small-12 medium-6 large-4 columns">
		<a class="twitter-timeline" href="https://twitter.com/GboroCC" data-widget-id="396044343787524096">Tweets by @GboroCC</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>







</div>




<div class="row">
	<?php get_footer(); ?>
</div>


