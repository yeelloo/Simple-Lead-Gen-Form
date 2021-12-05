<?php

/**
 * Define the internationalization functionality
 */
class Slgf_i18n {
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'slgf',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
