<?php

class TabCompany
{    
    public static function get_transaction_url($id){
        $app        = self::get_appointment( $id );
        $amount     = $app->paid_amount + $app->extras_amount - $app->discount ;
        $redirect   = self::confirmation_endpoint_url($id);
        $currency   = get_option( 'xb_currency', 'SAR' );

        if ( $amount == '0' ) {  

            return  self::confirmation_free_book($id);

        } else {

        $data = array(
            'amount' => $amount ,
            'currency' => $currency,
            'threeDSecure' => true,
            'save_card' => false,
            'description' => 'Test Description',
            'statement_descriptor' => 'Sample',
            'metadata' => array (),
            'reference' => array (
              'transaction' => "txn_$id",
              'order' => "ord_$id",
            ),
            'receipt' => array (
              'email' => false,
              'sms' => true,
            ),
            'customer' => array (
              'first_name' => 'test',
              'middle_name' => 'test',
              'last_name' => 'test',
              'email' => 'test@test.com',
              'phone' => array (
                'country_code' => '965',
                'number' => '50000000',
              ),
              'id' => '',
            ),
            'merchant' => array (
              'id' => '',
            ),
            'source' => array (
              'id' => 'src_all',
            ),
            'post' => array (
              'url' => 'http://your_website.com/post_url',
            ),
            'redirect' => array (
                'url' => $redirect,
            ),
        );

        $connection = self::connection( 'charges', $data );
        return isset( $connection['transaction']['url'] ) ? $connection['transaction']['url'] : false ;
      }

    }

    public static function confirmation_endpoint_url($id){
        return get_site_url(null, 'wp-json/agea/v1/appointment_confirmation/'.$id.'/' );
    }

    public static function get_appointment( $id )
    {
        global $wpdb;
        $q = "SELECT * FROM wpbc_bkntc_appointment_customers  where id= $id  limit 1 ";
        $result = $wpdb->get_results( $q ) ;
        if( !empty($result) ){
            return $result[0];
        }
        return false;
    }


    public static function connection( $endpoint='' , $fields, $type ='POST' ){

        $authorization = get_option( 'xb_authorization', true );

        $headers =  array(
            'authorization' => $authorization,
        );
        $response = wp_remote_post( 'https://api.tap.company/v2/'.$endpoint , array(
            'method'      => $type,
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => $headers,
            'body'        => $fields,
            'cookies'     => array()
            )
        );
        
        if ( is_wp_error( $response ) ) {
            return false;
        } else {
            return json_decode( wp_remote_retrieve_body($response) , true );
        }
    }

    public static function confirmation_free_book($id)
    {
        global $wpdb;
        $where = array( 'id' => $id );
        $data =  array('payment_status' => 'paid' , 'status'=>'approved');
        $updated = $wpdb->update( 'wpbc_bkntc_appointment_customers', $data, $where );
 
        if ( false === $updated ) {
            echo __('Some thing went wrong','agea');
        }

        $thankyou_page = get_option( 'xb_thankyou_id', true );

        return get_permalink ( $thankyou_page ).'/?appointment='.$id;
    }
}