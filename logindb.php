<!-- print error log if required -->
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
// for debug
error_log("User details	: ". $username . " " . $email . " " . $password, 0); 

// if email and password are valid, then let the user in. otherwise return them to the login screen. 
if (validate($email, $password))  {
	processGoodLogin();
} else {
	processBadLogin();
}

function validate($email, $password) {
	$status = checkCreds($email, $password);
	return $status;

// hash password for security
	echo password_hash($password, PASSWORD_BCRYPT). "In";
    $hash = '$2y$07$BCryptRequires22Chrcte/VIQH0pi]tjX1.0t1XkA8pw9dMXTpog';
    if (password_verify($password, $hash)) {
    echo 'Password is valid!';
    } else {
    echo 'Invalid password.';
    }
}

// get connection to local MySQL database
function getDBConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eternalsfansite";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error);
	}
    return $conn;
}

// check the credentials to ensure theyre on the database
function checkCreds($email, $password) {
	$conn = getDBConnection();

	$sql = "SELECT * FROM users";
	$sql = $sql . " where email='" . $email . "' AND password='" . $password . "';";

	$result = mysqli_query($conn, $sql);
	// if the query returns only one result, email and password are OK
	if (mysqli_num_rows($result) == 1) {
		$status = True;
	} else {
		$status = False;
	}

	// Close the connection 
	mysqli_close($conn);
	return $status;	
}

// Process good login
function processGoodLogin() {
	$_SESSION["status"] = "LoggedIn";
	header("Location: home.php");
	exit();
}

// Process bad login
function processBadLogin() {
	$_SESSION["status"] = "NotLoggedIn";
	$_SESSION['login_error_msg'] = "Sorry, that user name or password is incorrect. Please try again.";
	echo $_SESSION['login_error_msg'];
	header("Location: index.php");
	exit();
}
?>