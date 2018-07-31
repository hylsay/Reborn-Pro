<?php
get_header()?><?php
global $wp_query,$paged;$max_page = $wp_query->max_num_pages;if (($max_page > 1 | ($max_page == 1 & get_option('hide_pagi_only_1') != "checked") ) & get_option('pagi_float') == "checked") {	$pagi_float_class = "pagi_float";}if ($max_page > 1 | ($max_page == 1 & get_option('hide_pagi_only_1') != "checked") ) {	$has_pagi_class = "has_pagi";}?><div class="cats_display <?php echo $pagi_float_class." ".$has_pagi_class; ?>"><?php include('assets/template/nav_category.php'); ?><?php
echo "<div class='cat_group category content-container clear-float'>";	echo "<h2><i class='fa fa-tags' aria-hidden='true'></i> ".single_tag_title('',false)."</h2>";	global $wp_query;	while( have_posts() ){	the_post();	switch (get_option('all_posts_display_type')) {	case 'list':
include("assets/template/post_list.php");	break;	case 'card':
include("assets/template/post_card.php");	break;default:
include("assets/template/post_blog.php");	break;	}}echo "</div>";	?><?php echo wp_nav( $p = 2 ,$showSummary = false,$showPrevNext = true,$style = 'panda_pagination',$container = 'full-container' ); ?></div><?php get_footer() ?>