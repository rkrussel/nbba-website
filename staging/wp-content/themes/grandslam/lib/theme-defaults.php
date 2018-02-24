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
	echo '<h2 class="invisble">Footer</h2>
<div class="grid-footer">
	<div class="footer-social-block">
	<h3 class="invisible">Social Media</h3>
	<div class="social-block">
	<ul>
	<li><a href="#"><img src="' . get_stylesheet_directory_uri() . '/lib/assets/twitter.png" alt="Twitter"></a></li>
	<li><a href="#"><img src="' . get_stylesheet_directory_uri() . '/lib/assets/instagram.png" alt="Instagram"></a></li>
	<li><a href="#"><img src="' . get_stylesheet_directory_uri() . '/lib/assets/youtube.png" alt="YouTube"></a></li>
	<li><a href="#"><img src="' . get_stylesheet_directory_uri() . '/lib/assets/facebook.png" alt="Facebook"></a></li>
	</div>
	<div class="calendar-block">
	<h3 class="invisible">Calender</h3>' . do_shortcode('[tribe_events]') . '
<div class="cat-block">
<h3>About Us</h3>
<ul>
<li><a href="#">About the NBBA</a></li>
<li><a href="#">Board of Directors</a></li>
<li><a href=#">Hall of Fame</a></li>
<li><a href=#">Bylaws</a></li>
</ul>
</div>

<div class="cat-block">
<h3>Getting Started</h3>
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
<h3>World Series and Tournaments</h3>
<ul>
<li><a href=#">2018 World Series</a></li>
<li><a href=#">Hosting the World Series</a></li>
<li><a href=#">Regional Tournaments</a></li>
<li><a href="#">2019 World Series</a></li>
</ul>
</div>

<div class="cat-block">
<h3>Help and Contact</h3>
<ul>
<li><a href="#">Contact the NBBA</a></li>
<li><a href="#">Contact a team</a></li>
<li><a href="#">Accessibility Statement</a></li>
<li><a href="#">Submit website feedback</a></li>
</ul>
</div>
</div>';
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
	echo '<form id="searchbar" role="search" method="get" class="search-form" action="' . get_site_url() . '/">
	<label><span class="invisible">Search the NBBA</span>
		<input type="search" class="search-field" placeholder="Search the NBBA..." value="" name="s" title="Search" />
	</label><input type="submit" class="search-submit" value="Search" />
</form>';
	echo '<ul class="utility-links" id="utility-links">';
	echo '<li><a href="#" id="searchtoggl" aria-label="Toggle Search" role="button" onclick="toggle_search()"><i class="fa fa-search fa-lg"></i></a></li>';
	echo '</ul>';
}

