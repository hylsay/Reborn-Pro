<?php
if (get_option("enable_galleryNav")=="checked") {
?><div class="categoryTab-full"><div class="categoryTab-content"><div
pandaTab
active-class=".current-menu-item,.current-menu-ancestor"
sub-class=".sub-menu"
prev-text='<i class="fa fa-angle-left" aria-hidden="true"></i>'
next-text='<i class="fa fa-angle-right" aria-hidden="true"></i>'
sub-trigger=""
auto-scrolling
native-scrolling><?php
if (has_nav_menu( 'galleryNav' )) {
wp_nav_menu( array( 'theme_location' => 'galleryNav','container' => false ) );
} else {
echo '
<ul class="menu"><li><a>请在后台设置菜单</a></li></ul>
';
}
?></div></div></div><?php 
}
?>