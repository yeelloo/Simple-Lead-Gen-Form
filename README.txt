=== Simple Lead Gen Form ===
Contributors: yeelloo
Donate link: https://profiles.wordpress.org/yeelloo/
Tags: comments, spam
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Goal: We are building a simple CRM system for a client. The
system will collect customer data and build customer profiles
inside of the client’s WordPress Dashboard. They need to collect
data from potential customers via a simple lead gen form and
then have a list of customers that is easy to browse and keep
track of. They want to be able to place this form anywhere. To do
this, you will be creating a shortcode that generates a submission
form with applicable fields. This form, when submitted, will save
the submission as a private post as part of a custom post type
called “Customer.” These posts can then be viewed, managed,
tagged and categorized by the admin in the WordPress
Dashboard.
• Create a shortcode that generates a form with the following fields:
o Name
o Phone Number
o Email Address
o Desired Budget
o Message
• The shortcode should include attributes that allows the admin to:
o Override the labels/titles of the various fields, (e.g. ability to
override label: "Name: " to "Your Full Name")
o Set a max-length for any field.
o Set rows and cols attributes of the Message text area.
• Style the contact form in a way that is presentable and readable. 
o Ensure that the form is optimized for mobile using responsive
styling if necessary.
• Use Ajax to handle form submission.
• Fetch current date and time using a 3rd party API, adding that date and
time to a hidden field in the form to be included in the post.
• Save the completed form submission to the database as a post in the
“Customer” custom post type.
• These posts should not be viewable by the public.

== Description ==

This is the long description.  No limit, and you can use Markdown (as well as in the following sections).

== Installation ==

1. Upload `slgf.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_shortcode('slgfFrom'); ?>` in your templates

== Frequently Asked Questions ==

= How to use it? =

You can place the form anywere by using shortcode: [slgfFrom]

= Does the shortcode support any attributes? =
The shortcoe comes with followig atts "title, name, name-max, phone, phone-max, email, email-max, message, message-rows, message-cols"

== Screenshots ==

== Changelog ==

= 1.0 =
* Initial