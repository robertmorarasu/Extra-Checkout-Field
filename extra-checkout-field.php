<?php
/**
 * Plugin Name: Extra checkout field
 * Plugin URI: https://github.com/robertmorarasu/Extra-Checkout-Field
 * GitHub Plugin URI: https://github.com/robertmorarasu/Extra-Checkout-Field
 * Description: A plugin that extends the functionality of WP-Woo, adds an extra field to the WooCommerce checkout page and saves the value of that field to the order meta data.
 * Author: Morarasu Robert
 * Copyright (c) 2023 [Morarasu Robert]
 * Version: 1.0.0
*/






//  Add a new field to the checkout page using the "woocommerce_form_field" function.

add_action( 'woocommerce_after_checkout_billing_form', 'shop_checkout_extra_field' );

function shop_checkout_extra_field($checkout) {

    woocommerce_form_field( 'extra_field', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Extra Field'),
        'placeholder'   => __('Enter value'),
    ), $checkout->get_value( 'extra_field' ));
    
}


// Saves the value of the "extra_field" to the order meta data using the "update_meta_data" function.

add_action( 'woocommerce_checkout_create_order', 'shop_save_checkout_extra_field' );
 
 
function shop_save_checkout_extra_field( $order ) {
    if ( ! empty( $_POST['extra_field'] ) ) {
        $order->update_meta_data( 'Extra Field', sanitize_text_field( $_POST['extra_field'] ) );
    }
}






















