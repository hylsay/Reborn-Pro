<?php
/*
Template Name: 友情链接
*/
get_header();if($title_img = get_post_meta($post->ID,"日志头图",true)) {	$img_class = 'img-header';} else {	$title_img = get_the_post_thumbnail_url();	$img_class = 'img-thumb';}
if (get_option('fixed_width') == "ai") {	$content_str = get_the_content();	if (strpos($content_str,'[fmt ') !== false) {	wp_enqueue_style( 'fixed_width',get_stylesheet_directory_uri().'/assets/css/fix_post.css' ); }
}
?><div class="fix_post_width"><div class="cats_display single"><div class="top_img <?php echo $img_class; ?>" style="background-image:url('<?php echo $title_img; ?>'); position: relative;"><h1 style="top: 60%;position: absolute;margin-top: 0;"><?php the_title(); ?></h1></div><div class="content-container clear-float"><article class="clear-float"><?php
$categories = get_categories( array(
'hide_empty' => 0,'taxonomy' => 'favlinks-category','orderby' => 'slug',) );foreach ( $categories as $category ) {	echo '<div class="title_style_01 favlinks_title">'.$category->name.'</div><div class="favlinks-group clear-float">';	$args = array(
'post_type' => 'favlinks','tax_query' => array(
array(
'taxonomy' => 'favlinks-category','field' => 'name','terms' => $category->name,),),);	$query_posts = new WP_Query();$query_posts->query($args);	while( $query_posts->have_posts() ){	$query_posts->the_post();	require('assets/template/post_favlinks.php');	}wp_reset_query();	echo '</div>';	}
?><?php the_content(); ?></article></div></div></div><?php get_footer(); ?>