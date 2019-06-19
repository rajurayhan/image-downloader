<?php 
	require 'class/Image.class.php';
	$imgObj 	= new Imageclass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Server to Server Image Manipulation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<form action="">
					<div class="form-group">
						<label for="image">Image URL:</label>
						<input type="text" class="form-control" id="image" name="image" autocomplete="off" required>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>

		<div class="row">
			<?php 
				if(isset($_GET['image']) && $_GET['image'] != ''){
					$path 	= $_GET['image'];
					$image = $imgObj->grabImage($path, 'storage/'.uniqid().'.png');

					echo "<img class='img' style='max-width: 720px;' src='storage/water/".$image."'>";
				}
			?>
		</div>
	</div>
</body>
</html>