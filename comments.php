
<div class="comments-wrapper my-8">
    <div class="comments" id="comments">
        <div class="comments-header mb-6">
            <h2 class="comment-reply-title text-xl font-semibold">
               <?php
               if(!have_comments()){
               echo  "Leave a comment";
                               }else
                               {
                               echo  get_comments_number()."Comments";
                               }
               ?>
            </h2>
        </div><!-- .comments-header -->

        <div class="comments-inner space-y-4">
            
<?php
wp_list_comments(
    array(
 'avatar_size'=>120,
 'style'=>'div',
 )
);
?>
           
        </div><!-- .comments-inner -->
    </div><!-- comments -->

    <hr class="my-6" aria-hidden="true">

    <?php
if (comments_open()) {
    comment_form(
        array(
            'class_form' => 'bg-white rounded-lg shadow-md p-6 mb-6', // Tailwind classes for form styling
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title text-2xl font-semibold mb-4">',
            'title_reply_after' => '</h2>',
            'label_submit' => 'Submit Comment', // Custom submit button text
            'class_submit' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200', // Tailwind classes for submit button
            'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="4" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Your comment..."></textarea></p>',
            'fields' => array(
                'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Your Name" required /></p>',
                'email' => '<p class="comment-form-email"><input id="email" name="email" type="email" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Your Email" required /></p>',
            ),
        )
    );
}
?>

</div>

