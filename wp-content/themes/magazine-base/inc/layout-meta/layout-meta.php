<?php
/**
 * Implement theme metabox.
 *
 * @package magazine-base
 */

if ( ! function_exists( 'magazine_base_add_theme_meta_box' ) ) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function magazine_base_add_theme_meta_box() {

        $apply_metabox_post_types = array( 'post', 'page' );

        foreach ( $apply_metabox_post_types as $key => $type ) {
            add_meta_box(
                'magazine-base-theme-settings',
                esc_html__( 'Single Page/Post Settings', 'magazine-base' ),
                'magazine_base_render_theme_settings_metabox',
                $type
            );
        }

    }

endif;

add_action( 'add_meta_boxes', 'magazine_base_add_theme_meta_box' );

if ( ! function_exists( 'magazine_base_render_theme_settings_metabox' ) ) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function magazine_base_render_theme_settings_metabox( $post, $metabox ) {

        $post_id = $post->ID;
        $magazine_base_post_meta_value = get_post_meta($post_id);

        // Meta box nonce for verification.
        wp_nonce_field( basename( __FILE__ ), 'magazine_base_meta_box_nonce' );
        // Fetch Options list.
        $page_layout = get_post_meta($post_id,'magazine-base-meta-select-layout',true);
        $page_image_layout = get_post_meta($post_id,'magazine-base-meta-image-layout',true);
        ?>

        <div class="tmt-tab-main">

            <div class="tmt-metabox-tab">
                <ul>
                    <li>
                        <a id="tmt-tab-general" class="tmt-tab-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'magazine-base'); ?>

                        </a>
                    </li>
                </ul>
            </div>

            <div class="tmt-tab-content">

                <div id="tmt-tab-general-content" class="tmt-content-wrap tmt-tab-content-active">

                    <h3 class="tmt-meta-title"><?php esc_html_e('General Setting', 'magazine-base'); ?></h3>
                    
                    <div class="tmt-meta-panels">

                        <div class="tmt-opt-wrap tmt-checkbox-wrap">

                            <input type="checkbox" name="magazine-base-meta-checkbox" id="magazine-base-meta-checkbox"
                            value="yes" <?php if (isset($magazine_base_post_meta_value['magazine-base-meta-checkbox'])) {checked($magazine_base_post_meta_value['magazine-base-meta-checkbox'][0], 'yes');
                            } ?> />

                            <label for="magazine-base-meta-checkbox"><?php esc_html_e('Check To Use Featured Image As Banner Image', 'magazine-base'); ?></label>

                        </div>
                        
                        <div class="tmt-opt-wrap tmt-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Single Page/Post Sidebar Layout','magazine-base' ); ?></b></label>
                            <!-- Select Field-->

                            <select name="magazine-base-meta-select-layout" id="magazine-base-meta-select-layout">
                                <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
                                <?php _e( 'Primary Sidebar - Content', 'magazine-base' )?>
                                </option>
                                <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
                                <?php _e( 'Content - Primary Sidebar', 'magazine-base' )?>
                                </option>
                                <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
                                <?php _e( 'No Sidebar', 'magazine-base' )?>
                            </option>
                        </select>

                        <!-- Select Field-->
                        </div>

                        <div class="tmt-opt-wrap tmt-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Single Page/Post Image Layout','magazine-base' ); ?></b></label>

                            <select name="magazine-base-meta-image-layout" id="magazine-base-meta-image-layout">
                                <option value="full" <?php selected('full',$page_image_layout);?>>
                                <?php _e( 'Full', 'magazine-base' )?>
                                </option>
                                <option value="left" <?php selected('left',$page_image_layout);?>>
                                <?php _e( 'Left', 'magazine-base' )?>
                                </option>
                                <option value="right" <?php selected('right',$page_image_layout);?>>
                                <?php _e( 'Right', 'magazine-base' )?>
                                </option>
                                <option value="no-image" <?php selected('no-image',$page_image_layout);?>>
                                <?php _e( 'No Image', 'magazine-base' )?>
                                </option>
                            </select>

                        </div>


                    </div>

                </div>

            </div>

        </div>

        <?php
    }

endif;



if ( ! function_exists( 'magazine_base_save_theme_settings_meta' ) ) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function magazine_base_save_theme_settings_meta( $post_id, $post ) {

        // Verify nonce.
        if ( ! isset( $_POST['magazine_base_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['magazine_base_meta_box_nonce'], basename( __FILE__ ) ) ) {
            return; }

        // Bail if auto save or revision.
        if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
            return;
        }

        // Check permission.
        if ( 'page' === $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return; }
        } else if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
        $magazine_base_meta_checkbox = isset($_POST['magazine-base-meta-checkbox'])?esc_attr($_POST['magazine-base-meta-checkbox']):'';
        update_post_meta($post_id, 'magazine-base-meta-checkbox', sanitize_text_field($magazine_base_meta_checkbox));
        $magazine_base_meta_select_layout =  isset( $_POST[ 'magazine-base-meta-select-layout' ] ) ? esc_attr($_POST[ 'magazine-base-meta-select-layout' ]) : '';
        if(!empty($magazine_base_meta_select_layout)){
            update_post_meta($post_id, 'magazine-base-meta-select-layout', sanitize_text_field($magazine_base_meta_select_layout));
        }
        $magazine_base_meta_image_layout =  isset( $_POST[ 'magazine-base-meta-image-layout' ] ) ? esc_attr($_POST[ 'magazine-base-meta-image-layout' ]) : '';
        if(!empty($magazine_base_meta_image_layout)){
            update_post_meta($post_id, 'magazine-base-meta-image-layout', sanitize_text_field($magazine_base_meta_image_layout));
        }
    }

endif;

add_action( 'save_post', 'magazine_base_save_theme_settings_meta', 10, 2 );