<?php
	date_default_timezone_set('GMT');
	require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/db.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/notifications.class.php");


# COMMENTED CODE WAS USED TO WRITE TO A FILE, BEFORE DATABASE WAS SETUP


##$fh = fopen('json_parse.log', 'a+') or die("Error opening output file");

#if ( $fh ) {


	// Check if the post is coming from Checkfront servers
	if (strstr($_SERVER['HTTP_USER_AGENT'], 'Checkfront')) {

		$notifications = new Notification();
		$notifications->ParseNotificationData();		
		$db = new DB();
		$db->write('notifications', $notifications->dataArray);

		echo "Ok";

#	    fwrite($fh, serialize($notifications->dataArray));
#	    fclose($fh);
		
	} else {
		echo "Invalid Host";
	}
#}

?>