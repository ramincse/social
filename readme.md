## Profile Login and Registration System

This is a learning purpose project for profile login and user registration system. We use some programming language here.

### Uses Language

- HTML 5
- CSS 3
- javaScript
- jQuery
- PHP
- MySQL
- OOP
- PDO

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