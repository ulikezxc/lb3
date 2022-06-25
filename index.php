<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=timetable", "root", "");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LABA3</title>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="post" id="group">
    <select name="group">
        <?php
        $statement = $db->query("SELECT DISTINCT * FROM groups");
        while ($data = $statement->fetch()) {
            echo "<option value='$data[0]'>$data[1]</option>";
        }
        ?>
    </select>
    <input type="submit"><br>
</form>
<br>
<form action="" method="post" id="teacher">
    <select name="teacher">
        <?php
        $statement = $db->query("SELECT DISTINCT * FROM teacher");
        while ($data = $statement->fetch()) {
            echo "<option value='$data[0]'>$data[1]</option>";
        }
        ?>
    </select>
    <input type="submit"><br>
</form>
<br>
<form action="" method="post" id="auditorium">
    <select name="auditorium">
        <?php
        $statement = $db->query("SELECT DISTINCT auditorium FROM lesson");
        while ($data = $statement->fetch()) {
            echo "<option value='$data[0]'>$data[0]</option>";
        }
        ?>
    </select>
    <input type="submit"><br>
</form>
<br>
<div id="content"></div>
</body>
</html>
