<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function mes_create_post_types() {
    register_post_type('ebook', array(
        'labels' => array(
            'name' => __('eBooks'),
            'singular_name' => __('eBook')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'custom-fields'),
    ));

    register_taxonomy('stream', 'ebook', array(
        'labels' => array(
            'name' => __('Streams'),
            'singular_name' => __('Stream')
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'stream'),
    ));

    register_taxonomy('year', 'ebook', array(
        'labels' => array(
            'name' => __('Years'),
            'singular_name' => __('Year')
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'year'),
    ));

    register_taxonomy('semester', 'ebook', array(
        'labels' => array(
            'name' => __('Semesters'),
            'singular_name' => __('Semester')
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'semester'),
    ));
}
add_action('init', 'mes_create_post_types');
