<?php
	function get_info_by_id($id) {
		$info = array();
		$con = mysqli_connect('localhost', 'root', '','event');
		$result = mysqli_query($con, 'SELECT * FROM detil_event WHERE event_id = ' . $id);
		$info = mysqli_fetch_array ($result, MYSQL_ASSOC); 
		return $info; 
	}

	function get_Allevent() {
		$info = array();
		$con = mysqli_connect('localhost', 'root', '','event');
		$result = mysqli_query($con, 'SELECT event_id, nama FROM detil_event');
		while ($row = mysqli_fetch_array ($result, MYSQL_ASSOC)) {
			$info[] = $row;
		}
		return $info; 
	}
	
	function insert_average_rate($eventid, $rating) {
		$info = array();
		$con = mysqli_connect('localhost', 'root', '','event');
		$result = mysqli_query($con, "UPDATE detil_event SET rating='".$rating."' WHERE event_id='".$eventid."'");
	}

	if (isset($_GET["action"])) {
		switch ($_GET["action"]) {
			case "get_event";
				if (isset($_GET["id"])) 
					$value = get_info_by_id($_GET["id"]);
				else
					$value = "ERROR";
				break;
			case "get_Allevent";
				$value = get_Allevent();
				break;
			case "insert_average_rate";
				if (isset($_GET['eventid']) && isset($_GET['averagerate'])) 
					$value = insert_average_rate($_GET['eventid'],$_GET['averagerate']);
				else
					$value = "ERROR";
				break;
		}
	}
	exit(json_encode($value));	
?>
