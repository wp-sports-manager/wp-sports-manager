<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://sportsmanager.club
 * @since      0.0.1
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/views
 */
?>

<div class="wrap wpsm">
	<h1>WP Sports Manager</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, id! Molestias numquam doloribus nam quam enim totam dicta, tenetur minus, quisquam nemo quod dolor! Maiores perferendis, inventore quam. Vel, ducimus.</p>
</div>

<?php

if( post_type_exists( 'wpsm_teams' ) ){
	echo 'true';
}else{
	echo 'false';
}

?>

<a href="edit-tags.php?taxonomy=wpsm_season&amp;post_type=wpsm_matchs">nouvelle saison</a>

<h3>Team without trainings</h3>
<h3>Players without teams</h3>
<h3>Teams</h3>
<h3>Players</h3>
<h3>Next matchs</h3>
<h3>Next tournaments</h3>
<h3>Season {{current}}</h3>