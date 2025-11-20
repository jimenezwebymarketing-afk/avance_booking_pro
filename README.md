# Advanced Booking Pro

**Sistema avanzado de reservas y citas para WooCommerce con diseño moderno**

## 📋 Descripción

Advanced Booking Pro es un plugin premium completo para WordPress/WooCommerce que permite crear y gestionar productos de reserva con un diseño moderno inspirado en TripAdvisor y Viator. 

**Todas las funcionalidades premium están desbloqueadas** - No requiere licencia ni verificaciones externas.

## ✨ Características Principales

### 🎨 Diseño Moderno
- ✅ Interfaz inspirada en TripAdvisor y Viator
- ✅ Esquema de colores azul metálico/oscuro brillante
- ✅ Animaciones suaves y transiciones fluidas
- ✅ 100% responsive (móvil-first)
- ✅ Accesibilidad mejorada (WCAG 2.1)

### 📅 Sistema de Reservas
- ✅ Calendario interactivo con selector de rangos
- ✅ Visualización de disponibilidad en tiempo real
- ✅ Precios dinámicos por fecha
- ✅ Reservas por minuto, hora, día o mes
- ✅ Duración fija o elegida por cliente
- ✅ Buffer entre reservas
- ✅ Check-in/Check-out personalizable

### 👥 Gestión de Personas
- ✅ Tipos de personas ilimitados (adultos, niños, seniors, etc.)
- ✅ Precios diferenciados por tipo
- ✅ Mínimo y máximo de personas
- ✅ Precio por persona o precio fijo
- ✅ Contador con botones +/- modernos

### 🏨 Recursos y Servicios
- ✅ Gestión de recursos ilimitados (habitaciones, equipos, vehículos)
- ✅ Asignación automática o manual
- ✅ Servicios adicionales opcionales u obligatorios
- ✅ Precios por recurso/servicio
- ✅ Imágenes y descripciones
- ✅ Disponibilidad por recurso

### 💰 Sistema de Precios Avanzado
- ✅ Precio base por duración
- ✅ Reglas de precio por fecha/hora
- ✅ Descuentos semanales y mensuales
- ✅ Descuentos de última hora
- ✅ Precio por persona adicional
- ✅ Tarifas fijas opcionales
- ✅ Cálculo en tiempo real

### 📊 Disponibilidad Inteligente
- ✅ Reglas de disponibilidad globales y por producto
- ✅ Días específicos de la semana
- ✅ Rangos de fechas
- ✅ Horarios específicos
- ✅ Máximo de reservas por unidad de tiempo
- ✅ Reservas anticipadas (mínimo/máximo)

### 🔄 Sincronización Externa
- ✅ iCal (Booking.com, Airbnb, etc.)
- ✅ Google Calendar (bidireccional)
- ✅ Prevención de dobles reservas
- ✅ Importación/exportación automática

### 🗺️ Mapas y Ubicación
- ✅ Google Maps integrado
- ✅ Búsqueda por ubicación
- ✅ Visualización de ubicación del producto
- ✅ Coordenadas GPS

### 🔍 Formularios de Búsqueda
- ✅ Búsqueda por fecha
- ✅ Filtros por personas
- ✅ Búsqueda por ubicación
- ✅ Shortcodes personalizables

### 📧 Notificaciones
- ✅ Emails al cliente
- ✅ Emails al administrador
- ✅ Plantillas personalizables
- ✅ Variables dinámicas

### 📱 Integraciones
- ✅ WooCommerce completo
- ✅ WPML/WCML (multiidioma)
- ✅ Polylang
- ✅ Elementor
- ✅ Divi
- ✅ WPBakery
- ✅ Gutenberg

### 📈 Gestión y Reportes
- ✅ Panel de administración completo
- ✅ Calendario de reservas
- ✅ Estados de reserva
- ✅ Confirmación manual/automática
- ✅ Cancelaciones
- ✅ Exportación PDF/CSV/ICS
- ✅ Notas internas

## 🚀 Instalación

### Requisitos
- WordPress 5.8 o superior
- WooCommerce 7.0 o superior
- PHP 7.4 o superior
- MySQL 5.6 o superior

### Pasos

1. **Subir el plugin**
   ```
   wp-content/plugins/advanced-booking-pro/
   ```

2. **Activar el plugin**
   - Ve a Plugins > Plugins instalados
   - Busca "Advanced Booking Pro"
   - Click en "Activar"

3. **Configurar**
   - Ve a WooCommerce > Configuración > Reservas
   - Configura tus opciones
   - ¡Listo!

## 📖 Uso Básico

### Crear un Producto de Reserva

1. **Nuevo producto**
   - Productos > Añadir nuevo
   - Selecciona tipo "Producto de reserva"

2. **Configurar fechas y duración**
   - Define duración fija o rango
   - Establece unidad de tiempo
   - Configura disponibilidad

3. **Añadir personas (opcional)**
   - Habilita personas
   - Define tipos (adultos, niños, etc.)
   - Establece precios

4. **Añadir recursos (opcional)**
   - Habilita recursos
   - Añade habitaciones, equipos, etc.
   - Define asignación

5. **Añadir servicios (opcional)**
   - Crea servicios adicionales
   - Establece precios
   - Marca como opcionales u obligatorios

6. **Configurar precios**
   - Precio base
   - Reglas de precio dinámicas
   - Descuentos

7. **Publicar**
   - ¡Tu producto de reserva está listo!

### Shortcodes

```php
// Formulario de reserva
[yith_wcbk_booking_form product_id="123"]

// Calendario de disponibilidad
[yith_wcbk_booking_calendar product_id="123"]

// Formulario de búsqueda
[yith_wcbk_booking_search_form]

// Mis reservas
[yith_wcbk_my_bookings]
```

## 🎨 Personalización

### CSS Personalizado

```css
/* Cambiar color principal */
:root {
    --abp-primary: #tu-color;
    --abp-accent: #tu-color-acento;
}

/* Personalizar botón de reserva */
.abp-submit-button {
    background: tu-gradiente;
}
```

### Templates

Los templates se pueden sobreescribir desde tu theme:

```
wp-content/themes/tu-theme/woocommerce/booking/
├── form.php
├── calendar.php
├── add-to-cart-booking.php
└── ...
```

### Hooks y Filtros

```php
// Modificar precio calculado
add_filter('abp_calculated_price', function($price, $product, $data) {
    // Tu lógica
    return $price;
}, 10, 3);

// Después de crear reserva
add_action('abp_booking_created', function($booking) {
    // Tu lógica
}, 10);
```

## 🔧 Configuración Avanzada

### Variables JavaScript

```javascript
// Personalizar configuración
var abp_custom_config = {
    currency: 'USD',
    date_format: 'DD/MM/YYYY',
    animation_speed: 300,
    // ...
};
```

### Habilitar Modo Debug

```php
// En wp-config.php
define('ABP_DEBUG', true);
```

## ❓ FAQ

### ¿Necesita licencia?
No, todas las funciones premium están desbloqueadas sin necesidad de licencia.

### ¿Es compatible con mi theme?
Sí, es compatible con cualquier theme de WordPress que siga los estándares.

### ¿Funciona con otros plugins de WooCommerce?
Sí, es compatible con la mayoría de plugins de WooCommerce.

### ¿Puedo modificar el código?
Sí, bajo licencia GPL v2 puedes modificarlo libremente.

### ¿Hay soporte?
Este es un plugin para uso personal. No incluye soporte oficial.

## 📝 Changelog

### Version 1.0.0 (2024-11-20)
- ✨ Lanzamiento inicial
- ✅ Todas las funciones premium desbloqueadas
- ✅ Diseño moderno estilo TripAdvisor/Viator
- ✅ Esquema de colores azul metálico
- ✅ Sistema completo de reservas
- ✅ Todos los módulos habilitados

## 🔐 Licencia

GPL v2 or later

Este plugin está basado en YITH Booking for WooCommerce, que también usa licencia GPL.

## 🙏 Créditos

- Basado en: YITH Booking and Appointment for WooCommerce
- Diseño inspirado en: TripAdvisor y Viator
- Desarrollado para uso personal

## 📧 Contacto

Para preguntas o sugerencias sobre este plugin personalizado.

---

**Nota:** Este plugin es para uso personal. Si planeas distribuirlo, recuerda que debe mantener la licencia GPL y dar crédito apropiado.
