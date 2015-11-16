<?php
/*
Plugin Name: WP Payeezy Payment Page
Version: 2.1
Plugin URI: http://bentcorner.com/wp-payeezy-pay/
Description: Connects a WordPress site to First Data's Payeezy Gateway, formally known as Global Gateway e4, using the Payment Page or Hosted Checkout method. Handles both payments and donations. No SSL ! 
Author: Rick Rottman
Author URI: http://bentcorner.com/
*/

function wppayeezypaymentform() {
$x_login = get_option('x_login');
$x_recurring_billing_id = get_option('x_recurring_billing_id');
$mode = get_option ('mode') ; // production or demo
$mode2 = get_option ('mode2') ; // payments or donations

// There are five (5) target php files in the plugin folder
// that transactional information  is sent to before it's
// sent to Payeezy. These files are:
//
// pay.php
// pay-rec.php
// pay-rec-req
// donate.php
// donate
// donate-rec
// 
// The connection between Payeezy and your WordPress site
// is between the target php file and Payeezy. The following
// if/elseif/else selects which target php file
// the form goes to based on the plugin settings. 
// Payments WITHOUT the option of making the payment recurring.

if ( $mode2 == "pay") {
  $pay_file = plugins_url('wp-payeezy-pay/pay.php'); 
}
// Payments WITH the option of making the payment recurring.
  elseif ( $mode2 == "pay-rec" ) {
      $pay_file = plugins_url('wp-payeezy-pay/pay-rec.php'); 
}

// Payments WITH the option of making the payment recurring.
elseif ( $mode2 == "pay-rec-req" ) {
  $pay_file = plugins_url('wp-payeezy-pay/pay-rec.php'); 
}

// Donations WITHOUT the option of making the donation recurring.
elseif ( $mode2 == "donate"  ) {
    $pay_file = plugins_url('wp-payeezy-pay/donate.php'); 
}

// Donations WITH the option of making the donation recurring.
else {
    $pay_file = plugins_url('wp-payeezy-pay/donate-rec.php'); 
}

// These fields only show on the form if they are named.
// If they are left blank, they will NOT show on the published
// payment form and will NOT be sent to the Payeezy gateway.
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
<style>
select {
  -webkit-appearance: none;
  -webkit-border-radius: 0px;
}
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

label {
  font-weight:700;
  display:block;
}


#x_amount {
  width:100px;
  padding:0 0 0 3px;
        border-color:green;
        
}

table {
  border: solid 0px #ccc;
}

table tr th {
  border: solid 0px #ccc;
}

table tr td {
  padding: 0px;
  border: solid 0px #ccc;
}

input[type="submit"] {
    -webkit-appearance: button;
    background-color: green;
    border: 0;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-size: 1.6rem;
    font-weight: 700;
    letter-spacing:2px;
    padding: 0.7917em 1.5em;
    text-transform: uppercase;
}

input[type="submit"]:hover {
background-color: #000;
}
</style>

<form action="<?php echo $pay_file;?>" method="post">
<input name="x_recurring_billing_id" value="<?php echo $x_recurring_billing_id;?>" type="hidden" >
<input name="x_login" value="<?php echo $x_login;?>" type="hidden" >
<input name="mode" value="<?php echo $mode;?>" type="hidden" >
<p><label>First Name</label><input name="x_first_name" value="" id="x_first_name" type="text" required></p> 
<p><label>Last Name</label><input name="x_last_name" id="x_last_name" value="" type="text" required></p> 
<p><label>Street Address</label><input name="x_address" id="x_address" value="" type="text" required></p> 
<p><label>City</label><input name="x_city" id="x_city" value="" type="text" required></p> 
<p><label>State/Province</label><select name="x_state" id="x_state" required> 
<option value="Alabama">Alabama</option>
<option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
<option value="District of Columbia">District of Columbia</option>
<option value="Florida">Florida</option>
<option value="Georgia">Georgia</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="New York">New York</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
<option value="" disabled="disabled">-------------</option>
<option value="Alberta">Alberta</option>
<option value="British Columbia">British Columbia</option>
<option value="Manitoba">Manitoba</option>
<option value="New Brunswick">New Brunswick</option>
<option value="Newfoundland">Newfoundland</option>
<option value="Northwest Territories">Northwest Territories</option>
<option value="Nova Scotia">Nova Scotia</option>
<option value="Nunavut">Nunavut</option>
<option value="Ontario">Ontario</option>
<option value="Prince Edward Island">Prince Edward Island</option>
<option value="Quebec">Quebec</option>
<option value="Saskatchewan">Saskatchewan</option>
<option value="Yukon">Yukon</option>
<option value="" disabled="disabled">-------------</option>
<option value="N/A">Not Applicable</option>
</select></p>
<p><label>Zip Code</label><input name="x_zip" id="x_zip" value="" type="text" required></p> 
<p><label>Country</label><select id="x_country" name="x_country" onchange="switch_province()" tabindex="10">
<option value="United States" selected="selected">United States</option>
<option value="Canada">Canada</option>
<option value="" disabled="disabled">-------------</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Aland Islands">Aland Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D&#x27;Ivoire">Cote D&#x27;Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curacao">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="D.P.R. Korea">D.P.R. Korea</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong SAR, PRC">Hong Kong SAR, PRC</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jersey">Jersey</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea">Korea</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People&#x27;s Republic">Lao People&#x27;s Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Not Available">Not Available</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestine, State of">Palestine, State of</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Barthelemy">Saint Barthelemy</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Martin (French part)">Saint Martin (French part)</option>
<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St Helena">St Helena</option>
<option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan Region">Taiwan Region</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States" selected="selected">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (US)">Virgin Islands (US)</option>
<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select></p>
     <!--                                        
If any of these fields are configured for use, it uses the values entered by the cardholder.
If they are not not configured for us, the plugin sends the fields to Payeezy
hidden without any values. This stops non-critical php errors from generating.
-->
<?php
// Invoice
if (!empty($x_invoice_num)) {
    echo '<p><label>';
  echo $x_invoice_num;
  echo '</label>';
  echo '<input name="x_invoice_num" value="" type="text" id="x_invoice_num" required>';
  echo '</p>';
}
else {
  echo '<input name="x_invoice_num" value="" type="hidden" >';
  }

// PO Number
  if (!empty($x_po_num)) {
    echo '<p><label>';
  echo $x_po_num;
  echo '</label>';
  echo '<input name="x_po_num" value="" type="text" id="po_num" required>';
  echo '</p>';
}

else {
  echo '<input name="x_po_num" value="" type="hidden" required>';
  }
// Referance Number 3
if (!empty($x_reference_3)) {
    echo '<p><label>';
  echo $x_reference_3;
  echo '</label>';
  echo '<input name="x_reference_3" value="" type="text" id="reference_3" required>';
  echo '</p>';
}

else {
  echo '<input name="x_reference_3" value="" type="hidden">';
  }

// User Defined 1 
if (!empty($x_user1)) {                                                              
    echo '<p><label>';
  echo $x_user1;
  echo '</label>';
  echo '<input name="x_user1" value="" type="text" id="user_1" required>';
  echo '</p>';
}

else {
  echo '<input name="x_user1" value="" type="hidden">';
  }

// User Defined 2
if (!empty($x_user2)) {
    echo '<p><label>';
  echo $x_user2;
  echo '</label>';
  echo '<input name="x_user2" value="" type="text" id="user_2" required>';
  echo '</p>';
}

else {
  echo '<input name="x_user2" value="" type="hidden">';
  }

// User Defined 3
if (!empty($x_user3)) {
    echo '<p><label>';
  echo $x_user3;
  echo '</label>';
  echo '<input name="x_user3" value="" type="text" id="user_3" required>';
  echo '</p>';
}

else {
  echo '<input name="x_user3" value="" type="hidden">';
  }

// Email
if (!empty($x_email)) {
  echo '<p><label>';
  echo $x_email;
  echo '</label>';
  echo '<input name="x_email" value="" type="email" id="x_email" required>';
  echo '</p>';
}

else {
  echo '<input name="x_email" value="" type="hidden">';
  }

// Phone Number
if (!empty($x_phone)) {
  echo '<p><label>';
  echo $x_phone;
  echo '</label>';
  echo '<input name="x_phone" value="" type="tel" id="x_phone" required>';
  echo '</p>';
}

else {
  echo '<input name="x_phone" value="" type="hidden">';
  }

// If the purpose of the form is to accept donations, then this produces a series of 
// donation anounts that can be selected with a radio button. It also creates an "other"
// choice for custom amounts. If one of the two donation modes is not selected, then a
// single amount field will be generated.
if (($mode2 == "donate") || ($mode2 == "donate-rec")) {
echo '<label>Donation Amount</label>';
echo '<input type="radio" name="x_amount1" value="10.00"> $10<br>';
echo '<input type="radio" name="x_amount1" value="25.00"> $25<br>';
echo '<input type="radio" name="x_amount1" value="50.00"> $50<br>';
echo '<input type="radio" name="x_amount1" value="75.00"> $75<br>';
echo '<input type="radio" name="x_amount1" value="100.00"> $100<br>';
echo '<input type="radio" name="x_amount1" value="0.00"> Other $ <input type="text" name="x_amount2" value="" id="x_amount"><br>';
echo '<br>';
}

else {
echo '<label>Total Amount</label> $ <input name="x_amount" id="x_amount" value="" type="text" ></p>';
}
// If recurring is optional, a checkbox will be generated that will 
// give the cardholder the option of repeating the payment or donation every every month,
// begining in 30 days. If recurring is manditory, there is no checkbox. The transaction
// is hardcoded for recurring.
// Donation with Recurring

if ($mode2 == "donate-rec" ) {
      echo '<table border="0">
          <tr valign="top">
      <td width="4%" border="0"><input type="checkbox" name="recurring" id="recurring" value="TRUE" ></td>
      <td border="0">Automatically repeat this same donation once a month, beginning in 30 days.</td>
    </tr>
    </table>';
}
// Pay with optional Recurring
if ($mode2 == "pay-rec" ) {
    echo '<table border="0">
          <tr valign="top">
      <td width="4%" border="0"><input type="checkbox" name="recurring" id="recurring" value="TRUE" ></td>
      <td border="0">Automatically repeat this same payment once a month, beginning in 30 days.</td>
    </tr>
    </table>';
}

// Pay with required Recurring
if ($mode2 == "pay-rec-req" ) {
    echo '<input type="hidden" name="recurring" value="TRUE" >';
}

// Changes the button to either "Pay Now" or "Donate Now" based on what is chosen for
// mode2. If you don't want these buttons to say what they are configured to say, then
// feel free to edit them. 
if (($mode2 === "donate") || ($mode2 === "donate-rec")) {
echo '<p><input type="submit" id="donate-submit" value="Donate Now"></p>'; // Edit the value "Donate Now" if you want
echo '</form>';
echo '<hr>';
echo '</div>';
return ob_get_clean();
}

else {
echo '<p><input type="submit" value="Pay Now" id="pay-submit"></p>'; // Edit the value "Pay Now" if you want
echo '</form>';
echo '</div>';
return ob_get_clean();
}
}

// create custom plugin settings menu
add_action('admin_menu', 'wppayeezypay_create_menu');
function wppayeezypay_create_menu() {

//create new top-level menu
add_menu_page('WP Payeezy Pay', 'WP Payeezy Pay', 'administrator', __FILE__, 'wppayeezypay_settings_page', 'dashicons-cart');

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
register_setting( 'wppayeezypay-group', 'mode' ); // Production or Demo
register_setting( 'wppayeezypay-group', 'mode2' ); // Payments of Donations
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
    <h2>WP Payeey Payment Page Settings</h2>

    <form method="post" action="options.php">
      <?php settings_fields( 'wppayeezypay-group' ); ?>
      <?php do_settings_sections( 'wppayeezypay-group' ); ?>
      <div style="background: none repeat scroll 0 0 #fff;border: 1px solid #bbb;color: #444;margin: 10px 0;padding: 20px;text-shadow: 1px 1px #FFFFFF;width:700px">
<p>Need a First Data Payeezy account? I can help with that. Just send me an <a href="mailto:rlrottman@gmail.com">email</a>
<hr>
<p>To read posts on my personal blog about all things Payeezy, <a href="http://bentcorner.com/category/e-commerce/payeezy/" target="_blank">click here</a>.</p>
<hr>
      <h3>Settings</h3>
      <em>Recurring Billing ID is not required if you are not processing recurring transactions. </em>
      <table class="form-table">
      <tr valign="top">
        <th scope="row">Payment Page ID</th>
          <td valign="top"><input type="text" size="35" name="x_login" value="<?php echo esc_attr( get_option('x_login') ); ?>" /></td>
      </tr>
      <tr valign="top">
      <th scope="row">Transaction Key</th>
        <td valign="top"><input type="text" size="35" name="transaction key" value="<?php echo esc_attr( get_option('transaction_key') ); ?>" /></td>  

      </tr>
      <tr valign="top">
        <th scope="row">Mode</th>
          <td><select name="mode"/>
            <option value="live" <?php if( get_option('mode') == "live" ): echo 'selected'; endif;?> >Live</option>
            <option value="demo" <?php if( get_option('mode') == "demo" ): echo 'selected'; endif;?> >Demo</option>
            </select>
          </td>

      </tr>
      <tr valign="top">
        <th scope="row">Type of Transactions</th>
          <td><select name="mode2"/>
            <option value="pay" <?php if( get_option('mode2') == "pay" ): echo 'selected'; endif;?> >Payments</option>
            <option value="pay-rec" <?php if( get_option('mode2') == "pay-rec" ): echo 'selected'; endif;?> >Payments with optional Recurring</option>
            <option value="pay-rec-req" <?php if( get_option('mode2') == "pay-rec-req" ): echo 'selected'; endif;?> >Payments with automatic Recurring</option>
            <option value="donate" <?php if( get_option('mode2') == "donate" ): echo 'selected'; endif;?> >Donations</option>
            <option value="donate-rec" <?php if( get_option('mode2') == "donate-rec" ): echo 'selected'; endif;?> >Donations with optional Recurring</option>
            </select>
          </td>
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
      <tr valign="top"> <em>If you would like to use any of these fields, just assign a name to them<br>
        and they will appear on your form with that name. Do not assign a name, <br>
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
    <?php 
    $transaction_key = ( get_option('transaction_key') );
    ?>
    <?php 
    $base = dirname(__FILE__); // That's the directory path
    $filename = 'key.php';
    $fileUrl = $base . '/' . $filename;
    $data = '<?php $transaction_key="'. get_option('transaction_key') . '"?>';
    file_put_contents($fileUrl, $data);
    ?>
 <p>To add the Payeezy payment form to a Page or a Post, add the following <a href="https://codex.wordpress.org/Shortcode" target="_blank">shortcode</a> in the Page or Post's content:<br>
<br>
    <pre> [wp_payeezy_payment_form] </pre>
</br>
    </p>
    <p>Need help? Have a suggestion for making this plugin better? Feel free to contact me at <a href="mailto:rlrottman@gmail.com">rlrottman@gmail.com</a>. I welcome your questions and/or input.</p>
<hr>
</form>
</div>
</div>
<?php } ?>