<?php

$id=$_GET['id'];
echo $id;
?>


<?php

if (isset($_GET['text'])) {
    $searchText = $_GET['text'];
}
else{
    $searchText=NULL;
}
//$id=$_GET['id'];

//echo $searchText;


$hostName='localhost';
$userName='root';
$password='';
$dbName='ajax_search';

$connection=mysqli_connect($hostName,$userName,$password,$dbName);

if (!$connection){
    die('Database Server Not Connected');
}
if (isset($_GET['id'])){
    $sql="DELETE * FROM student WHERE student_id='$_GET[id]'";
    mysqli_query($connection,$sql);
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
            <a href=""> Edit</a>
            <a href="#" onclick="ajax_delete(<?php echo $row['student_id'] ?>,'res')">Delete</a>
        </td>
    </tr>
    <?php } ?>


</table>
