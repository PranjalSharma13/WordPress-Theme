<?php
// My_Custom_Nav_Walker class for customizing menu items with icons
class My_Custom_Nav_Walker extends Walker_Nav_Menu {
    // Start element adds custom classes and icons
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $output .= '<li' . $class_names . '>';
    
        // Add custom icons for specific menu items
        $icon = '';
        if (in_array('menu-home', $classes)) {
            $icon = '<i class="fas fa-home"></i> ';
        } elseif (in_array('menu-blog-post', $classes)) {
            $icon = '<i class="fas fa-file-alt"></i> ';
        } elseif (in_array('menu-blog-page', $classes)) {
            $icon = '<i class="fas fa-file-image"></i> ';
        } elseif (in_array('menu-archive', $classes)) {
            $icon = '<i class="fas fa-archive"></i> ';
        } elseif (in_array('menu-contact', $classes)) {
            $icon = '<i class="fas fa-envelope"></i> ';
        } elseif (in_array('menu-experience', $classes)) {
            $icon = '<i class="fas fa-briefcase"></i> ';  // Experience icon
        } elseif (in_array('menu-about', $classes)) {
            $icon = '<i class="fas fa-user"></i> ';  // About Me icon
        } elseif (in_array('menu-tech-stack', $classes)) {
            $icon = '<i class="fas fa-laptop-code"></i> ';  // Tech Stack icon
        }
    
        // Customize the link attributes
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        if (in_array('menu-contact', $classes)) {
            $attributes .= ' class="text-lg bg-purple-600 px-4 py-2 rounded text-white hover:bg-purple-700"';
        } else {
            $attributes .= ' class="text-lg hover:text-gray-200"';
        }
    
        // Output the menu item link with the icon and label
        $output .= '<a' . $attributes . '>' . $icon . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        $output .= '</li>'; // Close the list item
    }
}
?>
