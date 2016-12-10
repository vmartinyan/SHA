=== WP Custom Post Template Redux ===
Contributors: matgargano, dswpsupport
Tags: post template, custom template for post, wp custom post template, custom post type, custom template, post from template, posts, templates, custom post template, custom theme template, simple post templates, single post templates, template, theme template, wordpress post template, wp post template
Requires at least: 3.0
Tested up to: 4.5.2
Stable tag: 1.4.3
License: GPL2+ or later


== Description ==

- This plugin lets you add the custom post templates in your Wordpress custom post type. You can easily apply your custom post template in custom post type posts, just as you would do the same for page templates.
 
- The templates are defined similarly to page templates, and if selected will replace single-cpt-slug.php (see template hierarchy https://developer.wordpress.org/themes/basics/template-hierarchy/) for the specified post.

- Admin can use default setting for the custom post type plugin by simply clicking on default setting button.

Implementation notes:

- Page templates use, in the comments at the top of the file "Template Name:", whereas to use this plugin’s custom post templates use "WP Post Template: my-post-type-slug” — you can combine page templates and custom post type templates by just adding the applicable comments to the PHP file.

- CPT templates use "WP Post Type:" plus the custom post type slug, e.g. "WP Post Type: my-fun-post-type"  you can use a single template for multiple post types - if you leave it blank it will be available to all post types, which will maintain compatibility with WP Custom Post Template 1.0.

- You must have store the custom post template files in your theme in the same directory/folder as your index.php template file, not in a sub-directory/sub-folder.



== Features ==

-   Select custom post type where you need to show the post template.

-   Select default setting to show post template in your theme default post type.

-   You can add Advanced Custom Fields field groups based on the Custom Post Template chosen


== Installation ==

= Install =

1. Login into your WordPress admin panel
2. Navigate to Plugins => Add New
3. Click Upload 
4. Click Choose File and select the zip file.
5. Click Install Now.
6. Activate the plugin through the 'Plugins' menu in WordPress.
7. Go to Dashboard => WP Post Template and set your general setting.
8. To create new custom Post Template you need to put the new file in the same directory/folder as your index.php and just need to add comment (WP Post Template: Your New Post Template Name) in your new post template file same as you do for page template.



= Uninstall =

1. Deactivate WP Post Template in the 'Plugins' menu in Wordpress.
2. After Deactivation a 'Delete' link appears below the plugin name, follow the link and confirm with 'Yes, Delete these files'.
3. This will delete all the plugin files from the server as well as erasing all options the plugin has stored in the database.

== Frequently Asked Questions ==

- This is a forked version of dotsquares' WP Post Template plugin. It allows theme authors to create post templates as well as page templates for their custom post types.

== Upgrade Notice ==
Forked from WP Custom Post Template 1.0 (https://wordpress.org/plugins/wp-custom-post-template/)

== Changelog ==

= 1.4.1 =
* Minor documentation fixes

= 1.4 =
* Added integration with Advanced Custom Fields that allows creating fields based on a post template selected

= 1.3.1 =
* Added backwards compatibility with forked plugin, if you do not explicitly specify a post type (that is active in the plugins settings) in the template the template will be available to any post type (that is active in the settings).

= 1.3 =
* Forked plugin
* added the ability to use post types in the template files
* redid the admin screen -- its now under settings
* reworked some of the code

= 1.1 - 2015-07-18 =
* Updated according to new wp version functions.

= 1.0 =
* A initial version.

== Screenshots ==

1. Screenshot of dropdown for selecting a custom post type template
2. Screenshot of the enable post type select screen
3. Screenshot of a template that is a page template and a custom post type template for two different custom post types
4. Screenshot demonstrating how to use a Custom Post Type Template with Advanced Custom Fields
