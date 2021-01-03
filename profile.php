<?php 
	include_once "app/db.php";
	include_once "app/functions.php";
?>
<?php 
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Development Area</title>
		<!-- ALL CSS FILES  -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
	</head>
	<body>
		<div class="wrap shadow">
			<div class="card clearfix">
				<div class="card-header">Profile of - <?php echo $_SESSION['name']; ?> <a class="btn btn-sm btn-info float-right" href="data.php">All members</a></div>
				<div class="card-body">
					<img class="shadow" style="width: 200px; height: 200px; display: block; margin: 10px auto 30px; border-radius: 50%; border: 10px solid #fff;" src="students/echo $_SESSION['photo'];" alt="">

					<table class="table table-striped">
						<tr>
							<td>Name</td>
							<td><?php echo $_SESSION['name']; ?></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><?php echo $_SESSION['uname']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $_SESSION['email']; ?></td>
						</tr>
						<tr>
							<td>Cell</td>
							<td><?php echo $_SESSION['cell']; ?></td>
						</tr>
					</table>
				</div>
				<div class="card-footer">
					<a class="btn btn-sm btn-info" href="logout.php">Logout</a>
				</div>
			</div>
		</div>		
		<!-- JS FILES  -->
		<script src="assets/js/jquery-3.4.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>