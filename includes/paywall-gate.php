<?php
add_filter('the_content', 'apply_paywall_gate');

function apply_paywall_gate($content) {
    if (!is_single()) {
        return $content;
    }

    $required_role = get_post_meta(get_the_ID(), '_required_role', true);
    $current_user = wp_get_current_user();
    $user_roles = $current_user->roles;

    if (empty($required_role) || in_array($required_role, $user_roles) || current_user_can('administrator')) {
        return $content;
    }

    $excerpt = get_the_excerpt();
    $paywall_message = '<div class="paywall-gate"><p>Para leer el artículo completo, necesitas ser un ' . ucfirst(str_replace('_', ' ', $required_role)) . '.</p><p><a href="' . wp_login_url(get_permalink()) . '">Inicia sesión</a> o <a href="' . wp_registration_url() . '">regístrate</a> para acceder.</p></div>';

    return $excerpt . $paywall_message;
}