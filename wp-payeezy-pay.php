<?php
/*
Plugin Name: WP Payeezy Pay
Version: 1.2
Plugin URI: http://www.richard-rottman.com/
Description: Connects a WordPress site to First Data's Payeezy Gateway, formally known as Global Gateway e4, using the Payment Page or Hosted Checkout method. No SSL required! 
Author: Richard Rottman
Author URI: http://www.richard-rottman.com/
*/

function wppayeezypaymentform() {

$x_login = get_option('x_login') ;
$transaction_key = get_option('transaction_key') ;
$x_user1 = get_option('x_user1') ;
$x_user2 = get_option('x_user2') ;
$x_user3 = get_option('x_user3') ;
$mode = get_option ('mode') ;
$pay_file = plugins_url('wp-payeezy-pay/pay.php');
$x_merchant_email = get_option('x_merchant_email') ;
ob_start();
?>
<div id="wp_payeezy_payment_form">
<hr>
<br>
<form action="<?php echo $pay_file;?>" method="post">
<input name="x_login" value="<?php echo $x_login;?>" type="hidden" > 
<input name="transaction_key" value="<?php echo $transaction_key;?>" type="hidden" >
<input name="mode" value="<?php echo $mode;?>" type="hidden" >
<?php
echo '<p><label>First Name</label><input name="x_first_name" value="" type="text"></p>'; 
echo '<p><label>Last Name</label><input name="x_last_name" value="" type="text"></p>'; 
echo '<p><label>Street Address</label><input name="x_address" value="" type="text"></p>'; 
echo '<p><label>City</label><input name="x_city" value="" type="text"></p>'; 
echo '<p><label>State/Province</label><select name="x_state">'; 
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
echo '<p><label>Zip Code</label><input name="x_zip" value="" type="text"></p>'; 
echo '<p><select id="x_country" name="x_country" onchange="switch_province()" tabindex="10">';
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

echo '<p><label>Email</label><input name="x_email" value="" type="text"></p>';
echo '<p><label>Phone</label><input name="x_phone" value="" type="text"></p>';

if (!empty($x_invoice_num)) {
    echo '<p><label>';
	echo $x_invoice_num;
	echo '</label>';
	echo '<input name="x_invoice_num" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_invoice_num" value="" type="hidden">';
	}
	
	if (!empty($x_po_num)) {
    echo '<p><label>';
	echo $x_po_num;
	echo '</label>';
	echo '<input name="x_po_num" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_po_num" value="" type="hidden">';
	}
	
	if (!empty($x_reference_3)) {
    echo '<p><label>';
	echo $x_reference_3;
	echo '</label>';
	echo '<input name="x_reference_3" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_reference_3" value="" type="hidden">';
	}
	
	
if (!empty($x_user1)) {
    echo '<p><label>';
	echo $x_user1;
	echo '</label>';
	echo '<input name="x_user1" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_user1" value="" type="hidden">';
	}

if (!empty($x_user2)) {
    echo '<p><label>';
	echo $x_user2;
	echo '</label>';
	echo '<input name="x_user2" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_user2" value="" type="hidden">';
	}

if (!empty($x_user3)) {
    echo '<p><label>';
	echo $x_user3;
	echo '</label>';
	echo '<input name="x_user3" value="" type="text">';
	echo '</p>';
}
else {
	echo '<input name="x_user3" value="" type="hidden">';
	}

echo '<p><label>Total Amount</label> $ <input name="x_amount" id="amount" value="" type="text" required></p>';
echo '<br>';
echo '<br>';

echo '<p><input type="submit" value="Pay Now"></p>';
echo '</form>';
echo '<hr>';
echo '</div>';
return ob_get_clean();
}


// create custom plugin settings menu
add_action('admin_menu', 'wppayeezypay_create_menu');

function wppayeezypay_create_menu() {

	//create new top-level menu
	add_menu_page('WP Payeezy Pay Settings', 'WP Payeezy Pay', 'administrator', __FILE__, 'wppayeezypay_settings_page' );

	//call register settings function
	add_action( 'admin_init', 'register_wppayeezypay_settings' );
}

add_shortcode('wp_payeezy_payment_form', 'wppayeezypaymentform');

function register_wppayeezypay_settings() {
	//register our settings
	register_setting( 'wppayeezypay-group', 'x_login' );
	register_setting( 'wppayeezypay-group', 'transaction_key' );
	register_setting( 'wppayeezypay-group', 'x_user1' );
	register_setting( 'wppayeezypay-group', 'x_user2' );
	register_setting( 'wppayeezypay-group', 'x_user3' );
	register_setting( 'wppayeezypay-group', 'mode' );
	register_setting( 'wppayeezypay-group', 'x_merchant_email' );
	register_setting( 'wppayeezypay-group', 'x_invoice_num' );
	register_setting( 'wppayeezypay-group', 'x_po_num' );
	register_setting( 'wppayeezypay-group', 'x_description' );
	register_setting( 'wppayeezypay-group', 'x_reference_3' );
	
	}
 
function wppayeezypay_settings_page() {

$readme_wp_payeezy_pay = plugins_url('wp-payeezy-pay/readme.txt');

?>

<div class="wrap">
<h2>WP Payeezy Pay</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'wppayeezypay-group' ); ?>
    <?php do_settings_sections( 'wppayeezypay-group' ); ?>
	<div style="background: none repeat scroll 0 0 #fff;border: 1px solid #bbb;color: #444;margin: 10px 0;padding: 20px;text-shadow: 1px 1px #FFFFFF;width:800px">
	<p>For detailed instructions on settings these values, refer to the <a href="<?php echo $readme_wp_payeezy_pay;?>" target="_blank">setup instructions</a>.</p>
	                                                                             
	<h3>Required Settings</h3>
	  <table class="form-table">
        <tr valign="top">
        <th scope="row">Payment Page ID</th>
        <td valign="top"><input type="text" name="x_login" value="<?php echo esc_attr( get_option('x_login') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Transaction Key</th>
        <td><input type="text" name="transaction_key" value="<?php echo esc_attr( get_option('transaction_key') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Mode</th>
        <td><select name="mode"/>
				<option value="live" <?php if( get_option('mode') == "live" ): echo 'selected'; endif;?> >Live</option>
				<option value="demo" <?php if( get_option('mode') == "demo" ): echo 'selected'; endif;?> >Demo</option>
			</select></td>
		</tr>
		</table>	
<hr>
<h3>Optional Settings</h3>
<table class="form-table">
<tr valign="top">
       	<em>If you would like to receive a notification email when<br>a payment is made, enter the email address below.</em> 
		
		<th scope="row">Email Payment Notification</th>
        <td><input type="text" name="x_merchant_email" value="<?php echo esc_attr( get_option('x_merchant_email') ); ?>" /></td>
		</tr>
		</table> 
		<hr>
<h3>Optional Payment Form Fields</h3>		
	 <table class="form-table">
		<tr valign="top">
		<em>If you would like to use any of these fields, assign a name to them<br>and they will appear on your payment form.</em> 
		</tr>
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
		
		</table> 
		<hr>
		
    <?php submit_button(); ?>
<p>To add the Payeezy payment form to a Page or a Post, add the following <a href="https://codex.wordpress.org/Shortcode" target="_blank">shortcode</a> in the Page or Post's content:<br>
	<pre> [wp_payeezy_payment_form] </pre></p>
</form>
</div>
</div>
<?php } ?>