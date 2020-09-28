<header class="masthead mb-auto">
	<div class="inner">
		<h3 class="masthead-brand">
			<?php print greetins();?>
		</h3>
		<nav class="nav nav-masthead justify-content-center">
			<?php
				if ($location == "index.php") {
					print "<a class='nav-link active' href='#'>Home</a>";
				} else {
					echo "<a class='nav-link' href='index.php'>Home</a>";
				}
				if ($location == "pupils.php") {
					print "<a class='nav-link active' href='#'>Pupils</a>";
				} else {
					echo "<a class='nav-link' href='pupils.php'>Pupils</a>";
				}
				if ($location == "upload.php") {
					print "<a class='nav-link active' href='#'>Upload</a>";
				} else {
					echo "<a class='nav-link' href='upload.php'>Upload</a>";
				}
			?>
		</nav>
	</div>
</header>