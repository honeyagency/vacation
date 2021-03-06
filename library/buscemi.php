<?php

// Adding documentation to the dash
function bc_dashboard_widget_function()
{
    $docs_template = get_template_directory() . '/library/docs.php';
    load_template($docs_template);
}
function bc_add_dashboard_widgets()
{
    wp_add_dashboard_widget('wp_dashboard_widget', 'Buscemi Docs', 'bc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'bc_add_dashboard_widgets');

// add ie conditional html5 shim to header
function add_ie_html5_shim()
{
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

// Remove WP 4.2 emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Getting rid of WP Default jquery and adding from google
if (!is_admin()) {
    add_action("wp_enqueue_scripts", "jquery_enqueue", 11);
}

function jquery_enqueue()
{
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js", false, null);
}

function localInstall()
{
    if ('https://vacationdtsa.com' == site_url()) {
        $res = false;
    } else {

        $res = true;
    }
    return ($res);
}

// Enqueuing all of our scripts and styles
function buscemi_scripts()
{
    wp_enqueue_script('jquery');
    if (localInstall() == true) {
        $reloadScript = 'http://localhost:35729/livereload.js';
        wp_register_script('livereload', $reloadScript, null, false, true);
        wp_enqueue_script('livereload');
    }
      wp_register_script('picturefill', get_template_directory_uri() . '/app/vendors/picturefill.min.js', null, null, null, true);
    wp_enqueue_script('picturefill');
    wp_register_script('lazy', get_template_directory_uri() . '/app/vendors/lazyload.min.js', null, null, null, true);
    wp_enqueue_script('lazy');
    wp_enqueue_style('buscemi_style', get_template_directory_uri() . '/app/main.min.css', null, null, null);
    wp_enqueue_script('buscemi_script', get_template_directory_uri() . '/app/app.min.js', array('jquery'), null, null, true);

    wp_register_script('slick', get_template_directory_uri() . '/app/vendors/slick.min.js', array('jquery'), null, null, true);
    wp_enqueue_script('slick');

}
add_action('wp_enqueue_scripts', 'buscemi_scripts');

// Allowing SVG preveiw in WP Upload
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Setting up ACF options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
    acf_add_options_sub_page('Restaurant Info');
    acf_add_options_sub_page('Menus');
}

require_once 'functions--custom-fields.php';
require_once 'functions--custom-posts.php';

function custom_menu_order($menu_ord)
{

    if (!$menu_ord) {
        return true;
    }

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'upload.php', // Media
        'admin.php?page=flamingo',
        'acf-options-restaurant-info',
        'link-manager.php', // Links
        'edit.php?post_type=page', // Pages
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'options-general.php', // Settings
        'separator-last', // Last separator
    );

}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

function remove_admin_bar_links() {
    global $wp_admin_bar, $current_user;
    
    // if ($current_user->ID != 1) {
        $wp_admin_bar->remove_menu('wp-admin-bar-wpseo-menu');          // Remove the updates link
        $wp_admin_bar->remove_menu('comments');         // Remove the comments link
        // $wp_admin_bar->remove_menu('new-content');      // Remove the content link
        // $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
        // $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
    // }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

// add_action('admin_init', 'my_remove_menu_pages');
// function my_remove_menu_pages()
// {

//     global $user_ID;

//     if (current_user_can('administrator') != true) {
//         remove_menu_page('edit-comments.php');
//         remove_menu_page('tools.php');
//     }
// }
