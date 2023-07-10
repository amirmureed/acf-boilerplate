<?php
get_header();

$banner_title = get_post_meta(get_the_ID(), '_banner_title', true);
?>

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                <div class="post-media post-image">
                    <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="post-image">
                </div>
            <?php } ?>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                    <?php
                        $post_id = get_queried_object_id();
                        $author_id = get_post_field( 'post_author', $post_id );
                        $author_name = get_the_author_meta( 'display_name', $author_id );
                    ?>
                    <span class="post-author">
                        <i class="far fa-user"></i><a href="<?php echo get_author_posts_url($author_id); ?>"> <?php echo $author_name; ?></a>
                    </span>
                <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        $first_category = $categories[0];
                        ?>
                    <span class="post-cat">
                    <i class="far fa-folder-open"></i><a href="<?php echo esc_url( get_category_link( $first_category->term_id ) ); ?>"> <?php echo $first_category->name; ?></a>
                    </span>
                <?php } ?>
                <span class="post-meta-date"><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                <span class="post-comment"><i class="far fa-comment"></i> <?php comments_number(); ?>
              </div>
              <h2 class="entry-title">
                <?php the_title(); ?>
              </h2>
            </div><!-- header end -->
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
            <div class="tags-area d-flex align-items-center justify-content-between">
                <?php
                    $tags = get_the_tags();
                    if ($tags) { ?>
                        <div class="post-tags">
                            <?php foreach($tags as $tag){ ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
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

        <?php
            $author_data = get_userdata( $author_id );
            $author_roles = $author_data->roles;
            $author_bio = $author_data->description;
            $author_avatar_url = get_avatar_url( $author_id );
        ?>
        <div class="author-box d-nlock d-sm-flex">
          <div class="author-img mb-4 mb-md-0">
            <img loading="lazy" src="<?php echo $author_avatar_url; ?>" alt="author">
          </div>
          <div class="author-info">
            <h3><?php echo $author_name; ?>
                <?php foreach ($author_roles as $role) { ?>
                    <span> <?php echo $role; ?> </span>
                <?php } ?>
            </h3>
            <p class="mb-2"> <?php echo $author_bio; ?> </p>

          </div>
        </div> <!-- Author box end -->

        <!-- Post comment start -->
        <div id="comments" class="comments-area">
          <h3 class="comments-heading"><?php comments_number(); ?></h3>
          <ul class="comments-list">
                    <?php
                    $args = array(
                        'post_id' => get_the_ID(), // Get the ID of the current post
                        'status'  => 'approve', // Only display approved comments
                        'parent'  => '0'
                    );

                    $comment_query = new WP_Comment_Query;
                    $comments = $comment_query->query( $args );
                    ?>
                    <?php if ( $comments ) : ?>
                        <li>
                            <?php foreach ( $comments as $comment ) : ?>
                                <div class="comment d-flex" id="<?php comment_ID(); ?>" data-comment-id="<?php comment_ID(); ?>">
                                    <img loading="lazy" class="comment-avatar" alt="author" src="<?php echo get_avatar_url($comment); ?>">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author mr-3"><?php comment_author(); ?></span>
                                            <span class="comment-date float-right"><?php comment_date(); ?> <?php comment_time(); ?></span>
                                        </div>
                                        <div class="comment-content">
                                            <?php comment_text(); ?>
                                        </div>
                                        <div class="text-left">
                                            <?php comment_reply_link( array_merge( $args, array( 'depth' => 2, 'max_depth' => 3 ) ) ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $args = array(
                                    'post_id' => get_the_ID(),
                                    'status' => 'approve',
                                    'parent' => $comment->comment_ID // only show replies for this comment
                                );
                                
                                $replies_query = new WP_Comment_Query;
                                $replies = $replies_query->query( $args );
                
                                if ( $replies ) :
                                ?>
                                <ul class="comments-reply">
                                    <li>
                                        <?php
                                            foreach ( $replies as $reply ) :
                                        ?>
                                        <div class="comment d-flex">
                                            <img loading="lazy" class="comment-avatar" alt="author" src="<?php echo get_avatar_url($reply); ?>">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author mr-3"><?php echo $reply->comment_author; ?></span>
                                                    <span class="comment-date float-right"><?php echo get_comment_date('', $reply->comment_ID); ?> at <?php echo get_comment_time(); ?></span>
                                                </div>
                                                <div class="comment-content">
                                                    <?php echo $reply->comment_content; ?>
                                                </div>
                                                <div class="text-left">
                                                    <?php comment_reply_link( array_merge( $args, array( 'depth' => 2, 'max_depth' => 3 ) ) ); ?>
                                                </div>
                                            </div>
                                        </div><!-- Comments end -->
                                        <?php endforeach; ?>
                                    </li>
                                </ul>
                            <?php endif; ?> 
                            <?php endforeach; ?>   
                        </li>
                    <?php endif; ?>
          </ul><!-- Comments-list ul end -->
        </div><!-- Post comment end -->

        <div class="comments-form border-box">
          <h3 class="title-normal">Add a comment</h3>
            <?php 
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            ?>
        </div><!-- Comments form end -->
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