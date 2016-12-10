<?php

class WCPT_Integrations_ACF {

	public static $template_meta_slug = 'custom_page_template';

	public static function init() {
		self::attach_hooks();
	}

	public static function attach_hooks() {

		add_filter( 'acf/location/rule_types', array( __CLASS__, 'acf_location_rule_types' ) );
		add_filter( 'acf/location/rule_values/' . self::$template_meta_slug, array(
			__CLASS__,
			'acf_location_rule_values'
		) );
		add_filter( 'acf/location/rule_match/' . self::$template_meta_slug, array(
			__CLASS__,
			'acf_location_rule_match'
		), 10, 3 );

	}

	public static function acf_location_rule_types( $types ) {

		$types = array_merge( $types, array(
			__( "Custom Post Type Template", 'wpcpt' ) => array(
				self::$template_meta_slug => __( "Custom Post Type Template", 'wpcpt' )
			),
		) );

		return $types;

	}

	public static function acf_location_rule_values( $choices ) {

		$templates = WPCPT::get_post_custom_templates();

		$choices = array(
			'default' => apply_filters( 'default_post_template_title',  __('Default Template', 'wpcpt') ),
		);

		foreach ( $templates as $k => $v ) {

			$choices[ $v ] = $k;

		}

		return $choices;

	}

	public static function acf_location_rule_match( $match, $rule, $options ) {

		if ( ! $options['post_id'] ) {
			return false;
		}

		$page_template = $options['page_template'];


		// get page template
		if ( ! $page_template ) {

			$page_template = get_post_meta( $options['post_id'], '_post_template', true );

		}


		// get page template again
		if ( ! $page_template ) {

			$page_template = "default";

		}


		// compare
		if ( $rule['operator'] == "==" ) {

			$match = ( $page_template === $rule['value'] );

		} elseif ( $rule['operator'] == "!=" ) {

			$match = ( $page_template !== $rule['value'] );

		}


		// return
		return $match;



	}

}

WCPT_Integrations_ACF::init();