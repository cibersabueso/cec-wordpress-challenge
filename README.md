# CEC Paywall Plugin

## Description

The CEC Paywall Plugin is a WordPress plugin that implements a paywall system, allowing content restriction based on user roles. It adds three new user roles, enables public registration, adds a metabox to posts for selecting required roles, implements a paywall gate, and restricts premium content visibility.

## Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher

## Installation

1. Download the plugin zip file or clone the repository.
2. If downloaded, unzip the file.
3. Upload the `cec-paywall-plugin` folder to your WordPress installation's `wp-content/plugins/` directory.
4. Log in to your WordPress admin panel.
5. Go to "Plugins" in the left-hand menu.
6. Find "CEC Paywall Plugin" in the list and click "Activate".

## Configuration

No additional configuration is needed. Upon activation, the plugin will:
- Add three new user roles: Free Reader, Paid Reader, and Premium Reader.
- Enable public user registration.
- Set "Free Reader" as the default role for new registrations.

## Usage

### Adding/Editing Posts

1. Go to "Posts" > "Add New" or edit an existing post.
2. In the right sidebar, find the "Paywall Settings" metabox.
3. Select the required role to read the full article:
   - Free Reader
   - Paid Reader
   - Premium Reader
4. Publish or update the post.

### Viewing Restricted Content

- Users with insufficient roles will only see the post excerpt followed by a paywall message.
- Users with the required role or higher will see the full content.
- Posts marked as "Premium Reader" will not be listed for users without the Premium Reader role.

## Testing

To thoroughly test the plugin:

1. Create test users for each role:
   - Go to "Users" > "Add New"
   - Create users with usernames like "free_test", "paid_test", "premium_test"
   - Assign appropriate roles to each

2. Create test posts:
   - Create at least one post for each access level (Free, Paid, Premium)
   - Use distinct titles like "Free Post", "Paid Post", "Premium Post"

3. Test viewing posts:
   - Log out and view posts as a non-logged-in user
   - Log in as each test user and attempt to view all posts
   - Verify that users can only access content appropriate for their role

4. Test registration:
   - Log out and attempt to register a new account
   - Verify that the new account is assigned the "Free Reader" role

5. Test admin access:
   - Log in as an admin
   - Verify that you can see and edit all posts regardless of their paywall settings

## Customization

### Styling

To customize the appearance of the paywall message:

1. Open the `style.css` file in the plugin directory.
2. Modify the CSS to match your desired styling.
3. Save the file and refresh your WordPress site to see the changes.

### Modifying Functionality

If you need to modify the plugin's functionality:

- User roles: Edit `includes/user-roles.php`
- Post metabox: Edit `includes/post-metabox.php`
- Paywall gate: Edit `includes/paywall-gate.php`
- Premium content restriction: Edit `includes/premium-content.php`

## Troubleshooting

If you encounter issues:

1. Ensure WordPress and PHP versions meet the requirements.
2. Deactivate all other plugins to check for conflicts.
3. Switch to a default WordPress theme to rule out theme-related issues.
4. Check your server's error logs for any PHP errors.

## Support

For support, please open an issue in the plugin's GitHub repository or contact the plugin author.



