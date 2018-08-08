<?php
/*
||  Crafted with pride by Dwiky
||                   ( 0 )  ( 0 )
||                   |__|   |__|
*/

// initialize variables
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";
// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vigenere.php');

	// set the variables
	$cphr = $_POST['cphr'];
	$code = $_POST['plain'];


	// check if text is provided
	if (empty($_POST['cphr']))
	{
		$error = "Masukkan Text Bos!";
		$valid = false;
	}

	else if (empty($_POST['cphr']))
	{
		$error = "Masukkan Text Bos!";
		$valid = false;
	}

	// inputs valid
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['crack']))
		{
			$code = crack($cphr, $code);
			$error = "Sukses Crack Cipher!";
			$color = "#526F35";
		}
	}
}
?>

<html>
	<head>
		<title>Keamanan Jaringan - Vigenere Cipher</title>
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
		<br><br><br>
		<form action="crack.php" method="post">
			<table cellpadding="5" align="center" cellpadding="2" border="7">
				<caption><hr><b>D3SI Vigenere Cipher Tools</b><hr><br/>
          <b><a href='index.php'>Encrypt</a> | <a href='decrypt.php'>Decrypt</a> | <a href='crack.php'>Crack</a></b>
        </caption>
				<tr>
					<td align="center"><textarea id="box" name="cphr">Ganti dengan Ciphertext</textarea></td>
				</tr>
				<tr>
					<td align="center"><textarea id="box" name="plain">Ganti dengan Plaintext</textarea></td>
				</tr>
				<tr>
					<td align="center">Password: <input disabled  type="text" name="pswd" id="pass" value="<?php echo htmlspecialchars($code); ?>" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="crack" class="button" value="CRACK IT NOW" onclick="validate(1)" /></td>
				</tr>
				<tr>
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>
