<?php
/**
 * Portfolio Custom Post Type registration
 *
 * @package     burst\portfolio\custom
 * @since       1.0.0
 * @author      Burst Pictures
 * @link        https://Burst.Pictures
 * @license     GNU General Public License 3.0+
 */
namespace burst\portfolio\custom;

add_action( 'init', __NAMESPACE__ . '\register_portfolio_custom_post_type' );

/**
 * Register portfolio custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_portfolio_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'post type general name', 'burst-portfolio' ),
		'singular_name'         => _x( 'Project', 'post type singular name', 'burst-portfolio' ),
		'menu_name'             => _x( 'Projects', 'admin menu', 'burst-portfolio' ),
		'name_admin_bar'        => _x( 'Project', 'add new on admin bar', 'burst-portfolio' ),
		'add_new'               => _x( 'Add New', 'portfolio', 'burst-portfolio' ),
		'add_new_item'          => __( 'Add New Project', 'burst-portfolio' ),
		'new_item'              => __( 'New Project', 'burst-portfolio' ),
		'edit_item'             => __( 'Edit Project', 'burst-portfolio' ),
		'view_item'             => __( 'View Project', 'burst-portfolio' ),
		'all_items'             => __( 'All Projects', 'burst-portfolio' ),
		'search_items'          => __( 'Search Projects', 'burst-portfolio' ),
		'parent_item_colon'     => __( 'Parent Projects:', 'burst-portfolio' ),
		'not_found'             => __( 'No projects found.', 'burst-portfolio' ),
		'not_found_in_trash'    => __( 'No projects found in Trash.', 'burst-portfolio' ),

		'featured_image'        => __( 'Project Image', 'burst-portfolio' ),
		'set_featured_image'    => __( 'Set Project Image', 'burst-portfolio' ),
		'remove_featured_image' => __( 'Remove Project Image', 'burst-portfolio' ),
		'use_featured_image'    => __( 'Use Project Image', 'burst-portfolio' ),
	);

	/**
	 * Define all the post type features by getting the features from a certain post type
	 * @param string post type name
	 * @param array excluded features
	 */
	$features = get_all_post_type_features( 'post', array(
		'excerpt',
		'comments',
		'trackbacks',
		'custom-fields',
		'author',
	));

	$args = array(
		'label'                 => __( 'Portfolio', 'burst-portfolio' ),
		'labels'                => $labels,
		'menu_icon'             => 'dashicons-portfolio',
		'menu_position'         => 5,
		'public'                => true,
		'supports'              => $features,
		'show_in_nav_menu'      => false,
		'has_archive'           => true,
		'rewrite'               => array(
			'slug'                => __( 'portfolio', 'burst-portfolio' ),
		),
	);

	register_post_type( 'burst-portfolio', $args );

}

/**
 * Get all the post type features for the given post type.
 * @param  string $post_type Given post type
 * @param  array  $exclude_features Array of features to exclude
 * @return array $features post type features
 */
function get_all_post_type_features( $post_type = 'post', $exclude_features = array() ) {
	$configured_features = get_all_post_type_supports( $post_type );

	if ( ! $exclude_features ) {
		return array_keys( $configured_features );
	}

	$features = array();

	foreach ( $configured_features as $feature => $value ) {
		if ( in_array( $feature, $exclude_features, true ) ) {
			continue;
		}
		$features[] = $feature;
	}

	return $features;

}
