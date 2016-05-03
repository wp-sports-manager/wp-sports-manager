<?php

class SampleTest extends WP_UnitTestCase {

	function test_pluginActif() {
		$pluginActif = is_plugin_active( 'wp-sports-manager/wp-sports-manager.php' );
		$this->assertTrue( $pluginActif );
	}

	function test_pluginInstallation() {
		$role = get_role( 'members_club' );
		$this->assertEquals( $role->name, 'members_club' );
		$role = get_role( 'desk_officer' );
		$this->assertEquals( $role->name, 'desk_officer' );
		$role = get_role( 'coach' );
		$this->assertEquals( $role->name, 'coach' );
		$role = get_role( 'assistant' );
		$this->assertEquals( $role->name, 'assistant' );
		$role = get_role( 'player' );
		$this->assertEquals( $role->name, 'player' );
		$role = get_role( 'volunteer' );
		$this->assertEquals( $role->name, 'volunteer' );
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

	function test_customPostTypePlace() {
		$cpt = post_type_exists( 'wpsm_places' );
		$this->assertTrue( $cpt );
	}

	function test_customTaxCompetition() {
		$competitions = taxonomy_exists('wpsm_competition');
		$this->assertTrue( $competitions );
	}

	function test_customTaxTypologies() {
		$typologies = taxonomy_exists('wpsm_typology');
		$this->assertTrue( $typologies );
	}

	function test_customSeason() {
		$seasons = taxonomy_exists('wpsm_season');
		$this->assertTrue( $seasons );
	}

	function test_customMembersTypology() {
		$typology = taxonomy_exists('wpsm_members_typology');
		$this->assertTrue( $typology );
	}

	// todo : test if menu exist


}

