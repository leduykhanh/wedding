<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Responses</title>
</head>
<body>
<table>
<colgroup><col><col><col><col><col><col><col><col></colgroup>
<tr class="header"><td>Name<td>Attend<td>Guests<td>Comments<td>Song</tr>
<?php
		error_reporting(0);
		$included = true;
		include 'rsvp.php';
		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ('Error connecting to mysql');
		mysql_select_db(DB_NAME);
		
        $query = "SELECT * FROM rsvp ORDER BY ID";
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result)){
             
			echo '<tr><td>'.$row[NAME0].'<td>'.$row[ATTEND].'<td>'.$row[GUESTS].'<td>'.$row[COMMENTS].'<td>'.$row[SONG]."\r";
        }
		
		mysql_close($conn);
?>
</table>
</body>
</html>