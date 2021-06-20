<?php
/**
 * Learnpress compatibility
 *
 * @package Brooklyn Lite
 */

/**
 * Wraps free course label in span
 *
 */
function brooklyn_lite_learnpress_free_course_label() {

	return '<span class="free-course-label">' . __( 'Free', 'brooklyn-lite' ) . '</span>';

}
add_filter( 'learn_press_course_price_html_free', 'brooklyn_lite_learnpress_free_course_label' );

/**
 * Wraps paid course label in span
 *
 */
function brooklyn_lite_learnpress_paid_course_label( $price ) {

	return '<span class="paid-course-label">' . $price . '</span>';

}
add_filter( 'learn_press_course_price_html', 'brooklyn_lite_learnpress_paid_course_label' );