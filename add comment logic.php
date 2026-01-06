الكود قبل حل التغرة
<?php

$host="localhost";
$username="root";
$password=""; 
$database_name="testdatabase";
$conn=new mysqil($host,$username,$password,$database_name);
if(isset($_POST["add_comment"])){
    $comment=$_POST["comment"];

    $insert_sql="INSERT INTO comments (comment_text) VALUES('$username_form')";
    $result=$conn->query($insert_sql);
    if($result ==true ){
        echo "insertion done";

    }
}
?>



الكود بعد حل التغرة
<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "testdatabase";
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if (isset($_POST["add_comment"])) {
    $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');

    $insert_sql = "INSERT INTO comments (comment_text) VALUES (?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("s", $comment);
    $result = $stmt->execute();

    if ($result) {
        echo "Insertion done";
} else {
        echo "Error: ". $conn->error;
}
}
?>
