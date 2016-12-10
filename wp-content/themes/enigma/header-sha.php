<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<?php $wl_theme_options = weblizar_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($wl_theme_options['upload_image_favicon']); ?>" /> 
	<?php } ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div>
	<!-- Header Section -->
	<div class="header_section header-sha" style="padding: 20px;">
		<div class="container" >
			<div class="head-moh-baner col-sm-12 col-lg-4 col-md-12 col-xs-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="aio-icon-component  infoBoxMoh style_1">
                            <a class="aio-icon-box-link" href="http://moh.am" target=" _blank">
                                <div class="aio-icon-box left-icon" style="">
                                    <div class="aio-icon-left">
                                        <div class="ult-just-icon-wrapper ">
                                            <div class="align-icon" style="text-align:center;">
                                                <div class="aio-icon-img " style="font-size:80px;display:inline-block;">
                                                    <img class="img-icon" alt="" src="<?php echo get_template_directory_uri(); ?>/images/250px-Coat_of_arms_of_Armenia.svg_.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aio-ibd-block">
                                        <div class="aio-icon-description" style="font-size:15.4px;color:#777777;"><p></p>
                                        <h3><span style="font-size: 8pt;">ՀԱՅԱՍՏԱՆԻ ՀԱՆՐԱՊԵՏՈՒԹՅԱՆ ԱՌՈՂՋԱՊԱՀՈՒԹՅԱՆ ՆԱԽԱՐԱՐՈՒԹՅՈՒՆ</span></h3>
                                        <p></p>
                                        </div> <!-- description -->
                                    </div> <!-- aio-ibd-block -->
                                </div> <!-- aio-icon-box -->
                            </a>
                        </div> <!-- aio-icon-component -->
                    </div>
                </div>
            </div>
            
            <!-- For second menu-->
			<div class="Second-menu col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary')); ?>
			</div>
		</div>	
	</div>	
	<!-- /Header Section -->
   	<!-- Navigation  menus -->
	<div class="navigation_menu "  data-spy="affix" data-offset-top="95" id="enigma_nav_top">
		<span id="header_shadow"></span>
		<div class="container navbar-container" >
			<nav class="navbar navbar-default " role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					 
					  <span class="sr-only"><?php _e('Toggle navigation','enigma');?></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
				</div>
				<div id="menu" class="collapse navbar-collapse ">	
				<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'weblizar_fallback_page_menu',
						'walker' => new weblizar_nav_walker(),
						)
						);	?>				
				</div>	
			</nav>
		</div>
	</div>