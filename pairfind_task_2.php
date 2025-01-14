<html>
<head>
    <title>Find All Pairs with Target Sum</title>
</head>
<body>
    <h2>Find All Pairs with Target Sum</h2>
    <form method="POST" action="">
        Enter numbers :
        <input type="text" id="numbers" name="numbers" placeholder="Separate by Space" required><br><br>
        Enter target sum:
        <input type="text" id="target" name="target" required><br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $input = trim($_POST['numbers']);
        $target = intval($_POST['target']);
        $inputs = explode(' ', $input);
        $nums = array_map('intval',$inputs);

        function findAllPairs($nums, $target) {
            $seen = [];
            $pairs = [];

            foreach ($nums as $num) {
                $complement = $target - $num;
                if (isset($seen[$complement])) {
                    $pairs[] = "($complement, $num)";
                }
                $seen[$num] = true;
            }

            if (count($pairs) > 0) {
                echo "<p>Pairs found:</p>";
                foreach ($pairs as $pair) {
                    echo "<p>$pair</p>";
                }
            } else {
                echo "<p>Pair not found.</p>";
            }
        }

        echo "<h3>Given Inputs:</h3>";
        echo "<p>Numbers: [" . implode(", ", $nums) . "], Target: $target</p>";


        findAllPairs($nums, $target);
    }
    ?>
</body>
</html>
