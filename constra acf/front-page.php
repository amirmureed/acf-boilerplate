<?php
    get_header();
?>

<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title"> Read our Articles </h2>
            <h3 class="section-sub-title"> Latest Posts </h3>
        </div>
    </div>
    <!--/ Title row end -->

    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
    ?>
    <div class="row">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="latest-post">
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <div class="latest-post-media">
                            <a href="<?php the_permalink(); ?>" class="latest-post-img">
                                <img loading="lazy" class="img-fluid" src="<?php echo $image[0]; ?>" alt="img">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="<?php the_permalink(); ?>" class="d-inline-block"><?php the_title(); ?></a>
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                            <i class="fa fa-clock-o"></i> <?php the_date(); ?>
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 1st post col end -->
        <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
    <!--/ Content row end -->

    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="/wordpress/blogs"> Read our Blog </a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->


<?php
    get_footer();
?>