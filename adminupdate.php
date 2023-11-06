<?php
    include("head.php");
    include("dbcon.php");
    if(isset($_GET['itemid'])){
        $id=$_GET['itemid'];
    }
?>
<?php
    if(isset($_POST['save'])){
        $item_name=$_POST['itemname'];
        $item_price=$_POST['itemprice'];
        $item_img=$_POST['itemimg'];
        $item_catagory=$_POST['category'];
        $item_detail=$_POST['itemdetail'];
        $item_qty =$_POST['itemqty'];
        $arr_date=$_POST['arr_date'];

        $sql="UPDATE item SET item_name='$item_name',item_price='$item_price',item_image='$item_img',category_id='$item_catagory',item_detail='$item_detail',item_qty='$item_qty',arr_date='$arr_date' WHERE item_id='$id'";
        mysqli_query($con, $sql);

       
        

    }
?>
<?php
    if(isset($_POST['save'])){
        $item_name=$_POST['itemname'];
        $item_price=$_POST['itemprice'];
        $item_img=$_POST['itemimg'];
        $new_img = $_POST['new_img'];
        $item_catagory=$_POST['category'];
        $item_detail=$_POST['itemdetail'];
        $item_qty =$_POST['itemqty'];
        $arr_date=$_POST['arr_date'];

        if($new_img!=""){
            $sql = "UPDATE item SET item_name='$item_name',item_price='$item_price',item_image='$new_img',category_id='$item_catagory',item_detail='$item_detail',item_qty='$item_qty',arr_date='$arr_date' WHERE item_id='$id'";
            mysqli_query($con,$sql);
            header("Location:admin.php");
        }else{
            $sql = "UPDATE item SET item_name='$item_name',item_price='$item_price',item_image='$item_img',category_id='$item_catagory',item_detail='$item_detail',item_qty='$item_qty',arr_date='$arr_date' WHERE item_id='$id'";
            mysqli_query($con,$sql);
            header("Location:admin.php");
        }
    }
?>


<div class="container px-4">
    <?php 
        $sql="SELECT item.*,category.category_name FROM item LEFT JOIN category ON item.category_id=category.category_id WHERE item_id='$id'";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res)){
        ?>

    <form method="post">

        <div class="form-group">
            <label for="exampleFormControlInput1">Item Name</label>
            <input type="text" name="itemname" value="<?php echo $row['item_name'];?>" class="form-control" id="exampleFormControlInput1" placeholder="Itemname">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" name="itemprice" value="<?php echo $row['item_price'];?>" class="form-control" id="exampleFormControlInput1" placeholder="price">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Images</label>
            <input type="hidden" name="itemimg" class="form-control" value="<?php echo $row['item_image'];?>">
            <input type="file" name="new_img" class="form-control" id="exampleFormControlInput1" placeholder="img">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deails</label>
            <input type="textarea" name="itemdetail" value="<?php echo $row['item_detail']?>" class="form-control" placeholder="Item Details">
        </div>
        
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="number" name="itemqty" value="<?php echo $row['item_qty'];?>" class="form-control" id="exampleFormControlInput1" placeholder="amount">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Arrival-Date</label>
            <input type="date" name="arr_date" value="<?php echo $row['arr_date'];?>" class="form-control" id="exampleFormControlInput1" placeholder="date">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Choose Catagory</label>
            <select name="category" class="form-control">
                <option value="">Choose Category</option>
                <?php
                    $sql = "SELECT * FROM category";
                    $res = mysqli_query($con, $sql);
                    while($row=mysqli_fetch_assoc($res)):
                ?>
                <option value="<?php echo $row['category_id']?>"><?php echo $row['category_id']?><?php echo $row['category_name']?></option>
                <?php
                    endwhile;
                ?>
            </select>
        </div>
        <input type="submit" value="Update" name="save">
    </form>
    <?php

     }
     ?>
</div>