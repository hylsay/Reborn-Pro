	<footer><?php
if (get_option('footer版权文本')) {	echo '<div class="copyright">'.get_option('footer版权文本').'</div>';	}if (get_option('footer备案信息')) {	echo '<a class="beian" href="'.get_option('footer备案链接').'" target="_blank">'.get_option('footer备案信息').'</a>';	}?></footer></div><!-- content --></div><!-- main --><div class="float_btns"><?php
if (get_option('enable_backToTop')) {	echo '<div class="backToTop" @click="backToTop" :class="{float_btn_hide:scroll < 200}"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>';	}?><el-popover
ref="announcement"
placement="left"
:title="announcement_title"
width="200"
trigger="click"><div v-html="announcement"></div></el-popover><div class="info" :class="is_announcement_viewed(announcement)" @click="set_announcement(announcement)" slot="reference" v-popover:announcement v-show="announcement"><i class="fa fa-info-circle" aria-hidden="true"></i></div></div><script>
pandastudio_framework.post_type = <?php echo "'".get_post_type()."'"; ?>;	pandastudio_framework.post_id = <?php echo "'".get_the_ID()."'"; ?>;	pandastudio_framework.is_single = <?php if(is_single()){echo 'true';}else{echo 'false';} ?>;	pandastudio_framework.is_home = <?php if(is_home()){echo 'true';}else{echo 'false';} ?>;</script><script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/theme.js?version=<?php echo wp_get_theme()->get( 'Version' ) ?>"></script></div><!-- #wrap --><?php wp_footer() ?><?php
if (get_option('custom_javascript')) {	echo "<script>try{".get_option('custom_javascript')."}catch(e){console.log(e)}</script>";}if (get_option('custom_css')) {	echo "<style>".get_option('custom_css')."</style>";}?><?php
if ( is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );?></body></html>