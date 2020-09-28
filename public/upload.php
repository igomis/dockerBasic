<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
require dirname(__FILE__) . "/../helpers/myHelpers.php";
require dirname(__FILE__) . "/../config/config.php";
require dirname(__FILE__) . "/../config/alumnes.php";
loadWhoops();
$students=[];
$rows = explode(":", $alumnes);
foreach($rows as $key=>$row) {
	$data = explode(";", $row);
	$student = [];
	$student["index"]=$key;
	$student["name"]=$data[0];
	$student["city"]=$data[1];
	$student["group"]=$data[2];
	array_push($students, $student);
}
?>
<!doctype html>
<html lang="en">
  <?php include 'head.php';?>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
	<?php 
		$location="upload.php";
		include 'header.php';
		foreach($students as $student) {
			if ($student["index"]== $_POST["student-index"] && $student["city"] == $_POST["city"]) {
				$info = pathinfo($_FILES['photo']['name']);
				$ext = $info['extension'];
				if($ext == "jpg") {
					$newname = $_POST["student-index"].".".$ext;
					$target = 'photos/'.$newname;
					move_uploaded_file($_FILES['photo']['tmp_name'], $target);
				}
			}
		}
	?>
  <main role="main" class="inner cover">
	<div class="row">
		<div class="col-12">
		<form action="upload.php" method="post" enctype="multipart/form-data">	
		 <div class="form-group">
			<label for="student-index">Name</label>
			<select class="form-control" id="student-index" name="student-index" required>
				<option value="">Select the name</option>
			  <?php
				foreach($students as $student) {
					print "<option value=".$student["index"].">".$student["name"]."</option>";
				}
			  ?>
			</select>
		  </div>
		  <div class="form-group">
			<label for="city">City</label>
			<input type="text" class="form-control" id="city" name="city" placeholder="enter city" required>
		  </div>
		  <div class="form-group">
			<label for="photo">Photo</label>
			<input type="file" class="form-control-file" id="photo" name="photo" accept=".jpg">
		  </div>
		  <button type="submit">Submit</button>
		</form>
	</div>
	</div>
  </main>
  <?php include 'footer.php';?>
</div>
</body>
</html>
