<?php
/**
Grand Slam
---
This file adds customizations to the Grand Slam theme built on the Genesis framework for WordPress.
* Author: NBBA Web Team
**/

/** Add category grid to footer **/

add_action( 'genesis_footer', 'nbba_footer_blocks', 5 );
function nbba_footer_blocks() {
$grid = '<div class="grid-footer">
<div class="cat-block">
<h2>Category #1</h2>
<ul>
<li><a href="#">Link 1</a></li>
<li><a href="#">Link 2</a></li>
<li><a href="#">Link 3</a></li>
<li><a href="#">Link 4</a></li>
</ul>
</div>

<div class="cat-block">
<h2>Category #2</h2>
<ul>
<li><a href="#">Link 1</a></li>
<li><a href="#">Link 2</a></li>
<li><a href="#">Link 3</a></li>
<li><a href="#">Link 4</a></li>
</ul>
</div>

<div class="cat-block">
<h2>Category #3</h2>
<ul>
<li><a href="#">Link 1</a></li>
<li><a href="#">Link 2</a></li>
<li><a href="#">Link 3</a></li>
<li><a href="#">Link 4</a></li>
</ul>
</div>

<div class="cat-block">
<h2>Category #4</h2>
<ul>
<li><a href="#">Link 1</a></li>
<li><a href="#">Link 2</a></li>
<li><a href="#">Link 3</a></li>
<li><a href="#">Link 4</a></li>
</ul>
</div>
</div>';
echo $grid;
}

/** Modify site credits **/

add_filter( 'genesis_footer_creds_text', 'nbba_creds' );
function nbba_creds() {
$creds = '</p>&copy; ' . date('Y') . ' <a href="' . get_site_url() . '" rel="nofollow">National Beep Baseball Association</a></p>';
return $creds;
}

/** Add navigation, search and utility options **/

remove_action('genesis_header_right', 'genesis_do_header_right');
add_action('genesis_header_right', 'JR_header_right');
function JR_header_right() {

	echo '<nav aria-label="Main Menu">';
	      wp_nav_menu( array(
	'wp_term' => 'Primary',
	'container'      => false,
	'menu_class'     => 'genesis-nav-menu') );

	echo '</nav>';
	get_search_form();
	echo '<nav aria-label="Utility">';
	echo '<ul class="utility-links">';
	echo '<li><a href=#">Util 1</a></li>';
	echo '<li><a href="#">Util 2</a></li>';
	echo '<li><a href="#">Util 3</a></li>';
	echo '</ul>';
	echo '</nav>';
}