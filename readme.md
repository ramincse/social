## Profile Login and Registration System

This is a learning purpose project for profile login and user registration system. We use some programming language here.

### Uses Language

- HTML 5
- CSS 3
- javaScript
- PHP
- MySQL

### Flash message
```php
/**
 * Set Flash Msg
 */
setMsg('Your data is stable now !');
/**
 * Flash Msg Function
 */
function setMsg($msg){
	setcookie('msg', $msg, time() + 10 );
}

function getMsg(){
	if ( isset($_COOKIE['msg']) ) {
		echo '<p class="alert alert-$ss">' . $_COOKIE['msg'] . '<button class="close" data-dismiss="alert">&times;</button></p>';
	}
}
/**
 * Flash Msg Show
 */
getMsg();
```
### Login System
```php
if ( isset($_POST['signin']) ) {
	//Get values
	$ue = $_POST['ue'];
	$pass = $_POST['pass'];

	if ( empty($ue) || empty($pass) ) {
		$mess = '<p class="alert alert-danger">All fields are required ! <button class="close" data-dismiss="alert">&times;</button></p>';
	}else{
		$sql = "SELECT * FROM users WHERE email = '$ue' || uname = '$ue'";
		$data = $connection -> query($sql);
		$count = $data -> num_rows;

		$login_user_data = $data -> fetch_assoc();

		if ( $count == 1 ) {
			if ( password_verify($pass, $login_user_data['pass']) == true ) {
				header('location:profile.php');
			}else{
				$mess = '<p class="alert alert-danger">Wrong password ! <button class="close" data-dismiss="alert">&times;</button></p>';	
			}						
		}else{
			$mess = '<p class="alert alert-danger">Invalid username or email ! <button class="close" data-dismiss="alert">&times;</button></p>';
		}
	}
}
```
### Logout System
```php
if ( isset($_GET['logout']) AND $_GET['logout'] == 'success' ) {
	session_destroy();
	/**
	 * Destroy Cookie for Relogin
	 */
	setcookie('user_login_id', '', time() - (365*24*60*60) );

	//Redirect profile page				
	header('location:index.php');
}
```
### Show all users data
```php 
$sql = "SELECT * FROM users ORDER BY id DESC";
$data = $connection -> query($sql);

$i = 1;
while( $all_users = $data -> fetch_assoc() ) :
endwhile;

echo $all_users['name'];
```
### Page security System
```php 
if ( !isset($_SESSION['email']) AND !isset($_SESSION['uname']) AND !isset($_SESSION['pass']) ) {
	header('location:index.php');
}
```
