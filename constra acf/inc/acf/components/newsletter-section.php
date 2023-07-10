<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$leftTitle     = get_sub_field('newsletter_section_left_title');
$mobileNo      = get_sub_field('newsletter_section_mobile_number');
$rightTitle    = get_sub_field('newsletter_section_right_title');
$rightSubTitle = get_sub_field('newsletter_section_right_sub_title');
$placeholder   = get_sub_field('newsletter_section_input_placeholder') ? : '';

?>

<section class="subscribe no-padding">
  <div class="container">
    <div class="row">
        <?php if($leftTitle || $mobileNo) { ?>
            <div class="col-lg-4">
            <div class="subscribe-call-to-acton">
                <?php if($leftTitle) { ?>
                    <h3><?php echo $leftTitle; ?></h3>
                <?php } ?>
                <?php if($mobileNo) { ?>
                    <h4><?php echo $mobileNo; ?></h4>
                <?php } ?>
            </div>
            </div><!-- Col end -->
        <?php } ?>

        <div class="col-lg-8">
          <div class="ts-newsletter row align-items-center">
              <?php if($rightTitle || $rightSubTitle){ ?>
                <div class="col-md-5 newsletter-introtext">
                    <?php if($rightTitle){ ?>
                        <h4 class="text-white mb-0"><?php echo $rightTitle; ?></h4>
                    <?php } ?>
                    <?php if($rightSubTitle){ ?>
                        <p class="text-white"><?php echo $rightSubTitle; ?></p>
                    <?php } ?>
                </div>
              <?php } ?>

              <div class="col-md-7 newsletter-form">
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                      <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="<?php echo $placeholder; ?>" autocomplete="off">
                    </div>
                </form>
              </div>
          </div><!-- Newsletter end -->
        </div><!-- Col end -->

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->
