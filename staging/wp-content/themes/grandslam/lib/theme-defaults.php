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
<h4>About Us</h4>
<ul>
<li><a href="#">About the NBBA</a></li>
<li><a href="#">Board of Directors</a></li>
<li><a href=#">Hall of Fame</a></li>
<li><a href=#">Bylaws</a></li>
</ul>
</div>

<div class="cat-block">
<h4>Getting Started</h4>
<ul>
<li><a href="#">Beep Baseball 101</a></li>
<li><a href=#">Find a Team</a></li>
<li><a href=#">Start a Team</a></li>
<li><a href=#">Forms and registration</a></li>
<li><a href=#">Pitcher&apos;s Guide</a></li>
<li><a href=#">Defense Manual</a></li>
</ul>
</div>

<div class="cat-block">
<h4>World Series and Tournaments</h4>
<ul>
<li><a href=#">2018 World Series</a></li>
<li><a href=#">Hosting the World Series</a></li>
<li><a href=#">Regional Tournaments</a></li>
<li><a href="#">2019 World Series</a></li>
</ul>
</div>

<div class="cat-block">
<h4>Help and Contact</h4>
<ul>
<li><a href="#">Contact the NBBA</a></li>
<li><a href="#">Contact a team</a></li>
<li><a href="#">Submit website feedback</a></li>
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
	echo get_search_form();
	echo '<nav aria-label="Utility">';
	echo '<ul class="utility-links">';
	echo '<li><a href=#">Util 1</a></li>';
	echo '<li><a href="#">Util 2</a></li>';
	echo '</ul>';
	echo '</nav>';
}

