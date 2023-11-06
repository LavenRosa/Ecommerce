<?php
    include("dbcon.php");
    if(isset($_GET['catid'])){
        $id=$_GET['catid'];
        $sql="DELETE FROM category WHERE category_id='$id'";
        mysqli_query($con,$sql);
    }
?>