<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count
$woocommerce_loop['loop'] ++;
?>
<li <?php wc_product_cat_class(); ?>>
	<div class="product-inner">
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

		<div class="product-cat-top">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>

		<h3>
			<?php
				echo $category->name;

				if ( $category->count > 0 )
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );	
			?>
		</h3>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>
		</div>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

		<div class="product-cat-bottom">
			<p class="product-cat-description"><?php echo $category->description; ?></p>
			<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="button alt"><?php esc_html_e( 'More', 'bookie-wp' ); ?></a>
		</div>

	</div>
</li>
