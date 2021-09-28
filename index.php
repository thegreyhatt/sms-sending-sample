<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Sending using iTexmo</title>

    <style>
        .form{
            width: 200px;
            margin: auto;
        }
    </style>

</head>
<body>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $api_code = 'YOUR-API-CODE-HERE';
        $password = 'YOUR-PASSWORD';
        itexmo($_POST['phone_number'],$_POST['message'], $api_code, $password);
    }

    function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
    }
?>
    
    <div class="form" >
        <form action="index.php" method="post">
            <label>Phone Number: </label>
            <input type="text" name="phone_number" >
            <label>Message: </label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input type="submit">
        </form>
    </div>
</body>
</html>
