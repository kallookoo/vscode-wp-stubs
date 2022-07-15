<?php

$files = [
	__DIR__ . '/vendor/php-stubs/woocommerce-stubs/woocommerce-packages-stubs.php',
	__DIR__ . '/vendor/php-stubs/woocommerce-stubs/woocommerce-stubs.php',
	__DIR__ . '/vendor/php-stubs/wordpress-globals/wordpress-globals.php',
	__DIR__ . '/vendor/php-stubs/wordpress-stubs/wordpress-stubs.php',
	__DIR__ . '/vendor/php-stubs/wp-cli-stubs/wp-cli-commands-stubs.php',
	__DIR__ . '/vendor/php-stubs/wp-cli-stubs/wp-cli-i18n-stubs.php',
	__DIR__ . '/vendor/php-stubs/wp-cli-stubs/wp-cli-stubs.php',
];

$directory = str_replace( '\\', '/', __DIR__ ) . '/stubs';

if ( ! is_dir( $directory ) ) {
	mkdir( $directory );
}
foreach ( $files as $filename ) {
	if ( file_exists( $filename ) ) {
		copy( $filename, $directory . '/' . basename( $filename ) );
	}
}
