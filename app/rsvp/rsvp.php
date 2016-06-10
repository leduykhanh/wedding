<?php

$db = new SQLite3("rsvp.db");
$db->exec("INSERT INTO rsvp (name,email,events, message) VALUES ('LE','LE','LE','LE');");
$db->close();

?>