<?php
/***
* This is the archive template.
* This is the template that displays a collection of posts, categories,
tags or tag cloud(s), author, date, etc…
*
* @package CTC Capstone Theme
* @since 1.0.0
*/
//display header
get_header();
?>

 <h1><?php _e( 'Archives Page' ); ?></h1>
 <!-- /** _e(); translate the string into text like an echo(); would. **/ -->
 <h2><?php _e( 'Recent Posts' ); ?></h2>
 <!-- /** the function below only displays the 10 most recent posts **/
-->
<section class="getawayPages">
                <?php the_widget('WP_Widget_Recent_Posts'); ?>
                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e('Categories', 'theme name here'); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(
                            array(
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'show_count' => 1,
                                'title_li' => '',
                                'number' => 30,
                            )
                        );
                        ?>
                    </ul>
                </div>
                <!-- .widget -->
                <?php
                /* translators: %1$s: smiley */
                $archive_content = '<p>' . sprintf(
                    esc_html__('Try looking in the monthly archives. %1$s', 'theme name here'),
                    convert_smilies(':)')
                ) . '</p>';
                the_widget(
                    'WP_Widget_Archives',
                    'dropdown=1',
                    "after_title=</h2>$archive_content"
                );
                ?>
            </section>
<?php get_footer(); ?>