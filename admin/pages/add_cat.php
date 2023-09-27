<?php
        $cat_name=$_POST['cat_name'];
        if(!empty($cat_name))
        {
            $sql1="SELECT cat_name FROM tbl_category WHERE cat_name='$cat_name'";
            $rs=mysqli_query($con,$sql1);
            $list=array();
            while($r=mysqli_fetch_array($rs))
            {
                $list[]=$r;
            }
            if(count($list)<=0)
            {
                $sql="INSERT INTO tbl_category(cat_name) VALUES ('$cat_name')";
                mysqli_query($con,$sql);
                echo "<script>alert('Bạn đã thêm thành công!')</script>";
                require("list_cat.php");
    
            }
            else{
                $success1="Tên danh mục này đã tồn tại";
            }

        }
        else{
            $success1="Tên danh mục không bỏ trống";
        }
?>