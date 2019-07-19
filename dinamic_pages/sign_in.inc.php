<div class="include_content">
	<br/>
	<h1 class="h1">Login page</h1>
	<br/>

	<?php 

	$connection = new mysqli('localhost' , 'root' , '' , 'practice_database');

	$nameError = '';
	$passError = '';

	$username = '';
	$userpass = '';

	?>

<?php 

	if (isset($_POST['submit'])) {
		if (empty($_POST['username'])) {
			$nameError = 'name requred';
		} else {
			$username = check_input($_POST['username']);
			if (!preg_match('/[a-zA-Z0-9_]{5,}/', $username)) {
				$nameError = 'name is not in valid format';
			}
		}
		if (empty($_POST['userpass'])) {
			$emailError = 'email requred';
		} else {
			$usermail = check_input($_POST['userpass']);
		}
		
	}

	function check_input($data) {
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function insert_into_database() {
		global $username , $userpass , $connection;

		$Query = "INSERT INTO log_in(user_name , user_pass) VALUES('{$username}' , '{$userpass}');";
		$execution = $connection->query($Query);

			if ($execution) {
				echo 'Logged in successfully...';
			} else {
				echo 'Log in unsuccess...';
			}
	}

?>


	<div>
		<?php insert_into_database(); ?>
	</div>
	<form class="form-group" action="<?php echo $_SERVER['PHP_FILE']; ?>" method="POST">
		<div class="form-group">
			<label class="text-muted" for="user">User Name</label>
			<input class="form-control form-control w-50" type="text" name="username">
		</div>
		<div class="form-group">
			<label class="text-muted" for="user">Password</label>
			<input class="form-control form-control w-50" type="password" name="userpass">
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-block w-50" name="submit" type="submit">Log In</button>
		</div>
	</form>




</div>