<?php
function computeLPSArray($pattern, &$lps) {
    $len = 0;
    $i = 1;
    $lps[0] = 0;

    while ($i < strlen($pattern)) {
        if ($pattern[$i] == $pattern[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } else {
            if ($len != 0) {
                $len = $lps[$len - 1];
            } else {
                $lps[$i] = 0;
                $i++;
            }
        }
    }
}

function searchPattern($text, $pattern) {
    $textLen = strlen($text);
    $patternLen = strlen($pattern);
    $lps = array_fill(0, $patternLen, 0);
    computeLPSArray($pattern, $lps);

    $occurrences = 0;
    $i = 0;
    $j = 0;

    while ($i < $textLen) {
        if ($pattern[$j] == $text[$i]) {
            $i++;
            $j++;
        }

        if ($j == $patternLen) {
            $occurrences++;
            $j = $lps[$j - 1];
        } elseif ($i < $textLen && $pattern[$j] != $text[$i]) {
            if ($j != 0) {
                $j = $lps[$j - 1];
            } else {
                $i++;
            }
        }
    }

    return $occurrences;
}

$text = "tadadattaetadadadafa";
$pattern = "dada";
$occurrences = searchPattern($text, $pattern);

echo "The pattern \"$pattern\" appears in the text \"$text\" $occurrences times.\n";
?>
