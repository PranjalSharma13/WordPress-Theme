<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        /* Additional styling for smooth mobile menu transition */
        .mobile-menu-hidden {
            display: none;
        }
    </style>
</head>

<!-- <body class="bg-gray-100 bg-cover bg-no-repeat font-cursive text-black" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/backgroundport.jpg');"> -->
<body class="bg-gray-100  font-cursive text-black flex flex-col min-h-screen" >
<?php 
    // Get primary color from customizer
    $primary_color = get_theme_mod('primary_color', '#0073aa'); 
    $secondary_color = get_theme_mod('secondary_color', '#005177');// Default color
    ?>

    <!-- Vertical Left-Aligned Header -->
    <header style="background: <?php echo esc_attr($primary_color); ?>;" class="h-screen w-full md:w-1/5 text-white fixed left-0 top-0 flex flex-col items-center py-6 hidden md:block ">
    <!-- <header id="main-header" style="background: <?php echo esc_attr($primary_color); ?>;" 
    class="h-screen w-full md:w-1/5 md:fixed text-white left-0 top-0 flex flex-col items-center py-6 "> -->

    <!-- Logo and Site Title -->
        <div class="mb-10 mt-4 flex  items-center space-y-2 ">
            <?php
            if (function_exists('the_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            } ?>
            <img class="h-16" src="<?= $logo[0] ?>" alt="logo" />
            <a class="text-2xl font-bold tracking-wider" href="<?= esc_url(home_url('/')); ?>">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav id="navigation" class="flex flex-col  items-center space-y-4">
            <?php
            wp_nav_menu(array(
                'menu' => 'primary',
                'container' => '',
                'theme_location' => 'primary',
                'items_wrap' => '<ul class="flex flex-col space-y-4">%3$s</ul>',
                'walker' => new My_Custom_Nav_Walker()
            ));
            ?>
        </nav>

        <!-- Social Media Links -->
        <ul class="flex flex-row items-center space-x-4 py-6 justify-center">
            <?php if ($twitter = get_theme_mod('twitter_url')) : ?>
            <li class="inline-flex">
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" class="text-white hover:text-blue-200">
                    <i class="fab fa-twitter fa-fw"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($linkedin = get_theme_mod('linkedin_url')) : ?>
            <li class="inline-flex">
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" class="text-white hover:text-blue-200">
                    <i class="fab fa-linkedin-in fa-fw"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($github = get_theme_mod('github_url')) : ?>
            <li class="inline-flex">
                <a href="<?php echo esc_url($github); ?>" target="_blank" class="text-white hover:text-blue-200">
                    <i class="fab fa-github-alt fa-fw"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($stackoverflow = get_theme_mod('stackoverflow_url')) : ?>
            <li class="inline-flex">
                <a href="<?php echo esc_url($stackoverflow); ?>" target="_blank" class="text-white hover:text-blue-200">
                    <i class="fab fa-stack-overflow fa-fw"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($codepen = get_theme_mod('codepen_url')) : ?>
            <li class="inline-flex">
                <a href="<?php echo esc_url($codepen); ?>" target="_blank" class="text-white hover:text-blue-200">
                    <i class="fab fa-codepen fa-fw"></i>
                </a>
            </li>
            <?php endif; ?>
        </ul>
     
    </header>




<!-- Mobile Menu Toggle Button -->
<div class="md:hidden flex justify-between items-center px-4 py-4 bg-gray-800 text-white">
        <span class="text-xl font-bold"><?php echo get_bloginfo('name'); ?></span>
        <button id="menu-toggle" class="text-white focus:outline-none">
            <i class="fas fa-bars"></i> 
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobile-nav" class="mobile-menu-hidden md:hidden bg-gray-800 text-white p-4 space-y-4">
        <?php
        wp_nav_menu(array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary',
            'items_wrap' => '<ul class="space-y-4">%3$s</ul>',
            'walker' => new My_Custom_Nav_Walker()
        ));
        ?>
    </nav>





    <!-- Main Content Wrapper -->
    <div class="ml-0 md:ml-[20%] flex-grow">

    <section style="background-color: <?php echo esc_attr($secondary_color); ?>;" class="text-center py-10 text-white">
            <h1 class="text-4xl font-bold"><?php the_title(); ?></h1>
        </section>
    
    </div>

  
</body>
<?php wp_footer(); ?>
</html>
