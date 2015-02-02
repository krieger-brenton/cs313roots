<?php
$count = 0
if (isset($_COOKIE["count"]))
{
  $count = $_COOKIE["count"]);
  $count += 1;
  setcookie("siteCount", $count, time() + 86400);
}
else
{
  setcookie("siteCount", "1", time() + 86400);  
}
?>

<!--Session stuff-->

<?php
session_start();

$_SESSION["count"] = 10;
?>

<!DOCTYPE html>
<html>
<head>
<title> Cookies</title>
</head>
<body>
		<div>
			This is a page with cookies... hopefully.
		</div>
		<?php
    if (isset($_COOKIE["userID"]))
    {
      echo "You have been here" . $_COOKIE["siteCount"] . "times.";
    }
    ?>


</body>


</html>



