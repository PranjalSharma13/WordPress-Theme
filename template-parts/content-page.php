<div class="container mx-auto p-4">
    <?php
    $args = array(
        'post_type' => 'experience',
        'posts_per_page' => -1, // Display all experiences
    );

    $experience_query = new WP_Query($args);

    if ($experience_query->have_posts()) {
        while ($experience_query->have_posts()) {
            $experience_query->the_post(); ?>
            <div class="experience-item mb-5">
                <h3 class="title mb-1 text-xl font-semibold"><?php the_title(); ?></h3>
                <div class="description text-gray-700 mb-2">
                    <?php the_content(); ?>
                </div>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('medium', ['class' => 'w-full']);
                } ?>
            </div>
        <?php }
        wp_reset_postdata(); // Reset post data
    } else {
        echo '<p>No experiences found.</p>';
    }
    ?>
</div>
