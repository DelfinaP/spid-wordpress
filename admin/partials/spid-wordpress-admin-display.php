<?php
/*
 * SPID-Wordpress - Plugin che connette Wordpress e SPID
 * Copyright (C) 2016 Ludovico Pavesi, Valerio Bozzolan, spid-wordpress contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       asd.asd.asd
 * @since      1.0.0
 *
 * @package    Spid_Wordpress
 * @subpackage Spid_Wordpress/admin/partials
 */

// TODO: inutile?
if( ! current_user_can('manage_options') ) {
	return;
}

// TODO: se non è standard\best practice, levare...
// Check if the user have submitted the settings
// Wordpress will add the "settings-updated" $_GET parameter to the url
if( isset( $_GET['settings-updated'] ) ) {
	// Saved message
	add_settings_error('spid_messages', 'spid_message', __("SPID settings saved!", 'spid'), 'updated');
}

// Show error/update messages
settings_errors('spid_messages');

?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<form action="options.php" method="post">
		<?php
		// Output security fields for the registered option group
		settings_fields( $this->plugin_name );

		// Call sections of registered option group
		do_settings_sections( $this->plugin_name );

		// Save button
		submit_button( __("Save Settings", 'spid') );
		?>
	</form>
</div>
