<?php

class InstallationTest extends WP_UnitTestCase {

	function test_pluginActif() {
		$pluginActif = is_plugin_active( 'wp-sports-manager/wpsportsmanager.php' );
		$this->assertTrue( $pluginActif );
	}

	function test_pluginInstallation() {
		$role = get_role( 'members_club' );
		$this->assertEquals( $role->name, 'members_club' );
	}

	function test_customPostTypeTeam() {
		$team_cpt = post_type_exists( 'wpsm_teams' );
		$this->assertTrue( $team_cpt );
	}

	function test_customPostTypeMatch() {
		$match_cpt = post_type_exists( 'wpsm_matchs' );
		$this->assertTrue( $match_cpt );
	}
}

