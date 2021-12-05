<?php

/**
 * Register all actions and filters for the plugin
 */
class Slgf_Loader {

	protected $actions;
	protected $filters;
	protected $shortcodes;

	public function __construct() {
		$this->actions = array();
		$this->filters = array();
		$this->shortcodes = array();
	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 */
	public function add_shortcode( $code, $component, $callback ){
		$this->shortcodes = $this->addShortcodes($this->shortcodes, $code, $component, $callback);
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single collection.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}


	/**
	 * A utility function that is used to register the shortcode into a single collection.
	 */
	private function addShortcodes($shortcodes, $code, $component, $callback){
		$shortcodes[] = array(
			'shortcode'  => $code,
			'component'  => $component,
			'callback'   => $callback
		);
		return $shortcodes;
	}

	/**
	 * Register the filters, actions and shortcodes with WordPress.
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->shortcodes as $shortcode ) {
			add_shortcode( $shortcode['shortcode'], array( $shortcode['component'], $shortcode['callback'] ) );
		}

	}

}
