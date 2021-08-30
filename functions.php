//Freight To Be Paid
// Register New Order Statuses
function w_wc_register_post_statuses() {
    register_post_status( 'wc-freight-to-be-paid', array(
        'label'                     => _x( 'Freight To Be Paid', 'WooCommerce Order status', 'text_domain' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Approved (%s)', 'Approved (%s)', 'text_domain' )
    ) );
}
add_filter( 'init', 'w_wc_register_post_statuses' );

// Add New Order Statuses to WooCommerce
function w_wc_add_order_statuses( $order_statuses ) {
    $order_statuses['wc-freight-to-be-paid'] = _x( 'Freight To Be Paid', 'WooCommerce Order status', 'text_domain' );
    return $order_statuses;
}
add_filter( 'wc_order_statuses', 'w_wc_add_order_statuses' );


//Awaiting Dispatch
// Custom order status //Required woo 2.2+
add_action( 'init', 'register_my_new_order_statuses' );

function register_my_new_order_statuses() {
    register_post_status( 'wc-awaiting-dispatch', array(
        'label'                     => _x( 'Awaiting Dispatch', 'Order status', 'woocommerce' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Awaiting Dispatch <span class="count">(%s)</span>', 'Awaiting Dispatch<span class="count">(%s)</span>', 'woocommerce' )
    ) );
}

add_filter( 'wc_order_statuses', 'my_new_wc_order_statuses' );

// Register in wc_order_statuses.
function my_new_wc_order_statuses( $order_statuses ) {
    $order_statuses['wc-awaiting-dispatch'] = _x( 'Awaiting Dispatch', 'Order status', 'woocommerce' );

    return $order_statuses;
}


//Add bulk 
function custom_bulk_admin_footer() {
	global $post_type;

	if ( $post_type == 'shop_order' ) {
		?>
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('<option>').val('mark_awaiting-dispatch').text('<?php _e( 'Mark awaiting-dispatch', 'textdomain' ); ?>').appendTo("select[name='action']");
					jQuery('<option>').val('mark_awaiting-dispatch').text('<?php _e( 'Mark awaiting-dispatch', 'textdomain' ); ?>').appendTo("select[name='action2']");   
				});
			</script>
		<?php
	}
}


//Action Required
// Register New Order Statuses
function p_wc_register_post_statuses() {
    register_post_status( 'wc-action-required', array(
        'label'                     => _x( 'Action Required', 'WooCommerce Order status', 'text_domain' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Approved (%s)', 'Approved (%s)', 'text_domain' )
    ) );
}
add_filter( 'init', 'p_wc_register_post_statuses' );

// Add New Order Statuses to WooCommerce
function p_wc_add_order_statuses( $order_statuses ) {
    $order_statuses['wc-action-required'] = _x( 'Action Required', 'WooCommerce Order status', 'text_domain' );
    return $order_statuses;
}
add_filter( 'wc_order_statuses', 'p_wc_add_order_statuses' );