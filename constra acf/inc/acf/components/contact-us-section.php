<?php
$class = get_sub_field('class_custom_css_class') ? : '';
$title         = get_sub_field('contact_us_section_title');
$subTitle      = get_sub_field('contact_us_section_sub_title');
$locationTitle = get_sub_field('contact_us_section_visit_our_office_title');
$location      = get_sub_field('contact_us_section_location');
$locationMap   = get_sub_field('location_iframe');
$emailTitle    = get_sub_field('contact_us_section_email_us_title');
$email         = get_sub_field('contact_us_section_email');
$callUsTitle   = get_sub_field('contact_us_section_call_us_title');
$phoneNumber   = get_sub_field('contact_us_section_phone_number');
$formTitle     = get_sub_field('contact_form_title');
$formShortcode = get_sub_field('contact_form_short_code');

?>

<section id="main-container" class="main-container <?php echo $class; ?>">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <?php if($title){ ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php } ?>
        <?php if($subTitle){ ?>
            <h3 class="section-sub-title"><?php echo $subTitle; ?></h3>
        <?php } ?>
      </div>
    </div>
    <!--/ Title row end -->
    <div class="row">
        <?php if($locationTitle || $location){ ?>
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fas fa-map-marker-alt mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4><?php echo $locationTitle; ?></h4>
                        <p><?php echo $location; ?></p>
                    </div>
                </div>
            </div><!-- Col 1 end -->
        <?php } ?>

        <?php if($emailTitle || $email){ ?>
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                <span class="ts-service-icon icon-round">
                    <i class="fa fa-envelope mr-0"></i>
                </span>
                <?php ?>
                <div class="ts-service-box-content">
                    <h4><?php echo $emailTitle; ?></h4>
                    <p><?php echo $email; ?></p>
                </div>
                </div>
            </div><!-- Col 2 end -->
        <?php } ?>

        <?php if($callUsTitle || $phoneNumber){ ?>
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                <span class="ts-service-icon icon-round">
                    <i class="fa fa-phone-square mr-0"></i>
                </span>
                <div class="ts-service-box-content">
                    <h4><?php echo $callUsTitle; ?></h4>
                    <p><?php echo $phoneNumber; ?></p>
                </div>
                </div>
            </div><!-- Col 3 end -->
        <?php } ?>

    </div><!-- 1st row end -->

    <div class="gap-60"></div>

    <!-- <div class="google-map">
      <div id="map" class="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="<?php echo get_template_directory_uri() . '/'; ?> images/marker.png" data-marker-name="Constra"></div>
    </div> -->

    <?php if($locationMap){ ?>
        <div>
            <?php echo $locationMap; ?>
        </div>
    <?php } ?>

    <div class="gap-40"></div>

    <?php if($formShortcode){ ?>
        <div class="row">
        <div class="col-md-12">
                <h3 class="column-title"><?php echo $formTitle ?></h3>
                <?php
                    echo do_shortcode( "$formShortcode" );
                ?>
        </div>
        </div><!-- Content row -->
    <?php } ?>
  </div><!-- Conatiner end -->
</section><!-- Main container end -->