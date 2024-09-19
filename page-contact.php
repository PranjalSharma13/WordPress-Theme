<?php
/*
Template Name: Contact Me
*/
?>
<?php
get_header();
?>
<div class="flex-grow ml-1/5 pt-6" style="margin-left: 20%; padding-top: 70px;"> 
<article class="content px-6 py-10 max-w-6xl mx-auto">
<div>
        <?php
        // Display the form using the WPForms shortcode
        echo do_shortcode('[wpforms id="84"]');
        ?>
    </div>
</article>
        <div>


<?php
get_footer()
?>