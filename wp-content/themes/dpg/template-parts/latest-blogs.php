<div class="blog-item d-flex flex-wrap align-items-center">
    <div class="blog-content">
        <div class="post-date d-flex align-items-end">
            <date><?php echo get_the_date( 'F d, Y' ) ?></date>
            <span class="big"></span> <span class="small"></span>
        </div>
        <h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h4>
        <p><?php the_excerpt(); ?> </p>
    </div>
    <div class="blog-image">
        <div class="image d-flex">
            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
        </div>
    </div>
</div>