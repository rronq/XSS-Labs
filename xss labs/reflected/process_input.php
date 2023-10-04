<!DOCTYPE html>
<html>
<head>
    <title>Processed Input</title>
</head>
<body>
    <?php
    // Check if the form has been submitted and if the input field is not empty
    if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
        $user_input = $_POST['user_input'];

        $file_path = 'output.txt';
        $file = fopen($file_path, "w");

        if($file){
            fwrite($file, $user_input);
            fclose($file);
            echo "<p>You typed: $user_input</p>";
        } else {
            echo "";
        }
    } else {
        echo "<p>No input provided. Please go back and enter something.</p>";
    }
    ?>

    <form action="javascript:history.go(-1)">
        <input type="submit" value="Go Back">
    </form>
</body>
</html>
