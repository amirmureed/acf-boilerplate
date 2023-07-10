<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$testimonialTitle  = get_sub_field('testimonials_slider_section_section_title');
$happyClientsTitle = get_sub_field('happy_clients_section_title');

?>

<section id="<?php echo $id; ?>" class="content <?php echo $class; ?>">
  <div class="container">
    <div class="row">
    <div class="col-lg-6">
          <?php if($testimonialTitle) { ?>
            <h3 class="column-title">Testimonials</h3>
          <?php } ?>

          <?php
          if( have_rows('testimonials') ): ?>
            <div id="testimonial-slide" class="testimonial-slide">
              <?php while( have_rows('testimonials') ) : the_row(); ?>
                <div class="item">
                  <div class="quote-item">
                      <span class="quote-text">
                        <?php echo get_sub_field('testimonials_slider_section_client_feedback'); ?>
                      </span>

                      <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="<?php echo get_sub_field('testimonials_slider_section_client_avatar'); ?>" alt="testimonial">
                        <div class="quote-item-info">
                            <h3 class="quote-author"><?php echo get_sub_field('testimonials_slider_section_client_name'); ?></h3>
                            <span class="quote-subtext"><?php echo get_sub_field('client_designation_and_company'); ?></span>
                        </div>
                      </div>
                  </div><!-- Quote item end -->
                </div>
                <!--/ Item 1 end -->
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        <?php if($happyClientsTitle){ ?>
          <div class="col-lg-6 mt-5 mt-lg-0">

            <?php if($happyClientsTitle){ ?>
              <h3 class="column-title"> <?php echo $happyClientsTitle; ?></h3>
            <?php } ?>

            <?php if( have_rows('happy_clients_logos') ): ?>
              <div class="row all-clients">
                <?php while( have_rows('happy_clients_logos') ) : the_row(); ?>
                  <div class="col-sm-4 col-6">
                    <figure class="clients-logo">
                      <?php if(get_sub_field('happy_clients_link_optional')){ ?>
                        <a href="<?php echo get_sub_field('happy_clients_link_optional'); ?>"><img loading="lazy" class="img-fluid" src="<?php echo get_sub_field('happy_clients_logo'); ?>" alt="clients-logo" /></a>
                      <?php }else{ ?>
                        <img loading="lazy" class="img-fluid" src="<?php echo get_sub_field('happy_clients_logo'); ?>" alt="clients-logo" />
                      <?php } ?>
                    </figure>
                  </div><!-- Client 1 end -->
                <?php endwhile; ?>
              </div><!-- Clients row end -->
            <?php endif; ?>

          </div><!-- Col end -->
        <?php } ?>

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->