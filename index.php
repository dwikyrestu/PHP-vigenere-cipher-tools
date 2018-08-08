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
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];

	// check if password is provided
	if (empty($_POST['pswd']))
	{
		$error = "Masukkan Password Bos!";
		$valid = false;
	}

	// check if text is provided
	else if (empty($_POST['code']))
	{
		$error = "Masukkan Text Bos!";
		$valid = false;
	}

	// check if password is alphanumeric
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Password Harus Huruf Bos!";
			$valid = false;
		}
	}

	// inputs valid
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Sukses Mengenkripsi Text!";
			$color = "#526F35";
		}

		// if decrypt button was clicked
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Sukses Dekripsi Cipher!";
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
		<form action="index.php" method="post">
			<table cellpadding="5" align="center" cellpadding="2" border="7">
				<caption><hr><b>D3SI Vigenere Cipher Tools</b><hr><br/>
          <b><a href='index.php'>Encrypt</a> | <a href='decrypt.php'>Decrypt</a> | <a href='crack.php'>Crack</a></b>
        </caption>
				<tr>
					<td align="center">Password: <input type="text" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
				</tr>
				<tr>
					<td align="center"><textarea id="box" name="code"><?php echo htmlspecialchars($code); ?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="encrypt" class="button" value="Encode" onclick="validate(1)" /></td>
				</tr>
				<tr>
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>
