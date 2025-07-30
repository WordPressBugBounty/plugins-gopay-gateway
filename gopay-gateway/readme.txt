=== GoPay for WooCommerce ===
Contributors: GoPay
Tags: WooCommerce, GoPay
Requires at least: 5.8
Tested up to: 6.7.1
Requires PHP: 8.1
Stable tag: 1.0.15
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WooCommerce and GoPay payment gateway integration

== Description ==
This is the official plugin for connecting GoPay payment gateway to your e-shop. GoPay is already used by over 18,000 e-shops in the Czech Republic, Slovakia and all over the world. Start accepting payments today!

= Plugin functions: =
* 56 payment methods including Google Pay, Apple Pay, Click to Pay and PSD2 bank transfers
* 9 currencies and 13 language localizations
* mobile and desktop payment gateway
* remember mode on the payment gateway - customer can remember payment card details and pay just by one click
* payment cancellation
* recurring payments
* payment restart

== Installation ==
First of all, install WordPress and WooCommerce, then upload and configure the plugin by following the steps below:
1. Copy the plugin files to the '/wp-content/plugins/' directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the Plugins screen in WordPress.
3. Configure the plugin by providing goid, client id and secret to load the other options (they can be found on your GoPay account).
4. Finally, choose the options you want to be available in the payment gateway (payment methods and banks must also be enabled in your GoPay account).

== Frequently Asked Questions ==

= How will I receive my payments? =
Successful payments will be automatically credited to the GoPay merchant account. We will send it from the merchant account to the registered bank account at the time of clearing.

= How often is clearing done? =
We offer 3 clearing frequencies - daily, weekly and monthly.

= Do I need to have a bank account to receive payments? =
Yes, it is necessary to register a bank account to receive a clearing.

= How do I know that the customer has successfully paid? =
After a successful payment, we send a notification about the change of the payment status. You can also check the payment status in your GoPay merchant account.

== Screenshots ==

1. Card payment - desktop version
2. Card payment - mobile version
3. Saved cards - desktop version
4. Saved cards - mobile version
5. Payment method selection - desktop version
6. Payment methods selection - mobile version

= Minimum requirements =
* WordPress 5.8
* PHP version 8.1
* WooCommerce version 7.0
* WooCommerce Subscriptions¹ 4.0

1 - WooCommerce Subscriptions must be installed if you need to deal with recurring payments.

== Changelog ==

= 1.0.0 =
WooCommerce and GoPay gateway integration.

= 1.0.1 =
Fixed variable products error

= 1.0.2 =
Fixed issues when enabled payment instruments was empty

= 1.0.3 =
Translation fix for payment options

= 1.0.4 =
Add fix when the order is not Object type

= 1.0.5 =
Correction added for inconsistency of total amount in cents

= 1.0.6 =
Update PHP version and libraries to the latest supported releases

= 1.0.7 =
Removed Docker files and updated readme-dev

= 1.0.8 =
Add HPOS support

= 1.0.9 =
Fix transport method settings for downloadable products

= 1.0.10 =
Fix available supported shipping methods in plugin configuration

= 1.0.11 =
Replace get_post_meta with get_meta to fully leverage the performance benefits of HPOS and prevent issues with payment refunds if compatibility mode is disabled.

= 1.0.12 =
Plugin compatibility with WC Block based checkout, Fix db duplicate entry error after payment status check

= 1.0.13 =
Introduced new payment methods: Twisto and Skip Pay. The checkout payment methods language now aligns with the WordPress site language.

= 1.0.14 =
Updated supported WordPress version to v6.7.1 and WooCommerce to v9.6.1.

= 1.0.15 =
Add extra API parameters and fix an issue that, in certain cases, prevents virtual products from being added to checkout.
