<?php
add_action('pre_get_posts', 'exclude_premium_posts');

function exclude_premium_posts($query) {
    if (!is_admin() && $query->is_main_query()) {
        $current_user = wp_get_current_user();
        $user_roles = $current_user->roles;

        if (!in_array('premium_reader', $user_roles) && !current_user_can('administrator')) {
            $meta_query = array(
                'relation' => 'OR',
                array(
                    'key' => '_required_role',
                    'value' => 'premium_reader',
                    'compare' => '!='
                ),
                array(
                    'key' => '_required_role',
                    'compare' => 'NOT EXISTS'
                )
            );

            $query->set('meta_query', $meta_query);
        }
    }
}