<?php
/*
Plugin Name: WP Payeezy Pay
Version: 2.0
Plugin URI: http://bentcorner.com/wp-payeezy-pay/
Description: Connects a WordPress site to First Data's Payeezy Gateway, formally known as Global Gateway e4, using the Payment Page or Hosted Checkout method. Handles both payments and donations. No SSL ! 
Author: Richard Rottman
Author URI: http://www.richard-rottman.com/
*/

function wppayeezypaymentform() {

$x_login = get_option('x_login') ;
$transaction_key = get_option('transaction_key') ;
$x_recurring_billing_id = get_option('x_recurring_billing_id') ;
$mode = get_option ('mode') ; // production or demo
$mode2 = get_option ('mode2') ; // payments or donations

// There are for target php files in the plugin folder that transactional information collected
// in the form goes to before it's sent to Payeezy. The connection between Payeezy and the website
// is between the target php. The following if/elseif/else selects which target php file
// the form goes to based on the criteria. 

if ( $mode2 == "pay") {
    $pay_file = plugins_url('wp-payeezy-pay/pay.php'); // Payments WITHOUT the option of making the payment recurring.
}

elseif ( $mode2 == "pay-rec" ) {
    $pay_file = plugins_url('wp-payeezy-pay/pay-rec.php'); // Payments WITH the option of making the payment recurring.
}

elseif ( $mode2 == "pay-rec-req" ) {
    $pay_file = plugins_url('wp-payeezy-pay/pay-rec.php'); // Payments WITH the option of making the payment recurring.
}

elseif ( $mode2 == "donate"  ) {
    $pay_file = plugins_url('wp-payeezy-pay/donate.php'); // Donations WITHOUT the option of making the donation recurring.
}

elseif ( $mode2 == "donate-rec"  ) {
    $pay_file = plugins_url('wp-payeezy-pay/donate-rec.php'); // Donations WITH the option of making the donation recurring.
}

elseif ( $mode2 == "donate-rec"  ) {
    $pay_file = plugins_url('wp-payeezy-pay/donate-rec.php'); // Donations WITH the option of making the donation recurring.
}
else {$pay_file = plugins_url('wp-payeezy-pay/dump.php'); // Something must have gone terribly wrong if the payment info is sent here.
}

// These fields only show on the form if they are named. If they are left blank, they
// will not show on the published payment form and will not be sent to the Payeezy gateway.

// S T A R T

// This is the Ref. Num that shows in Transactions on the front page.
$x_invoice_num = get_option('x_invoice_num');

// This is the Cust. Ref. Num that shows in Transactions on the front page. Also referred
// to as Purchase Order or PO number. It's a reference number submitted by the customer
// for their own record keeping.
$x_po_num = get_option('x_po_num');

// This shows up on the final order form as "Item" unless Invoice Number is used.
// If there is an Invoice Number sent, that overrides the Description. 
$x_description = get_option('x_description');

// Just an extra reference number if Invoice Number and Customer Reference Number are
// not enough referance numbers for your purposes. 
$x_reference_3 = get_option('x_reference_3');

// Next three are custom fields that if passed over to Payeezy, will show populated on
// the secure order form and the information collected will be passed a long with all the
// other info. 
$x_user1 = get_option('x_user1') ;
$x_user2 = get_option('x_user2') ;
$x_user3 = get_option('x_user3') ;

// If you want to collect the customer's phone number and/or email address, you can do so
// by giving these two fields a name, such as "phone" and "email."
$x_phone = get_option('x_phone') ;
$x_email = get_option('x_email') ;

// E N D 

// Tells WordPress to start remembering everything that would normally be outputted, but
// not to do anything with it yet.
ob_start();
?>

<div id="wp_payeezy_payment_form">
  <hr>
  <br>
  <form action="<?php echo $pay_file;?>" method="post">
  <input name="x_login" value="<?php echo $x_login;?>" type="hidden" >
  <input name="transaction_key" value="<?php echo $transaction_key;?>" type="hidden" >
  <input name="x_recurring_billing_id" value="<?php echo $x_recurring_billing_id;?>" type="hidden" >
  <input name="mode" value="<?php echo $mode;?>" type="hidden" >
  <!-- Live (production) or Demo -->
  <?php
echo '<p><label>First Name</label><input name="x_first_name" value="" type="text" required></p>'; 
echo '<p><label>Last Name</label><input name="x_last_name" value="" type="text" required></p>'; 
echo '<p><label>Street Address</label><input name="x_address" value="" type="text" required></p>'; 
echo '<p><label>City</label><input name="x_city" value="" type="text" required></p>'; 
echo '<p><label>State/Province</label><select name="x_state" required>'; 
echo '<option value="Alabama">Alabama</option>';
echo '<option value="Alaska">Alaska</option>';
echo '<option value="Arizona">Arizona</option>';
echo '<option value="Arkansas">Arkansas</option>';
echo '<option value="California">California</option>';
echo '<option value="Colorado">Colorado</option>';
echo '<option value="Connecticut">Connecticut</option>';
echo '<option value="Delaware">Delaware</option>';
echo '<option value="District of Columbia">District of Columbia</option>';
echo '<option value="Florida">Florida</option>';
echo '<option value="Georgia">Georgia</option>';
echo '<option value="Hawaii">Hawaii</option>';
echo '<option value="Idaho">Idaho</option>';
echo '<option value="Illinois">Illinois</option>';
echo '<option value="Indiana">Indiana</option>';
echo '<option value="Iowa">Iowa</option>';
echo '<option value="Kansas">Kansas</option>';
echo '<option value="Kentucky">Kentucky</option>';
echo '<option value="Louisiana">Louisiana</option>';
echo '<option value="Maine">Maine</option>';
echo '<option value="Maryland">Maryland</option>';
echo '<option value="Massachusetts">Massachusetts</option>';
echo '<option value="Michigan">Michigan</option>';
echo '<option value="Minnesota">Minnesota</option>';
echo '<option value="Mississippi">Mississippi</option>';
echo '<option value="Missouri">Missouri</option>';
echo '<option value="Montana">Montana</option>';
echo '<option value="Nebraska">Nebraska</option>';
echo '<option value="Nevada">Nevada</option>';
echo '<option value="New Hampshire">New Hampshire</option>';
echo '<option value="New Jersey">New Jersey</option>';
echo '<option value="New Mexico">New Mexico</option>';
echo '<option value="New York">New York</option>';
echo '<option value="North Carolina">North Carolina</option>';
echo '<option value="North Dakota">North Dakota</option>';
echo '<option value="Ohio">Ohio</option>';
echo '<option value="Oklahoma">Oklahoma</option>';
echo '<option value="Oregon">Oregon</option>';
echo '<option value="Pennsylvania">Pennsylvania</option>';
echo '<option value="Puerto Rico">Puerto Rico</option>';
echo '<option value="Rhode Island">Rhode Island</option>';
echo '<option value="South Carolina">South Carolina</option>';
echo '<option value="South Dakota">South Dakota</option>';
echo '<option value="Tennessee">Tennessee</option>';
echo '<option value="Texas">Texas</option>';
echo '<option value="Utah">Utah</option>';
echo '<option value="Vermont">Vermont</option>';
echo '<option value="Virginia">Virginia</option>';
echo '<option value="Washington">Washington</option>';
echo '<option value="West Virginia">West Virginia</option>';
echo '<option value="Wisconsin">Wisconsin</option>';
echo '<option value="Wyoming">Wyoming</option>';
echo '<option value="" disabled="disabled">-------------</option>';
echo '<option value="Alberta">Alberta</option>';
echo '<option value="British Columbia">British Columbia</option>';
echo '<option value="Manitoba">Manitoba</option>';
echo '<option value="New Brunswick">New Brunswick</option>';
echo '<option value="Newfoundland">Newfoundland</option>';
echo '<option value="Northwest Territories">Northwest Territories</option>';
echo '<option value="Nova Scotia">Nova Scotia</option>';
echo '<option value="Nunavut">Nunavut</option>';
echo '<option value="Ontario">Ontario</option>';
echo '<option value="Prince Edward Island">Prince Edward Island</option>';
echo '<option value="Quebec">Quebec</option>';
echo '<option value="Saskatchewan">Saskatchewan</option>';
echo '<option value="Yukon">Yukon</option>';
echo '<option value="" disabled="disabled">-------------</option>';
echo '<option value="N/A">Not Applicable</option>';
echo '</select></p>';
echo '<p><label>Zip Code</label><input name="x_zip" value="" size="7" type="text" required></p>'; 
echo '<p><label>Country</label><select id="x_country" name="x_country" onchange="switch_province()" tabindex="10">';
echo '<option value="United States" selected="selected">United States</option>';
echo '<option value="Canada">Canada</option>';
echo '<option value="" disabled="disabled">-------------</option>';
echo '<option value="Afghanistan">Afghanistan</option>';
echo '<option value="Aland Islands">Aland Islands</option>';
echo '<option value="Albania">Albania</option>';
echo '<option value="Algeria">Algeria</option>';
echo '<option value="American Samoa">American Samoa</option>';
echo '<option value="Andorra">Andorra</option>';
echo '<option value="Angola">Angola</option>';
echo '<option value="Anguilla">Anguilla</option>';
echo '<option value="Antarctica">Antarctica</option>';
echo '<option value="Antigua and Barbuda">Antigua and Barbuda</option>';
echo '<option value="Argentina">Argentina</option>';
echo '<option value="Armenia">Armenia</option>';
echo '<option value="Aruba">Aruba</option>';
echo '<option value="Australia">Australia</option>';
echo '<option value="Austria">Austria</option>';
echo '<option value="Azerbaijan">Azerbaijan</option>';
echo '<option value="Bahamas">Bahamas</option>';
echo '<option value="Bahrain">Bahrain</option>';
echo '<option value="Bangladesh">Bangladesh</option>';
echo '<option value="Barbados">Barbados</option>';
echo '<option value="Belarus">Belarus</option>';
echo '<option value="Belgium">Belgium</option>';
echo '<option value="Belize">Belize</option>';
echo '<option value="Benin">Benin</option>';
echo '<option value="Bermuda">Bermuda</option>';
echo '<option value="Bhutan">Bhutan</option>';
echo '<option value="Bolivia">Bolivia</option>';
echo '<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>';
echo '<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>';
echo '<option value="Botswana">Botswana</option>';
echo '<option value="Bouvet Island">Bouvet Island</option>';
echo '<option value="Brazil">Brazil</option>';
echo '<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>';
echo '<option value="Brunei Darussalam">Brunei Darussalam</option>';
echo '<option value="Bulgaria">Bulgaria</option>';
echo '<option value="Burkina Faso">Burkina Faso</option>';
echo '<option value="Burundi">Burundi</option>';
echo '<option value="Cambodia">Cambodia</option>';
echo '<option value="Cameroon">Cameroon</option>';
echo '<option value="Canada">Canada</option>';
echo '<option value="Cape Verde">Cape Verde</option>';
echo '<option value="Cayman Islands">Cayman Islands</option>';
echo '<option value="Central African Republic">Central African Republic</option>';
echo '<option value="Chad">Chad</option>';
echo '<option value="Chile">Chile</option>';
echo '<option value="China">China</option>';
echo '<option value="Christmas Island">Christmas Island</option>';
echo '<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>';
echo '<option value="Colombia">Colombia</option>';
echo '<option value="Comoros">Comoros</option>';
echo '<option value="Congo">Congo</option>';
echo '<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>';
echo '<option value="Cook Islands">Cook Islands</option>';
echo '<option value="Costa Rica">Costa Rica</option>';
echo '<option value="Cote D&#x27;Ivoire">Cote D&#x27;Ivoire</option>';
echo '<option value="Croatia">Croatia</option>';
echo '<option value="Cuba">Cuba</option>';
echo '<option value="Curacao">Curacao</option>';
echo '<option value="Cyprus">Cyprus</option>';
echo '<option value="Czech Republic">Czech Republic</option>';
echo '<option value="D.P.R. Korea">D.P.R. Korea</option>';
echo '<option value="Denmark">Denmark</option>';
echo '<option value="Djibouti">Djibouti</option>';
echo '<option value="Dominica">Dominica</option>';
echo '<option value="Dominican Republic">Dominican Republic</option>';
echo '<option value="Ecuador">Ecuador</option>';
echo '<option value="Egypt">Egypt</option>';
echo '<option value="El Salvador">El Salvador</option>';
echo '<option value="Equatorial Guinea">Equatorial Guinea</option>';
echo '<option value="Eritrea">Eritrea</option>';
echo '<option value="Estonia">Estonia</option>';
echo '<option value="Ethiopia">Ethiopia</option>';
echo '<option value="Falkland Islands">Falkland Islands</option>';
echo '<option value="Faroe Islands">Faroe Islands</option>';
echo '<option value="Fiji">Fiji</option>';
echo '<option value="Finland">Finland</option>';
echo '<option value="France">France</option>';
echo '<option value="French Guiana">French Guiana</option>';
echo '<option value="French Polynesia">French Polynesia</option>';
echo '<option value="French Southern Territories">French Southern Territories</option>';
echo '<option value="Gabon">Gabon</option>';
echo '<option value="Gambia">Gambia</option>';
echo '<option value="Georgia">Georgia</option>';
echo '<option value="Germany">Germany</option>';
echo '<option value="Ghana">Ghana</option>';
echo '<option value="Gibraltar">Gibraltar</option>';
echo '<option value="Greece">Greece</option>';
echo '<option value="Greenland">Greenland</option>';
echo '<option value="Grenada">Grenada</option>';
echo '<option value="Guadeloupe">Guadeloupe</option>';
echo '<option value="Guam">Guam</option>';
echo '<option value="Guatemala">Guatemala</option>';
echo '<option value="Guernsey">Guernsey</option>';
echo '<option value="Guinea">Guinea</option>';
echo '<option value="Guinea-Bissau">Guinea-Bissau</option>';
echo '<option value="Guyana">Guyana</option>';
echo '<option value="Haiti">Haiti</option>';
echo '<option value="Heard and McDonald Islands">Heard and McDonald Islands</option>';
echo '<option value="Honduras">Honduras</option>';
echo '<option value="Hong Kong SAR, PRC">Hong Kong SAR, PRC</option>';
echo '<option value="Hungary">Hungary</option>';
echo '<option value="Iceland">Iceland</option>';
echo '<option value="India">India</option>';
echo '<option value="Indonesia">Indonesia</option>';
echo '<option value="Iran">Iran</option>';
echo '<option value="Iraq">Iraq</option>';
echo '<option value="Ireland">Ireland</option>';
echo '<option value="Isle of Man">Isle of Man</option>';
echo '<option value="Israel">Israel</option>';
echo '<option value="Italy">Italy</option>';
echo '<option value="Jamaica">Jamaica</option>';
echo '<option value="Japan">Japan</option>';
echo '<option value="Jersey">Jersey</option>';
echo '<option value="Jordan">Jordan</option>';
echo '<option value="Kazakhstan">Kazakhstan</option>';
echo '<option value="Kenya">Kenya</option>';
echo '<option value="Kiribati">Kiribati</option>';
echo '<option value="Korea">Korea</option>';
echo '<option value="Kuwait">Kuwait</option>';
echo '<option value="Kyrgyzstan">Kyrgyzstan</option>';
echo '<option value="Lao People&#x27;s Republic">Lao People&#x27;s Republic</option>';
echo '<option value="Latvia">Latvia</option>';
echo '<option value="Lebanon">Lebanon</option>';
echo '<option value="Lesotho">Lesotho</option>';
echo '<option value="Liberia">Liberia</option>';
echo '<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>';
echo '<option value="Liechtenstein">Liechtenstein</option>';
echo '<option value="Lithuania">Lithuania</option>';
echo '<option value="Luxembourg">Luxembourg</option>';
echo '<option value="Macau">Macau</option>';
echo '<option value="Macedonia">Macedonia</option>';
echo '<option value="Madagascar">Madagascar</option>';
echo '<option value="Malawi">Malawi</option>';
echo '<option value="Malaysia">Malaysia</option>';
echo '<option value="Maldives">Maldives</option>';
echo '<option value="Mali">Mali</option>';
echo '<option value="Malta">Malta</option>';
echo '<option value="Marshall Islands">Marshall Islands</option>';
echo '<option value="Martinique">Martinique</option>';
echo '<option value="Mauritania">Mauritania</option>';
echo '<option value="Mauritius">Mauritius</option>';
echo '<option value="Mayotte">Mayotte</option>';
echo '<option value="Mexico">Mexico</option>';
echo '<option value="Micronesia">Micronesia</option>';
echo '<option value="Moldova">Moldova</option>';
echo '<option value="Monaco">Monaco</option>';
echo '<option value="Mongolia">Mongolia</option>';
echo '<option value="Montenegro">Montenegro</option>';
echo '<option value="Montserrat">Montserrat</option>';
echo '<option value="Morocco">Morocco</option>';
echo '<option value="Mozambique">Mozambique</option>';
echo '<option value="Myanmar">Myanmar</option>';
echo '<option value="Namibia">Namibia</option>';
echo '<option value="Nauru">Nauru</option>';
echo '<option value="Nepal">Nepal</option>';
echo '<option value="Netherlands">Netherlands</option>';
echo '<option value="New Caledonia">New Caledonia</option>';
echo '<option value="New Zealand">New Zealand</option>';
echo '<option value="Nicaragua">Nicaragua</option>';
echo '<option value="Niger">Niger</option>';
echo '<option value="Nigeria">Nigeria</option>';
echo '<option value="Niue">Niue</option>';
echo '<option value="Norfolk Island">Norfolk Island</option>';
echo '<option value="Northern Mariana Islands">Northern Mariana Islands</option>';
echo '<option value="Norway">Norway</option>';
echo '<option value="Not Available">Not Available</option>';
echo '<option value="Oman">Oman</option>';
echo '<option value="Pakistan">Pakistan</option>';
echo '<option value="Palau">Palau</option>';
echo '<option value="Palestine, State of">Palestine, State of</option>';
echo '<option value="Panama">Panama</option>';
echo '<option value="Papua New Guinea">Papua New Guinea</option>';
echo '<option value="Paraguay">Paraguay</option>';
echo '<option value="Peru">Peru</option>';
echo '<option value="Philippines">Philippines</option>';
echo '<option value="Pitcairn">Pitcairn</option>';
echo '<option value="Poland">Poland</option>';
echo '<option value="Portugal">Portugal</option>';
echo '<option value="Puerto Rico">Puerto Rico</option>';
echo '<option value="Qatar">Qatar</option>';
echo '<option value="Reunion">Reunion</option>';
echo '<option value="Romania">Romania</option>';
echo '<option value="Russian Federation">Russian Federation</option>';
echo '<option value="Rwanda">Rwanda</option>';
echo '<option value="Saint Barthelemy">Saint Barthelemy</option>';
echo '<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>';
echo '<option value="Saint Lucia">Saint Lucia</option>';
echo '<option value="Saint Martin (French part)">Saint Martin (French part)</option>';
echo '<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>';
echo '<option value="Samoa">Samoa</option>';
echo '<option value="San Marino">San Marino</option>';
echo '<option value="Sao Tome and Principe">Sao Tome and Principe</option>';
echo '<option value="Saudi Arabia">Saudi Arabia</option>';
echo '<option value="Senegal">Senegal</option>';
echo '<option value="Serbia">Serbia</option>';
echo '<option value="Seychelles">Seychelles</option>';
echo '<option value="Sierra Leone">Sierra Leone</option>';
echo '<option value="Singapore">Singapore</option>';
echo '<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>';
echo '<option value="Slovakia">Slovakia</option>';
echo '<option value="Slovenia">Slovenia</option>';
echo '<option value="Solomon Islands">Solomon Islands</option>';
echo '<option value="Somalia">Somalia</option>';
echo '<option value="South Africa">South Africa</option>';
echo '<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>';
echo '<option value="South Sudan">South Sudan</option>';
echo '<option value="Spain">Spain</option>';
echo '<option value="Sri Lanka">Sri Lanka</option>';
echo '<option value="St Helena">St Helena</option>';
echo '<option value="St Pierre and Miquelon">St Pierre and Miquelon</option>';
echo '<option value="Sudan">Sudan</option>';
echo '<option value="Suriname">Suriname</option>';
echo '<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>';
echo '<option value="Swaziland">Swaziland</option>';
echo '<option value="Sweden">Sweden</option>';
echo '<option value="Switzerland">Switzerland</option>';
echo '<option value="Syrian Arab Republic">Syrian Arab Republic</option>';
echo '<option value="Taiwan Region">Taiwan Region</option>';
echo '<option value="Tajikistan">Tajikistan</option>';
echo '<option value="Tanzania">Tanzania</option>';
echo '<option value="Thailand">Thailand</option>';
echo '<option value="Timor-Leste">Timor-Leste</option>';
echo '<option value="Togo">Togo</option>';
echo '<option value="Tokelau">Tokelau</option>';
echo '<option value="Tonga">Tonga</option>';
echo '<option value="Trinidad and Tobago">Trinidad and Tobago</option>';
echo '<option value="Tunisia">Tunisia</option>';
echo '<option value="Turkey">Turkey</option>';
echo '<option value="Turkmenistan">Turkmenistan</option>';
echo '<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>';
echo '<option value="Tuvalu">Tuvalu</option>';
echo '<option value="Uganda">Uganda</option>';
echo '<option value="Ukraine">Ukraine</option>';
echo '<option value="United Arab Emirates">United Arab Emirates</option>';
echo '<option value="United Kingdom">United Kingdom</option>';
echo '<option value="United States" selected="selected">United States</option>';
echo '<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>';
echo '<option value="Uruguay">Uruguay</option>';
echo '<option value="Uzbekistan">Uzbekistan</option>';
echo '<option value="Vanuatu">Vanuatu</option>';
echo '<option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>';
echo '<option value="Venezuela">Venezuela</option>';
echo '<option value="Viet Nam">Viet Nam</option>';
echo '<option value="Virgin Islands (British)">Virgin Islands (British)</option>';
echo '<option value="Virgin Islands (US)">Virgin Islands (US)</option>';
echo '<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>';
echo '<option value="Western Sahara">Western Sahara</option>';
echo '<option value="Yemen">Yemen</option>';
echo '<option value="Zambia">Zambia</option>';
echo '<option value="Zimbabwe">Zimbabwe</option>';
echo '</select></p>';

                                                
// If any of these fields are configured for use, it uses them. If not, it sends them to Payeezy
// hidden without any values. This stops non-critical php errors from generating.
// S T A R T 
if (!empty($x_invoice_num)) {
    echo '<p><label>';
	echo $x_invoice_num;
	echo '</label>';
	echo '<input name="x_invoice_num" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_invoice_num" value="" type="hidden" >';
	}
	
	if (!empty($x_po_num)) {
    echo '<p><label>';
	echo $x_po_num;
	echo '</label>';
	echo '<input name="x_po_num" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_po_num" value="" type="hidden" required>';
	}
	
	if (!empty($x_reference_3)) {
    echo '<p><label>';
	echo $x_reference_3;
	echo '</label>';
	echo '<input name="x_reference_3" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_reference_3" value="" type="hidden">';
	}
	
	
if (!empty($x_user1)) {                                                              
    echo '<p><label>';
	echo $x_user1;
	echo '</label>';
	echo '<input name="x_user1" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_user1" value="" type="hidden">';
	}

if (!empty($x_user2)) {
    echo '<p><label>';
	echo $x_user2;
	echo '</label>';
	echo '<input name="x_user2" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_user2" value="" type="hidden">';
	}

if (!empty($x_user3)) {
    echo '<p><label>';
	echo $x_user3;
	echo '</label>';
	echo '<input name="x_user3" value="" type="text" required>';
	echo '</p>';
}
else {
	echo '<input name="x_user3" value="" type="hidden">';
	}

if (!empty($x_email)) {
    echo '<p><label>';
  echo $x_email;
  echo '</label>';
  echo '<input name="x_email" value="" type="text" required>';
  echo '</p>';
}
else {
  echo '<input name="x_email" value="" type="hidden">';
  }

if (!empty($x_phone)) {
    echo '<p><label>';
  echo $x_phone;
  echo '</label>';
  echo '<input name="x_phone" value="" type="text" required>';
  echo '</p>';
}
else {
  echo '<input name="x_phone" value="" type="hidden">';
  }
	
// E N D 


// If the purpose of the form is to accept donations, then this produces a series of 
// donation anounts that can be selected with a radio button. It also creates an "other"
// choice for custom amounts. If one of the two donation modes is not selected, then a
// single amount field will be generated.
if (($mode2 == "donate") || ($mode2 == "donate-rec")) {

echo '<label>Donation Amount</label><br>';
echo '<input type="radio" name="x_amount1" value="10.00"> $10<br>';
echo '<input type="radio" name="x_amount1" value="25.00"> $25<br>';
echo '<input type="radio" name="x_amount1" value="50.00"> $50<br>';
echo '<input type="radio" name="x_amount1" value="75.00"> $75<br>';
echo '<input type="radio" name="x_amount1" value="100.00"> $100<br>';
echo '<input type="radio" name="x_amount1" value="0.00"> Other $ <input id= "other" type="text" name="x_amount2" value="" size="6"><br>';
echo '<br>';
}

else {

echo '<p><label>Total Amount</label> $ <input name="x_amount" id="amount" value="" size="7" type="text" ></p>';
}

// If recurring is optional, a checkbox will be generated that will 
// give the cardholder the option of repeating the payment or donation every every month,
// begining in 30 days. If recurring is manditory, there is no checkbox. The transaction
// is hardcoded for recurring.
if ($mode2 == "donate-rec" ) {
    echo '<p id="recurring"><input type="checkbox" name="recurring" value="TRUE" >&nbsp;Automatically repeat this same donation once a month, beginning in 30 days.</p>';
}

if ($mode2 == "pay-rec" ) {
    echo '<p><input type="checkbox" name="recurring" value="TRUE" >&nbsp;Automatically repeat this same payment once a month, beginning in 30 days.</p>';
}

if ($mode2 == "pay-rec-req" ) {
    echo '<input type="hidden" name="recurring" value="TRUE" >';
}

// Changes the button to either "Pay Now" or "Donate Now" based on what is chosen for
// mode2. If you don't want these buttons to say what they are configured to say, then
// feel free to edit them on line 532 or line 541. 
if (($mode2 === "donate") || ($mode2 === "donate-rec")) {
echo '<br>';
echo '<p><input type="submit" value="Donate Now"></p>';
echo '</form>';
echo '<hr>';
echo '</div>';
return ob_get_clean();
}

else {
echo '<br>';
echo '<p><input type="submit" value="Pay Now"></p>';
echo '</form>';
echo '<hr>';
echo '</div>';
return ob_get_clean();
}
}

// create custom plugin settings menu
add_action('admin_menu', 'wppayeezypay_create_menu');

function wppayeezypay_create_menu() {

	//create new top-level menu
	add_menu_page('WP Payeezy Pay', 'WP Payeezy Pay', 'administrator', __FILE__, 'wppayeezypay_settings_page' );

	//call register settings function
	add_action( 'admin_init', 'register_wppayeezypay_settings' );
}

add_shortcode('wp_payeezy_payment_form', 'wppayeezypaymentform');

function register_wppayeezypay_settings() {
	//register our settings
	register_setting( 'wppayeezypay-group', 'x_login' );
	register_setting( 'wppayeezypay-group', 'transaction_key' );
	register_setting( 'wppayeezypay-group', 'x_recurring_billing_id' );
	register_setting( 'wppayeezypay-group', 'x_user1' );
	register_setting( 'wppayeezypay-group', 'x_user2' );
	register_setting( 'wppayeezypay-group', 'x_user3' );
	register_setting( 'wppayeezypay-group', 'mode' );
	register_setting( 'wppayeezypay-group', 'mode2' );
	register_setting( 'wppayeezypay-group', 'x_invoice_num' );
	register_setting( 'wppayeezypay-group', 'x_po_num' );
	register_setting( 'wppayeezypay-group', 'x_description' );
	register_setting( 'wppayeezypay-group', 'x_reference_3' );
  register_setting( 'wppayeezypay-group', 'x_phone' );
  register_setting( 'wppayeezypay-group', 'x_email' );
	
	}
 
function wppayeezypay_settings_page() {

$readme_wp_payeezy_pay = plugins_url('wp-payeezy-pay/readme.txt');

?>
  <div class="wrap">
 <!-- Puts an obnoxious looking text box at the top of the plugin settings that reminds you
 the plugin in in demo mode, if it's in demo mode. If it's in production mode, no
 obnoxious warning will be made.-->

  <h2>WP Payeezy Pay <?php if( get_option('mode') == "demo" ):
echo ' is in <span style="color: red;">DEMO</span> mode';
 endif;?></h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'wppayeezypay-group' ); ?>
    <?php do_settings_sections( 'wppayeezypay-group' ); ?>
    <div style="background: none repeat scroll 0 0 #fff;border: 1px solid #bbb;color: #444;margin: 10px 0;padding: 20px;text-shadow: 1px 1px #FFFFFF;width:700px">
    <p>For detailed instructions on settings these values, refer to the <a href="<?php echo $readme_wp_payeezy_pay;?>" target="_blank">setup instructions</a>.</p>
    <h3>Settings</h3>
    <em>Recurring Billing ID is not required if you are not processing recurring transactions. </em>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Payment Page ID</th>
        <td valign="top"><input type="text" size="35" name="x_login" value="<?php echo esc_attr( get_option('x_login') ); ?>" /></td>
        
      </tr>
      <tr valign="top">
        <th scope="row">Transaction Key</th>
        <td><input type="text" name="transaction_key" size="35" value="<?php echo esc_attr( get_option('transaction_key') ); ?>" /></td>
        
      </tr>
      <tr valign="top">
        <th scope="row">Mode</th>
        <td><select name="mode"/>
          
          <option value="live" <?php if( get_option('mode') == "live" ): echo 'selected'; endif;?> >Live</option>
          <option value="demo" <?php if( get_option('mode') == "demo" ): echo 'selected'; endif;?> >Demo</option>
          </select></td>
      </tr>
      <tr valign="top">
        <th scope="row">Type of Transactions</th>
        <td><select name="mode2"/>
          
          <option value="pay" <?php if( get_option('mode2') == "pay" ): echo 'selected'; endif;?> >Payments</option>
          <option value="pay-rec" <?php if( get_option('mode2') == "pay-rec" ): echo 'selected'; endif;?> >Payments with optional Recurring</option>
           <option value="pay-rec-req" <?php if( get_option('mode2') == "pay-rec-req" ): echo 'selected'; endif;?> >Payments with automatic Recurring</option>
          <option value="donate" <?php if( get_option('mode2') == "donate" ): echo 'selected'; endif;?> >Donations</option>
          <option value="donate-rec" <?php if( get_option('mode2') == "donate-rec" ): echo 'selected'; endif;?> >Donations with optional Recurring</option>
          </select></td>
      </tr>

      <tr valign="top">
        <th scope="row">Recurring Billing ID *</th>
        <td valign="top"><input type="text" size="35" name="x_recurring_billing_id" value="<?php echo esc_attr( get_option('x_recurring_billing_id') ); ?>" /></td>
        <?php
				// If one of the recurring modes is selected and there is not a Recurring Plan ID entered,
				// a red warning appears next to the field pointing out that one needs to be entered. 
				$recurring = get_option('x_recurring_billing_id');
				if (empty($recurring)) {
				if (( get_option('mode2') === "pay-rec") || ( get_option('mode2') === "donate-rec" ) || ( get_option('mode2') === "pay-rec-req" )){ 
    			echo "<td valign='top' style='color:red'>&#8656; Please enter a Recurring Billing ID</td>";
 				}}
  				?>
        </tr>
        <tr valign="top">
          <th scope="row"></th>
          <td valign="top">
          <em>* Plan must have the Frequecy set to "Monthly."</em></td>
        </tr>
    </table>
    <hr>
    <h3>Optional Payment Form Fields</h3>
    <table class="form-table">
      <tr valign="top"> <em>If you would like to use any of these fields, assign a name to them<br>
        and they will then appear on your form with that name. Do not assign a name, <br>
        and they will not appear. If a field appears on your form<br>
        the cardholder cannot proceed to Payeezy until they enter a value.</em> </tr>
      <tr valign="top">
        <th scope="row">x_invoice_num</th>
        <td><input type="text" name="x_invoice_num" value="<?php echo esc_attr( get_option('x_invoice_num') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">x_po_num</th>
        <td><input type="text" name="x_po_num" value="<?php echo esc_attr( get_option('x_po_num') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">x_reference_3</th>
        <td><input type="text" name="x_reference_3" value="<?php echo esc_attr( get_option('x_reference_3') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">User Defined 1</th>
        <td><input type="text" name="x_user1" value="<?php echo esc_attr( get_option('x_user1') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">User Defined 2</th>
        <td><input type="text" name="x_user2" value="<?php echo esc_attr( get_option('x_user2') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">User Defined 3</th>
        <td><input type="text" name="x_user3" value="<?php echo esc_attr( get_option('x_user3') ); ?>" /></td>
      </tr>

      <tr valign="top">
        <th scope="row">x_phone</th>
        <td><input type="text" name="x_phone" value="<?php echo esc_attr( get_option('x_phone') ); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">x_email</th>
        <td><input type="text" name="x_email" value="<?php echo esc_attr( get_option('x_email') ); ?>" /></td>
      </tr>
    </table>
    <hr>
    <?php submit_button(); ?>
    <p>To add the Payeezy payment form to a Page or a Post, add the following <a href="https://codex.wordpress.org/Shortcode" target="_blank">shortcode</a> in the Page or Post's content:<br>
    <pre> [wp_payeezy_payment_form] </pre>
    </p>
    <p>Need help? Feel free to contact me at <a <a href="mailto:info@richard-rottman.com">info@richard-rottman.com</a>.</p>
  </form>
</div>
</div>
<?php } ?>
