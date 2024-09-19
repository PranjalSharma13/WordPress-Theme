<?php
get_header();
?><div class="flex-grow ml-1/5 pt-6" style="margin-left: 20%; padding-top: 70px;"> 

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
        <div>
        

<?php
get_footer()
?>
   