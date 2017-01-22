<?php //Template Name:Simple Page
get_header('search');?>
<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
		<?php if(have_posts()) :?>
			<div class="col-md-12">
			<h1><?php printf( __( 'Որոնման արդյունքում գտնվել են: %s', 'enigma' ), '<span>' . get_search_query() . '</span>'  ); ?>
			</h1>
			</div>
		<?php endif; ?>
		<?php rewind_posts(); ?>
		</div>
	</div>	
</div>
<div class="container insideBackground">	
	<div class="row enigma_blog_wrapper">
	<div class="col-md-8">
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>	
	<?php endwhile;
	weblizar_navigation();
	else :
	get_template_part('nocontent');
	endif; ?>	 
	</div>	
	
	</div>
</div>
<?php get_footer(); ?>