<?php

/**
 * The public-facing functionality of the plugin.
 */
define( 'SLGE_PUBLIC__DIR', plugin_dir_path( __FILE__ ) );
define( 'SLGE_PUBLIC__URL', plugins_url( '',__FILE__ ) );

class Slgf_Public {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		
	}

	public function enqueue_scripts() {
		
	}

	public function slgf_get_datetime($timezone='America/New_York')
	{
		$_url = "http://worldtimeapi.org/api/timezone/{$timezone}";
		$response = wp_remote_get( $_url );
 
		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
		    $body    = $response['body'];
		    $datetime= json_decode($body);
		    return $datetime->datetime;
		} else {
			return '';
		}
	}

	public function slgf_get_form($atts, $content = null){
		$a = shortcode_atts( array(
			'title' 	=> __('A Simple Lead Gen Form', 'slgf'),
			'name' 		=> __('Name', 'slgf'),
			'name-max' 	=> 50,
			'phone' 	=> __('Phone Number', 'slgf'),
			'phone-max' => 50,
			'email' 	=> __('Email Address', 'slgf'),
			'email-max' => 50,
			'budget' 	=> __('Desired Budget', 'slgf'),
			'budget-max'=> 50,
			'message' 	=> __('Your Message..', 'slgf'),
			'message-rows' => 5,
			'message-cols' => 50,
		), $atts );
		
		$id 		= uniqid();
		$title 		= esc_html($a['title']);
		
		$name 		= esc_html($a['name']);
		$nameMax 	= (int)$a['name-max'];
		
		$phone 		= esc_html($a['phone']);
		$phoneMax 	= (int)$a['phone-max'];
		
		$email 		= esc_html($a['email']);
		$emailMax 	= (int)$a['email-max'];

		$budget 	= esc_html($a['budget']);
		$budgetMax 	= (int)$a['budget-max'];

		$message 	= esc_html($a['message']);
		$messageRows 	= (int)$a['message-rows'];
		$messageCols 	= (int)$a['message-cols'];
		$dateTime   = $this->slgf_get_datetime();

		// Only load where needed
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slgf-public.css', array(), $this->version, 'all' );
		// Only load where needed
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slgf-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, $this->plugin_name, array(
		        'ajax'     => admin_url('admin-ajax.php'),
		        'site_url' => get_site_url(),
		        'nonce'    => wp_create_nonce('ajax-nonce')
		    )
		);

		ob_start();
		include SLGE_PUBLIC__DIR . 'partials/slgf-public-display.php';
		return ob_get_clean();
	}

	public function slgf_form_submit_action(){
		// Check for nonce security      
	     if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) )
	         die ( 'Busted!');
	     
		// Do not accept extra parameters
		if( is_array($_POST) && count($_POST) == 8 )
		{
			$name = sanitize_text_field($_POST['name']);
			$phone = sanitize_text_field($_POST['phone']);
			$email = sanitize_text_field($_POST['email']);
			$budget = sanitize_text_field($_POST['budget']);
			$message = sanitize_text_field($_POST['message']);
			$datetime = sanitize_text_field($_POST['datetime']);

			if( $name == '' || $phone == '' || !is_email($email) || $budget == '' || $message == '' )
				wp_send_json([ 'success' => false, 'msg' => 'Required fields are missing or invalid email']);

			// Create post object
			$_post = array(
			  'post_title'    => wp_strip_all_tags( $name ),
			  'post_content'  => $message,
			  'post_status'   => 'publish',
			  'post_author'   => 1,
			  'post_type' 	  => 'customer'
			);
		
			$post_id = wp_insert_post( $_post );
			if(!is_wp_error($post_id)){
				add_post_meta($post_id, 'phone', $phone, false);
				add_post_meta($post_id, 'email', $email, false);
				add_post_meta($post_id, 'budget', $budget, false);
				add_post_meta($post_id, 'datetime', $datetime, false); //post date ref depends on timezone
				wp_send_json([ 'success' => true, 'msg' => 'Thank you for your submission']);
			}else{
			  wp_send_json([ 'success' => false, 'msg' => 'Ops!, Something went wrong.']);
			}
		} 
		else 
			wp_send_json([ 'success' => false, 'msg' => 'Required fields are missing.']);
		
		exit;
	}

}
