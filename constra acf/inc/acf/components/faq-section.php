<?php
$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$headingOne = get_sub_field('faq_topic_1');
$headingTwo = get_sub_field('faq_topic_2');
$i = 1;
?>
<section id="main-container" class="main-container <?php echo $class; ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php if($headingOne){ ?>
            <h3 class="border-title border-left mar-t0"><?php echo $headingOne; ?></h3>
        <?php } ?>
        <?php if(have_rows('topic_1_related_faqs')){ ?>
            <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                <?php while(have_rows('topic_1_related_faqs')){ the_row();
                    if($i == 1){
                        $showClass = 'show';
                        $faqexpand = 'true';
                    }else{
                        $showClass = ' ';
                        $faqexpand = 'false';
                    }
                    ?>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="heading<?php echo $i; ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"
                                aria-expanded="<?php echo $faqexpand; ?>" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo get_sub_field('faq_section_question'); ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $showClass; ?>" aria-labelledby="heading<?php echo $i; ?>"
                            data-parent="#construction-accordion">
                            <div class="card-body">
                                <?php echo get_sub_field('faq_section_answer'); ?>
                            </div>
                        </div>
                    </div>
                  <?php $i += 1; ?>
                <?php } ?>
            </div>
        <?php } ?>
        <!--/ Accordion end -->

        <div class="gap-40"></div>

        <?php if( $headingTwo ){ ?>
            <h3 class="border-title border-left"><?php echo $headingTwo; ?></h3>
        <?php } ?>
        <?php if(have_rows('topic_2_related_faqs')){
            $j = 1;
            ?>
            <div class="accordion accordion-group accordion-classic" id="safety-accordion">
                <?php while(have_rows('topic_2_related_faqs')){ the_row();
                    if($j == 1){
                        $showClass = 'show';
                        $faqexpand = 'true';
                    }else{
                        $showClass = ' ';
                        $faqexpand = 'false';
                    }
                    ?>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="heading<?php echo $i; ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"
                                aria-expanded="<?php echo $faqexpand; ?>" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo get_sub_field('faq_section_topic2_question'); ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $showClass; ?>" aria-labelledby="heading<?php echo $i; ?>"
                            data-parent="#safety-accordion">
                            <div class="card-body">
                                <?php echo get_sub_field('faq_section_topic2_answer'); ?>
                            </div>
                        </div>
                    </div>
                  <?php
                    $i += 1;
                    $j += 1;
                  ?>
                <?php } ?>
            </div>
        <?php } ?>
        <!--/ Accordion end -->
      </div><!-- Col end -->

      <?php
       $recentPosts = get_sub_field('show_sidebar_select_posts_to_show');
      ?>
      <?php if(get_sub_field('faq_section_show_sidebar') == 'yes') { ?>
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="sidebar sidebar-right">
                <div class="widget recent-posts">
                    <?php if(get_sub_field('show_sidebar_recent_posts_title')){ ?>
                        <h3 class="widget-title">Recent Posts</h3>
                    <?php } ?>
                    <?php if($recentPosts){ ?>
                    <ul class="list-unstyled">
                        <?php foreach($recentPosts as $post){
                            setup_postdata($post);
                            ?>
                            <li class="d-flex align-items-center">
                                <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <div class="posts-thumb">
                                        <a href="#"><img loading="lazy" alt="news-image" src="<?php echo $image[0]; ?>"></a>
                                    </div>
                                <?php } ?>
                                <div class="post-info">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                       <?php wp_reset_postdata(); ?>
                    <?php } ?>
                </div><!-- Recent post end -->
            </div><!-- Sidebar end -->
        </div><!-- Col end -->
      <?php } ?>
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section><!-- Main container end -->
