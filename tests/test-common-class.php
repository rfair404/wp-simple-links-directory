<?php

class TestCommonClass extends WP_UnitTestCase{
    /**
	 * test class common exists
	 */
	function test_common_class_file_exists() {
	    /**
	     * File Structure
	     * plugin_root
	     * -includes
	     * --common.php
	     * -tests
	     * --test-common-class.php
	     */
		$this->assertTrue( file_exists( dirname( dirname( __FILE__ ) ) . '/includes/common.php' ) );
	}
	
	function test_common_class_exists() {
	    //$this->assertEquals( 'foo', dirname( dirname( __FILE__ ) ) . '/includes/common.php' );
		require_once( dirname( dirname( __FILE__ ) ) . '/includes/common.php' );
	    // $c = new Common();
        // $this->assertTrue( method_exists( $c->init() ) );
	}
	
}