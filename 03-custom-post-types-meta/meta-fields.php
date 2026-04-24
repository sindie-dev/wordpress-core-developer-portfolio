<?php
/**
 * Meta fields for custom post types.
 *
 * @package wordpress-core-developer-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wp_portfolio_add_project_meta_boxes() {
    add_meta_box(
        'project_details',
        __( 'Project Details', 'portfolio' ),
        'wp_portfolio_render_project_meta_box',
        'project',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'wp_portfolio_add_project_meta_boxes' );

function wp_portfolio_render_project_meta_box( $post ) {
    wp_nonce_field( 'wp_portfolio_save_project_meta', 'wp_portfolio_project_meta_nonce' );
    $project_client = get_post_meta( $post->ID, '_project_client', true );
    ?>
    <p>
        <label for="project_client"><?php esc_html_e( 'Client', 'portfolio' ); ?></label>
        <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr( $project_client ); ?>" class="widefat" />
    </p>
    <?php
}

function wp_portfolio_save_project_meta( $post_id ) {
    if ( ! isset( $_POST['wp_portfolio_project_meta_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['wp_portfolio_project_meta_nonce'] ), 'wp_portfolio_save_project_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['project_client'] ) ) {
        update_post_meta( $post_id, '_project_client', sanitize_text_field( wp_unslash( $_POST['project_client'] ) ) );
    }
}
add_action( 'save_post', 'wp_portfolio_save_project_meta' );
