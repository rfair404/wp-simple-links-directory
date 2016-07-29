<?php 

namespace SimpleLinkDirectory;
use SimpleLinkDirectory\Common as Common;

/**
 * The Init class for the plugin, kicks everything off, WordPress sytle
 * @since 0.1
 */ 
class Init{
    public $common = false;
    public $admin = false;
    public $display = false;
    
    function init(){
        add_action( 'plugins_loaded', array( $this, 'load' ) , 10 );
    }
    /**
     * load pulls in the required files for the plugin
     */
    function load(){
        //load the common files - e.g. those used on both admin and non admin loads
        require_once( 'includes/common.php' );
    }
    
    function get_common(){
        return $this->common;
    }
    
    function set_common(){
        $this->common = new Common();
    }
}