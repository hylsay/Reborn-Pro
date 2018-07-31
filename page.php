<?php
get_header();if($title_img = get_post_meta($post->ID,"日志头图",true)) {	$img_class = 'img-header';} else {	$title_img = get_the_post_thumbnail_url();	$img_class = 'img-thumb';}
if (get_option('fixed_width') == "ai") {	$content_str = get_the_content();	if (strpos($content_str,'[fmt ') !== false) { wp_enqueue_style( 'fixed_width',get_stylesheet_directory_uri().'/assets/css/fix_post.css' ); }
}
?><div class="fix_post_width"><div class="cats_display single"><div class="top_img <?php echo $img_class; ?>" style="background-image:url('<?php echo $title_img; ?>'); position: relative;"><h1 style="top: 60%;position: absolute;margin-top: 0;"><?php the_title(); ?></h1></div><div class="content-container clear-float"><div class="categories"><?php if (get_the_tag_list()) { ?><i class="fa fa-tag" aria-hidden="true"></i><?php the_tags('',' · ',''); } ?></div><article class="clear-float"><?php the_content(); ?></article><?php
comments_template()	?></div></div></div><?php get_footer(); ?>