<?php
$input = ($_GET['students']);
$sortByColumn = $_GET['column'];
$orderBy = $_GET['order'];
$lines = explode("\n", $input);
//var_dump($lines);
$students = [];
$id = 1;
foreach ($lines as $line) {
    if ($line !='') {
        list($username, $email, $type, $result) = explode(",", $line);
        $newStudent = array(
            'id' => $id,
            'username' => trim($username),
            'email' => trim($email),
            'type' => trim($type),
            'result' => intval(trim($result))
        );
        $students[] = $newStudent;
        $id++;
    }
}

$sign = 1;
if ($orderBy == "descending") {
    $sign = -1;
}
compare($students, $sortByColumn, $sign);

echo "<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>";
foreach ($students as $student) {
    echo "<tr><td>" . $student['id'] .  "</td><td>"
        . htmlspecialchars($student['username']) . "</td><td>"
        . htmlspecialchars($student['email']) . "</td><td>"
        . htmlspecialchars($student['type']) . "</td><td>"
        . htmlspecialchars($student['result']) . "</td></tr>";
}
echo "</table>";

function compare(&$arrayToSort, $sort, $order) {
    usort($arrayToSort, function($a, $b) use ($sort, $order) {
        if (is_numeric($a[$sort])) {
            if ($a[$sort] == $b[$sort]) {
                return ($a['id'] - $b['id'])*$order;
            } else {
                return ($a[$sort] - $b[$sort])*$order;
            }
        } else {
            if (strcmp($a[$sort], $b[$sort]) == 0) {
                return ($a['id'] - $b['id'])*$order;
            } else {
                return strcmp($a[$sort], $b[$sort])*$order;
            }
        }
    });
}
?>