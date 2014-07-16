<?php
/*
Plugin Name: MSP Hello World
Description: Create hello world message
Version: 1.0
Author: Author's name
Author URI: http://authorsite.com/
Plugin URI: http://authorsite.com/msp-helloworld
*/


/**
 * Define some useful constants
 **/
define('MSP_HELLOWORLD_VERSION', '1.0');
define('MSP_HELLOWORLD_DIR', plugin_dir_path(__FILE__));
define('MSP_HELLOWORLD_URL', plugin_dir_url(__FILE__));



/**
 * Load files
 * 
 **/
function msp_helloworld_load(){
		
    if(is_admin()) //load admin files only in admin
        require_once(MSP_HELLOWORLD_DIR.'includes/admin.php');
        
    require_once(MSP_HELLOWORLD_DIR.'includes/core.php');
}

msp_helloworld_load();



/**
 * Activation, Deactivation and Uninstall Functions
 * 
 **/
register_activation_hook(__FILE__, 'msp_helloworld_activation');
register_deactivation_hook(__FILE__, 'msp_helloworld_deactivation');


function msp_helloworld_activation() {
    
	//actions to perform once on plugin activation go here    
    
	
    //register uninstaller
    register_uninstall_hook(__FILE__, 'msp_helloworld_uninstall');
}

function msp_helloworld_deactivation() {
    
	// actions to perform once on plugin deactivation go here
	    
}

function msp_helloworld_uninstall(){
    
    //actions to perform once on plugin uninstall go here
	    
}


?>