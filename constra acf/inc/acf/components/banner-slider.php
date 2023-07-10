<?php
  	$banner_class 		= get_sub_field( 'class_custom_css_class' ) ?: '';
    $banner_id	  		= get_sub_field( 'class_custom_css_id' ) ?: '';
?>

<div class="banner-carousel banner-carousel-1 mb-0 <?php echo $banner_class; ?> " id="<?php echo $banner_id; ?>">

<?php
$i = 0;
if( have_rows('slider_images') ):
  while( have_rows('slider_images') ) : the_row();

    $banner_image       = get_sub_field('slider_image');
    $banner_title_1     = get_sub_field('slider_top_title');
    $banner_title_2     = get_sub_field('slider_top_title_2');
    $banner_heading     = get_sub_field('slider_heading');
    $banner_description = get_sub_field('slider_description');
    $btn1               = get_sub_field('slider_button');
    $btn2               = get_sub_field('slider_button_2');

    if($btn1){
      $btn1url   = $btn1['url'];
      $btn1title = $btn1['title'];
    }
    if($btn2){
      $btn2url   = $btn2['url'];
      $btn2title = $btn2['title'];
    }

    if($i == 0){ ?>
        <div class="banner-carousel-item" style="background-image:url(<?php echo $banner_image; ?>)">
        <div class="slider-content">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                  <div class="col-md-12 text-center">
                    <?php if(!empty($banner_title_1)){ ?>
                      <h2 class="slide-title-box" data-animation-in="slideInDown"><?php echo $banner_title_1; ?></h2>
                    <?php } ?>
                    <?php if(!empty($banner_title_2)){ ?>
                      <h2 class="slide-title" data-animation-in="slideInLeft"><?php echo $banner_title_2; ?></h2>
                    <?php } ?>
                    <?php if(!empty($banner_heading)){ ?>
                      <h3 class="slide-sub-title" data-animation-in="slideInRight"><?php echo $banner_heading; ?></h3>
                    <?php } ?>
                    <?php if(!empty($banner_description)){ ?>
                      <p class="slider-description lead" data-animation-in="slideInRight"><?php echo $banner_description; ?></p>
                    <?php } ?>
                    <?php if(!empty($btn1) || !empty($btn2)){  ?>
                      <p data-animation-in="slideInLeft" data-duration-in="1.2">
                        <?php if(!empty($btn1)){ ?>
                          <a href="<?php echo $btn1url; ?>" class="slider btn btn-primary"> <?php echo $btn1title; ?></a>
                        <?php } ?>
                        <?php if(!empty($btn2)){ ?>  
                          <a href="<?php echo $btn2url; ?>" class="slider btn btn-primary border"><?php echo $btn2title; ?></a>
                        <?php } ?>
                        </p>
                    <?php } ?>
                  </div>
              </div>
            </div>
        </div>
      </div>
    <?php } ?>

    <?php if( $i == 1 ) { ?>
      <div class="banner-carousel-item" style="background-image:url(<?php echo $banner_image; ?>)">
        <div class="slider-content text-left">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                  <div class="col-md-12">
                    <?php if(!empty($banner_title_1)){ ?>
                      <h2 class="slide-title-box" data-animation-in="slideInDown"><?php echo $banner_title_1; ?></h2>
                    <?php } ?>
                    <?php if(!empty($banner_title_2)){ ?>
                      <h3 class="slide-title" data-animation-in="fadeIn"><?php echo $banner_title_2; ?></h3>
                    <?php } ?>
                    <?php if(!empty($banner_heading)){ ?>
                      <h3 class="slide-sub-title" data-animation-in="slideInLeft"><?php echo $banner_heading; ?></h3>
                    <?php } ?>
                    <?php if(!empty($banner_description)){ ?>
                      <p class="slider-description lead" data-animation-in="slideInRight"><?php echo $banner_description; ?></p>
                    <?php } ?>
                    <?php if(!empty($btn1) || !empty($btn2)){ ?>
                      <p data-animation-in="slideInRight">
                          <?php if(!empty($btn1)){ ?>
                            <a href="<?php echo $btn1url; ?>" class="slider btn btn-primary border"><?php echo $btn1title; ?></a>
                          <?php } ?>
                          <?php if(!empty($btn2)){ ?>  
                            <a href="<?php echo $btn2url; ?>" class="slider btn btn-primary"><?php echo $btn2title; ?></a>
                          <?php } ?>
                      </p>
                    <?php } ?>
                  </div>
              </div>
            </div>
        </div>
      </div>
    <?php } ?>

    <?php if($i == 2) { ?>
      <div class="banner-carousel-item" style="background-image:url(<?php echo $banner_image; ?>)">
        <div class="slider-content text-right">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                  <div class="col-md-12">
                    <?php if(!empty($banner_title_1)){ ?>
                      <h2 class="slide-title-box" data-animation-in="slideInDown"><?php echo $banner_title_1; ?></h2>
                    <?php } ?>
                    <?php if(!empty($banner_title_2)){ ?>
                      <h2 class="slide-title" data-animation-in="slideInDown"><?php echo $banner_title_2; ?></h2>
                    <?php } ?>
                    <?php if(!empty($banner_heading)){ ?>
                      <h3 class="slide-sub-title" data-animation-in="fadeIn"><?php echo $banner_heading; ?></h3>
                    <?php } ?>
                    <?php if(!empty($banner_description)){ ?>
                      <p class="slider-description lead" data-animation-in="slideInRight"><?php echo $banner_description; ?></p>
                    <?php } ?>
                    <?php if(!empty($btn1) || !empty($btn2)){ ?>
                      <div data-animation-in="slideInLeft">
                          <?php if(!empty($btn1)){ ?>
                            <a href="<?php echo $btn1url; ?>" class="slider btn btn-primary border"><?php echo $btn1title; ?></a>
                          <?php } ?>
                          <?php if(!empty($btn2)){ ?>  
                            <a href="<?php echo $btn2url; ?>" class="slider btn btn-primary"><?php echo $btn2title; ?></a>
                          <?php } ?>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </div>
        </div>
      </div>
    <?php }
    $i++; ?>
<?php endwhile; endif; ?>
</div>