<?php
$message = "Thanks for your attention";
global $db;
$db = new SQLite3("rsvp.db");
$name = $_POST["inputname"];
$email = $_POST["inputemail"];
$events = implode(",",$_POST["inputevents"]);
$message = "no message";
if (isset($_POST["inputmessage"]))
	$message = $_POST["inputmessage"];
function item_exists($db,$item_value,$item_type)
{
	$IDq = $db->query("SELECT * FROM rsvp WHERE $item_type= '$item_value'");

	if($IDq->fetchArray(SQLITE3_ASSOC))
	{
		return true;
	}
	else
	{
		return false;
	}
}
if (item_exists($db,$email, 'email') === true)
{
	$message = 'email exists';
}
else{
	$db->exec("INSERT INTO rsvp (name,email,events, message) VALUES ('$name','$email','$events','$message');");
}
$db->close();
echo json_encode(array("text"=>$message));
?>