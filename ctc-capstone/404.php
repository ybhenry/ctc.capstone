<?php

/***
 *
 * The template is for displaying 404 page
 *
 * @package CTC Capstone Theme
 *
 */
//display header
get_header();
?>
<main class="site-main" id="main">
    <section class="error-404 not-found">
        <header class="page-header">
            <section class="errorBannerContent">
                <h1 class="page-title">
                    <?php esc_html_e('Oh! Hello!'); ?>
                </h1>
                <p>
                    <?php esc_html_e('Looks like you found yourself a 404 page.'); ?>
                </p>
                <p>
                    <?php esc_html_e('Nothing to see here!'); ?>
                </p>
            </section>

        </header>
        <!-- .page-header -->
        <div class="page-content">
            <section class="errorSearch">
                <p>
                    <?php esc_html_e('Sorry! We can’t seem to find the you were looking for. Please check that you typed your address correctly, go back to the previous page,try using the search to find something specific or the links below. ', 'minusIndustries Theme'); ?>
                </p>
                <?php get_search_form(); ?>
            </section>

            <section class="getawayPages">
                <?php the_widget('WP_Widget_Recent_Posts'); ?>
                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e('Categories', 'minusIndustries Theme'); ?></h2>
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
                    esc_html__('Try looking in the monthly archives. %1$s', 'minusIndustries Theme'),
                    convert_smilies(':)')
                ) . '</p>';
                the_widget(
                    'WP_Widget_Archives',
                    'dropdown=1',
                    "after_title=</h2>$archive_content"
                );
                ?>
            </section>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->
</main><!-- #main -->
<!-- display footer -->
<?php get_footer(); ?>