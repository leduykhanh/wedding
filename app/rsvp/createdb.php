<?php

$db = new SQLite3('rsvp.db');
$db->exec('CREATE TABLE rsvp (id INTEGER PRIMARY KEY, name varchar(100), email varchar(200), events TEXT, message TEXT);');
$db->close();

?>