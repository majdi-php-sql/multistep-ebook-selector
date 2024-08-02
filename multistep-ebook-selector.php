<?php
/*
Plugin Name: Multistep eBook Selector
Description: A plugin to provide a multistep form for selecting eBooks based on stream, year, and semester.
Version: 1.0
Author: Majdi M. S. Awad
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/custom-post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/ajax-handlers.php';

// Enqueue scripts and styles
function mes_enqueue_scripts() {
    wp_enqueue_script('mes-form', plugin_dir_url(__FILE__) . 'assets/js/form.js', array('jquery'), null, true);
    wp_localize_script('mes-form', 'mes_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'mes_enqueue_scripts');

// Shortcode to display the form
function mes_display_form() {
    ob_start();
    ?>
    <form id="mes-form">
        <div id="mes-step-1">
            <label for="stream">Select Your Stream:</label>
            <select id="stream" name="stream">
                <option value="">Select Stream</option>
                <?php
                $streams = get_terms('stream', array('hide_empty' => false));
                foreach ($streams as $stream) {
                    echo '<option value="' . $stream->slug . '">' . $stream->name . '</option>';
                }
                ?>
            </select>
        </div>
        <div id="mes-step-2" style="display:none;">
            <label for="year">Select Your Year:</label>
            <select id="year" name="year">
                <option value="">Select Year</option>
                <?php
                $years = get_terms('year', array('hide_empty' => false));
                foreach ($years as $year) {
                    echo '<option value="' . $year->slug . '">' . $year->name . '</option>';
                }
                ?>
            </select>
        </div>
        <div id="mes-step-3" style="display:none;">
            <label for="semester">Select Your Semester:</label>
            <select id="semester" name="semester">
                <option value="">Select Semester</option>
                <?php
                $semesters = get_terms('semester', array('hide_empty' => false));
                foreach ($semesters as $semester) {
                    echo '<option value="' . $semester->slug . '">' . $semester->name . '</option>';
                }
                ?>
            </select>
        </div>
        <div id="mes-step-4" style="display:none;">
            <button type="submit">Get eBooks</button>
        </div>
    </form>
    <div id="mes-results" style="display:none;"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('mes_form', 'mes_display_form');
