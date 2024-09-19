<?php
get_header();
?>

        <article class="content px-6 py-10 max-w-6xl mx-auto">
           <?php
           if(have_posts())
           {
                while(have_posts())
                {
                    the_post();
                    get_template_part('template-parts/content','archive');
                }
           }
           ?>
        </article>
        

<?php
get_footer()
?>
   