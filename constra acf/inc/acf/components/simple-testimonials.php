<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$heading = get_sub_field('simple_testimonials_section_heading');

?>

<section id="main-container" class="main-container <?php echo $class; ?>">
   <div class="container">
      <?php if($heading){ ?>
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title mb-4"><?php echo $heading; ?></h3>
            </div>
        </div>
      <?php } ?>
      <!--/ Title row end -->
        <?php if(have_rows('simple_testimonials_testimonials')){ ?>
            <div class="row">
                <?php while(have_rows('simple_testimonials_testimonials')) { the_row(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="quote-item quote-border mt-5">
                        <div class="quote-text-border">
                            <?php echo get_sub_field('simple_testimonials_client_feedback'); ?>
                        </div>

                        <div class="quote-item-footer">
                            <?php if(get_sub_field('simple_testimonials_client_avatar')){ ?>
                                <img loading="lazy" class="testimonial-thumb" src="<?php echo get_sub_field('simple_testimonials_client_avatar'); ?>" alt="testimonial">
                            <?php } ?>
                            <div class="quote-item-info">
                                <h3 class="quote-author"><?php echo get_sub_field('simple_testimonials_client_name'); ?></h3>
                                <?php if(get_sub_field('simple_testimonials_client_designation_and_company')){ ?>
                                    <span class="quote-subtext"><?php echo get_sub_field('simple_testimonials_client_designation_and_company'); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        </div><!-- Quote item end -->
                    </div><!-- End col md 4 -->
                <?php } ?>
            </div><!-- Content row end -->
        <?php } ?>
   </div><!-- Container end -->
</section><!-- Main container end -->