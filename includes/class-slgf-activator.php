<?php

/**
 * Fired during plugin activation
 */
class Slgf_Activator {
	public static function activate() {
		SELF::versionCheck();
		flush_rewrite_rules();
	}

	
	/**
     * Check env requirements
     * Minimum PHP 7.2
     * Minimum WP 5.0
     * @since    1.0.0
     */
    public static function versionCheck( $wp = '5.0', $php = '7.2' ) {
        global $wp_version;
        if ( version_compare( PHP_VERSION, $php, '<' ) )
            $flag = 'PHP';
        elseif
            ( version_compare( $wp_version, $wp, '<' ) )
            $flag = 'WordPress';
        else
            return;
        $version = 'PHP' == $flag ? $php : $wp;
        deactivate_plugins( basename( __FILE__ ) );
        wp_die('<p>The <strong>Simple Lead Gen Form</strong> plugin requires '.$flag.'  version '.$version.' or greater. Your version is PHP: '.PHP_VERSION.', WP: '.$wp_version.'</p>','Plugin Activation Error',  array( 'response'=>200, 'back_link'=>TRUE ) );
    }
}
