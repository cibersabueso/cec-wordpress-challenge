<?php
add_action('add_meta_boxes', 'add_paywall_metabox');
add_action('save_post', 'save_paywall_metabox');

function add_paywall_metabox() {
    add_meta_box(
        'paywall_metabox',
        'Paywall Settings',
        'render_paywall_metabox',
        'post',
        'side',
        'high'
    );
}

function render_paywall_metabox($post) {
    $current_role = get_post_meta($post->ID, '_required_role', true);
    wp_nonce_field('paywall_metabox', 'paywall_metabox_nonce');
    ?>
    <p>
        <label for="required_role">Required role to read full article:</label>
        <select name="required_role" id="required_role">
            <option value="free_reader" <?php selected($current_role, 'free_reader'); ?>>Free Reader</option>
            <option value="paid_reader" <?php selected($current_role, 'paid_reader'); ?>>Paid Reader</option>
            <option value="premium_reader" <?php selected($current_role, 'premium_reader'); ?>>Premium Reader</option>
        </select>
    </p>
    <?php
}

function save_paywall_metabox($post_id) {
    if (!isset($_POST['paywall_metabox_nonce']) || !wp_verify_nonce($_POST['paywall_metabox_nonce'], 'paywall_metabox')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['required_role'])) {
        update_post_meta($post_id, '_required_role', sanitize_text_field($_POST['required_role']));
    }
}