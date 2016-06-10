<?php
error_reporting(0);
	// ** MySQL settings - You can get this info from your web host ** //
	define('DB_NAME', 'wedding');    		// The name of the database
	define('DB_USER', 'root');     		// Your MySQL username
	define('DB_PASSWORD', ''); 	// ...and password
	define('DB_HOST', 'localhost');    			// 99% chance you won't need to change this value

	// ** Email confirmation settings
	define('EMAIL_SEND', true);    					// set to true to enable email confirmation to be sent on form submision
	
	define('EMAIL_FROM', "email@sonyaantravis.com"); 	// confirmation from email address
	define('EMAIL_BODY_ATTEND', "Thank you for your response.\r\n\r\nWe look forward to seeing you at the reception!\r\n\r\nCheers,\r\n\r\nSonya and Travis"); 	// confirmation email body for those that can attend
	define('EMAIL_BODY_CANTATTEND', "Thank you for your response.\r\n\r\nWe are sorry to hear you cannot attend.\r\n\r\nCheers,\r\n\r\nSonya and Travis"); 	// confirmation email body for those that can't attend

	// ** Event Hosts
	define('EVENT_HOSTS', "Jangkoo and Nancy");
	
	if ($included) {
		return 0;
	}
	
	$event_hosts = EVENT_HOSTS;
	
	function get_ip() {
		if ($_SERVER['HTTP_X_FORWARD_FOR']) {
			return $_SERVER['HTTP_X_FORWARD_FOR'];
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}
	
	function default_val(&$var, $default) {
		if ($var=='') {
			$var = $default;
		}
	}
	
	function check_mail($email) {
		if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
			list($username,$domain)=split('@',$email);
			if(!checkdnsrr($domain,'MX')) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	$data = $_POST;
	
	//retrieve will equal true if it is a retrieve, false if it is an existing modification
	$ret = ($data['rsvptype'] == "retrieve");
	
	//value to store a successful update/new rsvp
	$success = false;
	
	//value to store the submitbutton text
	$submitbutton = 'Submit';
	
	//value to store if the server checks are passed
	$passed = false;
	
	//value to store the return message
	$message = '';
	
	if ($data['submit']) {
		
		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ('Error connecting to mysql');
		mysql_select_db(DB_NAME);
		
		if ($ret) {
			$submitbutton = 'Update';
		
			//retrieve the data
			$query = sprintf("SELECT * FROM rsvp where ID=(SELECT MAX(ID) FROM rsvp where EMAIL = '%s')",
				mysql_real_escape_string($data['email']));
				
			$result = mysql_query($query);
			if ($result) {
				if ($row = mysql_fetch_assoc($result)) {
					//these is an email match
					$data['fullname0'] = $row['NAME0'];
					$data['attendance'] = $row['ATTEND'];
					$data['vegetarian0'] = $row['VEG0'];
					$data['phonenumber'] = $row['PHONENUMBER'];
					$data['comments'] = $row['COMMENTS'];
					$data['guests'] = $row['GUESTS'];
					$data['fullname1'] = $row['NAME1'];
					$data['vegetarian1'] = $row['VEG1'];
					$data['fullname2'] = $row['NAME2'];
					$data['vegetarian2'] = $row['VEG2'];
					$data['fullname3'] = $row['NAME3'];
					$data['vegetarian3'] = $row['VEG3'];
					$data['fullname4'] = $row['NAME4'];
					$data['vegetarian4'] = $row['VEG4'];
					$data['fullname5'] = $row['NAME5'];
					$data['vegetarian5'] = $row['VEG5'];
					$data['song'] = $row['SONG'];
				} else {
					//no email match
					$message = "Could not find existing response for email {$data['email']}.";
					$ret = false;
				}
			}
		} else {
			//submit the data
			//lets perform some checks
			if (check_mail($data['email'])) {
				//test if name filled
				if ($data['fullname0']) {
					//test if full name
					if (strstr($data['fullname0']," ")) {
						$passed = true;
					} else {
						$message = "Please enter your full name.";
					}
				} else {	
					$message = "Please enter your full name.";
				}
			} else {
				$message = "Please enter valid email address.";
			}

			
			if ($passed) { 
				//make sure the guest values match the selected guests
				switch ($data['guests']) {
					case 0:
						$data['fullname1'] = "";
						$data['vegetarian1'] = "";
					case 1:
						$data['fullname2'] = "";
						$data['vegetarian2'] = "";
					case 2:
						$data['fullname3'] = "";
						$data['vegetarian3'] = "";
					case 3:
						$data['fullname4'] = "";
						$data['vegetarian4'] = "";
					case 4:
						$data['fullname5'] = "";
						$data['vegetarian5'] = "";
				}
				
				$query = sprintf("INSERT INTO rsvp SET IP = '%s', EMAIL = '%s', NAME0 = '%s', ATTEND = %d, VEG0 = %d, PHONENUMBER = '%s', COMMENTS = '%s', GUESTS = %d, NAME1 = '%s', VEG1 = %d, NAME2 = '%s', VEG2 = %d, NAME3 = '%s', VEG3 = %d, NAME4 = '%s', VEG4 = %d, NAME5 = '%s', VEG5 = %d, SONG = '%s'",
					mysql_real_escape_string(get_ip()),
					mysql_real_escape_string($data['email']),
					mysql_real_escape_string($data['fullname0']),
					mysql_real_escape_string($data['attendance']),
					mysql_real_escape_string($data['vegetarian0']),
					mysql_real_escape_string($data['phonenumber']),
					mysql_real_escape_string($data['comments']),
					mysql_real_escape_string($data['guests']),
					mysql_real_escape_string($data['fullname1']),
					mysql_real_escape_string($data['vegetarian1']),
					mysql_real_escape_string($data['fullname2']),
					mysql_real_escape_string($data['vegetarian2']),
					mysql_real_escape_string($data['fullname3']),
					mysql_real_escape_string($data['vegetarian3']),
					mysql_real_escape_string($data['fullname4']),
					mysql_real_escape_string($data['vegetarian4']),
					mysql_real_escape_string($data['fullname5']),
					mysql_real_escape_string($data['vegetarian5']),
					mysql_real_escape_string($data['song']));
				
				mysql_query($query);
				
				$success = true;
				//send out a confirmation email 
				$to = $data['email'];
				$subject = "RSVP confirmation";
				if ($data['attendance']=='1') {
					$body = "Dear {$data['fullname0']},\r\n\r\n".EMAIL_BODY_ATTEND;
					$message = "Thank you {$data['fullname0']}, we look forward to seeing you there.";
				} else {
					$body = "Dear {$data['fullname0']},\r\n\r\n".EMAIL_BODY_CANTATTEND;
					$message = "Thank you {$data['fullname0']}, we are sorry to hear you cannot attend.";
				}
				$headers = "From: ".EMAIL_FROM."\r\n";
				
				if (EMAIL_SEND) {
					mail($to, $subject, $body, $headers);
				}
			}
		}
		
		mysql_close($conn);
	}
	
	echo <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RSVP</title>
<link rel='stylesheet' href='rsvp/rsvp-load-styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='colors-css'  href='rsvp/rsvp-colors-fresh.css' type='text/css' media='all' />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>

</head>
<body class="wp-admin no-js  options-general-php" onload="pageload()">
<div id="wpwrap">
END;

if ($message) {
	echo "<div id='message' class='updated fade error'><p id='messagetext'>{$message}</p></div>";
} else {
	echo "<div id='message' class='updated fade'><p id='messagetext'>This page works better with JavaScript enabled.</p></div>";
}

if ($success) {
	//on a success we don't display the form

} else {
	//add some smarts for the guest option boxes
	//default to 0 of no value
	default_val($data['guests'], '0');
	for ($i = 0; $i <= 5; $i++) {
		// add the select number of guests
		if ($data['guests'] == $i) {
			$guestoption[$i] = "selected='selected'";
		} else {
			$guestoption[$i] = "";
		}
		
		// add if the guest is vegetarian
		if ($data['vegetarian'.$i]=='1') {
			$vegoption[$i] = "checked='checked'";
		} else {
			$vegoption[$i] = "";
		}
	}

	default_val($data['attendance'], '1');
	if ($data['attendance']=='1') {
		$attendoption['yes'] = "checked='checked'";
		$attendoption['no'] = "";
	} else {
		$attendoption['yes'] = "";
		$attendoption['no'] = "checked='checked'";
	}

	echo <<<END
<form onsubmit="return checkdata()" method="post" action="">
END;
	
	if ($ret) {

		//write a hidden field of the email if retrieved
		echo <<<END
<p><input name="email" type="hidden" id="email" value="{$data['email']}" class="regular-text" /></p>
END;
		
	} else {

		echo <<<END
<table class="form-table" id="myTableEmail">
<tr valign="top">
<th scope="row">Response type</th>
<td>
<fieldset><legend class="screen-reader-text"><span>Response type</span></legend>
<label title="New response"><input class="rsvptype" type="radio" name="rsvptype" value="new" checked="checked" id="new"/> <span>New response</span></label><br />
<label title="Modify existing"><input class="rsvptype" type="radio" name="rsvptype" value="retrieve" id="existing"/> <span>Modify existing</span></label><br />
</fieldset>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="email">E-mail address</label></th>
<td><input name="email" type="text" id="email" value="{$data['email']}" class="regular-text" /></td>
</tr>
</table>
END;
	}
	echo <<<END
<table class="form-table" id="myTable">
<tr valign="top">
<th scope="row"><label for="fullname0">Full name</label></th>
<td><input name="fullname0" type="text" id="fullname0" value="{$data['fullname0']}" class="regular-text" /></td>
</tr>
<tr valign="top">
<th scope="row"><label for="phonenumber">Phone number</label></th>
<td><input name="phonenumber" type="text" id="phonenumber" value="{$data['phonenumber']}" class="regular-text" /></td>
</tr>
<tr valign="top">
<th scope="row">Attendance</th>
<td>
<fieldset><legend class="screen-reader-text"><span>Attendance</span></legend>
<label title="Yes, I can attend"><input class="attendance" type="radio" name="attendance" value="1" {$attendoption['yes']} id="attendyes"/> <span id="spanyes">Yes, I can attend</span></label><br />
<label title="No, I cannot attend"><input class="attendance" type="radio" name="attendance" value="0" {$attendoption['no']} id="attendno"/> <span id="spanno">No, I cannot attend</span></label><br />
</fieldset>
</td>
</tr>
<tr valign="top">
<th scope="row">Vegetarian</th>
<td><fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian0">
<input name="vegetarian0" type="checkbox" id="vegetarian0" value="1" {$vegoption[0]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="guests">Additional invitees</label></th>
<td>
<select name="guests" id="guests">
	<option value="0" {$guestoption[0]}>none</option>
	<option value="1" {$guestoption[1]}>one</option>
	<option value="2" {$guestoption[2]}>two</option>
	<option value="3" {$guestoption[3]}>three</option>
	<option value="4" {$guestoption[4]}>four</option>
	<option value="5" {$guestoption[5]}>five</option>
</select>
</td>
</tr>
<tr valign="top" id="rowfirst1">
<th scope="row"><label for="fullname1">Invitee one full name</label></th>
<td><input name="fullname1" type="text" value="{$data['fullname1']}" id="fullname1" class="regular-text" /></td>
</tr>
<tr valign="top"  id="rowveg1">
<th scope="row">Invitee one vegetarian</th>
<td><fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian1">
<input name="vegetarian1" type="checkbox" id="vegetarian1" value="1" {$vegoption[1]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top" id="rowfirst2">
<th scope="row"><label for="fullname2">Invitee two full name</label></th>
<td><input name="fullname2" type="text" value="{$data['fullname2']}" id="fullname2" class="regular-text" /></td>
</tr>
<tr valign="top"  id="rowveg2">
<th scope="row">Invitee two vegetarian</th>
<td> <fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian2">
<input name="vegetarian2" type="checkbox" id="vegetarian2" value="1" {$vegoption[2]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top" id="rowfirst3">
<th scope="row"><label for="fullname3">Invitee three full name</label></th>
<td><input name="fullname3" type="text" value="{$data['fullname3']}" id="fullname3" class="regular-text" /></td>
</tr>
<tr valign="top"  id="rowveg3">
<th scope="row">Invitee three vegetarian</th>
<td> <fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian3">
<input name="vegetarian3" type="checkbox" id="vegetarian3" value="1" {$vegoption[3]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top" id="rowfirst4">
<th scope="row"><label for="fullname4">Invitee four full name</label></th>
<td><input name="fullname4" type="text" value="{$data['fullname4']}" id="fullname4" class="regular-text" /></td>
</tr>
<tr valign="top"  id="rowveg4">
<th scope="row">Invitee four vegetarian</th>
<td> <fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian4">
<input name="vegetarian4" type="checkbox" id="vegetarian4" value="1" {$vegoption[4]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top" id="rowfirst5">
<th scope="row"><label for="fullname5">Invitee five full name</label></th>
<td><input name="fullname5" type="text" value="{$data['fullname5']}" id="fullname5" class="regular-text" /></td>
</tr>
<tr valign="top"  id="rowveg5">
<th scope="row">Invitee five vegetarian</th>
<td> <fieldset><legend class="screen-reader-text"><span>Vegetarian</span></legend><label for="vegetarian5">
<input name="vegetarian5" type="checkbox" id="vegetarian5" value="1" {$vegoption[5]}/>
Vegetarian</label>
</fieldset>
</td>
</tr>
<tr valign="top" id="song">
<th scope="row"><label for="song">Suggest a song!</label></th>
<td><input name="song" type="text" value="{$data['song']}" id="song" class="regular-text" /></td>
</tr>
<tr valign="top">
<th scope="row">Message to {$event_hosts}</th>
<td><fieldset><legend class="screen-reader-text"><span>Message to Sonya and Travis</span></legend>
<textarea name="comments" rows="3" cols="28" id="comments">{$data['comments']}</textarea>
</fieldset></td>
</tr>
</table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="{$submitbutton}"/></p></form>
END;
}

?>
</div><!-- wpwrap -->
<script type='text/javascript' src='rsvp.js'></script>
</body>
</html>