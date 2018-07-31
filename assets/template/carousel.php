<?php
$cpids = array();if (is_home()) {
if (get_option('headLine_random') != "checked") {
$carouselPostIDs = get_option("headLine");	if (gettype($carouselPostIDs) == "array") {	foreach ($carouselPostIDs as $post) {	$cpids[] = $post["post"];	}}} else {
$args = array(
'posts_per_page' => 20,'orderby' => 'rand','ignore_sticky_posts' => true
);$carouselsID_query = new WP_Query();	$carouselsID_query->query($args);	while( $carouselsID_query->have_posts() ){	$carouselsID_query->the_post();	if (get_post_meta($post->ID,"分类slider图片地址",true)) {	$cpids[] = $post->ID;	}}wp_reset_query();	}} else {
if(get_option('disable_cat_carousels') != "checked") {
global $wp_query; 	$cat = get_query_var('cat'); 	$is_fixed = false;$fixed_cat_carousels = get_option('fixed_cat_carousels'); 	foreach ($fixed_cat_carousels as $fixed_cc) { 	if ($fixed_cc['cat'] == $cat) { 	$cpids[] = intval($fixed_cc['post']); 	$is_fixed = true; 	}}
if (!$is_fixed) { 
$args = array(
'cat' => $cat,'posts_per_page' => 20,'orderby' => 'rand','ignore_sticky_posts' => true
);$carouselsID_query = new WP_Query();	$carouselsID_query->query($args);	while( $carouselsID_query->have_posts() ){	$carouselsID_query->the_post();	if (get_post_meta($post->ID,"分类slider图片地址",true)) {	$cpids[] = $post->ID;	}}wp_reset_query(); 	}}}$carousels = array();foreach ($cpids as $pid) {	$carousels[] = array(
"id"=>$pid,"href"=>get_post_permalink($pid),"img"=>get_post_meta($pid,"分类slider图片地址",true),"title"=>get_the_title($pid)	);}echo '<script>pandastudio_framework.carousels = '.json_encode($carousels).'</script>';$force_landscape = get_option('carousel_force_landscape')=="true" ? 'force_landscape' : "";$force_landscape_type = get_option('carousel_force_landscape')=="true" ? "type=''" : ":type='main.carousel.type'";echo "<div v-if='false'>";foreach ($carousels as $item) {	echo "<a href='".$item['href']."' title='".$item['title']."' class='carousels post-".$item['id']."'><img src='".$item['img']."'/></a>";}echo "</div>";?><template><div class="carousel <?php echo $force_landscape; ?>" :class="main.carousel.type"><el-carousel :interval="4000" <?php echo $force_landscape_type; ?> v-if="!destroy & main.carousel.content.length > 0" indicator-position="none"><?php
$href = get_option('carousel_href_force_hidden') == 'true' ? '' : ':href="item.href"'
?><a <?php echo $href; ?> v-for="item in main.carousel.content"><el-carousel-item :key="item.id" :style="{ 'background-image': 'url(' + item.img + ')' }"></el-carousel-item></a></el-carousel></div></template>