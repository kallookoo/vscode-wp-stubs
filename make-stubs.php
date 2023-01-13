<?php
/**
 * Make Stubs
 *
 * @package vscode-wp-stubs
 */

$directory = __DIR__ . '/stubs';
$packages  = [
	'woocommerce-packages-stubs' => 'php-stubs/woocommerce-stubs',
	'woocommerce-stubs'          => 'php-stubs/woocommerce-stubs',
	'wordpress-globals'          => 'php-stubs/wordpress-globals',
	'wordpress-stubs'            => 'php-stubs/wordpress-stubs',
	'wp-cli-commands-stubs'      => 'php-stubs/wp-cli-stubs',
	'wp-cli-i18n-stubs'          => 'php-stubs/wp-cli-stubs',
	'wp-cli-stubs'               => 'php-stubs/wp-cli-stubs',
];

if ( ! is_dir( $directory ) ) {
	mkdir( $directory );
}
foreach ( $packages as $basename => $package_dir ) {
	$filename = __DIR__ . "/vendor/{$package_dir}/{$basename}.php";
	if ( is_readable( $filename ) ) {
		copy( $filename, "{$directory}/{$basename}.php" );
	}
}
