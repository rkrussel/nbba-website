<?

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

Lorem ipsum dolor sit amet, tempor nonumes qui eu, quodsi molestie appareat et quo. Ex delicata sapientem sit, per reprimique contentiones no, habeo persius phaedrum ne ius. Cu rebum ponderum mei. Dolores democritum reformidans an nec, ancillae maluisset concludaturque sed cu, eu sed nemore euismod delicatissimi. Ex suscipit incorrupte cum, at mel animal mnesarchum. In primis habemus splendide cum, feugiat incorrupte at vix.</p>

<p>His cu illud ceteros salutatus, sed mazim principes cu, vix et labores facilisi. Pri an odio libris discere. Sea ei adipisci sententiae, cu usu movet consequat. Philosophia definitionem eum ad. Et cibo laudem per, adipisci voluptaria dissentiunt ea usu, utinam repudiare elaboraret at mea.</p>

<nav class="quick-actions">
<ul>
<li><a href="#">Locate a team</a></li>
<li><a href="#">Start a new team</a></li>
<li><a href="#">Purchase equipment</a></li>
<li><a href="#">Get 2018 World Series info</a></li>
<li><a href="#">Make a donation</a></li>
</ul>
</nav>

<div class="grid-blocks">
<div class="block">
<h2>Beep Baseball 101</h2>
<p>Beep Baseball 101 content goes here.</p>
</div>

<div class="block">
<h2>Player Spotlight</h2>
<p>Player Spotlight loop block goes here.</p>
</div>

<div class="block">
<h2>Between the Lines</h2>
<div role="application">
<div id="tabpanel1" class="tabpanel">
<ul class="tablist" role="tablist">
<li id="tab1" class="tab selected" aria-controls="panel1" aria-selected="true" role="tab" tabindex="0">Photos</li>
<li id="tab2" class="tab" aria-controls="panel2" aria-selected="false" role="tab" tabindex="0">Videos</li>
<li id="tab3" class="tab" aria-controls="panel3" aria-selected="false" role="tab" tabindex="0">Podcasts</li>
</ul>

<div id="panel1" class="panel" aria-labelledby="tab1" role="tabpanel">
<h3>Photos</h3>
</div>

<div id="panel2" class="panel" aria-labelledby="tab2" role="tabpanel">
<h3>Videos</h3>
</div>

<div id="panel3" class="panel" aria-labelledby="tab3" role="tabpanel">
<h3>Podcasts</h3>
</div>
</div>
</div>
</div>

<div class="block">
<h2>On Deck</h2>
<p>Calendar block goes here.</p>
</div>

<div class="block">
<h2>Breaking News</h2>
<p>News and announcements block goes here.</p>
</div>

<div class="block">
<h2>Latest on NBBA.org</h2>
<p>Blog block goes here.</p>
</div>

<div class="block">
<h2>Get in the Game</h2>
<ul class="block-a4-list">
<li><a href="#">Make a donation</a></li>
<li><a href="#">Become a sponsor</a></li>
<li><a href="#">Find a team near you</a></li>
<li><a href="#">Start a new team</a></li>
</ul>
</div>

<div class="block">
<h2>Sponsors</h2>
<p>Sponsor block and logos go here.</p>
</div>


</div>
<?php
}

genesis();