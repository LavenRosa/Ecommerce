<?php
    include("dbcon.php");
    include("head.php");
    include("topnav.php");
    include("nav.php");
?>
<?php
    /*if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit();
    }*/
?>
<body>

<div class="container px-4">

<form method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Item Name</label>
        <input type="text" name="itemname" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="text" name="itemprice" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Images</label>
        <input type="file" name="itemimg" class="form-control" id="exampleFormControlInput1" placeholder="img">
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">Choose Catagory</label>
        <select name="category" class="form-control">
            <option value="">Choose Category</option>
            <?php
                $sql="SELECT * FROM category";
                $res = mysqli_query($con, $sql);
                while($row=mysqli_fetch_assoc($res)):
            ?>
            <option value="<?php echo $row['category_id']?>"><?php echo $row['category_id']?><?php echo $row['category_name']?></option>
                <?php
                    endwhile;
                ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Deails</label>
        <textarea name="itemdetail" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Quantity</label>
        <input type="number" name="itemqty" class="form-control" id="exampleFormControlInput1" placeholder="amount">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Arrival-Date</label>
        <input type="date" name="arr_date" class="form-control" id="exampleFormControlInput1" placeholder="date">
    </div>
   
    <input type="submit" name="save" value="Add" class="btn btn-success">
</form>
        <?php
            if(isset($_POST['save'])){
                $item_name=$_POST['itemname'];
                $item_price=$_POST['itemprice'];
                $item_img=$_POST['itemimg'];
                $item_catagory=$_POST['category'];
                $item_detail=$_POST['itemdetail'];
                $item_qty =$_POST['itemqty'];
                $arr_date=$_POST['arr_date'];
        
                $sql="INSERT INTO item(item_name, item_price, item_image, category_id, item_detail, item_qty, arr_date) VALUES ('$item_name','$item_price','$item_img','$item_catagory','$item_detail','$item_qty','$arr_date')";

                mysqli_query($con,$sql);
            }
        ?>
    </div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Price</th>
                <th style="text-align:center;">Img</th>
                <th>Category</th>
                <th>Details</th>
                <th>Quantity</th>
                <th>Arrival Date</th>
                <th colspan="2" style="text-align:center;">Action</th>
            </tr> 
        </thead>
        <tbody>
            <?php
                $sql = "SELECT item.*,category.category_name FROM item LEFT JOIN category ON item.category_id=category.category_id";
                $res = mysqli_query($con, $sql);
                $i=1;
                while($row=mysqli_fetch_assoc($res)):
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['item_name'];?></td>
                <td><?php echo $row['item_price'];?></td>
                <td><img src="image/<?php echo $row['item_image'];?>" alt="" style="width:100px;"></td>
                <td><?php echo $row['category_name'];?></td>
                <td><?php echo $row['item_detail'];?></td>
                <td><?php echo $row['item_qty'];?></td>
                <td><?php echo $row['arr_date'];?></td>
                <td><a href="adminupdate.php?itemid=<?php echo $row['item_id'];?>"><button type="submit" class="btn btn-outline-success">Update</button></a></td>
                <td><a href="admindelete.php?itemid=<?php echo $row['item_id'];?>"><button type="submit" class="btn btn-outline-success">Delete</button></a></td>
            </tr>
            <?php $i++; endwhile;?>
        </tbody>
    </table>
    <?php
        include("footer.php");
    ?>
</body>
</html>