<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Generate QRCode</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Generate QR Code</h1>
	<div class="row">
		<div class="col-sm-3 col-sm-offset-3">
			<form method="POST">
				<div class="form-group">
					<label for="">Text to Convert to QR Code</label>
					<input type="text" class="form-control" name="text_code">
				</div>
				<button type="submit" class="btn btn-primary" name="generate">Submit</button>
			</form>
		</div>
		<div class="col-sm-3">
			<?php
				if(isset($_POST['generate'])){
					$code = $_POST['text_code'];
					//connect to database
					$servername = "sql112.epizy.com";
					$username = "epiz_34044351";
					$password = "5seDrTWBZn31Qc";
					$database = "epiz_34044351_checkinn";
					$conn = new mysqli($servername, $username, $password, $database);

					$sql = "insert into payment(code) VALUES('$code')";

					if($conn->query($sql) === TRUE)
					{
						echo "QR code and data saved to database.";
					}
					else 
					{
						echo "Error:".$sql."<br>".$conn->error;
					}

					echo "
						<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8'>
					";
					$conn->close();
				}
			?>
		</div>
	</div>
</div>
</body>
</html>

