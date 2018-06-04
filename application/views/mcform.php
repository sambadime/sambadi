<html>
	<head>
		<title>test</title>
	</head>
	<body>
		<?= form_open("minecraft/index") ?>
			<label for="username">Username</label>
			<input type="text" id="label" name="username" required>
			<br />
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<br />
			<input type="submit">
		</form>

		<div>
			<h1>Online player:</h1>
			<?php
			$i = 0;
			if(is_array($online)) {
				foreach($online as $row) {
					$i++;
					echo "<a>". $row->username . "</a><br />";
				}
			}
			else {
				echo "<a>" . $online . "</a><br />";
			}
			echo "Total player :" . $i . "/20";
			?>
		</div>
	</body>
</html>