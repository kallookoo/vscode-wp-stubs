<?php
/**
 * Make Stubs.
 *
 * @package vscode-wp-stubs
 */

/**
 * Copy php-stubs to intelephense extension.
 *
 * @param string[] $stubs The stubs.
 */
function add_stubs_to_vscode_intelephense( $stubs ) {
	$home = '~';
	if ( 0 === strncasecmp( PHP_OS, 'WIN', 3 ) ) {
		$home = '%userprofile%';
	}
	$home = exec( "echo {$home}" );

	if ( $home && is_dir( "{$home}/.vscode/extensions" ) ) {
		$extensions = scandir( "{$home}/.vscode/extensions" );
		$extensions = array_filter(
			(array) $extensions,
			function ( $directory ) {
				return ( 0 === strncmp( $directory, 'bmewburn.vscode-intelephense-client', 35 ) );
			}
		);
		foreach ( $extensions as $extension ) {
			$wp = "{$home}/.vscode/extensions/{$extension}/node_modules/intelephense/lib/stub/wordpress";
			if ( is_dir( $wp ) ) {
				foreach ( $stubs as $basename => $filename ) {
					copy( $filename, "{$wp}/{$basename}.php" );
				}
			}
		}
	}
}

$directory = __DIR__ . '/stubs';
$packages  = array(
	'woocommerce-packages-stubs' => 'php-stubs/woocommerce-stubs',
	'woocommerce-stubs'          => 'php-stubs/woocommerce-stubs',
	'wordpress-globals'          => 'php-stubs/wordpress-globals',
	'wordpress-stubs'            => 'php-stubs/wordpress-stubs',
	'wp-cli-commands-stubs'      => 'php-stubs/wp-cli-stubs',
	'wp-cli-i18n-stubs'          => 'php-stubs/wp-cli-stubs',
	'wp-cli-stubs'               => 'php-stubs/wp-cli-stubs',
);

if ( ! is_dir( $directory ) ) {
	mkdir( $directory );
}

$stubs = array();
foreach ( $packages as $basename => $package_dir ) {
	$filename = __DIR__ . "/vendor/{$package_dir}/{$basename}.php";
	if ( is_readable( $filename ) ) {
		copy( $filename, "{$directory}/{$basename}.php" );
		$stubs[ $basename ] = $filename;
	}
}

add_stubs_to_vscode_intelephense( $stubs );
