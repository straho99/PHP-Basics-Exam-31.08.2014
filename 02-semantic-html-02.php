<?php
$html = ($_GET['html']);
$lines = explode("\n", $html);
$result = [];

foreach ($lines as $line) {
    $fixedLine = preg_replace("/<(div)\s*(\s?[^>]*)\s*(id|class)\s*=\s*\"(header|main|section|nav|article|aside|footer)\"\s*(\s?[^>]*)\s*>/", "<$4 $2$5>", $line);
    $fixedLine = preg_replace("/<\/div>\s*<!-+\s*(header|nav|main|section|article|aside|footer)\s*-+>/", "</$1>", $fixedLine);
    $result[] = $fixedLine;
}

for ($i = 0; $i < count($result); $i++) {
    if (preg_match("/<(header|nav|main|section|article|aside|footer)/", $result[$i])) {
        while (preg_match("/<.*(\s{2}).*>/", $result[$i])) {
            $result[$i]= preg_replace("/(<.*)(\s{2})(.*>)/", "$1 $3", $result[$i]);
        }
        $result[$i] = preg_replace("/\s+(?=>)/", "", $result[$i]);
    }
}

echo implode("\n", $result);
?>
