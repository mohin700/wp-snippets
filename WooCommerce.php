<?php


//Additional Fees 
//Code will be add in to => Functions.php


function woo_add_cart_fee() {
  global $woocommerce;
  $woocommerce->cart->add_fee( __('Registration Fee', 'woocommerce'), 35 );
}

add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );
