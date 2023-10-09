# Pattern Matching Algorithm in PHP (task 02)

This PHP program demonstrates a pattern matching algorithm to find all occurrences of a pattern within a given text.

## How the Algorithm Works

### `computeLPSArray` Function
The `computeLPSArray` function computes the Longest Prefix Suffix (LPS) array for the provided pattern. The LPS array stores the length of the longest proper prefix that is also a suffix for each position in the pattern.

### `searchPattern` Function
The `searchPattern` function performs pattern matching in the text. It follows these steps:

1. Initialize two pointers, `i` and `j`, to traverse the text and pattern, respectively.

2. Compare characters in the pattern and text. If a match is found (`$j == $patternLen`), increment the `occurrences` counter and reset `j` to `$lps[$j - 1]` to continue searching for the next occurrence.

3. If a mismatch occurs while comparing characters, update `j` using the LPS array to efficiently skip unnecessary comparisons and continue searching.

4. Continue these steps until the entire text is traversed.

5. Finally, return the count of pattern occurrences in the text.

## How to Use

1. Modify the `$text` and `$pattern` variables in the code to specify your desired text and pattern.

2. Run the PHP script, and it will output the number of occurrences of the pattern in the text.

```php
$text = "tadadattaetadadadafa";
$pattern = "dada";
$occurrences = searchPattern($text, $pattern);

echo "The pattern \"$pattern\" appears in the text \"$text\" $occurrences times.\n";
