	</div><!-- Row End -->
</div><!-- Container End -->

<div class="full-width footer-widget">
	<div class="row">
		<?php dynamic_sidebar("Footer"); ?>
	</div>
</div>

<footer class="footer full-width" role="contentinfo">
	<div class="row">
		<div class="large-12 columns">
			<?php // wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list')); ?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
				<p>&copy; <?php echo date('Y'); ?> <a style="text-decoration: underline;" href="http://goldsboroughcricketclub.co.uk/maps/"> <?php bloginfo('name'); ?></a>, Main St Goldsborough, Knaresborough, North Yorkshire, HG5 8NW, Tel:07761 860 285,
			<a href="/contact">Contact</a>
		</p>
			<p></p>

			<ul class="meta-info" >
				<!-- <li class="register"> -->
					<?php wp_register(); ?>
				<!-- </li> -->
				<li class="log-in-out">
					<?php wp_loginout(); ?>
				</li>

			</ul>
		</div>
	</div>

<p>&nbsp;</p>
</footer>

<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>

</body>
</html>
