<?php

require_once(__DIR__ . "/../connect.php");

$sql = "SELECT * FROM class";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
    <td>$row[name]</td>
    <td>$row[description]</td>
    <td><img src='$row[image]' width='100'></td>

    <td><a href='./logic/class/deleteclass.php?id=$row[id]'><button type='button' class='btn btn-primary'>DELETE</button></a>
    <a href='./updateIndex.php?id=$row[id]'><button type='button' class='btn btn-primary'>UPDATE</button></a>
    <a href='./viewclass.php?id=$row[id]'><button type='button' class='btn btn-primary'>VIEW</button></a></td>
    </tr>
    ";
}
