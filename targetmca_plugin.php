<?php
/**
 * Plugin Name:       Target MCA
 * Plugin URI:        https://github.com/adarshakshat/TargetMCA-Plugin
 * Description:       Add Custom Post types
 * Version:           1.0
 * Author:            Adarsh Akshat
 * Author URI:        github.com/adarshakshat
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */




function target_mca_registercpt(){

    $args = array(
        'label' => 'Question',
        'public' => true,
        'has_archieve' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'hierarchical' => false,
        'taxonomies' => array( 'category' ),
        'rewrite' => array('slug' =>'mca-entrance-practice-question'),
        'query_var' => true,
		'yarpp_support' => true,
        'supports' =>array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
        
    register_post_type( 'question', $args);

    
    $args = array(
        'label' => 'Formula',
        'public' => true,
        'has_archieve' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' =>'formula'),
        'query_var' => true,
        'supports' =>array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
        
    register_post_type( 'formula', $args);
}
add_action('init','target_mca_registercpt');


function targetmca_activate() {
    // Trigger our function that registers the custom post type plugin.
    target_mca_registercpt(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'targetmca_activate' );

function targetmca_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'formula' );
    unregister_post_type( 'question' );
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'targetmca_deactivate' );
?>