<?php
/**
 * Booking Form Template - Modern Design
 * 
 * Template para el formulario de reserva con diseño moderno
 * estilo TripAdvisor/Viator
 * 
 * @package AdvancedBookingPro
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! is_a( $product, 'WC_Product_Booking' ) ) {
    return;
}

$product_id = $product->get_id();
?>

<div class="abp-booking-form" data-product-id="<?php echo esc_attr( $product_id ); ?>">
    
    <!-- Encabezado -->
    <div class="abp-booking-header">
        <h2 class="abp-booking-title">
            <i class="fas fa-calendar-check"></i>
            <?php esc_html_e( 'Reserva tu experiencia', 'advanced-booking-pro' ); ?>
        </h2>
        <p class="abp-booking-subtitle">
            <?php esc_html_e( 'Selecciona tus fechas y personaliza tu reserva', 'advanced-booking-pro' ); ?>
        </p>
    </div>

    <div class="abp-booking-form-wrapper">
        
        <!-- Columna principal: Formulario -->
        <div class="abp-form-main">
            
            <!-- Sección: Fechas -->
            <div class="abp-form-section abp-date-section">
                <h3 class="abp-section-title">
                    <i class="fas fa-calendar-alt"></i>
                    <?php esc_html_e( 'Selecciona tus fechas', 'advanced-booking-pro' ); ?>
                </h3>
                <p class="abp-section-description">
                    <?php esc_html_e( 'Elige las fechas de inicio y fin de tu reserva', 'advanced-booking-pro' ); ?>
                </p>
                
                <div class="abp-date-picker-container">
                    <div class="abp-date-input-wrapper">
                        <!-- Fecha de inicio -->
                        <div class="abp-date-field">
                            <label class="abp-date-label">
                                <?php esc_html_e( 'Desde', 'advanced-booking-pro' ); ?>
                            </label>
                            <div class="abp-input-with-icon">
                                <i class="fas fa-calendar-day abp-date-icon"></i>
                                <input 
                                    type="text" 
                                    name="from" 
                                    class="abp-date-input" 
                                    placeholder="<?php esc_attr_e( 'Fecha de inicio', 'advanced-booking-pro' ); ?>"
                                    readonly
                                >
                            </div>
                        </div>
                        
                        <!-- Fecha de fin -->
                        <div class="abp-date-field">
                            <label class="abp-date-label">
                                <?php esc_html_e( 'Hasta', 'advanced-booking-pro' ); ?>
                            </label>
                            <div class="abp-input-with-icon">
                                <i class="fas fa-calendar-day abp-date-icon"></i>
                                <input 
                                    type="text" 
                                    name="to" 
                                    class="abp-date-input" 
                                    placeholder="<?php esc_attr_e( 'Fecha de fin', 'advanced-booking-pro' ); ?>"
                                    readonly
                                >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Calendario desplegable -->
                    <div class="abp-calendar-dropdown">
                        <div class="abp-calendar-header">
                            <button type="button" class="abp-calendar-nav-btn" data-direction="prev">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <div class="abp-calendar-month"></div>
                            <button type="button" class="abp-calendar-nav-btn" data-direction="next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        
                        <div class="abp-calendar-grid">
                            <!-- Nombres de días -->
                            <?php
                            $day_names = array(
                                __( 'Dom', 'advanced-booking-pro' ),
                                __( 'Lun', 'advanced-booking-pro' ),
                                __( 'Mar', 'advanced-booking-pro' ),
                                __( 'Mié', 'advanced-booking-pro' ),
                                __( 'Jue', 'advanced-booking-pro' ),
                                __( 'Vie', 'advanced-booking-pro' ),
                                __( 'Sáb', 'advanced-booking-pro' ),
                            );
                            foreach ( $day_names as $day_name ) :
                            ?>
                                <div class="abp-calendar-day-name"><?php echo esc_html( $day_name ); ?></div>
                            <?php endforeach; ?>
                            
                            <!-- Los días se añadirán dinámicamente con JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <?php if ( $product->has_people() ) : ?>
            <!-- Sección: Personas -->
            <div class="abp-form-section abp-people-section">
                <h3 class="abp-section-title">
                    <i class="fas fa-users"></i>
                    <?php esc_html_e( 'Número de personas', 'advanced-booking-pro' ); ?>
                </h3>
                <p class="abp-section-description">
                    <?php esc_html_e( 'Selecciona cuántas personas asistirán', 'advanced-booking-pro' ); ?>
                </p>
                
                <div class="abp-people-selector">
                    <?php
                    $people_types = $product->get_people_types();
                    $min_persons = $product->get_minimum_number_of_people();
                    $max_persons = $product->get_maximum_number_of_people();
                    
                    if ( $product->has_people_types_enabled() && ! empty( $people_types ) ) :
                        foreach ( $people_types as $people_type ) :
                            $min = $people_type->get_min();
                            $max = $people_type->get_max();
                            $base_price = $people_type->get_base_price();
                    ?>
                        <div class="abp-person-type" 
                             data-person-type="<?php echo esc_attr( $people_type->get_id() ); ?>"
                             data-min="<?php echo esc_attr( $min ); ?>"
                             data-max="<?php echo esc_attr( $max ); ?>">
                            <div class="abp-person-info">
                                <div class="abp-person-label">
                                    <i class="fas fa-user"></i>
                                    <?php echo esc_html( $people_type->get_title() ); ?>
                                </div>
                                <?php if ( $people_type->get_description() ) : ?>
                                    <div class="abp-person-description">
                                        <?php echo esc_html( $people_type->get_description() ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $base_price > 0 ) : ?>
                                    <div class="abp-person-price">
                                        <?php echo wc_price( $base_price ); ?> / 
                                        <?php esc_html_e( 'persona', 'advanced-booking-pro' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="abp-person-controls">
                                <button type="button" 
                                        class="abp-quantity-btn" 
                                        data-action="minus"
                                        data-person-type="<?php echo esc_attr( $people_type->get_id() ); ?>"
                                        disabled>
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="abp-quantity-display">0</span>
                                <button type="button" 
                                        class="abp-quantity-btn" 
                                        data-action="plus"
                                        data-person-type="<?php echo esc_attr( $people_type->get_id() ); ?>">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    else :
                        // Selector simple de personas
                    ?>
                        <div class="abp-person-type" 
                             data-person-type="standard"
                             data-min="<?php echo esc_attr( $min_persons ); ?>"
                             data-max="<?php echo esc_attr( $max_persons ?: 999 ); ?>">
                            <div class="abp-person-info">
                                <div class="abp-person-label">
                                    <i class="fas fa-users"></i>
                                    <?php esc_html_e( 'Personas', 'advanced-booking-pro' ); ?>
                                </div>
                            </div>
                            
                            <div class="abp-person-controls">
                                <button type="button" 
                                        class="abp-quantity-btn" 
                                        data-action="minus"
                                        data-person-type="standard"
                                        disabled>
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="abp-quantity-display"><?php echo esc_html( $min_persons ); ?></span>
                                <button type="button" 
                                        class="abp-quantity-btn" 
                                        data-action="plus"
                                        data-person-type="standard">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( $product->has_resources() ) : ?>
            <!-- Sección: Recursos -->
            <div class="abp-form-section abp-resources-section">
                <h3 class="abp-section-title">
                    <i class="fas fa-building"></i>
                    <?php echo esc_html( $product->get_resources_label() ?: __( 'Selecciona un recurso', 'advanced-booking-pro' ) ); ?>
                </h3>
                <?php if ( $product->get_resources_field_label() ) : ?>
                    <p class="abp-section-description">
                        <?php echo esc_html( $product->get_resources_field_label() ); ?>
                    </p>
                <?php endif; ?>
                
                <div class="abp-resources-selector" 
                     data-multi-select="<?php echo esc_attr( $product->can_select_multiple_resources() ? 'true' : 'false' ); ?>">
                    <?php
                    $resources = $product->get_available_resources();
                    foreach ( $resources as $resource ) :
                        $resource_data = yith_wcbk_get_resource( $resource );
                        if ( ! $resource_data ) continue;
                    ?>
                        <div class="abp-resource-card" data-resource-id="<?php echo esc_attr( $resource ); ?>">
                            <?php if ( $resource_data->has_thumbnail() ) : ?>
                                <img src="<?php echo esc_url( $resource_data->get_thumbnail_url() ); ?>" 
                                     alt="<?php echo esc_attr( $resource_data->get_name() ); ?>"
                                     class="abp-resource-image">
                            <?php endif; ?>
                            
                            <div class="abp-resource-name">
                                <?php echo esc_html( $resource_data->get_name() ); ?>
                            </div>
                            
                            <?php if ( $resource_data->get_description() ) : ?>
                                <div class="abp-resource-description">
                                    <?php echo esc_html( $resource_data->get_description() ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="abp-resource-availability available">
                                <i class="fas fa-check-circle"></i>
                                <?php esc_html_e( 'Disponible', 'advanced-booking-pro' ); ?>
                            </div>
                            
                            <?php if ( $price = $resource_data->get_base_price() ) : ?>
                                <div class="abp-resource-price">
                                    <?php echo wc_price( $price ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( $product->has_services() ) : ?>
            <!-- Sección: Servicios -->
            <div class="abp-form-section abp-services-section">
                <h3 class="abp-section-title">
                    <i class="fas fa-concierge-bell"></i>
                    <?php esc_html_e( 'Servicios adicionales', 'advanced-booking-pro' ); ?>
                </h3>
                <p class="abp-section-description">
                    <?php esc_html_e( 'Mejora tu experiencia con estos servicios extra', 'advanced-booking-pro' ); ?>
                </p>
                
                <div class="abp-services-list">
                    <?php
                    $services = $product->get_service_ids();
                    foreach ( $services as $service_id ) :
                        $service = yith_wcbk_get_service( $service_id );
                        if ( ! $service ) continue;
                    ?>
                        <div class="abp-service-item" data-service-id="<?php echo esc_attr( $service_id ); ?>">
                            <div class="abp-service-checkbox">
                                <!-- Checkmark se añade con CSS -->
                            </div>
                            
                            <div class="abp-service-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            
                            <div class="abp-service-details">
                                <div class="abp-service-name">
                                    <?php echo esc_html( $service->get_name() ); ?>
                                    <?php if ( $service->is_mandatory() ) : ?>
                                        <span class="abp-badge danger">
                                            <?php esc_html_e( 'Obligatorio', 'advanced-booking-pro' ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $service->get_description() ) : ?>
                                    <div class="abp-service-description">
                                        <?php echo esc_html( $service->get_description() ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ( $price = $service->get_price() ) : ?>
                                <div class="abp-service-price">
                                    + <?php echo wc_price( $price ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- Columna lateral: Resumen de precio -->
        <div class="abp-form-sidebar">
            <div class="abp-price-summary">
                <h3 class="abp-price-summary-title">
                    <i class="fas fa-receipt"></i>
                    <?php esc_html_e( 'Resumen de tu reserva', 'advanced-booking-pro' ); ?>
                </h3>
                
                <div class="abp-price-breakdown">
                    <!-- Las líneas de precio se añadirán dinámicamente -->
                    <div class="abp-price-line">
                        <span class="abp-price-line-label">
                            <?php esc_html_e( 'Calculando...', 'advanced-booking-pro' ); ?>
                        </span>
                        <span class="abp-price-line-value">-</span>
                    </div>
                </div>
                
                <div class="abp-price-total">
                    <div class="abp-price-total-label">
                        <?php esc_html_e( 'Total', 'advanced-booking-pro' ); ?>
                    </div>
                    <div class="abp-price-total-amount">
                        <span class="abp-price-currency"><?php echo get_woocommerce_currency_symbol(); ?></span>
                        <span class="abp-price-amount">0</span>
                    </div>
                </div>
                
                <p class="abp-price-note">
                    <i class="fas fa-info-circle"></i>
                    <?php esc_html_e( 'El precio final incluye todos los impuestos', 'advanced-booking-pro' ); ?>
                </p>
                
                <button type="submit" class="abp-submit-button">
                    <span class="abp-submit-button-text">
                        <i class="fas fa-check abp-submit-button-icon"></i>
                        <?php esc_html_e( 'Reservar ahora', 'advanced-booking-pro' ); ?>
                    </span>
                </button>
            </div>
        </div>

    </div>
</div>

<?php
// Añadir datos JavaScript
wp_localize_script( 'advanced-booking-pro-frontend', 'abp_vars', array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'nonce' => wp_create_nonce( 'abp_booking_nonce' ),
    'cart_url' => wc_get_cart_url(),
    'currency' => get_woocommerce_currency(),
    'product_id' => $product_id,
    'i18n' => array(
        'select_dates' => __( 'Por favor selecciona las fechas', 'advanced-booking-pro' ),
        'select_persons' => __( 'Por favor selecciona el número de personas', 'advanced-booking-pro' ),
        'calculating' => __( 'Calculando precio...', 'advanced-booking-pro' ),
        'error' => __( 'Ha ocurrido un error', 'advanced-booking-pro' ),
        'success' => __( 'Reserva añadida al carrito', 'advanced-booking-pro' ),
    ),
) );
?>
