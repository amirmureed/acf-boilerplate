<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$showBreadcrumbs = get_sub_field('show_breadcrumbs');

?>

<div id="banner-area" class="banner-area <?php echo $class; ?>" style="background-image:url(<?php echo get_sub_field('banner_section_banner_image'); ?>)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title"><?php echo get_sub_field('banner_page_title'); ?></h1>
                <?php if($showBreadcrumbs == 'yes'){ ?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <?php wp_breadcrumbs(); ?>
                        </ol>
                    </nav>
                <?php } ?>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->