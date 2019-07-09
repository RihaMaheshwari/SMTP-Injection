<html>
<head>
</head>
 <body>
<?php if (!empty($_REQUEST)):
$host="127.0.0.1";
$port = 25;
 
// open a client connection
$fp = fsockopen ($host, $port, $errno, $errstr);

if (!$fp)
{
$result = "Error: could not open socket connection";
}
else
{

$result = '';
$message = $_REQUEST['name']."\r\nMAIL FROM: ".$_REQUEST['email_from']."\r\nRCPT TO: root@mari0.com\r\ndata\r\n".$_REQUEST['message']."\r\n.\r\nquit\r\n";
fputs ($fp, $message);
// get the result
$result = fgets ($fp, 1024);
// close the connection
fputs ($fp, "Exited with $result");
//echo $result;
echo "Email has been sent successfully";
 
// now print it to the browser
}
?>
<?php htmlspecialchars($_REQUEST["name"]); ?>!<br>
<?php htmlspecialchars($_REQUEST["email_from"]); ?>.<br>
<?php htmlspecialchars($_REQUEST["message"]); ?>.<br>
<?php else: ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
        Name: <input type="text" name="name"><br>
	Email From: <input type="text" name="email_from"><br>
	Message: <input type="text" name="message"><br>
        <input type="submit">
    </form>
<?php endif; ?>
</body>
</html>
