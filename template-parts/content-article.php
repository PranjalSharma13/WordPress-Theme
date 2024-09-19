<div class="container mx-auto p-4">
    <header class="content-header mb-6">
        <div class="meta mb-3 text-gray-600">
            <span class="date"><?php the_date();?></span>
             <?php the_tags('<span class="tag ml-4"><i class="fa fa-tag"></i>','</span><span class="tag ml-4"><i class="fa fa-tag"></i>','</span>');?>
            <span class="tag ml-4"><i class='fa fa-tag'></i> category</span>
            <span class="comment ml-4">
                <a href="#comments" class="text-blue-500 hover:underline">
                    <i class='fa fa-comment'></i> <?php comments_number();?>
                </a>
            </span>
        </div>
    </header>
    <?php the_content(); ?>
    <?php comments_template(); ?>
</div>
