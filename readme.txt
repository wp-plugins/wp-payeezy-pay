=== WP Payeezy Pay ===
Contributors: RickRottman
Donate link: https://www.paypal.me/RichardRottman
Tags: First Data, Payeezy, Global Gateway e4, Payments, Hosted Checkout, Payment Page, E-Commerce, Recurring
Requires at least: 3.0.1
Tested up to: 4.3
Stable tag: 2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Connects a WordPress site to First Data's Payeezy Gateway. No SSL required! 

== Description ==

Plugin creates a shortcode that when placed in the page or a post, generates a payment form for a Payeezy Payment Page. The published form includes:

* First Name
* Last Name
* Street Address
* City
* State (dropdown)
* Zip Code
* Country (dropdown)
* Email Address (optional)
* Phone Number (optional)
* x_invoice_num (optional)
* x_po_num (optional)
* x_reference_3 (optional)
* User Defined 1 (optional)
* User Defined 2 (optional)
* User Defined 3 (optional)
* Amount (optionally recurring every month)
* "Pay Now" or "Donate Now" button

Once a cardholder enters their information, they press the "Pay Now" or “Donate Now” button. They are then redirected to the secure Payeezy payment form hosted by First Data where they finish entering their information including credit card number, expiration date, and security code. The cardholder then clicks "Pay with your credit card" and the payment is made. Once the transaction is complete, the user is provided a receipt. They can then click a link and be redirected back to the original website. 

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

3. Enter the Type of Transactions you want the Payment Page to make:

    * Payments  - All payments are done on a singular basis. 

    * Payments with optional Recurring - Customer has the option of clicking a box that will repeat their payment automatically in 30 days. If they don’t click the box, the payment is handled as a single payment. Recurring payment will continue until the Payeezy Merchant Administrator goes into Recurring and suspends or deletes the Recurring payment.
 
    * Payments with automatic Recurring - Customer doesn’t get a checkbox to make the payment recurring. The transaction will automatically be made again in 30 days and will continue until the Payeezy Merchant Administrator goes into Recurring and suspends or deletes the Recurring payment. Good for gym memberships, karate schools, etc.

    * Donations - Cardholder will have the option of making a donation by selecting a predefined amount. If none of the predefined amounts are optimal, they can select “Other” and enter their own. Instead of a button labeled “Pay Now” to go to the secure payment form hosted by First Data, the button will be labeled “Donate Now.” 

    * Donations with optional Recurring - This is just like the above, but it gives the cardholder the option of making their donation on a monthly recurring basis by clicking a box. Recurring donations will continue until the Payeezy Merchant Administrator goes into Recurring and suspends or deletes the Recurring donation. 

4. Enter names for the optional payment form fields that you would like to use with your payment form. If you leave any of these fields blank, they will not appear on the published payment for. For example, if you want your customers to enter their invoice number on the bill they are paying, you would enter "Invoice Number" in the x_invoice_num field. A field will then appear on the published payment form for Invoice Number. The value entered by the cardholder will be passed on to Payeezy and it will be part of the transaction record. 

5. Press 'Save Settings'.


**Once Configured**

1. To add a payment form to a Post or a Page, simply add the '[wp_payeezy_payment_form]' shortcode to content. 

2. Publish the Post or Page. 

3. That's it! 


== Frequently Asked Questions ==

= Is this plugin an official First Data Payeezy product? =

No! This plugin is independent of First Data Payeezy, but was built using their [sample code](https://support.payeezy.com/hc/en-us/articles/204011429-Sample-Code-for-Creating-a-Pay-Button-to-use-with-a-Hosted-Payment-Page). 

= Can I style the payment form? =

Yes. I’ve included style in the form, but any of these values can be overriden by placing them at the end (bottom) of your theme’s style sheet. These values are:

#x_first_name {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_last_name {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_address {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_city {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_state {
    width:200px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_country {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        border-radius:0px;
        }

#x_invoice_num {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_po_num {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_reference_3 {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_user1 {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_user2 {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_user3 {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_email {
    width:250px;
        padding:0 0 0 3px;
        border-color:#222;
        }
#x_phone {
    width:125px;
        padding:0 0 0 3px;
        border-color:#222;
        }

#x_zip {
    width:100px;
        padding:0 0 0 3px;
        border-color:#222;
}


#x_amount {
    width:100px;
    padding:0 0 0 3px;
        border-color:green;
        
}

To add anything, you would just add it to the value you added to your theme’s style sheet. To override anything, you would put !important and the end of what you are changing. For instance:

#x_amount {
    width:150px!important;// was 100px
    padding:5px !important;// was padding: 0 0 0 3px
                
}

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

= 2.2 = 

* Now the cardholder making a donation cannot proceed to Payeezy without picking an amount.  

= 2.1 = 

* Made a change that strengthens security of the plugin. The Transaction Key is no longer visable in the HTML form. It's now stored in a tiny file called key.php located in the plugin's directory.   

= 2.0 = 

* Combined this plugin with my other plugin, WP Payeezy Donate. All features found in that plugin are now rolled into this plugin. Going forward, this will be the only plugin updated, assuming updates are needed. If you select a Transaction Type option that supports Recurring and if you save the settings without entering a Recurring Billing ID, an error is displayed. If the mode is set to Demo, it now displays a notice. I also corrected a few typos and commented most of the code.  

= 1.4 = 

* Added the ability to do Recurring.

= 1.3 = 

* Fixed a typo that wasn't allowing x_reference_3 to work. 

= 1.2 = 

* Removed Recurring. Was causing an error if no Recurring Plan ID was entered in the settings. The ability to add Recurring will be added back in a future update. Stay tuned!

= 1.1 = 

* Changed the field values to be required values if they are added to the form. If a cardholder leaves a field blank, they will be told the field is required before proceeding. 

= 1.0 =

* Initial release.


== Upgrade Notice ==

= 2.2 = 

* Now the cardholder making a donation cannot proceed to Payeezy without picking an amount.  

= 2.1 = 

* IMPORTANT! After upgrading, make sure you go into the plugin's settings and press the blue "Save Changes" button at the bottom of the page. I made a somewhat major change that strengthens the security of the plugin. The Transaction Key is no longer visible in the HTML form. It's now stored in a tiny file called key.php located in the plugin's directory.  If you don't press "Save Changes" it will not save the Transaction Key to this new file. I also included an internal style sheet for the form. Each field now has an ID that will make customizing it much easier. 

= 2.0 = 

* Combined this plugin with my other plugin, WP Payeezy Donate. All features found in that plugin are now rolled into this plugin. Going forward, this will be the only plugin updated, assuming updates are needed. If you select a Transaction Type option that supports Recurring and if you save the settings without entering a Recurring Billing ID, an error is displayed. If the mode is set to Demo, it now displays a notice. I also corrected a few typos and commented most of the code.  

= 1.2 = 

I had to remove the ability to do Recurring. Was causing an error if no Recurring Plan ID was entered in the settings. The ability to add Recurring will be added back in a future update. Stay tuned!

= 1.1 =

Fixed form fields so that they are required to be filled in by the cardholder. If you include a field in the form, the cardholder will not be allowed to proceed to Payeezy until they enter something.