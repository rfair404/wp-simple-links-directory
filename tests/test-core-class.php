<?php
		
class CoreClassTests extends WP_UnitTestCase {
	/**
	 * test that the core plugin class exists
	 */
	function test_core_plugin_class_exists() {
		$this->assertTrue( class_exists( 'SimpleLinkDirectory\SimpleLinkDirectory' ) );
	}
	/** 
	 * test SimpleLinkDirectory::load is added to plugins_loaded action
	 */
	function test_core_plugin_loader_added_to_plugins_loaded() {
	    $t = new SimpleLinkDirectory\SimpleLinkDirectory();
	    $t->init();
	    $this->assertEquals( 10, has_action( 'plugins_loaded', array( $t, 'load') ) );
	}
	
	function test_get_common_returns_false_on_load() {
		$t = new SimpleLinkDirectory\SimpleLinkDirectory();
		$this->assertFalse( $t->get_common() );
	}
	
	function test_set_common_changes_common_to_class_instance() {
		$t = new SimpleLinkDirectory\SimpleLinkDirectory();
		$t->set_common();
		$this->assertTrue( is_a( $t->get_common(), 'SimpleLinkDirectory\Common' ) );
	}
	
	function test_set_common_is_run_on_plugins_loaded() {
		$t = new SimpleLinkDirectory\SimpleLinkDirectory();
		$t->init();
		$this->assertEquals( 10, has_action( 'plugins_loaded', array( $t, 'set_common') ) );
	}
}