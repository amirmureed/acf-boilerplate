<?php

$class   = get_sub_field('class_custom_css_class') ? : '';
$id      = get_sub_field('class_custom_css_id') ? : '';
$heading = get_sub_field('call_to_action_heading');
$button  = get_sub_field('call_to_action_button');

if($button){
    $btnurl   = $button['url'];
    $btntitle = $button['title'];
}

?>

<section class="call-to-action-box no-padding <?php echo $class; ?> " id="<?php echo $id; ?>">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
            <?php if($heading){ ?>
                <div class="call-to-action-text">
                    <h3 class="action-title"><?php echo $heading; ?></h3>
                </div>
            <?php } ?>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
            <?php if($button) { ?>
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="<?php echo $btnurl; ?>"><?php echo $btntitle; ?></a>
              </div>
            <?php } ?>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->