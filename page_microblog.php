<?php
/*
Template Name: 轻博客
*/
$args = array(
'post_type'=> 'post'
);$archives_query = new WP_Query();$archives_query->query($args);get_header();if($title_img = get_post_meta($post->ID,"日志头图",true)) {	$img_class = 'img-header';} else {	$title_img = get_the_post_thumbnail_url();	$img_class = 'img-thumb';}
$max_page = $archives_query->max_num_pages;if (($max_page > 1 | ($max_page == 1 & get_option('hide_pagi_only_1') != "checked") ) & get_option('pagi_float') == "checked") {	$pagi_float_class = "pagi_float";}if ($max_page > 1 | ($max_page == 1 & get_option('hide_pagi_only_1') != "checked") ) {	$has_pagi_class = "has_pagi";}
?><div class="fix_post_width"><div class="cats_display single <?php echo $pagi_float_class." ".$has_pagi_class; ?>"><div class="top_img <?php echo $img_class; ?>" style="background-image:url('<?php echo $title_img; ?>'); position: relative;"><h1 style="top: 60%;position: absolute;margin-top: 0;"><?php the_title(); ?></h1></div><div class="content-container clear-float"><div class="categories"></div><?php the_content(); ?><div class="microblog-container"><?php
wp_reset_query();	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }else { $paged = 1; }$args = array(
'post_type'=> 'microblog','paged'=> $paged
);	query_posts( $args );	while( have_posts() ){	the_post();	echo '<div class="microblog"><span class="content">';	echo '<span class="date">'.get_the_time('Y-n-j H:i').'</span>';	echo '<article>';	the_content();	echo '</article>';	echo '</span></div>';	}?></div></div><?php echo wp_nav( $p = 2 ,$showSummary = false,$showPrevNext = true,$style = 'panda_pagination',$container = 'full-container' ); ?></div></div><?php get_footer(); ?>