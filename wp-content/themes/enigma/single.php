<?php get_header('sha'); 
/*get_template_part('breadcrums');*/ ?>
<div class="postContent">
<div class="container">
	<div class="row enigma_blog_wrapper">
	<div class="col-sm-12">	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
		<?php get_template_part('post','content'); 
		get_template_part('author','intro');
		endwhile; 
		else : 
		get_template_part('nocontent');
		endif;
		/*weblizar_navigation_posts();
		comments_template( '', true ); */?>
	</div>
	<!--<?php get_sidebar(); ?>-->	
	</div> <!-- row div end here -->	
</div>
</div><!-- container div end here -->
<?php get_footer(); ?>