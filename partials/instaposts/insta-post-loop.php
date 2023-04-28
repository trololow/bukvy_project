<?php if( empty( $item ) ) return ''; ?>
<div class="insta-post-item">
    <a href="<?php echo $item['permalink']  ?>">
        <div class="insta-item-wrap">
            <img src="<?php echo $item['image_url_local'] ?>"
            onerror="this.onerror=null;this.src='<?php echo get_template_directory_uri().'/img.jpg' ?>'"
            alt="">
        </div>

        <div class="insta-item-description ">
            <p class="text-limit-line-4"><?php echo $item['caption'] ?></p>
        </div>
    </a>
</div>