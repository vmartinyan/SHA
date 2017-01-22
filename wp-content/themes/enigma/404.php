<?php get_header('search'); ?>
<!--<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php _e('404 Error','enigma'); ?></h1>
				<ul class="breadcrumb">
					<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home','enigma'); ?></a></li>
					<li><?php _e('404 Error','enigma'); ?></li>
				
				</ul>
			</div>
		</div>
	</div>	
</div>-->
<div class="container insideBackground">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h2><?php _e('404','enigma'); ?></h2>
				<!--<h4><?php _e('Ներողություն... Page Not Found !!!','enigma'); ?></h4>-->
				<p><?php _e('Ներողություն..., Ձեր հարցմանը համապատասխան էջ գոյություն չունի','enigma'); ?></p>
				<p><a href="<?php echo home_url( '/' ); ?>"><button class="enigma_send_button" type="submit"><?php _e('Գլխավոր էջ','enigma'); ?></button></a></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>