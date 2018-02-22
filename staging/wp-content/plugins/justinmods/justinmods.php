<?php

/**
Plugin name: Justin's Mods
Author: Justin Romack
Author URI: https://www.herohousecreative.com/
Description: A few tweaks to the site that will be incorporated in the final theme.
**/

/** Add Teams capabilities **/

add_action( 'init', 'register_cpt_team', 50 );

function register_cpt_team() {

	$labels = array(
		'name' => __( 'Teams', 'team' ),
		'singular_name' => __( 'Team', 'team' ),
		'add_new' => __( 'Add a Team', 'team' ),
		'add_new_item' => __( 'Add Team', 'team' ),
		'edit_item' => __( 'Edit Team', 'team' ),
		'new_item' => __( 'New Team', 'team' ),
		'view_item' => __( 'View Team', 'team' ),
		'search_items' => __( 'Search Teams', 'team' ),
		'not_found' => __( 'No teams found', 'team' ),
		'not_found_in_trash' => __( 'No teams found in trash', 'team' ),
		'parent_item_colon' => __( 'Teams', 'team' ),
		'menu_name' => __( 'Teams', 'team' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'All teams affiliated with the National Beep Baseball Association.',
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'page'
	);

	register_post_type( 'team', $args );
}

/** Mods for Travel Form **/

function winwar_populate_dropdown_with_posts($form){
    
    foreach($form['fields'] as &$field){
        
        if ( $field->type != 'select' || strpos( $field->cssClass, 'team-list-dd' ) === false ) {
            continue;
}
        
        $posts = get_posts( array( 'posts_per_page' => '-1', 'post_type' => 'team', 'orderby' => 'title', 'order' => 'ASC' ) );
        
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $choices = array(array('text' => 'Select your team...', 'value' => ' '));
        
        foreach($posts as $post){
            $choices[] = array('text' => $post->post_title, 'value' => $post->ID);
        }
        
        $field['choices'] = $choices;
        
    }
    
    return $form;
} add_filter('gform_pre_render', 'winwar_populate_dropdown_with_posts');

/** Add News and Announcements feature **/

// Register Custom Post Type
function nbba_cpt_news() {

	$labels = array(
		'name'                  => _x( 'News Items', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'News Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News Updates', 'text_domain' ),
		'name_admin_bar'        => __( 'News Updates', 'text_domain' ),
		'archives'              => __( 'News Update Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All News Updates', 'text_domain' ),
		'add_new_item'          => __( 'Add New News Update', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New News Update', 'text_domain' ),
		'edit_item'             => __( 'Edit News Update', 'text_domain' ),
		'update_item'           => __( 'Update News Update', 'text_domain' ),
		'view_item'             => __( 'View News Update', 'text_domain' ),
		'view_items'            => __( 'View News Updates', 'text_domain' ),
		'search_items'          => __( 'Search News Update', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into News Update', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News Update', 'text_domain' ),
		'items_list'            => __( 'News Updates list', 'text_domain' ),
		'items_list_navigation' => __( 'News Updates list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter News Updates list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'News Item', 'text_domain' ),
		'description'           => __( 'News and announcements from around the league.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => false,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'nbba_cpt_news', 0 );

// Register Custom Post Type
function nbba_cpt_players() {

	$labels = array(
		'name'                  => _x( 'Players', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Player', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Player Spotlight', 'text_domain' ),
		'name_admin_bar'        => __( 'Player Spotlight', 'text_domain' ),
		'archives'              => __( 'Player Archives', 'text_domain' ),
		'attributes'            => __( 'Player Atributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Paretnt Player', 'text_domain' ),
		'all_items'             => __( 'All Players', 'text_domain' ),
		'add_new_item'          => __( 'Add New Player', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Player', 'text_domain' ),
		'edit_item'             => __( 'Edit Player', 'text_domain' ),
		'update_item'           => __( 'Update Player', 'text_domain' ),
		'view_item'             => __( 'View Player', 'text_domain' ),
		'view_items'            => __( 'View Players', 'text_domain' ),
		'search_items'          => __( 'Search Player', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Player', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Player', 'text_domain' ),
		'items_list'            => __( 'Players List', 'text_domain' ),
		'items_list_navigation' => __( 'Players list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Players list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Player', 'text_domain' ),
		'description'           => __( 'Manages collection of Player Spotlight features for the NBBA homepage.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'player_spotlight', $args );

}
add_action( 'init', 'nbba_cpt_players', 0 );