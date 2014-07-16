<?php
/*
        Plugin Name: Team members
        Plugin URI:
        Description: Plugin for saving team members data from admin
        Author: PM
        Version: 1.0
        Author URI:
        */

        function tm_admin()
        {
			global $wpdb;
        	include('tm_list_members.php');
		}

		function tm_add_member()
		{
			global $wpdb;
        	include('tm_import_admin.php');
		}

		function tm_list_designations()
		{
			global $wpdb;
        	include('tm_list_designations.php');
		}

		function tm_manage_designation()
		{
			global $wpdb;
        	include('tm_manage_designation.php');
		}

		function tm_admin_actions() {
			add_menu_page("Team members", "Team members", 1, "tm_admin", "tm_admin");
			add_submenu_page( 'tm_admin', 'Add member', 'Add member', 1, 'tm_admin_add_member', 'tm_add_member' );
			add_submenu_page( 'tm_admin', 'List Designations', 'List Designations', 1, 'tm_admin_list_designations', 'tm_list_designations' );
			add_submenu_page( 'tm_admin', 'Add Designations', 'Add Designations', 1, 'tm_admin_manage_designations', 'tm_manage_designation' );
		}

		function tm_members()
		{
			global $wpdb;
			include('tm_get_members_list.php');
		}

		add_action('admin_menu', 'tm_admin_actions');

		add_shortcode( 'tm_members', 'tm_members' );
    ?>