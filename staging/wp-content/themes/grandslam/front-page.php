<?php
/**
---
Template name: Front page
Description: Used for all modifications made to the front page of the Grand Slam theme by the NBBA Web Team.
---
**/

remove_action('genesis_entry_content', 'genesis_do_post_content');
add_action('genesis_entry_content', 'nbba_front_page_content');

function nbba_front_page_content() {

?>

<h1>Welcome to the National Beep Baseball Association</h1>

testing 2 asdf Lorem ipsum dolor sit amet, tempor nonumes qui eu, quodsi molestie appareat et quo. Ex delicata sapientem sit, per reprimique contentiones no, habeo persius phaedrum ne ius. Cu rebum ponderum mei. Dolores democritum reformidans an nec, ancillae maluisset concludaturque sed cu, eu sed nemore euismod delicatissimi. Ex suscipit incorrupte cum, at mel animal mnesarchum. In primis habemus splendide cum, feugiat incorrupte at vix.</p>

<p>His cu illud ceteros salutatus, sed mazim principes cu, vix et labores facilisi. Pri an odio libris discere. Sea ei adipisci sententiae, cu usu movet consequat. Philosophia definitionem eum ad. Et cibo laudem per, adipisci voluptaria dissentiunt ea usu, utinam repudiare elaboraret at mea.</p>

<nav class="quick-actions">
<ul>
<li><a href="' . get_site_url() . '/teams/">Locate a team</a></li>
<li><a href="#">Start a new team</a></li>
<li><a href="' . get_site_url() . '/equipment/">Purchase equipment</a></li>
<li><a href="#">Get 2018 World Series info</a></li>
<li><a href="' . get_site_url() . '/donate/">Make a donation</a></li>
</ul>
</nav>

<div class="grid-blocks">
<div class="block">
<h2>Beep Baseball 101</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Beep Baseball 101" width="454" height="256" class="block-img">
<p>Beep Baseball 101 content goes here.</p>
</div>

<div class="block">
<h2>Player Spotlight</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Player Spotlight" width="454" height="256" class="block-img">
<p>Player Spotlight loop block goes here.</p>
</div>

<div class="block">
<h2>Between the Lines</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Between the lines" width="454" height="256" class="block-img">
	<div role="application">
<div class="js-tabs">
<ul class="js-tablist" data-existing-hx="h2">
<li class="js-tablist__item"><a href="#photos" class="js-tablist__link">Photos</a></li>
<li class="js-tablist__item"><a href="#videos" class="js-tablist__link">Videos</a></li>
<li class="js-tablist__item"><a href="#podcasts" class="js-tablist__link">Podcasts</a></li>
</ul>

<div class="js-tabcontent" id="photos">
<h2 class="invisible">Photos</h2>
</div>

<div class="js-tabcontent" id="videos">
<h2 class="invisible">Videos</h2>
</div>

<div class="js-tabcontent" id="podcasts">
<h2 class="invisible">Podcasts</h2>
</div>
</div>
</div>
	</div>

<div class="block">
<h2>On Deck</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="On Deck" width="454" height="256" class="block-img">
<p>Calendar block goes here.</p>
</div>

<div class="block">
<h2><a href="' . get_site_url() . '" title="Go to the NBBA news archive.">Breaking News</a></h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Breaking News" width="454" height="256" class="block-img">

<?php

	$news = array(
	'post_type' => 'news',
	'posts_per_page' => 5);

	$newsblock = new wp_query($news);
	if($newsblock->have_posts()) {
	echo '<ul class="no-bullets">';
	while($newsblock->have_posts()): $newsblock->the_post();
	echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> - ' . get_the_date('M j') . '</li>';

	endwhile;
	echo '</ul>';
	wp_reset_postdata();
}
?>

</div>

<div class="block">
<h2><a href="' . get_site_url() . '" title="Go to the NBBA blog.">Latest on NBBA.org</a></h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Latest on NBBA.org" width="454" height="256" class="block-img">
<?php

$blog = array(
	'post_type' => 'post',
	'posts_per_page' => 5);
$blogblock = new wp_query($blog);
	if($blogblock->have_posts()) {
	echo '<ul class="no-bullets">';
	while($blogblock->have_posts()): $blogblock->the_post();
	echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> - ' . get_the_date('M j') . '</li>';
	endwhile;
	echo '</ul>';
	wp_reset_postdata();
}
?>

</div>

<div class="block">
<h2>Get in the Game</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Get in the Game" width="454" height="256" class="block-img">
<ul class="block-a4-list">
<li><a href="' . get_site_url() . '/donate/">Make a donation</a></li>
<li><a href="#">Become a sponsor</a></li>
<li><a href="' . get_site_url() . '/teams/">Find a team near you</a></li>
<li><a href="#">Start a new team</a></li>
</ul>
</div>

<div class="block">
<h2>Sponsors</h2>
	<img src="http://localhost/nbba-website/staging/wp-content/uploads/2018/02/section-pictures.png" alt="Sponsors" width="454" height="256" class="block-img">
<p>Sponsor block and logos go here.</p>
</div>


</div>
<?php
}

genesis();