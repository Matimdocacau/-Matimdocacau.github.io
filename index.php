<?php
$filename = 'ips.txt';

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$user_ip = getUserIP();
$current_time = date("Y-m-d H:i:s");
file_put_contents($filename, "$current_time - $user_ip\n", FILE_APPEND);
$ips = file_get_contents($filename);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>IP Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            width: 80%;
            margin: auto;
        }
        h1, h2 {
            color: #2c3e50;
        }
        pre {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Ваш IP: <?php echo $user_ip; ?></h1>
    <h2>Список IP-адресов посетителей:</h2>
    <pre><?php echo htmlspecialchars($ips); ?></pre>
</body>
</html>

