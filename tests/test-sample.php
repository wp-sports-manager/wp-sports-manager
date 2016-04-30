<?php

class SampleTest extends WP_UnitTestCase {

	function test_pluginActif() {
		$pluginActif = is_plugin_active( 'wp-sports-manager/wp-sports-manager.php' );
		$this->assertTrue( $pluginActif );
	}

	function test_pluginInstallation() {
		$role = get_role( 'members_club' );
		$this->assertEquals( $role->name, 'members_club' );
	}

	function test_customPostTypeTeam() {
		$cpt = post_type_exists( 'wpsm_teams' );
		$this->assertTrue( $cpt );
	}

	function test_customPostTypeMatch() {
		$cpt = post_type_exists( 'wpsm_matchs' );
		$this->assertTrue( $cpt );
	}

	function test_customPostTypeOpponent() {
		$cpt = post_type_exists( 'wpsm_opponents' );
		$this->assertTrue( $cpt );
	}

	function test_customPostTypeTraining() {
		$cpt = post_type_exists( 'wpsm_trainings' );
		$this->assertTrue( $cpt );
	}

	function test_customPostTypeTournament() {
		$cpt = post_type_exists( 'wpsm_tournaments' );
		$this->assertTrue( $cpt );
	}

	function test_customPostTypeMember() {
		$cpt = post_type_exists( 'wpsm_members' );
		$this->assertTrue( $cpt );
	}
}

