 <?php
 
	require_once("../konfig_global.php");
	$database = "if13_rene_p";
	
	function createUser($create_email, $password_hash){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
				
				//asendame ? muutujate v22rtustega
				
				//echo $mysqli->error;
				//echo $stmt->error;
				
				$stmt->bind_param("ss",$create_email, $password_hash);
				$stmt->execute();
				$stmt->close();
				
				$mysqli->close();
		
		
	} 
	
	//logi sisse
	
	function loginUser($email, $password_hash){
				$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
				$stmt->bind_param("ss", $email, $password_hash); //asnendab küsimärgid
				
				//paneme vastused muutujatesse
				
				$stmt->bind_result($id_from_db, $email_from_db);
				$stmt->execute();
				echo "<br>";
				
				if($stmt->fetch()){
					
					echo "Kasutaja id=".$id_from_db;
					
				}
				else{
					//tühi, ei leidnud
					echo "Wrong password or email";
				}
				$stmt->close();
				$mysqli->close();
		
		
	}
	
 ?>