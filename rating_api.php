<?php
		function i_am_new($tableid) {
			// bikin table dengan nama sesuai input 
			// ada 3kolom title, user, score
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ratingwebservice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			// sql to create table
			$sql = "CREATE TABLE ". $tableid ." (title VARCHAR(50) NOT NULL, user VARCHAR(25) NOT NULL, score INT(10) NOT NULL )";

			if ($conn->query($sql) === TRUE) {
				//echo "Table created successfully";
				echo "";
			} else {
				//echo "Error creating table: " . $conn->error;
				echo "";
			}

			$conn->close();
		}

		function user_rate($tableid, $titleid, $userid, $scorerate) {
			// insert titleid, userid, scorerate ke tableid
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ratingwebservice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				$sql = "SELECT * FROM " . $tableid . " WHERE title = '" . $titleid . "'AND user = '" . $userid . "'";
				$result = $conn->query($sql);
			
				if ($result->num_rows == 0) {
					$sql2 = "INSERT INTO " . $tableid . " (title, user, score) VALUES ('" . $titleid . "', '" . $userid . "', '" . $scorerate . "')";

					if ($conn->query($sql2) === TRUE) {
						//echo "New record created successfully";
						echo "";
					} else {
						//echo "Error: " . $sql . "<br>" . $conn->error;
						echo "";
					}
				} else {
					$sql = "UPDATE ".$tableid." SET score='".$scorerate."' WHERE title='".$titleid."' AND user='".$userid."'";

					if ($conn->query($sql) === TRUE) {
						echo "Record updated successfully";
					} else {
						echo "Error updating record: " . $conn->error;
					}
				}
				
			$conn->close();
		}

		function check_scorerate($tableid, $titleid, $userid) {
			//cek dengan title dan user itu udah rating blm
			//kalau udah return scorenya
			//kalau belum return x
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ratingwebservice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			// sql to create table
			$sql = "SELECT * FROM " . $tableid . " WHERE title = '" . $titleid . "'AND user = '" . $userid . "'";
			$result = $conn->query($sql);
			
			if ($result->num_rows == 0) {
				return ('x');
			} else {
				// output data of each row
				while($info = $result->fetch_assoc()) {
					return $info['score'];
				}
			}

			$conn->close();
		}
		
		function total_user($tableid, $titleid){
			//menghitung jumlah user yang sudah rating
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ratingwebservice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			// sql to create table
			$sql = "SELECT * FROM " . $tableid . " WHERE title = '" . $titleid . "'";
			$result = $conn->query($sql);
			$totaluser = 0;
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($info = $result->fetch_assoc()) {
					$totaluser++;
				}
			} else {
				
			}
			return $totaluser;
			
			$conn->close();
			
		}

		function average_score($tableid, $titleid){
			//menghitung nilai rata-rata hasil rating
			//menghitung jumlah user yang sudah rating
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ratingwebservice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			// sql to create table
			$sql = "SELECT * FROM " . $tableid . " WHERE title = '" . $titleid . "'";
			$result = $conn->query($sql);
			$totaluser = 0;
			$totalscore = 0;
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($info = $result->fetch_assoc()) {
					$totaluser++;
					$totalscore = $totalscore + $info['score'];
				}
			} else {
				
			}
			$averagescore = ($totalscore / $totaluser);
			return $averagescore;
			
			$conn->close();
		}
		
		if (isset($_GET["action"])) {
			switch ($_GET["action"]) {
				case "i_am_new"; 
					$value = i_am_new($_GET["tableid"]);
					break;
				case "user_rate";
					$value = user_rate($_GET["tableid"], $_GET["titleid"], $_GET["userid"], $_GET["scorerate"]);
					break;
				case "check_scorerate";
					$value = check_scorerate($_GET["tableid"], $_GET["titleid"], $_GET["userid"]);
					break;
				case "total_user";
					$value = total_user($_GET["tableid"], $_GET["titleid"]);
					break;
				case "average_score";
					$value = average_score($_GET["tableid"], $_GET["titleid"]);
					break;
			}
		}
		exit(json_encode($value));
?>
