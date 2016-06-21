<?php
	
	$CONFIG = array(
		'dsn' => 'mysql:dbname=time_track;host=127.0.0.1',
		'user' => 'root',
		'pass' => 'root',
	);

	/**
	 * Returns a PDO connection to the current database
	 */
	function db () {
		static $dbh = null;
		global $CONFIG;

		if ( $dbh === null ) {
			try {
				$dbh = new PDO( $CONFIG['dsn'], $CONFIG['user'], $CONFIG['pass'] );
			} catch ( PDOException $e ) {
				die( 'Database error' );
			}
		}

		return $dbh;
	}

	/**
	 * Escapes string for HTML output
	 */
	function esc_html ( $text ) {
		return htmlentities( $text, ENT_QUOTES );
	}

	/**
	 * Fetches a list of users as an array
	 */
	function getUsers () {
		$query = "SELECT  u.username, SUM(TIMESTAMPDIFF(HOUR,l.started_working, l.stopped_working)) as `total` FROM `log_entry` AS l JOIN `users` AS u ON l.user_id = u.id GROUP BY(u.username)";

		$statement = db()->prepare($query);

		return $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
	}

	/**
	 * Save new user's data 
	 */
	if(isset($_POST['add_user'])){
		$res = array("status" => "success");

		$username = $_POST['username'];
		$password = md5($_POST['password']);
		try {
			$query = "INSERT INTO users (`username`, `password`, `created_at`) VALUES ('$username', '$password', CURRENT_TIMESTAMP)";
			$statement = db()->prepare( $query );
			$statement->execute();
		} catch ( Exeption $e ) {
			$res = array( 'status' => "fail" );
		} 
		if($res['status'] == "success"){
			header("Location:admin.php");
		}
	}


	/**
	 * User Login
	 */
	if(isset($_POST['user_login'])){		
		session_start();
		$res['status'] = "success";
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		try {
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
			$statement = db()->prepare( $query );
			$result = $statement->execute() ? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
		} catch ( Exeption $e ) {
			$res = array( 'status' => "fail" );
		} 
		print_r($result);
		$_SESSION['user'] = $username;
		$_SESSION['user_id'] = $result[0]['id'];
		$type = $result[0]['type'];
		if($result != null){
			if($type == 'admin'){
				header("Location:admin.php");
			}else{
				header("Location:entry.php");
			}
		}
		if($res['status'] == "success"){
		}
	}

	/**
	 * User Log Entry 
	 */
	if(isset($_POST['add_entry'])){
		$res = array("status" => "success");

		$user_id = $_POST['user_id'];
		$entry_date = $_POST['entry_date'];
		$started_working = $_POST['started_working'];
		$stopped_working = $_POST['stopped_working'];
		$comment = $_POST['comment'];
		print_r($_POST);
		try {
			$query = "INSERT INTO log_entry (`user_id`, `entry_date`, `started_working`, `stopped_working`, `comment`, `created_at`) VALUES ('$user_id', '$entry_date', '$started_working', '$stopped_working', '$comment', CURRENT_TIMESTAMP)";
			$statement = db()->prepare( $query );
			$statement->execute();
		} catch ( Exeption $e ) {
			$res = array( 'status' => "fail" );
		} 
		if($res['status'] == "success"){
			header("Location:entry.php");
		}
	}

	/**
	 * Fetches a list of logs of users as an array
	 */
	function getUserLog () {
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM log_entry WHERE user_id = '$user_id'";
		$statement = db()->prepare( $query );
		$result = $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
		return $result;
	}
