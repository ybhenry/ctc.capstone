<?php
/***
* Template Name: History
* Description: Display all history items from custom post type
* @package CTC Capstone Theme
* @since 1.0.0
*/

//display header
get_header();
?>
<?php the_title('<h2 class="entry-title contentHeading">', '</h2>'); ?>
    <?php
        $args = array(
            'post_type'      => 'Historys',
            'posts_per_page' =>  6, //display 4 more recent posts
        );
        $the_query = new WP_Query ($args);
    ?>

<div class="cptSearch">
	<?php
		if ( function_exists( 'wpes_search_form' ) ) {
		wpes_search_form( array( 
			'wpessid' => 340 
		) );
	}	
	?>
</div>

<div class="cptContent">
    <!-- loop for displaying the custom content -->
        <?php if( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <!-- //create your card layout here -->
                <div class="cptCard">
					<div class="cptCardContent">
						<div class="cptCardHeader">
							<!-- featured image -->
							<a href="<?php the_permalink(); ?>">
								<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
							</a>
						</div>

						<div class="card-content">
							<div class="newsCPT">
								<a href="<?php the_permalink(); ?>">  
									<?php the_title('<h4 class="blog-heading">', '</h4>'); ?> 
								</a>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>

                </div>
            <?php endwhile;?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
</div>
<!-- //display footer -->
<?php get_footer(); ?>

<!-- Note: You may come across this function/template tag: get_post_format(). This template tag/function automatically picks up the type of post format defined for the post and uses the corresponding template file. -->