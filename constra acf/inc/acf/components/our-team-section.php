<?php
$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$heading     = get_sub_field('my_team_heading');
$posts       = get_sub_field('select_posts_to_show');
$showSlider  = get_sub_field('our_team_show_in_slider');

if($showSlider == 'no'){
    $leaders     = get_sub_field('select_leadership_team_members');
}

?>

<?php if($showSlider == 'yes'){
    $sub_heading = get_sub_field('my_team_sub_heading'); ?>
    <section id="ts-team" class="ts-team <?php echo $class; ?>">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <?php if($heading){ ?>
                        <h2 class="section-title"><?php echo $heading; ?></h2>
                    <?php } ?>
                    <?php if($sub_heading){ ?>
                        <h3 class="section-sub-title"><?php echo $sub_heading; ?></h3>
                    <?php } ?>
                </div>
            </div><!--/ Title row end -->

            <?php if( $posts ): ?>
            <div class="row">
                <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    <?php foreach( $posts as $post ):
                        setup_postdata($post); ?>
                            <div class="item">
                                <div class="ts-team-wrapper">
                                    <?php
                                        $facebook   = get_field('cpt_designation_facebook_link');
                                        $twitter    = get_field('cpt_designation_twitter_link');
                                        $linkedin   = get_field('cpt_designation_linkedin_link');
                                        $googlePlus = get_field('cpt_designation_google_plus_link');
                                    ?>
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                        <div class="team-img-wrapper">
                                            <img loading="lazy" class="w-100" src="<?php echo $image[0]; ?>" alt="team-img">
                                        </div>
                                    <?php endif; ?>
                                    <div class="ts-team-content">
                                        <a href="<?php the_permalink(); ?>"><h3 class="ts-name"><?php the_title(); ?></h3></a>
                                        <p class="ts-designation"><?php the_field('cpt_designation_title'); ?></p>
                                        <p class="ts-description"> <?php echo wp_trim_words( get_the_content(), 15, ' ' ); ?></p>
                                        <?php if($facebook || $twitter || $linkedin || $googlePlus){ ?>
                                            <div class="team-social-icons">
                                                <?php if($facebook){ ?>
                                                    <a target="_blank" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php } ?>
                                                <?php if($twitter){ ?>
                                                    <a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                                                <?php } ?>
                                                <?php if($googlePlus){ ?>
                                                    <a target="_blank" href="<?php echo $googlePlus; ?>"><i class="fab fa-google-plus"></i></a>
                                                <?php } ?>
                                                <?php if($linkedin){ ?>
                                                    <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin"></i></a>
                                                <?php } ?>
                                            </div><!--/ social-icons-->
                                        <?php } ?>
                                    </div>
                                </div><!--/ Team wrapper end -->
                            </div><!-- Team 1 end -->
                        <?php endforeach; ?>
                </div><!-- Team slide end -->
                </div>
            </div><!--/ Content row end -->
                <?php
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div><!--/ Container end -->
    </section><!--/ Team end -->
<?php }else{ ?>
    <section id="main-container" class="main-container pb-4 <?php echo $class; ?>">
        <div class="container">
            <div class="row text-center">
            <div class="col-lg-12">
                <h3 class="section-sub-title"><?php echo $heading; ?></h3>
            </div>
            </div>
            <!--/ Title row end -->
            <?php if($leaders){ ?>
                <div class="row justify-content-center">
                    <?php foreach($leaders as $post){
                        setup_postdata($post);
                        $facebook   = get_field('cpt_designation_facebook_link');
                        $twitter    = get_field('cpt_designation_twitter_link');
                        $linkedin   = get_field('cpt_designation_linkedin_link');
                        $googlePlus = get_field('cpt_designation_google_plus_link');
                    ?>
                    <div class="col-lg-3 col-sm-6 mb-5">
                        <div class="ts-team-wrapper">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <div class="team-img-wrapper">
                                    <img loading="lazy" src="<?php echo $image[0]; ?>" class="img-fluid" alt="team-img">
                                </div>
                            <?php endif; ?>
                            <div class="ts-team-content-classic">
                                <h3 class="ts-name"><?php the_title(); ?></h3>
                                <p class="ts-designation"><?php the_field('cpt_designation_title'); ?></p>
                                <p class="ts-description"><?php echo wp_trim_words( get_the_content(), 10, ' ' ); ?></p>
                                <?php if($facebook || $twitter || $linkedin || $googlePlus){ ?>
                                    <div class="team-social-icons">
                                        <?php if($facebook){ ?>
                                            <a target="_blank" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                                        <?php } ?>
                                        <?php if($twitter){ ?>
                                            <a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                                        <?php } ?>
                                        <?php if($googlePlus){ ?>
                                            <a target="_blank" href="<?php echo $googlePlus; ?>"><i class="fab fa-google-plus"></i></a>
                                        <?php } ?>
                                        <?php if($linkedin){ ?>
                                            <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <!--/ social-icons-->
                            </div>
                        </div>
                    </div><!-- Col end -->
                    <?php } ?>
                </div><!-- Content row 1 end -->
                <?php
                wp_reset_postdata(); ?>
            <?php } ?>

            <?php if( $posts ){ ?>
                <div class="row">
                    <?php foreach( $posts as $post ):
                        setup_postdata($post);
                        $facebook   = get_field('cpt_designation_facebook_link');
                        $twitter    = get_field('cpt_designation_twitter_link');
                        $linkedin   = get_field('cpt_designation_linkedin_link');
                        $googlePlus = get_field('cpt_designation_google_plus_link');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="ts-team-wrapper">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <div class="team-img-wrapper">
                                    <img loading="lazy" src="<?php echo $image[0]; ?>" class="img-fluid" alt="team-img">
                                </div>
                            <?php endif; ?>
                            <div class="ts-team-content-classic">
                                <a href="<?php the_permalink(); ?>"><h3 class="ts-name"><?php the_title(); ?></h3></a>
                                <p class="ts-designation"><?php the_field('cpt_designation_title'); ?></p>
                                <p class="ts-description"><?php echo wp_trim_words( get_the_content(), 10, ' ' ); ?></p>
                                <?php if($facebook || $twitter || $linkedin || $googlePlus){ ?>
                                    <div class="team-social-icons">
                                        <?php if($facebook){ ?>
                                            <a target="_blank" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                                        <?php } ?>
                                        <?php if($twitter){ ?>
                                            <a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                                        <?php } ?>
                                        <?php if($googlePlus){ ?>
                                            <a target="_blank" href="<?php echo $googlePlus; ?>"><i class="fab fa-google-plus"></i></a>
                                        <?php } ?>
                                        <?php if($linkedin){ ?>
                                            <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <!--/ social-icons-->
                            </div>
                        </div>
                        <!--/ Team wrapper 3 end -->
                    </div><!-- Col end -->
                    <?php endforeach; ?>
                </div><!-- Content row end -->
                <?php
                wp_reset_postdata(); ?>
            <?php } ?>

        </div><!-- Container end -->
    </section><!-- Main container end -->

<?php } ?>
