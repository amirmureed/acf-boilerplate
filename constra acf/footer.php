<footer id="footer" class="footer bg-overlay">
<div class="footer-main">
    <div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
        <h3 class="widget-title">About Us</h3>
        <?php
            $logo = get_theme_mod( 'custom_footer_logo' );
            if ( $logo ) { ?>
                <img loading="lazy" width="200px" class="footer-logo" src="<?php echo $logo; ?>" alt=" <?php esc_attr( get_bloginfo( 'name' ) ); ?>">
            <?php } else {
                echo '<h3 class="text-white">' . esc_html( get_bloginfo( 'name' ) ) . '</h3>';
            }
        ?>
        <p><?php echo get_theme_mod('footer_about_company', 'Lorem ipsum dolor sit amet elit, sed do eiusmod tempor inci done idunt ut labore et dolore magna aliqua.'); ?></p>
        <div class="footer-social">
            <?php
                $facebook_link  = get_theme_mod( 'top_bar_facebook_link', 'https://www.facebook.com/Applicontech' );
                $twitter_link   = get_theme_mod( 'top_bar_twitter_link', 'https://www.instagram.com/applicontech/' );
                $instagram_link = get_theme_mod( 'top_bar_instagram_link', 'https://www.linkedin.com/company/applicontech' );
                $github_link    = get_theme_mod( 'top_bar_github_link', 'https://www.linkedin.com/company/applicontech' );
            ?>
            <ul>
                <?php if($facebook_link) { ?>
                <li><a href="<?php echo $facebook_link; ?>" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a></li> <?php } ?>
                <?php if($twitter_link) { ?>
                <li><a href="<?php echo $twitter_link; ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li> <?php } ?>
                <?php if($instagram_link) { ?>
                <li><a href="<?php echo $instagram_link; ?>" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a></li> <?php } ?>
                <?php if($github_link) { ?>
                <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li> <?php } ?>
            </ul>
        </div><!-- Footer social end -->
        </div><!-- Col end -->

        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
        <h3 class="widget-title">Working Hours </h3>
        <div class="working-hours">
            <?php echo get_theme_mod('footer_working_hours_text', 'We work 7 days a week, every day excluding major holidays. Contact us if you have any questions.') ?>
            <br><?php echo get_theme_mod('footer_working_hours_detail', '<br>Monday - Friday: <span class="text-right">10:00 - 16:00 </span> <br> Saturday: <span class="text-right">12:00 - 15:00</span><br> Sunday: <span class="text-right">09:00 - 12:00</span>'); ?>
        </div>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
        <h3 class="widget-title"><?php echo get_theme_mod('footer_column_title', 'services'); ?></h3>
        <?php
            $args = array(
                'menu_class' => 'list-arrow',
                'container' => 'ul',
                'theme_location' => 'mainfooter',
            );
            wp_nav_menu( $args );
        ?>
        </div><!-- Col end -->
    </div><!-- Row end -->
    </div><!-- Container end -->
</div><!-- Footer main end -->

<div class="copyright">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
        <div class="copyright-info">
            <?php echo get_theme_mod('footer_copyrights_text', 'Copyright © 2023, Developed by AppliconSoft'); ?>
        </div>
        </div>

        <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
                <?php
                    $args = array(
                        'menu_class' => 'list-unstyled',
                        'container' => 'ul',
                        'theme_location' => 'footer',
                    );
                    wp_nav_menu( $args );
                ?>
            </div>
        </div>
    </div><!-- Row end -->

    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top">
        <i class="fa fa-angle-double-up"></i>
        </button>
    </div>

    </div><!-- Container end -->
</div><!-- Copyright end -->
</footer><!-- Footer end -->

</div><!-- Body inner end -->
<?php wp_footer(); ?>
</body>

</html>