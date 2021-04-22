<?php
/***
*	The template for displaying all blog posts.
*
*   @package CTC Capstone Theme
*   @since 1.0.0
*/

//display header
get_header();
?>
<h1 class="entry-title">Blog</h1>
	
<article <?php post_class();?> id="post-<?php the_ID();?>" >

    <?php if(have_posts()) : ?>
        
        <!-- start the loop | the loop grabs all the content and cycles through all of the content until it’s done. -->
        <?php  while(have_posts()) : the_post(); ?>
		<!-- display the all of the blog posts -->
		<div class="singleArticle">
						<div class=articlePic>
				<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
			</div>
			<div class="articleContent">
				<a href="<?php the_permalink(); ?>"><?php the_title();?></a><br/>
				<p>
					<?php echo get_the_date(); ?>
				</p>
            	
			</div>

		</div>
        
            <?php  endwhile; ?>
        <!-- end while loop -->

    <?php endif; ?> 

    <!-- add pagination -->
    <div class="pagination">
        <?php page_pagination(); ?>
    </div>
    

</article>

<!-- //display footer -->
<?php get_footer(); ?>