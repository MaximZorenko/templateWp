<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row footer_flex">
				<?php 
					if(is_active_sidebar('widjet_footer1')){
						dynamic_sidebar('widjet_footer1;');
					}
				?>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
				<?php 
					if(is_active_sidebar('widjet_icons')){
						dynamic_sidebar('widjet_icons;');
					}
				?>	
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

<?php wp_footer(); ?>

</body>
</html>
