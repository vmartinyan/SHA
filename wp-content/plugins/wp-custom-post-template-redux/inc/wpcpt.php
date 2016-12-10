<?php

class WPCPT {


	public static function init() {

		self::attach_hooks();

	}

	public static function attach_hooks() {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_post_custom_template' ) );
		add_action( 'save_post', array( __CLASS__, 'save_custom_post_template' ), 10, 2 );
		add_filter( 'single_template', array( __CLASS__, 'get_custom_post_template_for_template_loader' ) );
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_post_custom_template' ) );

	}

	public static function add_post_custom_template( $post_type ) {

		$option = get_option( WPCPT_Settings::$option_name, array() );


		if ( ! $option ) {
			return;
		}

		$post_type_array = array_keys( $option );


		if ( in_array( $post_type, $post_type_array ) ) {
			add_meta_box(
				'postparentdiv',
				__( 'WP Post Template' ),
				array( __CLASS__, 'custom_post_template_meta_box' ),
				$post_type,
				'side',
				'core'
			);
		}
	}

	public static function custom_post_template_meta_box( $post ) {
		if ( $post->post_type != 'page' && 0 != count( self::get_post_custom_templates() ) ) {
			$template = get_post_meta( $post->ID, '_post_template', true );
			?>
			<label class="screen-reader-text" for="post_template"><?php _e( 'Post Template' ) ?></label>
			<select name="post_template" id="post_template">
				<option value='default'><?php _e( 'Default Template' ); ?></option>
				<?php self::custom_post_template_dropdown( $template ); ?>
			</select>
			<p>
				<i><?php _e( 'Some themes have custom templates you can use for single posts template selecting from dropdown.' ); ?></i>
			</p>
			<?php
		}
	}

	public static function save_custom_post_template( $post_id, $post ) {
		if ( $post->post_type != 'page' && ! empty( $_POST['post_template'] ) ) {
			update_post_meta( $post->ID, '_post_template', $_POST['post_template'] );
		}
	}

	public static function get_custom_post_template_for_template_loader( $template ) {
		global $wp_query;
		$post = $wp_query->get_queried_object();
		if ( $post && in_array( $post->post_type, array_keys( get_option( WPCPT_Settings::$option_name, array() ) ) ) ) {
			$post_template = get_post_meta( $post->ID, '_post_template', true );

			if ( ! empty( $post_template ) && $post_template != 'default' ) {
				$template = get_stylesheet_directory() . "/{$post_template}";
			}
		}

		return $template;
	}

	public static function get_post_custom_templates() {
		if ( function_exists( 'wp_get_themes' ) ) {
			$themes = wp_get_themes();
		} else {
			$themes = get_themes();
		}
		$theme          = get_option( 'template' );
		$templates      = $themes[ $theme ]['Template Files'];
		$post_templates = array();

		if ( is_array( $templates ) ) {
			$base = array( trailingslashit( get_template_directory() ), trailingslashit( get_stylesheet_directory() ) );

			foreach ( $templates as $template ) {
				$basename = str_replace( $base, '', $template );
				if ( $basename != 'functions.php' ) {
					// don't allow template files in subdirectories
					if ( false !== strpos( $basename, '/' ) ) {
						continue;
					}

					$template_data = implode( '', file( $template ) );

					$name = '';
					if ( preg_match( '|WP Post Template:\s*(.*)$|mi', $template_data, $name ) &&
					     (
						     preg_match( '|WP Post Type:\s*(' . get_current_screen()->post_type . ')$|mi', $template_data, $matches ) ||
					         ! preg_match( '|WP Post Type:|mi', $template_data, $matches )


					     ) ) {
						$name = _cleanup_header_comment( $name[1] );
					}

					if ( ! empty( $name ) && is_string( $name ) ) {
						$post_templates[ trim( $name ) ] = $basename;
					}
				}
			}
		}

		return $post_templates;
	}

	public static function custom_post_template_dropdown( $default = '' ) {
		$templates = self::get_post_custom_templates();
		ksort( $templates );
		foreach ( array_keys( $templates ) as $template )
			: if ( $default == $templates[ $template ] ) {
			$selected = " selected='selected'";
		} else {
			$selected = '';
		}
			echo "\n\t<option value='" . $templates[ $template ] . "' $selected>$template</option>";
		endforeach;
	}


}

