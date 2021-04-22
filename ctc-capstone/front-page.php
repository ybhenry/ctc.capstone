<?php
/***
*	The template for displaying the custom home page.
*
*   @package CTC Capstone Theme
*   @since 1.0.0
*/

//display header
get_header('home');
?>

<?php if(have_posts()) : ?>
    <!-- start the loop -->
    <?php  while(have_posts()) : the_post(); ?>
 	    <?php
            //do things -- display content : the function below will pull the content from the template partial.
            get_template_part( 'template-parts/content', 'home' );
        ?>
    <?php  endwhile; ?>
    <!-- end while loop -->
<?php endif; ?>  

    <!-- //display footer -->
    <?php get_footer(); ?>

    <!-- *Note: These page templates will look very similar with the exception the content-'slug' template partials. -->
<style>
	h1 {
		margin-bottom: 0 !important;
	}
</style>