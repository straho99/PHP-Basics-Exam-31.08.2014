<?php
$html = $_GET['html'];
$result = preg_replace("/<(div)\s*(\s?[^>]*)\s*(id|class)\s*=\s*\"(header|main|section|nav|article|aside|footer)\"\s*(\s?[^>]*)\s*>/", "<$4 $2$5>", $html);
$result = preg_replace("/<\/div>\s*<!-+\s*(header|nav|main|section|article|aside|footer)\s*-+>/", "</$1>", $result);
$result = preg_replace("/<(header|nav|main|section|article|aside|footer)(.*)(\s+)>/", "<$1$2>", $result);
echo $result;
//var_dump($result);
?>
