<?php
/**
 * Portfolio Taxonomy registration
 *
 * @package     burst\portfolio\custom
 * @since       1.0.0
 * @author      Burst Pictures
 * @link        https://Burst.Pictures
 * @license     GNU General Public License 3.0+
 */
namespace burst\portfolio\custom;

add_action( 'init', __NAMESPACE__ . '\register_portfolio_type_taxonomy' );

/**
 * Register portfolio type taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_portfolio_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'taxonomy general name', 'burst-portfolio' ),
		'singular_name'              => _x( 'Project Type', 'taxonomy singular name', 'burst-portfolio' ),
		'search_items'               => __( 'Search Project Types', 'burst-portfolio' ),
		'popular_items'              => __( 'Popular Project Types', 'burst-portfolio' ),
		'all_items'                  => __( 'All Project Types', 'burst-portfolio' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Project Type', 'burst-portfolio' ),
		'view_item'                  => __( 'View Project Type', 'burst-portfolio' ),
		'update_item'                => __( 'Update Project Type', 'burst-portfolio' ),
		'add_new_item'               => __( 'Add New Project Type', 'burst-portfolio' ),
		'new_item_name'              => __( 'New Project Type Name', 'burst-portfolio' ),
		'separate_items_with_commas' => __( 'Separate project types with commas', 'burst-portfolio' ),
		'add_or_remove_items'        => __( 'Add or remove project types', 'burst-portfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used project types', 'burst-portfolio' ),
		'not_found'                  => __( 'No project types found.', 'burst-portfolio' ),
		'menu_name'                  => __( 'Project Types', 'burst-portfolio' ),
	);

	$args = array(
		'hierarchical'               => false,
		'labels'                     => $labels,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'update_count_callback'      => '_update_post_term_count',
		'query_var'                  => true,
		'rewrite'                    => array(
			'slug' => 'project-type',
		),
	);

	register_taxonomy( 'burst-portfolio-type', 'burst-portfolio', $args );

}
