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
	    $c = new SimpleLinkDirectory\Common();
        $this->assertTrue( method_exists( $c, 'init' ) );
	}
	
	function test_common_class_adds_register_post_type_to_init() {
		require_once( dirname( dirname( __FILE__ ) ) . '/includes/common.php' );
	    $c = new SimpleLinkDirectory\Common();
	    $c->init();
	    $this->assertEquals( 10, has_action( 'init', array( $c, 'register_post_type') ) );
	}
	
	function test_common_register_post_type_registers_post_type() {
	    $c = new SimpleLinkDirectory\Common();
	    $c->register_post_type();
	    $post_types = get_post_types();
	    $this->assertTrue( isset( $post_types['slink'] ) );
	}
	
	function test_common_register_post_type_registers_public_post() {
		$c = new SimpleLinkDirectory\Common();
		$c->init();
	    $c->register_post_type();
		$slink_post_type = get_post_type_object( 'slink' );
	    $this->assertTrue( $slink_post_type->public );
	}
	
	function test_common_get_post_type_args_returns_array() {
		$c = new SimpleLinkDirectory\Common();
		$args = $c->get_post_type_args();
		$this->assertTrue( is_array( $args ) );
	}
	
	/** Note this tests the en/EN version of the lables, for i18n purposes, refactor using other test languages */
	function test_common_register_post_type_generates_labels() {
		$c = new SimpleLinkDirectory\Common();
	    $c->init();
	    $c->register_post_type();
		$slink_post_type = get_post_type_object( 'slink' );
	    $this->assertEquals( $slink_post_type->labels->name, 'Links' );
	 	$this->assertEquals( $slink_post_type->labels->singular_name, 'Link' );   
	}
	
	function test_default_post_type_filter_is_added_to_post_type_args() {
		$c = new SimpleLinkDirectory\Common();
		$c->init();
		$this->assertEquals( 10, has_filter( 'wpsld_post_type_args', array( $c, 'default_post_type_args') ) );
	}
	
}