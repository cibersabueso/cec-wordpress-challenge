<?php
function add_user_roles() {
    add_role('free_reader', 'Free Reader', array('read' => true));
    add_role('paid_reader', 'Paid Reader', array('read' => true));
    add_role('premium_reader', 'Premium Reader', array('read' => true));
}

function remove_user_roles() {
    remove_role('free_reader');
    remove_role('paid_reader');
    remove_role('premium_reader');
}

// Set the default role for new users
add_filter('pre_option_default_role', 'set_default_role');
function set_default_role($default_role) {
    return 'free_reader';
}

// Enable public user registration
add_action('init', 'enable_public_registration');
function enable_public_registration() {
    update_option('users_can_register', 1);
}