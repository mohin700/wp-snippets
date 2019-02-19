<?php
//Additional Fees 
//Code will be add in to => Functions.php


function woo_add_cart_fee() {
  global $woocommerce;
  $woocommerce->cart->add_fee( __('Registration Fee', 'woocommerce'), 35 );
}

add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );



// Weecommerce Change Return to shop url
function skyverge_change_empty_cart_button_url() {
	return get_site_url();
	//Can use any page instead, like return '/sample-page/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'skyverge_change_empty_cart_button_url' );
//************

// Weecommerce Change Return to shop Text
function change_woocommerce_return_to_shop_text( $translated_text, $text, $domain ) {

        switch ( $translated_text ) {
            case 'Return to shop' :
               $translated_text = __( 'Return to Store', 'woocommerce' );
               break;
        }
    return $translated_text;
}
add_filter( 'gettext', 'change_woocommerce_return_to_shop_text', 20, 3 );

//*********************




//Clear Card Before Adding new Item

// before addto cart, only allow 1 item in a cart
add_filter( 'woocommerce_add_to_cart_validation', 'woo_custom_add_to_cart_before' );
 
function woo_custom_add_to_cart_before( $cart_item_data ) {
 
    global $woocommerce;
    $woocommerce->cart->empty_cart();
 
    // Do nothing with the data and return
    return true;
}
//***************************************************
