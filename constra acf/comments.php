<?php $post_id = get_the_ID();?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php " method="post" id="" class="comment-form">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="message"><textarea class="form-control required-field" name="comment" id="comment" placeholder="Your Comment" rows="10" required></textarea></label>
            </div>
        </div><!-- Col 12 end -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="name"><input class="form-control" name="author" id="author" placeholder="Your Name" type="text" required></label>
            </div>
        </div><!-- Col 4 end -->

        <div class="col-md-4">
            <div class="form-group">
                <label for="email"><input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="url"><input class="form-control" name="url" id="url" placeholder="Your Website" type="url"></label>
            </div>
        </div>
    </div><!-- Form row end -->
    <?php
        if (isset($_GET['replytocom'])) {
            $valP = $_GET['replytocom'];
          }else{
            $valP = 0;
          }
    ?>
    <div class="clearfix">
        <button class="btn btn-primary" name="submit" type="submit" id="submit" aria-label="post-comment">Post Comment</button>
        <input type="hidden" name="comment_post_ID" value="<?=$post_id;?>" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo $valP; ?>">
    </div>
</form><!-- Form end -->

<!-- <form role="form">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="message"><textarea class="form-control required-field" id="message" placeholder="Your Comment" rows="10" required></textarea></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name"><input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="email"><input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="website"><input class="form-control" id="website" placeholder="Your Website" type="text" required></label>
            </div>
        </div>

    </div>
    <div class="clearfix">
        <button class="btn btn-primary" type="submit" aria-label="post-comment">Post Comment</button>
    </div>
</form> -->