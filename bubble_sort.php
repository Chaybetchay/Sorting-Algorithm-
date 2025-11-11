<!DOCTYPE html>
<html>
<head>
    <title>Bubble Sort Program</title>
</head>
<body>
    <h2>Bubble Sort Program</h2>

    <form method="post" action="">
        <label>Enter integers separated by commas:</label><br>
        <input type="text" name="numbers" placeholder="e.g. 9,2,7,4,3" required><br><br>

        <label>Choose sorting order:</label><br>
        <select name="order" required>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>

        <input type="submit" name="submit" value="Sort Array">
    </form>

    <hr>

    <?php
    
    function bubbleSort($arr, $order) {
        $n = count($arr);
        $swaps = 0;

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                $condition = ($order == "asc") 
                    ? ($arr[$j] > $arr[$j + 1])
                    : ($arr[$j] < $arr[$j + 1]);

                if ($condition) {
                    
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                    $swaps++;
                }
            }
        }

        return array($arr, $swaps);
    }

    if (isset($ST['submit'])) {
        
        $input = $_POST['numbers'];
        $order = $_POST['order'];

        
        $numbers = array_map('intval', explode(',', $input));

        echo "<strong>Original Array:</strong> [" . implode(", ", $numbers) . "]<br>";

        
        list($sortedArray, $swapCount) = bubbleSort($numbers, $order);

        echo "<strong>Sorted (" . htmlspecialchars($order) . "):</strong> [" . implode(", ", $sortedArray) . "]<br>";
        echo "<strong>Total Swaps:</strong> " . $swapCount . "<br>";
    }
    ?>
</body>
</html>