<?php

class SampleTest extends WP_UnitTestCase {

	function test_pluginActif() {
		$pluginActif = is_plugin_active( 'wp-sports-manager/wpsportsmanager.php' );
		$this->assertTrue( $pluginActif );
	}

	function test_pluginInstallation() {
		$role = get_role( 'members_club' );
		$this->assertEquals( $role->name, 'members_club' );
	}
}

