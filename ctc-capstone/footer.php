<?php
/**
* The footer for our theme
*@package CTC Capstone Theme
* @since 1.0
*/
?>
            </div>
       		<!-- closing tag for site-content"> -->
            <footer>
                <!--call in the footer sidebar-->
                <?php //get_template_part( 'template-parts/sidebar', 'footer'); ?>
            <div class="inner-container">
				<div class="footerContainer footerInfo">
				     <?php
					if(is_active_sidebar('footer-col-one')) : 
					?>
					<?php dynamic_sidebar('footer-col-one'); ?>
					<?php endif ?>
				</div>
				<div class="footerContainer footerNav">
					<?php
				     if(is_active_sidebar('footer-col-two')) : 
					?>
					<?php dynamic_sidebar('footer-col-two'); ?>
					<?php endif ?>
				</div>

            </div>    
            </footer>
            <?php wp_footer(); ?>
        </body>
</html>

