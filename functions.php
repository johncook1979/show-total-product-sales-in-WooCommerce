/**
  * Show the total number of sales for a product
  *
  * Place in your functions.php file of your child theme
  *
*/

// Display on product page
add_action('woocommerce_single_product_summary', 'my_total_sales', 25);

// Display on shop and archive page
add_action('woocommerce_after_shop_loop_item', 'my_total_sales', 25);

function my_total_sales(){
	global $product;

  // get the total number of sales
	$count = $product->get_total_sales();

  // Define the message to display (Modify as needed)
	$text = sprintf( _n( '%s Sale', '%s Total sales', $count, 'wpdocs_textdomain' ), number_format_i18n($count));

  // Only output the message if the total number of sales are over 100 (you can modify as needed)
	if($count > 100) {
		echo '<p class="total-sales"><span class="dashicons dashicons-chart-line"></span> ' . $text . '</p>';
	}
}
