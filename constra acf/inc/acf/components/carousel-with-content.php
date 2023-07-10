<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$title   = get_sub_field('carousel_with_content_heading');
$content = get_sub_field('carousel_with_content_content');

?>

<section id="main-container" class="main-container <?php echo $class; ?>">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <?php if($title){ ?>
            <h3 class="column-title"><?php echo $title; ?></h3>
          <?php } ?>
          <?php if($content){ ?>
            <p> <?php echo $content ?> </p>
          <?php } ?>
        </div><!-- Col end -->
        <?php if( have_rows('carousel_images') ): ?>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div id="page-slider" class="page-slider small-bg">
            <?php while( have_rows('carousel_images') ) : the_row(); ?>
              <div class="item" style="background-image:url(<?php echo get_sub_field('carousel_section_image'); ?>)">
                <?php if(get_sub_field('carousel_section_box_title')){ ?>
                    <div class="container">
                        <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title"><?php echo get_sub_field('carousel_section_box_title'); ?></h2>
                        </div>    
                        </div>
                    </div>
                <?php } ?>
              </div><!-- Item 1 end -->
            <?php endwhile; ?>
          </div><!-- Page slider end-->          
        </div><!-- Col end -->
        <?php endif; ?>

    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->