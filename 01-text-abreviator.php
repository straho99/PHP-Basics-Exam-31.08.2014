<?php
$input = ($_GET['list']);
//var_dump($input);
$maxSize = intval($_GET['maxSize']);
$lines = preg_split('/\n/', $input, -1, PREG_SPLIT_NO_EMPTY);
$result = [];
//$lines = explode("\n", $input);
for ($i = 0; $i < count($lines); $i++) {
    $lines[$i] = trim($lines[$i]);
    if ($lines[$i] != '') {
        $result[]=$lines[$i];
    }
}
//var_dump($lines);
echo "<ul>";
for ($i = 0; $i < count($result); $i++) {
    if (strlen($result[$i]) > $maxSize) {
        $result[$i] = substr($result[$i], 0, $maxSize) . '...';
    }
    echo "<li>" . htmlspecialchars($result[$i]) . "</li>";
}
echo "</ul>";
?>