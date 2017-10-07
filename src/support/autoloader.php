<?php
/**
 * File autoloader functionality
 *
 * @package     burst\cpt\Support
 * @since       1.0.0
 * @author      Burst Pictures
 * @link        https://Burst.Pictures
 * @license     GNU General Public License 3.0+
 */
namespace burst\portfolio\support;

/**
 * Load all of the plugin's files.
 *
 * @since 1.0.0
 *
 * @param string $src_root_dir Root directory for the source files
 *
 * @return void
 */
function autoload_files( $src_root_dir ) {

	$filenames = array(
		'custom/post-type-portfolio',
		'custom/taxonomy-portfolio',
	);

	foreach ( $filenames as $filename ) {
		include_once( $src_root_dir . $filename . '.php' );
	}
}
