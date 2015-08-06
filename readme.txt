=== WP Payeezy Pay ===
Contributors: RickRottman
Tags: First Data, Payeezy, Global Gateway e4, Payments, Hosted Checkout, Payment Page, E-Commerce
Requires at least: 3.0.1
Tested up to: 4.2.4
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Connects a WordPress site to First Data's Payeezy Gateway using the Payment Page or Hosted Checkout method. Very easy to set up. No SSL required! 

== Description ==

Plugin creates a shortcode that when placed in the page or a post, generates a payment form for a Payeezy Payment Page. The published form includes:

* First Name
* Last Name
* Street Address
* City
* State (dropdown)
* Zip Code
* Country (dropdown)
* Email Address
* Phone Number
* Comment
* x_invoice_num (optional)
* x_po_num (optional)
* x_reference_3 (optional)
* User Defined 1 (optional)
* User Defined 2 (optional)
* User Defined 3 (optional)
* Amount

Once a customer enters their information, they press the "Pay Now" button. They are then redirected to the secure Payeezy payment form hosted by First Data where they finish entering their information including credit card number, expiration date, and security code. The customer then clicks "Pay with your credit card" and the payment is made. Once the transaction is complete, the user is provided a receipt. They can then click a button and be redirected back to the original website. 

== Installation ==

**From your WordPress dashboard**

1. Visit 'Plugins > Add New'.

2. Search for 'WP Payeezy Pay'.

3. Activate WP Payeezy Pay from your Plugins page.

**From WordPress.org**

1. Download WP Payeezy Pay.

2. Upload the 'WP Payeezy Pay' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...).

3. Activate WP Payeezy Pay from your Plugins page. 

**Once Activated**

1. Visit 'Menu > WP Payeezy Pay > and enter the Payment Page ID and the Transaction Key. These values are obtained in Payeezy. 

2. Chose the Mode you wish to use, Live for a production account, one that actually processes credit cards, or Demo for a non-production testing account.

3. Enter an email address into the Payment Notification field if you would like a second notification email sent out when a payment is made. The notification email goes to the email entered in section one of the Payment Page Settings, this is a duplication of that email. This is intended for merchants who would like more than one individual to be informed when a payment is made. Leave it blank if you do not want Payeezy to send a second notification email.

4. Enter names for the optional payment form fields that you would like to use with your payment form. If you leave any of these fields blank, they will not appear on the published payment for. For example, if you want your customers to enter their invoice number on the bill they are paying, you would enter "Invoice Number" in the x_invoice_num field. A field will then appear on the published payment form for Invoice Number. The value entered by the cardholder will be passed to Payeezy and it will be part of the transaction record. 

5. Press 'Save Settings'.


**Once Configured**

1. To add a payment form to a Post or a Page, simply add the '[wp_payeezy_payment_form]' shortcode to content. 

2. Publish the Post or Page. 

3. That's it! 


== Frequently Asked Questions ==

= Is this plugin an official First Data Payeezy product? =

No! This plugin is independent of First Data Payeezy, but was built using their [sample code](https://support.payeezy.com/hc/en-us/articles/204011429-Sample-Code-for-Creating-a-Pay-Button-to-use-with-a-Hosted-Payment-Page). 

= Can I style the payment form? =

Yes. The is a text file included in the plugin folder that contains css.

= May I contact you if I have any questions or suggestions? =

Yes, feel free to contact me by email or Twitter.

Email: [rlrottman@gmail.com](mailto:rlrottman@gmail.com)

Twitter: [@RLRottman](https://twitter.com/RLRottman)


== Screenshots ==

1. Settings Page
2. Shortcode in action. 
3. A WordPress page displaying the finished form.
4. Where to get the values for Payment Page ID and Transaction Key within Payeezy, Payment Pages > The Payment Page > Security. 


== Changelog ==

= 1.2 = 

* Removed Recurring. Was causing an error if no Recurring Plan ID was entered in the settings. The ability to add Recurring will be added back in a future update. Stay tuned!

= 1.1 = 

* Changed the field values to be required values if they are added to the form. If a cardholder leaves a field blank, they will be told the field is required before proceeding. 

= 1.0 =

* Initial release.


== Upgrade Notice ==

= 1.2 = 

I had to remove the ability to do Recurring. Was causing an error if no Recurring Plan ID was entered in the settings. The ability to add Recurring will be added back in a future update. Stay tuned!

= 1.1 =

Fixed form fields so that they are required to be filled in by the cardholder. If you include a field in the form, the cardholder will not be allowed to proceed to Payeezy until they enter something.