<?php
/**
 * Plugin Name: Advanced Booking Pro
 * Plugin URI: https://yourdomain.com/
 * Description: <code><strong>Advanced Booking Pro</strong></code> - Sistema avanzado de reservas y citas para WooCommerce. Crea productos de reserva con diseño moderno estilo TripAdvisor/Viator. Incluye gestión de personas, recursos, servicios, sincronización externa, Google Calendar, mapas y mucho más. Todas las funcionalidades premium desbloqueadas.
 * Version: 1.0.0
 * Author: Custom Development
 * Author URI: https://yourdomain.com/
 * Text Domain: advanced-booking-pro
 * Domain Path: /languages/
 * WC requires at least: 10.1
 * WC tested up to: 10.3
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author  Custom Development
 * @package AdvancedBookingPro
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Desactivar verificaciones de licencia - Plugin totalmente desbloqueado
if ( ! defined( 'YITH_WCBK_PREMIUM' ) ) {
	define( 'YITH_WCBK_PREMIUM', true );
}

if ( ! defined( 'YITH_WCBK_INIT' ) ) {
	define( 'YITH_WCBK_INIT', plugin_basename( __FILE__ ) );
}

if ( defined( 'YITH_WCBK_VERSION' ) ) {
	return;
}

if ( ! defined( 'YITH_WCBK_VERSION' ) ) {
	define( 'YITH_WCBK_VERSION', '1.0.0' );
}

if ( ! defined( 'YITH_WCBK_FILE' ) ) {
	define( 'YITH_WCBK_FILE', __FILE__ );
}

// Advanced Booking Pro - Todas las funciones premium habilitadas
if ( ! defined( 'ABP_PREMIUM_ENABLED' ) ) {
	define( 'ABP_PREMIUM_ENABLED', true );
}

require_once __DIR__ . '/init-global.php';
