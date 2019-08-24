<?php
    $userid = get_specific_data($dbconn,'users','username',$_SESSION['username'],'user_id');
    $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
    $regno = get_specific_data($dbconn,'applications','user_id',$userid,'reg_no');
    $courseid = get_specific_data($dbconn,'applications','user_id',$userid,'course_id');
    $bioid = get_specific_data($dbconn,'biodata','user_id',$userid,'bio_id');
?>
<form action="components/biodata-process.php?username=<?php echo $_SESSION['username']; ?>" method="POST" enctype="mutlipart/form-data">
    <h3 class="text-center">Personal Details(Part 1)</h3>
    <hr>
    <div class="form-group">
        <label for="inputtitle" class="col-sm-2 control-label">Select Title</label>
        <div class="col-sm-10">
            <select required class="form-control" name="title">
                <option selected="selected" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'title'); ?>"><?php if(get_specific_data($dbconn,'biodata','user_id',$userid,'title') != ""){echo get_specific_data($dbconn,'biodata','user_id',$userid,'title'); }else{ echo "---Select Your Title---";}  ?></option>
                <option value="Mr">Mr</option>
                <option value="Mrs"> Mrs </option>
                <option value="Miss"> Miss </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputsurname" class="col-sm-2 control-label">Surname</label>
        <div class="col-sm-10">
            <input type="text" name="surname" value="<?php echo get_specific_data($dbconn,'users','user_id',$userid,'l_name'); ?>" id="surname" class="form-control" required placeholder="Enter Surname" />
        </div>
    </div>
    <div class="form-group">
        <label for="inputfirstname" class="col-sm-2 control-label">	First Name</label>
        <div class="col-sm-10">
            <input id="firstname" name="firstname"  placeholder="Enter Your First Name" type="text"  class="form-control"  value="<?php echo get_specific_data($dbconn,'users','user_id',$userid,'f_name'); ?>" />
        </div>
    </div>


    <div class="form-group">
        <label for="inputidno" class="col-sm-2 control-label">	Id Number</label>
        <div class="col-sm-10">
            <input type="text" name="idno" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'idno'); ?>" id="idno" class="form-control" required placeholder="Enter National id No">
        </div>
    </div>

    <div class="form-group">
        <label for="inputboxnumber" class="col-sm-2 control-label">	P.O Box </label>
        <div class="col-sm-10">
      		<input type="text" name="boxnumber" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'box'); ?>" id="boxnumber" class="form-control" required placeholder="P.O Box " >
        </div>
    </div>

  	<div class="form-group">
        <label for="inputtownname" class="col-sm-2 control-label">Town</label>
        <div class="col-sm-10">
            <input type="text" name="townname" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'town'); ?>" id="townname" class="form-control" required placeholder="Enter Town Name">
        </div>
    </div>

  	<div class="form-group">
        <label for="inputtowncode" class="col-sm-2 control-label">	Town code</label>
        <div class="col-sm-10">
            <input type="text" name="towncode" onkeypress="return numbersonly(event)" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'town_code'); ?>"  id="towncode" class="form-control" required placeholder="Enter Code">
        </div>
    </div>

  	<div class="form-group">
        <label for="inputmobileno" class="col-sm-2 control-label">	Phone No</label>
        <div class="col-sm-10">
            <input type="text"  name="mobileno" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'mobile'); ?>" id="mobileno" class="form-control" required placeholder="Phone / Mobile No">
        </div>
    </div>

  	<div class="form-group">
        <label for="inputemail" class="col-sm-2 control-label">	 Email</label>
        <div class="col-sm-10">
            <input type="email"  name="email" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'email'); ?>" id="email" class="form-control" required placeholder="Enter Email Address">
        </div>
    </div>

    <div class="form-group">
        <label for="inputothername" class="col-sm-2 control-label">	Country</label>
        <div class="col-sm-10">
            <select id="nationality" name="nationality" class="form-control">
                <option value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'nationality'); ?>" selected><?php if(get_specific_data($dbconn,'biodata','user_id',$userid,'nationality') == ""){echo "-- Choose Country --";}else{echo get_specific_data($dbconn,'biodata','user_id',$userid,'nationality');}  ?></option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
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
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="inputdob" class="control-label"> 	Date of Birth </label>
        <div class="col-sm-10">
            <input type="date" name="dob" value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'dob'); ?>" id="dob"   class="form-control" required placeholder="Enter date of permanent">
        </div>
    </div>
    <div class="form-group">
        <label for="inputothername" class="col-sm-2 control-label">	Religion</label>
        <div class="col-sm-10">
            <select name="religion" id="religion"class="form-control" required>
        	    <option selected value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'religion'); ?>"><?php if(get_specific_data($dbconn,'biodata','user_id',$userid,'religion') ==""){echo "-- Choose Religion --";}else{ echo get_specific_data($dbconn,'biodata','user_id',$userid,'religion');} ?></option>
        	    <option value="Christian ">Christian</option>
        	    <option value="Buthist ">Buthist</option>
        	    <option value="Muslim ">Muslim</option>
        	    <option value="Protestant ">Protestant</option>
        	</select>
        </div>
    </div>
  	<div class="form-group">
        <label for="inputgender" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
            <select required class="form-control" name="gender">
                <option selected value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'gender'); ?>"><?php if(get_specific_data($dbconn,'biodata','user_id',$userid,'gender') == ""){echo "----Select Gender----";}else{echo get_specific_data($dbconn,'biodata','user_id',$userid,'gender');}  ?></option>
                <option value="Male">Male</option>
                <option value="Female"> Female </option>
            </select>
        </div>
    </div>



 	<h4 class="text-center"> Kindly enter correct  Details of Any disability..  (Part 4)</h4>
    <hr>
   	<div class="form-group">
        <label for="inputimparement" class="col-sm-2 control-label">Disabled?</label>
        <div class="col-sm-10">
            <select class="form-control" name="imparement">
                    <option selected value="<?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'disabled'); ?>"><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'disabled'); ?></option>
                    <option value="No">No</option>
                    <option value="Yes" >Yes </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputimparementdetails" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea name="imparementdetails"  class="form-control"><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'disability'); ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="inputloan" class="control-label">Do you require a Government Loan?</label>
        <div class="col-sm-10">
                <select required class="form-control" name="loan">
                    <option selected="selected" value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="No" > No </option>
                </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input id="bioid"  name="bioid" type="hidden"  value="<?php echo $bioid; ?>" />
            <input id="applid"  name="applid" type="hidden"  value="<?php echo $applid; ?>" />
            <input id="courseid"  name="courseid" type="hidden"  value="<?php echo $courseid; ?>" />
            <input id="userid"  name="userid" type="hidden"  value="<?php echo $userid; ?>" />
            <button type="submit" value="registerbio" name="btn_savebio"  class="btn btn-success"> Save</button>
        </div>
    </div>

</form>