<?php
    include("dbcon.php");
    include("head.php");
    include("topnav.php");
    include("nav.php");
?>
<body>
    <form action="" method="post">
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" name="cat_name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div><br>
        <div class="form-group">
            <input type="submit" name="save" value="Add">
        </div>
    </form>
    <?php
        if(isset($_POST['save'])){
            
            $category_name = $_POST['cat_name'];

            $sql = "INSERT INTO category(category_name) VALUES ('$category_name')";
            mysqli_query($con, $sql);
        }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th colspan="2" style="text-align:center;">Action</t>
            </tr>
            <?php
            $sql = "SELECT * FROM category";
            $res = mysqli_query($con, $sql);
            $i=1;
            while($row=mysqli_fetch_assoc($res)):
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['category_name'];?></td>
                <td><a href="categoryupdate.php?catid=<?php $row['category_id'];?>"><button type="submit">Update</button></a></td>
                <td><a href="categorydelete.php?catid=<?php $row['category_id'];?>"><button type="submit">Delete</button></a></td>
            </tr>
            <?php
            $i++;endwhile;
            ?>
        </thead>
    </table>
    <?php
        include("footer.php");
    ?>
</body>
