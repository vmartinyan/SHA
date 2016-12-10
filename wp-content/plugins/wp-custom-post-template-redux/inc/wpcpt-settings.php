<?php

class WPCPT_Settings {

	public static $option_name = 'cptemplate_settings';

	public static function init() {
		self::attach_hooks();
	}

	public static function attach_hooks() {

		add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'settings_init' ) );

	}

	public static function add_admin_menu() {

		add_submenu_page( 'options-general.php', 'Custom Post Template', 'Custom Post Template', 'manage_options', 'custom_post_template', array(
			__CLASS__,
			'options_page'
		) );

	}

	public static function options_page() {

		?>

		<div class="wrap">
			<h1>Custom Post Template Post Type Select</h1>
			<form action='options.php' method='post'>


				<?php
				settings_fields( 'custom_post_templates' );
				do_settings_sections( 'custom_post_templates' );
				submit_button();
				?>

			</form>
		</div>
		<?php

	}

	public static function settings_init() {

		register_setting( 'custom_post_templates', self::$option_name );

		add_settings_section(
			'cptemplate_custom_post_templates_section',
			__( 'Settings field description', 'custom-post-template' ),
			array( __CLASS__, 'settings_section_callback' ),
			'custom_post_templates'
		);

		add_settings_field(
			'cptemplate_post_types',
			__( 'Post Type', 'custom-post-template' ),
			array( __CLASS__, 'post_types_render' ),
			'custom_post_templates',
			'cptemplate_custom_post_templates_section'
		);


	}

	public static function settings_section_callback() {

		echo __( 'Select post types that use custom templates', 'custom-post-template' );

	}

	public static function post_types_render() {


		$args       = array(
			'public'   => true,
			'_builtin' => false
		);
		$post_types = get_post_types( $args );
		array_push( $post_types, 'post' );

		$options = get_option( self::$option_name, array() );

		foreach ( $post_types as $post_type ) {
			?>
			<p>
				<input type='checkbox'
				       id="<?php esc_attr_e( self::$option_name ); ?>[<?php esc_attr_e( $post_type ); ?>]"
				       name="<?php esc_attr_e( self::$option_name ); ?>[<?php esc_attr_e( $post_type ); ?>]" <?php
				if ( isset( $options[ $post_type ] ) ) {
					checked( $options[ $post_type ], 1 );
				} ?>
				       value='1'><label
					for="<?php esc_attr_e( self::$option_name );?>[<?php esc_attr_e( $post_type ); ?>]"><?php esc_attr_e( $post_type ); ?></label>
			</p>
			<?php
		}

	}


}

