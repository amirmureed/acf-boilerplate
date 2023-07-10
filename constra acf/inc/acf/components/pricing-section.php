<?php

    $class = get_sub_field('class_custom_css_class') ? : '';
    $id    = get_sub_field('class_custom_css_id') ? : '';

    $heading    = get_sub_field('pricing_section_heading');
    $subHeading = get_sub_field('pricing_section_sub_heading');

?>
<section id="main-container" class="main-container <?php echo $class; ?>">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title"><?php echo $heading; ?></h2>
        <h3 class="section-sub-title"><?php echo $subHeading; ?></h3>
      </div>
    </div>
    <!--/ Title row end -->

    <?php if(have_rows('pricing_packages')){
        $i = 1;    
    ?>
    <div class="row">
        <?php while(have_rows('pricing_packages')) { the_row();
            
            if($i == 2){
                $classOne = "ts-pricing-featured";
                $classTwo = "btn-primary";
            }else{
                $classOne = " ";
                $classTwo = "btn-dark";
            }

            ?>
      <div class="col-lg-4 col-md-6">
        <div class="ts-pricing-box <?php echo $classOne; ?>">
          <div class="ts-pricing-header">
            <h2 class="ts-pricing-name"><?php echo get_sub_field('pricing_section_package_name'); ?></h2>
            <h2 class="ts-pricing-price">
              <span class="currency"><?php echo get_sub_field('pricing_section_package_price'); ?></span><small><?php echo get_sub_field('payment_schedule'); ?></small>
            </h2>
          </div><!-- Pricing header -->
          <div class="ts-pricing-features">
            <ul class="list-unstyled">
                <?php echo get_sub_field('package_features'); ?>
            </ul>
          </div><!-- Features end -->
          <?php if(get_sub_field('pricing_section_call_to_action')){
            $link = get_sub_field('pricing_section_call_to_action');
            ?>
            <div class="plan-action">
                <a href="<?php echo $link['url']; ?>" class="btn <?php echo $classTwo; ?>"><?php echo $link['title']; ?></a>
            </div>
          <?php } ?>
        </div><!-- Plan 3 end -->
      </div><!-- Col end -->
      <?php $i += 1; ?>
      <?php } ?>
    </div>
    <?php } ?>
  </div><!-- Conatiner end -->
</section><!-- Main container end -->