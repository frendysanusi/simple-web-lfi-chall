<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <h1>Hello</h1>
    <form action="" method="GET">
        <label for="file">Enter file name:</label>
        <input type="text" name="file" id="file" required>
        <button type="submit">View File</button>
    </form>
    <h2>List of available files</h2>

    <?php
        $dir = "storages/";
        $files = scandir($dir);

        foreach ($files as $file) {
            echo $file . "<br>";
        }
    ?>

    <?php
        if(isset($_GET["file"])) {
            $file = basename($_GET["file"]);
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $filepath = "storages/" . $file;

            if (file_exists($filepath)) {
                echo "<h2>$file</h2>";

                switch ($extension) {
                    case 'pdf':
                        echo '<iframe src="' . $filepath . '" width="100%" height="600px"></iframe>';
                        break;
                    case 'png':
                    case 'jpg':
                    case 'jpeg':
                    case 'gif':
                        echo '<img src="' . $filepath . '" alt="' . $file . '" style="max-width:100%; height:auto;">';
                        break;
                    default:
                        echo "<pre>" . htmlspecialchars(file_get_contents($filepath)) . "</pre>";
                        break;
                }
            } else {
                echo '<p style="color: red;">File not found :)</p>';
            }
        } else {
            echo '<p style="color: red;">File name is required</p>';
        }
    ?>
</body>
</html>