<?php

namespace SimpleLinkDirectory;

class Common{
    
    function init(){
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_filter( 'wpsld_post_type_args', array( $this, 'default_post_type_args' ) );
    }
    
    /** Registers the post type used by this plugin 
    * @author Russell Fair
    * @since 0.1
    * @todo actually register the post type
    */
    
    function register_post_type() {
        register_post_type('slink', apply_filters( 'wpsld_post_type_args', array() ) );
    }
    
    function default_post_type_args( $args_in = array() ) {
        $default_args = array(
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_in_menu' => true,
            'menu_position' => 10,
            //later
            //'show_in_rest' => true,
            'labels' => array(
                'name' => _x('Links', 'Link post type name', 'wpsld'), 
                'singular_name' => _x('Link', 'Link post type singular name', 'wpsld'),
                'menu_name'             => _x( 'Links', 'Admin Menu text', 'wpsld' ),
                'name_admin_bar'        => _x( 'Link', 'Add New on Toolbar', 'wpsld' ),
                'add_new'               => __( 'Add Link', 'wpsld' ),
                'add_new_item'          => __( 'Add New Link', 'wpsld' ),
                'new_item'              => __( 'New Link', 'wpsld' ),
                'edit_item'             => __( 'Edit Link', 'wpsld' ),
                'view_item'             => __( 'View Link', 'wpsld' ),
                'all_items'             => __( 'All Links', 'wpsld' ),
                'search_items'          => __( 'Search Links', 'wpsld' ),
                // 'parent_item_colon'     => __( 'Parent Link:', 'wpsld' ),
                'not_found'             => __( 'No links found.', 'wpsld' ),
                'not_found_in_trash'    => __( 'No links found in trash.', 'wpsld' ),
                'featured_image'        => _x( 'Link snapshot image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wpsld' ),
                'set_featured_image'    => _x( 'Set snapshot Iimage', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wpsld' ),
                'remove_featured_image' => _x( 'Remove snapshot image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wpsld' ),
                'use_featured_image'    => _x( 'Use as snapshot image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wpsld' ),
                'archives'              => _x( 'Link archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wpsld' ),
                'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wpsld' ),
                'uploaded_to_this_item' => _x( 'Uploaded to this link', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wpsld' ),
                'filter_items_list'     => _x( 'Filter link list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wpsld' ),
                'items_list_navigation' => _x( 'Link list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wpsld' ),
                'items_list'            => _x( 'Link list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wpsld' ),
            )
        );
        return wp_parse_args( $args_in, $default_args );
    }
    
    function get_post_type_args() {
        return apply_filters( 'wpsld_post_type_args', array() );
    }
}