<?php

/*
This file handles the admin area and functions.

Originally Developed Eddie Machado
URL: http://themble.com/bones/

Torn Apart And Heavilly Opinionated By Josh Reeder-Esparza
Github: @joshre
*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
    
    // remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );    // Right Now Widget
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    
    // Comments Widget
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    
    // Incoming Links Widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
    
    // Plugins Widget
    
    // remove_meta_box('dashboard_quick_press', 'dashboard', 'core' );  // Quick Press Widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    
    // Recent Drafts Widget
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    
    //
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    
    //
    
    // removing plugin dashboard boxes
    remove_meta_box('yoast_db_widget', 'dashboard', 'normal');
    
    // Yoast's SEO Plugin Widget
    
    /*
    have more plugin widgets you'd like to remove?
    share them with us so we can get a list of
    the most commonly used. :D
    https://github.com/eddiemachado/bones/issues
    */
}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. For example, the NBA.com feed for a sports
site. Here is an example Dashboard Widget that displays recent
entries from an RSS Feed.

For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');

// adding any custom widgets
// add_action('wp_dashboard_setup', 'bones_custom_dashboard_widgets');

// Remove WP 4.2 emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// changing the logo link from wordpress.org to your site
function bones_login_url() {
    return home_url();
}

// changing the alt text on the logo to show your site name
function bones_login_title() {
    return get_option('blogname');
}

// calling it only on the login page

add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');

/************* CUSTOMIZE ADMIN *******************/

// Custom CSS for the Admin Dashboard
function custom_css() {
    echo '<style type="text/css"></style>';
}
add_action('admin_head', 'custom_css');

// Custom Backend Footer
function bones_custom_admin_footer() {
    _e('<span id="footer-thankyou">Developed by <a href="http://honeyagency.com/" target="_blank">Honey Agency</a><svg style="width: 15px;margin-left: 5px;" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.6 17.1"><style>.st0{fill:#ea1d76}.st1{fill:#695a46}</style><path class="st0" d="M16.8 9.6l-.2-1.3-.1-.7V7.3L16 4.4l-.1-.6-7-2.4-.5.4c.3.5.7 1.2 1 1.9L14 5.2l.3 1.4.3 1.5v.2l.2 1.1.1.6v.2l-2 1.7c.2.5.7 1.5.9 1.8l3.2-2.8-.2-1.3z"/><path class="st1" d="M19.1 9.1c-.5-.4-1-.6-1.6-.7-.1 0-.3 0-.4-.1l.3 1.3c.4.1.7.2 1 .5.3.2.4.5.6.8l.3.9c0 .3 0 .7-.1 1-.2 1-.8 1.8-1.6 2.4-.8.6-1.8.7-2.7.4-.3-.1-.5-.2-.7-.4-.3-.3-.6-.7-.8-1.1-.2-.3-.3-.7-.5-1-.1-.3-.3-.6-.4-.8 0-.1-.1-.2-.1-.3-.4-.9-.8-1.8-1-2.4 0-.1-.1-.2-.1-.3 1.2 0 2.1.1 2.9.1L14 8c-.9-.1-2-.1-3.3-.1-.1-.2-.2-.5-.3-.8C9.9 6 9.5 5 9.1 4 9 4 9 3.9 9 3.9c-.3-.6-.7-1.3-1-1.8-.6-1-1.3-1.7-2.4-2-1-.2-2.1-.1-3 .4C1.6 1.1.7 2 .3 3.1c-.4 1-.5 2.2 0 3.2.2.5.6 1.1 1 1.5.3.3.7.6 1.1.7.2.1.4.1.6.2l.4.1-.3-1.4c-.3-.1-.7-.3-.9-.5-.3-.2-.5-.5-.6-.8-.3-.6-.4-1.2-.2-1.8.3-1.5 1.7-3.1 3.3-3 .4 0 .9.1 1.3.3l.3.2c.2.2.4.5.7 1v.1c.2.3.4.7.6 1.2.2.2.3.4.4.6 0 .1 0 .2.1.2.5 1 .9 2 1.1 2.7 0 .1.1.2.1.3-1.2 0-2.2-.1-3-.1l.3 1.3c1 .1 2.1.1 3.4.1.1.2.2.5.3.8.5 1.1.9 2.1 1.3 3.1 0 .1.1.2.1.2l.8 1.6c0 .1.1.1.1.2.4.7.9 1.3 1.5 1.6.2.1.4.2.7.2.3.1.5.1.8.2h.4c1.4 0 2.8-.8 3.6-1.9.4-.5.7-1.2.8-1.8.1-.4.2-.9.1-1.3 0-1.2-.5-2.3-1.4-3"/><path class="st0" d="M6.5 11.7L6 9.4V9l-.3-1.3-.1-.7v-.2l2-1.7c-.3-.4-.8-1.4-1-1.8L3.4 6.1l.1.5v.1l.2.9.3 1.3.3 1.8.4 2 .1.6 6.8 2.4.4-.4c-.2-.4-.6-1.2-1-1.9l-4.5-1.7z"/></svg></span>', 'buscemitheme');
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

function custom_admin_head() {
    $css = '#toplevel_page_edit-post_type-acf{display:none;}';
    
    echo '<style type="text/css">' . $css . '</style>';
}
// add_action('admin_head', 'custom_admin_head');

// Setting Up Custom Color Scheme
function buscemi_color_scheme() {
    
    $theme_dir = get_template_directory_uri();
    
    wp_admin_css_color('buscemi', __('Buscemi Theme'), $theme_dir . '/css/buscemi-color-scheme.css', array('#000000', '#000000', '#000000', '#000000'));
}

// add_action('admin_init', 'buscemi_color_scheme');
// UNCOMMENT TO ENABLE

// Making That ^ Color Scheme Default for every user
function set_default_admin_color($user_id) {
    $args = array('ID' => $user_id, 'admin_color' => 'buscemi');
    wp_update_user($args);
}

// add_action('user_register', 'set_default_admin_color');
// UNCOMMENT TO ENABLE

// Removing Some Admin Menus
function remove_menus() {
    
    remove_menu_page( 'edit-comments.php' );          				//Comments
    remove_menu_page( 'edit.php' );                        //Posts
    // remove_menu_page( 'tools.php' );                        //Posts
    
    
    
}
add_action('admin_menu', 'remove_menus');
?>
