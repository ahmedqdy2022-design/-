// الكود قبل حل التغرة
 <?php
$username= htmlspecialchars($_GET["username"]);
$host="localhost";
$username="root";
$password="";
$database_name="testdatabase";
$conn=new mysqil($host,$username,$password,$database_name);
$sql_select="SELECT * FROM comments";

$result=$conn->query($sql_select);
$data=$result->fetch_all();
foreach ($data as $key=>$value){
    foreach($value as $key => $comment_data){
        استبدال السطر//

        echo htmlspecialchars ($comment_data, ENT_QUOTES,'UTF-8')."<br>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, inital-scale=1.0">
            <title> home page</title>

</head>
<body>
        <h1> hello <?php echo $username ;?> in home page</h1>
        <form action="add_comment_logic.php" method="post">
            <textarea name="comment" ></textarea>
            <input type="submit" name="add_coment" value="add comment">



        </form>    


</body>
</html>







الكود بعد حل التغرة
<?php
$username = isset($_GET["username"])? htmlspecialchars($_GET["username"], ENT_QUOTES, 'UTF-8'): "Guest";

$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "testdatabase";
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

$sql_select = "SELECT * FROM comments";
$result = $conn->query($sql_select);
$data = $result->fetch_all();

foreach ($data as $row) {
    foreach ($row as $comment_data) {
        echo htmlspecialchars($comment_data, ENT_QUOTES, 'UTF-8'). "<br>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Hello <?php echo $username;?> in home page</h1>
    <form action="add_comment_logic.php" method="post">
        <textarea name="comment" placeholder="Write your comment here..."></textarea>
        <input type="submit" name="add_comment" value="Add Comment">
    </form>
</body>
</html>

