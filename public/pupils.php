<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
require dirname(__FILE__) . "/../helpers/myHelpers.php";
require dirname(__FILE__) . "/../config/config.php";
require dirname(__FILE__) . "/../config/alumnes.php";
loadWhoops();
?>
<!doctype html>
<html lang="en">
	<?php include 'head.php';?>
	<body class="text-center">
		<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
			<?php 
				$location="pupils.php";
				include 'header.php';
			?>
			<main role="main" class="inner cover">
				<div class="row">
					<div class="col-12">
						<?php
							print "<table class='table table-hover table-info table-sm'>";
							$rows = explode(":", $alumnes);
							foreach($rows as $key=>$row) {
								$data = explode(";", $row);
								$row = "<tr>".paintLine($data)."<td><img src='/photos/".$key.".jpg'/></td>"."</tr>";
								print $row;
							}
							print "</table>";
						?>
					</div>
				</div>
			</main>
			<?php include 'footer.php';?>
		</div>
	</body>
</html>
