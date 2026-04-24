<?php
/**
 * Custom Post Type setup.
 *
 * @package wordpress-core-developer-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wp_portfolio_register_custom_post_types() {
    $labels = array(
        'name'               => __( 'Projects', 'portfolio' ),
        'singular_name'      => __( 'Project', 'portfolio' ),
        'menu_name'          => __( 'Projects', 'portfolio' ),
        'name_admin_bar'     => __( 'Project', 'portfolio' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'wp_portfolio_register_custom_post_types' );
