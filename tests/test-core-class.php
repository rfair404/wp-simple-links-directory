<?php
		
class CoreClassTests extends WP_UnitTestCase {
	/**
	 * test that the core plugin class exists
	 */
	function test_core_plugin_class_exists() {
		// Replace this with some actual testing code.
		$this->assertTrue( class_exists( 'SimpleLinkDirectory\Init' ) );
	}
	/** 
	 * test Init::load is added to plugins_loaded action
	 */
	function test_core_plugin_loader_added_to_plugins_loaded() {
	    $t = new SimpleLinkDirectory\Init();
	    $t->init();
	    $this->assertEquals( 10, has_action( 'plugins_loaded', array( $t, 'load') ) );
	}
	
	function test_get_common_returns_false_on_load() {
		$t = new SimpleLinkDirectory\Init();
		$this->assertFalse( $t->get_common() );
	}
	
	function test_set_common_changes_common_to_class_instance() {
		$t = new SimpleLinkDirectory\Init();
		//$t->load();
		$t->set_common();
		$this->assertTrue( is_a( $t->get_common(), 'SimpleLinkDirectory\Common' ) );
	}
	
	//port these to seperate class testing files
	
	// function test_admin_class_file_exists() {
	// 	//$this->assertTrue( file_exists( dirname( dirname( __FILE__ ) ) . '/includes/admin.php' ) );
	// }
	// function test_frontend_class_file_exists() {
	// 	//$this->assertTrue( file_exists( dirname( dirname( __FILE__ ) ) . '/includes/frontend.php' ) );
	// }
}