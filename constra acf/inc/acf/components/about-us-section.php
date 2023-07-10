<?php
$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$leftTitle        = get_sub_field('about_us_section_left_title');
$leftheading      = get_sub_field('about_us_section_left_heading');
$leftdescription  = get_sub_field('about_us_section_left_description');
$keyponint1       = get_sub_field('about_us_section_key_point_one');
$keyponint2       = get_sub_field('about_us_section_key_point_two');
$keyponint3       = get_sub_field('about_us_section_key_point_three');
$keyponint4       = get_sub_field('about_us_section_key_point_four');
$rightTitle       = get_sub_field('about_us_section_right_title');
$rightDescription = get_sub_field('about_us_section_right_description');
?>

<section id="ts-features" class="ts-features <?php echo $class; ?>">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <div class="ts-intro">
            <?php if(!empty($leftTitle)){ ?>
              <h2 class="into-title"><?php echo $leftTitle; ?></h2>
            <?php } ?>
            <?php if($leftheading){ ?>
              <h3 class="into-sub-title"><?php echo $leftheading; ?></h3>
            <?php } ?>
            <?php if($leftdescription){ ?>
              <p><?php echo $leftdescription; ?></p>
            <?php } ?>
          </div><!-- Intro box end -->

          <div class="gap-20"></div>
            <?php if($keyponint1 || $keyponint2){ ?>
                <div class="row">
                    <?php if($keyponint1){ ?>
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                <i class="fas fa-trophy"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title"><?php echo $keyponint1; ?></h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->
                    <?php } ?>

                    <?php if($keyponint2){ ?>
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                <i class="fas fa-sliders-h"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title"><?php echo $keyponint2; ?></h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    <?php } ?>
                </div><!-- Content row 1 end -->
            <?php } ?>

            <?php if($keyponint3 || $keyponint4) { ?>
                <div class="row">
                    <?php if($keyponint3){ ?>
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                <i class="fas fa-thumbs-up"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title"><?php echo $keyponint3; ?></h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->
                    <?php } ?>

                    <?php if($keyponint4){ ?>
                        <div class="col-md-6">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                <i class="fas fa-users"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title"><?php echo $keyponint4; ?></h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    <?php } ?>
                </div><!-- Content row 1 end -->
            <?php } ?>
        </div><!-- Col end -->

        <?php if($rightTitle || $rightDescription){ ?>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <h3 class="into-sub-title">Our Values</h3>
                <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>

                <?php if(have_rows('about_us_section_accordian')){ ?>
                    <div class="accordion accordion-group" id="our-values-accordion">
                        <?php $i = 0; ?>
                        <?php while(have_rows('about_us_section_accordian')){ the_row(); ?>
                            <?php
                                $accordianTitle       = get_sub_field('about_us_accordian_title');
                                $accordiandescription = get_sub_field('about_us_accordian_description');

                                if($i == 0){
                                    $showclass = "show";
                                }else{
                                    $showclass = "";
                                }

                                if($i == 0){
                                    $target    = "collapseOne";
                                }else if($i == 2){
                                    $target = "collapseTwo";
                                }else if($i == 3){
                                    $target = "collapseThree";
                                }else{
                                    $target = "collapseFour";
                                }
                            ?>
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingOne">
                                    <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#<?php echo $target; ?>" aria-expanded="true" aria-controls="<?php echo $target; ?>">
                                        <?php echo $accordianTitle; ?>
                                    </button>
                                    </h2>
                                </div>
                            
                                <div id="<?php echo $target; ?>" class="collapse <?php echo $showclass; ?>" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        <?php echo $accordiandescription; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>
                    </div>
                <?php } ?>
                <!--/ Accordion end -->
            </div><!-- Col end -->
        <?php } ?>
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->