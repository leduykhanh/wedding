<?php

$db = new SQLite3("rsvp.db");
$name = $_POST["inputname"];
$db->exec("INSERT INTO rsvp (name,email,events, message) VALUES ('$name','LE','LE','LE');");
$db->close();
echo "".$name;
?>