<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function mes_get_ebooks() {
    $stream = sanitize_text_field($_POST['stream']);
    $year = sanitize_text_field($_POST['year']);
    $semester = sanitize_text_field($_POST['semester']);

    $args = array(
        'post_type' => 'ebook',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'stream',
                'field' => 'slug',
                'terms' => $stream,
            ),
            array(
                'taxonomy' => 'year',
                'field' => 'slug',
                'terms' => $year,
            ),
            array(
                'taxonomy' => 'semester',
                'field' => 'slug',
                'terms' => $semester,
            ),
        ),
    );

    $query = new WP_Query($args);
    $ebooks = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $ebooks[] = array(
                'title' => get_the_title(),
                'url' => get_field('ebook_url'), // Assuming you're using ACF for the eBook URL
            );
        }
        wp_reset_postdata();
    }

    echo json_encode($ebooks);
    wp_die();
}
add_action('wp_ajax_mes_get_ebooks', 'mes_get_ebooks');
add_action('wp_ajax_nopriv_mes_get_ebooks', 'mes_get_ebooks');
