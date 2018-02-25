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
<div class="fp-welcome-box">
<h1>Welcome to the Home of Beep Baseball</h1>
<p>Welcome to the National Beep Baseball Association: facilitating and providing the adaptive version of America's favorite pastime for the blind, low-vision and legally blind since 1976. This is your primary source and home to find information about the game of beep baseball, so take a peek.</p>
</div>

<div class="quick-actions-table">
<ul class="quick-actions">
<li><a href="' . get_site_url() . '/teams/">Locate a team</a></li>
<li><a href="#">Start a new team</a></li>
<li><a href="' . get_site_url() . '/equipment/">Purchase equipment</a></li>
<li><a href="#">Get 2018 World Series info</a></li>
<li><a href="' . get_site_url() . '/donate/">Make a donation</a></li>
</ul>
</div>

<div class="grid-blocks">
<div class="block">
<h2>Beep Baseball 101</h2>
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/beep-ball-101-picture.png" alt="A close-up view of a beep ball resting in a pitcher&apos;s mit on home plate." class="grid-block-imgs">
<p>Beep Baseball 101 content goes here.</p>
</div>

<div class="block">
<h2>Player Spotlight</h2><?php
$players = array(

	'post_type' => 'player_spotlight',
	'posts_per_page' => 1);

$playersblock = new wp_query($players);
if($playersblock->have_posts()) {
while($playersblock->have_posts()): $playersblock->the_post();
	$psimg = get_field('avatar_spotlight');

	echo '<img src="' . $psimg['url'] . '" alt="' . $psimg['alt'] . '" class="spotlight-img-fp" style="clear:both;">';
	echo '<ul class="ps-details-fp">';
	echo '<li>Name: ' . get_the_title() . '</li>';
	echo '<li>Team: ' . get_field('team_spotlight') . '</li>';
	echo '<li>Years Active: ' . get_field('years_spotlight') . '</li>';
	echo '</ul>';
	echo '<p>' . get_field('quote_spotlight') . '</p>';

endwhile;
	wp_reset_postdata();
} ?>
</div>

<div class="block">
<h2>Between the Lines</h2>
	<img src="<?php echo get_site_url();  ?>/wp-content/uploads/2018/02/between-the-lines-photo.png" alt="A few players huddle around their pitcher, who covers his mouth with his mit." class="grid-block-imgs">
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

<div class="block">
<h2><a href="' . get_site_url() . '/calendar/">On Deck</a></h2>
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/calendar-picture.png" alt="Two players sit with a man at a table." class="grid-block-imgs">
<?php
$today = date("Y-m-d");  //today's date in MySQL format without the time. Used to compare start date custom field in events.
$cal_args = array(
        'post_type' => array('tribe_events',
	'posts_per_page' => 5),
		'meta_query' => array(
				array(
				'key' => '_EventStartDate',
				'value' => $today,
				'compare' => '>=') ) );
$cal_query = new WP_Query($cal_args);

	if($cal_query->have_posts()) {
	echo '<ul class="cal-list-fp">';
	while($cal_query->have_posts()): $cal_query->the_post();

	echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> - ' . tribe_get_start_date() . '</li>';
	endwhile;
	wp_reset_postdata();
}

?>
</div>

<div class="block">
<h2><a href="' . get_site_url() . '" title="Go to the NBBA news archive.">Breaking News</a></h2>
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/breaking-news-picture.png" alt="A player hits the ball and barrels toward third base." class="grid-block-imgs">

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
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/latest-photo.png" alt="A player readies her swing as a ball heads toward home plate." class="grid-block-imgs">
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
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/experience-photo.png" alt="A player from the Taiwan Home Run holds hands with a young girl while walking back to the dugout." class="grid-block-imgs">
<ul class="block-a4-list">
<li><a href="' . get_site_url() . '/donate/">Make a donation</a></li>
<li><a href="#">Become a sponsor</a></li>
<li><a href="' . get_site_url() . '/teams/">Find a team near you</a></li>
<li><a href="#">Start a new team</a></li>
</ul>
</div>

<div class="block">
<h2>Sponsors</h2>
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/support-picture.png" alt="A team stands together in a huddle." class="grid-block-imgs">
<p>Sponsor block and logos go here.</p>
</div>


</div>
<?php
}

genesis();