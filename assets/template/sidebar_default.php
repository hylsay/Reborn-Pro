<?php
$show_sidebar_fixed_swticher = get_option('sidebar_fixed_switcher')=="checked" ? "true" : "false";$sidebar_tabModel = get_option('sidebar_default');echo "<script>pandastudio_framework.sidebar_tabModel = '".$sidebar_tabModel."'</script>";?><div class="sidebar" :class="main.sidebar.open ? 'showSidebar' : ''"><div class="wrap fixed"><el-tabs v-model="main.sidebar.tabModel" @tab-click="tabChanged"><el-tab-pane class="sidebar-blogger" name="sidebar-blogger"><span slot="label"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php echo get_option('sidebar_bloggerinfo_name'); ?>" placement="top"  :enterable="false"><i class="fa fa-user" aria-hidden="true"></i></el-tooltip></span><el-scrollbar :view-style="{'max-height':'calc(100vh - 114px)'}" :native="is_Mobile()"><div class="head" style="background-image: url(<?php echo get_option('owner_avatar'); ?>);"></div><div class="blogger"><div class="name"><?php echo get_option('owner_nickname'); ?><a href="<?php echo get_option('guestbook_href'); ?>"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php echo get_option('guestbook_tooltip'); ?>" placement="right"  :enterable="false"><i class="fa fa-commenting-o" aria-hidden="true"></i></el-tooltip></a></div><div class="description"><?php echo get_option('owner_description'); ?></div></div><?php if (get_option('owner_tags')) { ?><div class="sidebar-title"><?php echo get_option('sidebar_bloggerinfo_tags_name'); ?></div><div class="tags"><?php
$tags = get_option('owner_tags');foreach ($tags as $tag) {echo "<a class='tag' href='".$tag['href']."'>".$tag['tag']."</a>";}
?></div><?php } ?><?php if (get_option('owner_social')) { ?><div class="sidebar-title"><?php echo get_option('sidebar_bloggerinfo_social_name'); ?></div><div class="links"><?php
$socials = get_option('owner_social');foreach ($socials as $social) {switch ($social['target']) {case 'qrcode':
echo "<el-popover placement='left' trigger='hover'>";echo "<img src='".$social['href']."' />";echo "<a class='link' slot='reference'><i class='fa fa-".$social['icon']."' aria-hidden='true'></i>".$social['name']."</a>";echo "</el-popover>";break;
default:
echo "<a class='link' href='".$social['href']."' target='".$social['target']."'><i class='fa fa-".$social['icon']."' aria-hidden='true'></i>".$social['name']."</a>";break;}}
?></div><?php } ?><?php if (get_option('owner_link')) { ?><div class="sidebar-title"><?php echo get_option('sidebar_bloggerinfo_links_name'); ?></div><div class="links"><?php
$links = get_option('owner_link');foreach ($links as $link) {switch ($link['target']) {case 'qrcode':
echo "<el-popover placement='left' trigger='hover'>";echo "<img src='".$link['href']."' />";echo "<a class='link' slot='reference'><i class='fa fa-".$link['icon']."' aria-hidden='true'></i>".$link['name']."</a>";echo "</el-popover>";break;
default:
echo "<a class='link' href='".$link['href']."' target='".$link['target']."'><i class='fa fa-".$link['icon']."' aria-hidden='true'></i>".$link['name']."</a>";break;}}
?></div><?php } ?><?php if (intval(get_option("sidebar_microblog_num")) > 0) { ?><div class="sidebar-title"><?php echo get_option('sidebar_microblog_name'); ?></div><div class="links"><div class="microblog-container">	
<?php 
wp_reset_query();$post_num = intval(get_option("sidebar_microblog_num")) == 0 ? 1 : intval(get_option("sidebar_microblog_num")); // 设置调用条数 
$args = array(
'post_type'=> 'microblog',
'posts_per_page' => $post_num ,
);query_posts( $args );while( have_posts() ){the_post();echo '<div class="microblog"><span class="content">';echo '<span class="date">'.get_the_time('Y-n-j H:i').'</span>';echo '<article>';the_content();echo '</article>';echo '</span></div>';}
?></div></div><?php if (get_option("sidebar_microblog_url")) { ?><div class="gotoGuestbook"><a class="gotoGuestbook" href="<?php echo get_option('sidebar_microblog_url'); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo get_option('sidebar_microblog_more_text'); ?></a></div><?php } ?><?php } wp_reset_query();?><?php do_action('sidebar_blogger', 10, 2); ?></el-scrollbar></el-tab-pane><el-tab-pane class="sidebar-recommend hot" name="sidebar-recommend"><span slot="label"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php echo get_option('sidebar_recommend_name'); ?>" placement="top" :enterable="false"><i class="fa fa-fire" aria-hidden="true"></i></el-tooltip></span><el-scrollbar :view-style="{'max-height':'calc(100vh - 114px)'}" :native="is_Mobile()"><?php
$recommend_arr = get_option("sidebar_recommend");if ($recommend_arr) {$ids = array();foreach ($recommend_arr as $pid) {$ids[] = $pid["post"];}
?><div class="sidebar-title"><?php echo get_option('sidebar_recommend_recommend_name'); ?></div><div class="sidebar-recommend"><ul><?php
$query_posts = new WP_Query( array( 
'post__in' => $ids,
'ignore_sticky_posts' => true //排除置顶文章
));while( $query_posts->have_posts() ){ $query_posts->the_post();$commentcount = $post->comment_count; ?><li><a href="<?php the_permalink() ?>"><div class="entry-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div></a><h3 class="entry-title"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php the_time('n月j日 · Y年') ?>" placement="right" :enterable="false"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></el-tooltip></h3><div class="meta"><?php if (get_option("sidebar_recommend_date") == "checked") { ?><span class="part date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('Y.n.j') ?></span><?php } ?><?php if (get_option("sidebar_recommend_like") == "checked") { ?><span class="part like"><i class="fa fa-heart-o" aria-hidden="true"></i><?php $like = get_post_meta($post->ID,'bigfa_ding',true) ? get_post_meta($post->ID,'bigfa_ding',true) : "0" ; echo $like;?></span><?php } ?><?php if (get_option("sidebar_recommend_comment") == "checked") { ?><span class="part comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $commentcount ?></span><?php } ?></div></li><?php } wp_reset_query();?> 
</ul></div><?php
}
?><?php if (intval(get_option("sidebar_hot_num")) > 0) { ?><div class="sidebar-title recommend"><?php echo get_option('sidebar_recommend_hot_name'); ?></div><ul> 
<?php
$post_num = intval(get_option("sidebar_hot_num")) == 0 ? 1 : intval(get_option("sidebar_hot_num")); // 设置调用条数 
$args = array( 
'post_password' => '',
'post_type' => 'post',
'post_status' => 'publish', // 只选公开的文章. 
'post__not_in' => $ids,//排除手动推荐的文章
'caller_get_posts' => 1, // 排除置顶文章. 
'orderby' => 'comment_count', // 依评论数排序. 
'posts_per_page' => $post_num ,
'ignore_sticky_posts' => true //排除置顶文章
); 
$query_posts = new WP_Query(); 
$query_posts->query($args); 
while( $query_posts->have_posts() ){ $query_posts->the_post();$commentcount = $post->comment_count; $ids[] = $post->ID;?><li><a href="<?php the_permalink() ?>"><div class="entry-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div></a><h3 class="entry-title"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php the_time('n月j日 · Y年') ?>" placement="right"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></el-tooltip></h3><div class="meta"><span class="part comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $commentcount ?></span></div></li><?php } wp_reset_query();?> 
</ul><?php } ?><?php if (intval(get_option("sidebar_like_num")) > 0) { ?><div class="sidebar-title recommend"><?php echo get_option('sidebar_bloggerinfo_like_name'); ?></div><div class="sidebar-recommend"><ul> 
<?php
$post_num = intval(get_option("sidebar_like_num")) == 0 ? 1 : intval(get_option("sidebar_like_num")); // 设置调用条数 
$args = array( 
'post_password' => '',
'post_type' => 'post',
'post_status' => 'publish', // 只选公开的文章. 
'post__not_in' => $ids,//排除手动推荐的文章和热门文章
'meta_query' => array(
array(
'key' => 'bigfa_ding',
'type' => 'NUMERIC'
),
),
'orderby' => array( 
'bigfa_ding' => 'DESC',
),
'posts_per_page' => $post_num,
'ignore_sticky_posts' => true //排除置顶文章
); 
$query_posts = new WP_Query(); 
$query_posts->query($args); 
while( $query_posts->have_posts() ){ $query_posts->the_post();$commentcount = $post->comment_count; $ids[] = $post->ID;?><li><a href="<?php the_permalink() ?>"><div class="entry-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div></a><h3 class="entry-title"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php the_time('n月j日 · Y年') ?>" placement="right" :enterable="false"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></el-tooltip></h3><div class="meta"><span class="part like"><i class="fa fa-heart-o" aria-hidden="true"></i><?php $like = get_post_meta($post->ID,'bigfa_ding',true) ? get_post_meta($post->ID,'bigfa_ding',true) : "0" ; echo $like;?></span></div></li><?php } wp_reset_query();?> 
</ul></div><?php } ?><?php do_action('sidebar_hot', 10, 2); ?></el-scrollbar></el-tab-pane><el-tab-pane class="sidebar-comment" name="sidebar-comment" v-if="!post_menu"><span slot="label"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php echo get_option('sidebar_comment_name'); ?>" placement="top" :enterable="false"><i class="fa fa-comments" aria-hidden="true"></i></el-tooltip></span><el-scrollbar :view-style="{'max-height':'calc(100vh - 114px)'}" :native="is_Mobile()"><?php if (intval(get_option("sidebar_comment_num")) > 0) { ?><div class="sidebar-title"><?php echo get_option('sidebar_comment_comment_name'); ?></div><ul><?php
$comment_num = intval(get_option("sidebar_comment_num")) == 0 ? 1 : intval(get_option("sidebar_comment_num"));//设置调用条数
$comments_query = new WP_Comment_Query();$the_user = get_user_by('login', get_option('hide_user_comment_name'));$the_user_id = $the_user->ID;$args = get_option("sidebar_comment_onlyShowPost") == "checked" ? array( 'number' => $comment_num ,'post_type' => 'post','author__not_in' => $the_user_id) : array( 'number' => $comment_num,'author__not_in' => $the_user_id);$comments = $comments_query->query( $args );$comm = '';if ( $comments ) {foreach ($comments as $comment) {$comm .= '<li>' . get_avatar( $comment->comment_author_email, 40 );$comm .= '<div class="comment_meta">';$comm .= '<el-tooltip :manual="disableTooltip" effect="dark" content="'.get_the_title($comment->comment_post_ID).'" placement="right" :enterable="false">';$comm .= '<a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '">';$comm .= get_comment_author( $comment->comment_ID ) . '</a>';$comm .= '</el-tooltip>';if (get_option("sidebar_comment_date") == "checked") {$comm .= '<span class="date">'.get_comment_date('n月j日 · Y').'</span>';}
$comm .= '<p>' . do_shortcode(strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0 ) )) . '</p>';if (get_option("sidebar_comment_post") == "checked") {$comm .= '<a class="post_name" href="'.get_permalink($comment->comment_post_ID).'">'.get_the_title($comment->comment_post_ID).'</a>';}
$comm .= '</div></li>';}} else {$comm .= 'No comments.';}
echo $comm;?></ul><?php } ?><div class="gotoGuestbook"><a class="gotoGuestbook" href="<?php echo get_option('guestbook_href'); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><?php echo get_option('guestbook_tooltip'); ?></a></div><?php do_action('sidebar_comment', 10, 2); ?></el-scrollbar></el-tab-pane><el-tab-pane class="sidebar-bookmark" :class="{is_Mobile:is_Mobile()}" name="sidebar-bookmark" v-if="post_menu"><span slot="label"><el-tooltip :manual="disableTooltip" effect="dark" content="<?php echo get_option('bookmark_tip'); ?>" placement="top" :enterable="false"><i class="fa fa-book" aria-hidden="true"></i></el-tooltip></span><el-scrollbar :view-style="{'max-height':'calc(100vh - 114px)'}" :native="is_Mobile()"><div class="sidebar-title"><?php echo get_option('bookmark_tip'); ?></div><?php
if (is_single() || is_page()) {if($contentNav = get_the_naved_contentnav(get_the_content())) {echo $contentNav;echo "<script>pandastudio_framework.contentNav = true;</script>";} else {echo '无目录';echo "<script>pandastudio_framework.contentNav = false;</script>";}} else {echo '非文章/页面内容页';echo "<script>pandastudio_framework.contentNav = false;</script>";}
?><?php do_action('sidebar_bookmark', 10, 2); ?></el-scrollbar></el-tab-pane></el-tabs></div></div>