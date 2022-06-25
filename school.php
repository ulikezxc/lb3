<?php
function group($db, $group)
{
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type 
    FROM lesson INNER JOIN lesson_groups ON ID_Lesson = FID_Lesson2 
    WHERE FID_Groups = ?");
    $statement->execute([$group]);
    echo "<table>";
    echo " <tr><th>День</th><th>Пара</th><th>Аудитория</th><th>Дисциплина</th><th>Тип</th></tr> ";

    while ($data = $statement->fetch()) {
        echo " <tr><td>{$data['week_day']}</td><td> {$data['lesson_number']} </td><td> {$data['auditorium']} </td><td> {$data['disciple']} </td><td> {$data['type']} </td></tr> ";
    }
    echo "</table>";
}

function teacher($db, $teacher)
{
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type 
    FROM lesson INNER JOIN lesson_teacher ON ID_Lesson = FID_Lesson1
    WHERE FID_Teacher = ?");
    $statement->execute([$teacher]);
    $txt = "<table>";
    $txt .= " <tr><th>День</th><th>Пара</th><th>Аудитория</th><th>Дисциплина</th><th>Тип</th></tr> ";
    while ($data = $statement->fetch()) {
        $txt .= " <tr><td>{$data['week_day']}</td><td> {$data['lesson_number']} </td><td> {$data['auditorium']} </td><td> {$data['disciple']} </td><td> {$data['type']} </td></tr> ";
    }
    $txt .= "</table>";
    echo json_encode($txt);
}

function auditorium($db, $auditorium)
{
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type 
    FROM lesson
    WHERE auditorium = ?");
    $statement->execute([$auditorium]);
    $txt = "<table>";
    $txt .= " <tr><th>День</th><th>Пара</th><th>Аудитория</th><th>Дисциплина</th><th>Тип</th></tr> ";
    while ($data = $statement->fetch()) {
        $txt .= " <tr><td>{$data['week_day']}</td><td> {$data['lesson_number']} </td><td> {$data['auditorium']} </td><td> {$data['disciple']} </td><td> {$data['type']} </td></tr> ";
    }
    $txt .= "</table>";
    echo $txt;
}

$db = new PDO("mysql:host=127.0.0.1;dbname=timetable", "root", "");

if (isset($_POST["group"])) {
    group($db, $_POST["group"]);
} elseif (isset($_POST["teacher"])) {
    teacher($db, $_POST["teacher"]);
} elseif (isset($_POST["auditorium"])) {
    auditorium($db, $_POST["auditorium"]);
}