<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$mainImage  = get_sub_field('what_we_do_section_main_image');
$heading    = get_sub_field('what_we_do_section_heading');
$subHeading = get_sub_field('what_we_do_section_sub_heading');

?>

<section id="ts-service-area" class="ts-service-area pb-0 <?php echo $class; ?>">
  <div class="container">
    <?php if($heading || $subHeading){ ?>
        <div class="row text-center">
            <div class="col-12">
            <?php if($heading){ ?>
                <h2 class="section-title"><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if($subHeading){ ?>
                <h3 class="section-sub-title"><?php echo $subHeading; ?></h3>
            <?php } ?>
            </div>
        </div>
    <?php } ?>
    <!--/ Title row end -->


    <?php
    $i = 0;
    if(have_rows('what_we_do_section_services_repeater')){ ?>
        <div class="row">
            <?php while(have_rows('what_we_do_section_services_repeater')){ the_row();
                $icon           = get_sub_field('services_repeater_services_icon');
                $link           = get_sub_field('services_repeater_service_link');
                $serviceTitle   = get_sub_field('services_repeater_service_title');
                $serviceExcerpt = get_sub_field('services_repeater_service_excerpt');
            ?>
                <?php if($i == 0){
                    echo '<div class="col-lg-4">';
                } ?>
                <?php if($i <=2){ ?>
                    <div class="ts-service-box d-flex">
                        <?php if($icon){ ?>
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="<?php echo $icon; ?>" alt="service-icon">
                            </div>
                        <?php } ?>
                        <div class="ts-service-box-info">
                            <?php if($link){ ?>
                                <h3 class="service-box-title"><a href="<?php echo $link; ?>"><?php echo $serviceTitle; ?></a></h3>
                            <?php }else{ ?>
                                <h3 class="service-box-title"><?php echo $serviceTitle; ?></h3>
                            <?php } ?>
                            <p><?php echo $serviceExcerpt; ?></p>
                        </div>
                    </div><!-- Service 1 end -->
                <?php } ?>
                <?php if($i == 2){
                    echo "</div>"; }
                ?>

                <?php if($mainImage && $i == 2){ ?>
                    <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid" src="<?php echo $mainImage; ?>" alt="service-avater-image">
                    </div><!-- Col end -->
                <?php } ?>

                <?php
                if($i == 3){
                    echo '<div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">';
                }
                ?>
                    <?php if($i>=3){ ?>
                        <div class="ts-service-box d-flex">
                        <?php if($icon){ ?>
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="<?php echo $icon; ?>" alt="service-icon">
                            </div>
                        <?php } ?>
                        <div class="ts-service-box-info">
                            <?php if($link){ ?>
                                <h3 class="service-box-title"><a href="<?php echo $link; ?>"><?php echo $serviceTitle; ?></a></h3>
                            <?php }else{ ?>
                                <h3 class="service-box-title"><?php echo $serviceTitle; ?></h3>
                            <?php } ?>
                            <p><?php echo $serviceExcerpt; ?></p>
                        </div>
                    </div><!-- Service 1 end -->
                    <?php } ?>
                <?php if($i == 5){
                    echo '</div>';
                } ?>
                <?php $i++; ?>
            <?php } ?>
        </div><!-- Content row end -->
    <?php } ?>

  </div>
  <!--/ Container end -->
</section><!-- Service end -->