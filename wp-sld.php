<?php

/*
* Plugin Name: Simple Link Directory
* Author: Russell Fair
* Description: A minimialist approach to a link directory
* Version: 0.1
*/
load_plugin_textdomain( 'simple-link-directory', false, '/languages/' );

require_once( 'simple-link-directory-init.php' );
new SimpleLinkDirectory\Init();
