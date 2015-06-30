<?php
$text = $_GET['text'];
$lineLength = intval($_GET['lineLength']);
$matrix = str_split($text, $lineLength);

while (strlen($matrix[count($matrix) - 1]) < $lineLength) {
    $matrix[count($matrix) - 1] .= " ";
}

$flag = true;
while ($flag) {
    $flag = false;
    for ($i = count($matrix) - 2; $i >= 0; $i--) {
        for ($j = strlen($matrix[$i]) - 1; $j >= 0; $j--) {
            if ($matrix[$i][$j] != " " && $matrix[$i + 1][$j] == " ") {
                $matrix[$i + 1][$j] = $matrix[$i][$j];
                $matrix[$i][$j] = " ";
                $flag = true;
            }
        }
    }
}

echo "<table>";
for ($i = 0; $i < count($matrix); $i++) {
    echo "<tr>";
    for ($j = 0; $j < strlen($matrix[$i]); $j++) {
        echo "<td>" . htmlspecialchars($matrix[$i][$j]) . "</td>";
    }
    echo "</tr>";
}
echo "<table>";
?>