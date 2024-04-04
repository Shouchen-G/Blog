<?php
$conn = new mysqli("localhost", "admin", "admin", "genshindata");
$mode = 'list';
if (isset($_REQUEST['mode']))
	$mode = $_REQUEST['mode'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Netball database</title>
	</head>
	<body>
		<ul>
			<li><a href="?mode=list">List teams</a>
        </ul>

        <?php
	if ($mode == 'list') {
?>
		<h1>List of teams</h1>
		<table>
<?php
		$result = $conn->query("SELECT * FROM foodimg;");
		foreach ($result as $row) {
?>
			<tr><td><?php echo "<img src ='{$row['img_dir']}'>"?></td></tr>
<?php
		}
?>
		</table>
        <?php
    }
    ?>