<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select style="display: none" name="q" id="q">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="0">0</option>
        </select>

        <input type="submit" value="submit">
    </form>


    <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $q = $_POST['q'];
            echo "Nilai yang dipilih: " . $q;
        }
    ?>
</body>
</html>
