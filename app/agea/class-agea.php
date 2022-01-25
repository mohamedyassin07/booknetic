<?php

// depend on editing ' else if( $payment_method == 'woocommerce' ) ' on 1213 line
// app\Frontend\Controller\Ajax.php


class Agea
{

    public function __construct(){
        add_action( 'rest_api_init', array( $this, 'confirmation_endpoint' ) , 10000 );
    }

    public function confirmation_endpoint(){
		register_rest_route( 'agea/v1', 'appointment_confirmation' .'/(?P<id>\d+)', array(
			'methods' => 'GET',
			'callback' => array( $this, 'confirmation_endpoint_callback' ),
			'permission_callback' => '__return_true'
		));
	}

    public function confirmation_endpoint_callback( $request ) {
        $id = $request->get_params()['id'];
        $appointment =  TabCompany::get_appointment ( $id ) ;
        
        if(! $appointment){
            echo __('Some thing went wrong','agea');
        }
        
        /*get charge id from page url*/
        $charge_id = $_GET['tap_id'] ;

        /*get charges data from charge id return array()*/ 
        $resulte = $this->getTapCharge($charge_id);
        
        /*return the charge code 000 is true */
        $chargeCode = isset( $resulte['response']['code'] ) ? $resulte['response']['code'] : false ;

        if ( $chargeCode == "000" ) {

         $confirmation = $this->confirm_appointment($id);

        } else {
            
         echo 'Error code Is : ['. $chargeCode .']  Error Message Is : ['. $resulte['response']['message'].']';

        }

    }

    public function getTapCharge($charge_id){
        
            $authorization = get_option( 'xb_authorization', true );

            $headers =  array(
                'authorization' => $authorization,
            );
            $response = wp_remote_post( 'https://api.tap.company/v2/charges/'. $charge_id , array(
                'method'      => 'GET',
                'timeout'     => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking'    => true,
                'headers'     => $headers,
                'body'        => array(),
                'cookies'     => array()
                )
            );
            
            if ( is_wp_error( $response ) ) {
                return false;
            } else {
                return json_decode( wp_remote_retrieve_body($response) , true );
            }

    }

    public function confirm_appointment( $id )
    {
        global $wpdb;
        $where = array ( 'id' => $id );
        $data =  array('payment_status' => 'paid' , 'status'=>'approved');
        $updated = $wpdb->update( 'wpbc_bkntc_appointment_customers', $data, $where );
 
        if ( false === $updated ) {
            echo __('Some thing went wrong','agea');
        } else {
            wp_redirect( $this->get_thankyou_url($id) );
        }

    }

    public function get_thankyou_url( $id ){
        $thankyou_page = get_option( 'xb_thankyou_id', true );
        return get_permalink ( $thankyou_page ).'/?appointment='.$id;
    }

    public function thankyou_page_content( $content ){
         $thankyou_page = get_option( 'xb_thankyou_id', true );
        if( $thankyou_page == get_the_ID() ){
            return '<h2>'. __('thank you, Reservation completed successfully') . '</h2>';
        }
        return $content;
    }
}

$agea = new Agea;