<div class="container mx-auto p-4">
   
<div class="post mb-5">
    <div class="flex">
   
        <img class="mr-3 w-full md:w-auto md:flex-shrink-0" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="image">
        <div class="media-body">
            <h3 class="title mb-1 text-xl font-semibold">
            <?php the_title(); ?>
            </h3>
            <div class="meta mb-1 text-gray-600">
                <span class="date">  <?php the_date(); ?></span>
                <span class="time mx-2">• 5 min read</span>
                <span class="comment"><a href="#" class="text-blue-600 hover:underline">  <?php comments_number(); ?></a></span>
            </div>
            <div class="intro text-gray-700 mb-2">
             <?php the_excerpt(); ?>
            </div>
            <a class="more-link text-blue-600 hover:underline" href="<?php the_permalink(); ?>">Read more &rarr;</a>

        </div><!--//media-body-->
    </div><!--//media-->
</div><!--//post-->


  
</div>
