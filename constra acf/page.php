<?php
get_header();
?>

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <div class="post-body">
            <div class="entry-header">
              <h2 class="entry-title">
                <?php the_title(); ?>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="share-items">
                <ul class="post-social-icons list-unstyled">
                    <li class="social-icons-head">Share:</li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>

          </div><!-- post-body end -->
        </div><!-- post content end -->
      </div><!-- Content Col end -->
        <div class="col-lg-4">
            <div class="sidebar sidebar-right">
                <div class="widget recent-posts">
                    <h3 class="widget-title">Recent Posts</h3>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3
                        );
                        $recentPostsLoop = new WP_Query( $args );
                        ?>
                        <?php if ( $recentPostsLoop->have_posts() ) { ?>
                            <ul class="list-unstyled">
                                <?php while ( $recentPostsLoop->have_posts() ) { $recentPostsLoop->the_post(); ?>
                                    <li class="d-flex align-items-center">
                                        <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                                            <div class="posts-thumb">
                                                <a href="<?php the_permalink(); ?>"><img loading="lazy" alt="img" src="<?php the_post_thumbnail_url(); ?>"></a>
                                            </div>
                                        <?php } ?>
                                            <div class="post-info">
                                                <h4 class="entry-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                    </li><!-- 1st post end-->
                                <?php } ?>
                            </ul>
                        <?php } ?>
                </div><!-- Recent post end -->
                <?php 
                    $categories = get_categories( array(
                        'hide_empty' => false
                    ) );
                ?>
                <div class="widget">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="arrow nav nav-tabs">
                        <?php $count = 1; ?>
                        <?php foreach ( $categories as $category ) { ?>
                            <?php if($count < 6){ ?>
                                <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
                            <?php }
                            $count = $count+1;
                            ?>
                        <?php } ?>
                    </ul>
                </div><!-- Categories end -->

                <?php 
                    $args = array(
                        'type' => 'monthly',
                        'limit' => 6,
                        'echo' => 0
                );
                $archives = wp_get_archives( $args );
                $archives = preg_replace('/<\/a>&nbsp;\((\d+)\)/','</a>',$archives);
                ?>
                <?php if($archives){ ?>
                    <div class="widget">
                        <h3 class="widget-title">Archives </h3>
                            <ul class="arrow nav nav-tabs">
                                <?php
                                    echo strip_tags( $archives, '<a><li>' );
                                ?>
                            </ul>
                    </div><!-- Archives end -->
                <?php } ?>
                <?php
                    $tags = get_tags();
                    if ($tags) { ?>
                        <div class="widget widget-tags">
                            <h3 class="widget-title">Tags </h3>
                            <ul class="list-unstyled">
                                <?php foreach($tags as $tag){ ?>
                                    <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div><!-- Tags end -->
                <?php } ?>
            </div><!-- Sidebar end -->
        </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?php
get_footer();
?>