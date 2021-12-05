<?php

/**
 * Fired during plugin deactivation
 */
class Slgf_Deactivator {
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
