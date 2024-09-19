<?php
get_header();
?> <div class="flex-grow ml-1/5 pt-6" style="margin-left: 20%; padding-top: 70px;"> <!-- Adjust margin-left and padding-top -->
<article style="margin: 0 auto; padding: 10px; max-width: 800px;">
    <div style="display: flex; align-items: flex-start;">
        <!-- Main Content Area -->
        <div style="flex: 2; margin-right: 20px; text-align: left;">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </div>

        <!-- Image Area -->
        <div style="flex: 1;">
            <?php
            $image_url = get_post_meta(get_the_ID(), 'user_image_meta_key', true);
            if ($image_url) {
                echo '<img src="' . esc_url($image_url) . '" alt="User Image" style="max-width: 100%; height: auto;" />'; 
            } else {
                if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail(get_the_ID(), 'medium', ['style' => 'max-width: 100%; height: auto;']);
                }
            }
            ?>
        </div>
    </div>
</article>
</div>
<?php get_footer(); ?>

</body>


