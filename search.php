<?php

$searchText=$_GET['text'];
$id=$_GET['id'];

//echo $searchText;


$hostName='localhost';
$userName='root';
$password='';
$dbName='ajax_search';

$connection=mysqli_connect($hostName,$userName,$password,$dbName);

if (!$connection){
    die('Database Server Not Connected');
}
if ($searchText==NULL) {
    $sql = "SELECT * FROM  student ";
}
else{
    $sql = "SELECT * FROM  student WHERE student_name LIKE '%$searchText%' OR student_email LIKE '%$searchText%' ";
}

$result=mysqli_query($connection,$sql);


?>

<table border="1" align="center" width="500px">
    <tr>
        <th>Student id</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Number</th>
        <th>Action</th>
    </tr>
    <?php
     while ($row=mysqli_fetch_assoc($result)){

    ?>
    <tr>
        <td><?php echo $row['student_id']?></td>
        <td><?php echo $row['student_name']?></td>
        <td><?php echo $row['student_email']?></td>
        <td><?php echo $row['student_number']?></td>
        <td>
            <a onclick="ajax_delete(<?php echo $row['student_id'] ?>,'res')">Edit</a>
            <a href="">Delete</a>
        </td>
    </tr>
    <?php } ?>


</table>
