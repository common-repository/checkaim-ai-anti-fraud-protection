<?php
// Add image for tracking CheckAIM security
function checkaim_add_image_to_thankyou_page( $order_id ) {
    if (esc_attr( get_option( 'checkaim_auid' ) ) !== "") {
        $order = new WC_Order( $order_id );
        $order_products = array();
        foreach ( $order->get_items() as $item_id => $item ) {
            $product = $item->get_product();
            $order_products[] = $product->get_id();
        }
        $product_ids = implode( '-', $order_products );
        $country = $order->get_shipping_country();
        if ( empty( $country ) ) {
            $country = $order->get_billing_country();
        }

        $coupons_code = "";
        $count = 0;
        foreach ($order->get_used_coupons() as $coupon) {  // since WC 3.7
            $count++;
            if ($count > 1) {
                $coupons_code .= ';';
            }
            $coupons_code .= $coupon;
        }

        echo "<!-- Start CheckAIM Code -->";
        echo '<img id="checkaim-image" src="https://checkaim.com/secure.php?mid='. esc_attr( get_option( 'checkaim_auid' ) ) .
            '&orderId='. $order_id .
            '&sale='.  $order->total .
            '&productids='. $product_ids .
            '&postage='. $order->shipping_total .
            '&taxcosts='. $order->total_tax .
            '&cartid='. $country .
            '&auid='. $order->customer_id .
            '&keyword='. $coupons_code .
            '"  height="1" width="1" alt="">';
        echo "<!-- End CheckAIM Code -->";
    }
}

add_action( 'woocommerce_thankyou', 'checkaim_add_image_to_thankyou_page', 10, 1 );