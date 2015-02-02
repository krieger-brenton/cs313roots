<?php
	session_start();

	if(isset($_SESSION['voted']))
		if($_SESSION['voted'])
			header( 'Location: results.php' );

	$file = fopen('results.txt', 'r');
	$stuff = fread($file, filesize('results.txt'));
	fclose($file);

	$answers = explode(" ", $stuff);
	if (!empty($_POST["q1"]))
		$answers[1] += $_POST['q1'];
	if (!empty($_POST["q2"]))
		$answers[2] += $_POST['q2'];
	if (!empty($_POST["q3"]))
		$answers[3] += $_POST['q3'];
	if (!empty($_POST["name"]))
		$answers[4] += $_POST['q4'];
	if (!empty($_POST["name"]))
		$answers[5] += $_POST['q5'];

	$newStuff = implode(" ", $answers);

	$file = fopen('results.txt', 'w');
	fwrite($file, $newStuff);
	fclose($file);

	$_SESSION['voted'] = true;
	header( 'Location: results.php' );

?>