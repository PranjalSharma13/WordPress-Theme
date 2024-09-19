<?php
require_once get_template_directory() . '/inc/custom-walkers.php';
// WordPress is going to manage the title tag
function pranjal_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'pranjal_theme_support'); // Corrected the action hook

// Register menus
function pranjal_menus() {
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer'  => "Footer Menu Items"
    );
    register_nav_menus($locations);
}

function create_custom_post_types() {
    // Register Experiences post type
    $labels = array(
        'name'               => __('Experiences', 'textdomain'),
        'singular_name'      => __('Experience', 'textdomain'),
        'menu_name'          => __('Experiences', 'textdomain'),
        'name_admin_bar'     => __('Experience', 'textdomain'),
        'add_new'            => __('Add New', 'textdomain'),
        'add_new_item'       => __('Add New Experience', 'textdomain'),
        'new_item'           => __('New Experience', 'textdomain'),
        'edit_item'          => __('Edit Experience', 'textdomain'),
        'view_item'          => __('View Experience', 'textdomain'),
        'all_items'          => __('All Experiences', 'textdomain'),
        'search_items'       => __('Search Experiences', 'textdomain'),
        'not_found'          => __('No experiences found.', 'textdomain'),
        'not_found_in_trash' => __('No experiences found in Trash.', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'experience'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('experience', $args);
}
add_action('init', function() {
    pranjal_menus();
    create_custom_post_types();
});

// Register styles
function pranjal_register_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('pranjal-google-fonts', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap', array(), null);
    wp_enqueue_style('pranjal-css', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('pranjal-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('pranjal-slick', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css", array(), '1.8.1', 'all');
    wp_enqueue_style('pranjal-slicktheme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css", array(), '1.8.1', 'all');
}
add_action('wp_enqueue_scripts', 'pranjal_register_styles');

// Register scripts
function pranjal_register_scripts() {
    // Enqueue jQuery (WordPress includes jQuery by default, but you can load an external version if necessary)
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    

    // Enqueue Slick Carousel JS
    wp_enqueue_script('pranjal-slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    // Initialize Slick Carousel
    wp_enqueue_script('pranjal-slick-init', get_template_directory_uri() . "/assets/js/main.js", array('jquery', 'pranjal-slick-js'), null, true);
}
add_action('wp_enqueue_scripts', 'pranjal_register_scripts');

function pranjal_widget_areas()
{
    register_sidebar(
        array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>'<ul class="flex justify-center space-x-4 py-3">',
            'after_widget'=>'</ul>',
            'name'=>'Sidebar Area',
            'id'=>'sidebar-1',
            'description'=>'Sidebar Widget Area'
        )
        );
        register_sidebar(
            array(
                'before_title'=>'',
                'after_title'=>'',
                'before_widget'=>'<ul class="flex justify-center space-x-4 py-3">',
                'after_widget'=>'</ul>',
                'name'=>'Footer Area',
                'id'=>'footer-1',
                'description'=>'Footer Widget Area'
            )
            );
}
add_action('widgets_init','pranjal_widget_areas');


function pranjal_theme_customize_register($wp_customize) {
    // Section for theme customization options
    $wp_customize->add_section('theme_options_section', array(
        'title' => __('Theme Options', 'theme'),
        'description' => __('Customize your theme settings.', 'theme'),
        'priority' => 100,
    ));

    // Setting for site primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'theme'),
        'section' => 'theme_options_section',
        'settings' => 'primary_color',
    )));

    // Setting for site secondary color
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#005177', // Set a default secondary color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary Color', 'theme'),
        'section' => 'theme_options_section',
        'settings' => 'secondary_color',
    )));

    // Section for social media links
    $wp_customize->add_section('social_media_section', array(
        'title' => __('Social Media Links', 'theme'),
        'description' => __('Add your social media URLs here.', 'theme'),
        'priority' => 120,
    ));

    // Array of social media platforms
    $social_media = array(
        'twitter' => __('Twitter URL', 'theme'),
        'linkedin' => __('LinkedIn URL', 'theme'),
        'github' => __('GitHub URL', 'theme'),
        'stackoverflow' => __('Stack Overflow URL', 'theme'),
        'codepen' => __('CodePen URL', 'theme'),
    );

    // Loop through the array to create settings and controls for social media
    foreach ($social_media as $key => $label) {
        $wp_customize->add_setting("{$key}_url", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("{$key}_url", array(
            'label' => $label,
            'section' => 'social_media_section',
            'type' => 'url',
        ));
    }
}

add_action('customize_register', 'pranjal_theme_customize_register');
add_action('wp_footer', function () {
    if (is_user_logged_in()) {
        global $template;
        echo '<!-- Template: ' . $template . ' -->';
    }
});



?>
