<?php
/**
 * Filters examples and hooks.
 *
 * @package wordpress-core-developer-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wp_portfolio_example_filter( $content ) {
    return $content . '<p>Filtered by portfolio example.</p>';
}
add_filter( 'the_content', 'wp_portfolio_example_filter' );
