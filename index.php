<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name">
        <input type="number" name="age" placeholder="Age">
        <textarea name="message" placeholder="Message"></textarea>
        <input type="submit" name="submit" value="Upload">
    </form>
    <?php 
        include("database.php");
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $message = $_POST['message'];
            
            $sql = "INSERT INTO person (Name, Age, Message) Values(?,?,?);";

            $stmt = mysqli_stmt_init($connection);
            if(mysqli_stmt_prepare($stmt, $sql)) {
                $execute = mysqli_stmt_bind_param($stmt, "sis", $name, $age, $message);
                
                if(mysqli_stmt_execute($stmt)) {
                    echo "successfully uploaded!";
                }
            }


        }

    ?>
</body>
</html>