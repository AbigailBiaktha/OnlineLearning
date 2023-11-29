<?php
require_once(__DIR__ . "/../connect.php");
$class_id = $row['id'];

$sql = "SELECT * FROM lesson WHERE class_id = $class_id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "

    <h1>$row[title]</h1>
    <p>$row[content]</p>
    <img src='$row[file]' width='100'>
    <a href='viewlesson.php?id=$row[id]'><button>View</button></a>
    <a href='./logic/lesson/deletelesson.php?id=$row[id]'><button>Delete</button></a>
    <a href='updatelessonIndex.php?id=$row[id]'><button>Update</button></a>
    ";
}
