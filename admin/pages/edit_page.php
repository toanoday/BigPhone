<?php
$id=$_GET['id'];
$sql="SELECT * FROM tbl_page WHERE page_id='$id'";
$rs=mysqli_query($con,$sql);
$r=mysqli_fetch_array($rs);
$page_name=$_POST['page_name'];
$page_slug=$_POST['page_slug'];
$page_desc=$_POST['page_desc'];
$target=basename($_FILES['file']['name']);
if(empty($target))
{
    $target_file=$r['page_image'];
}
else{
        $target_dir = "upload/images/";

// lấy đường dẫn tới file 
        $target_file = $target_dir.$target;

        // biến flag 
        $allowUpload   = true;

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Giới hạn dung lượng ảnh
        $maxfilesize = 900000;


        // Kiểm tra xem có phải là ảnh không 
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if (!$check) 
        {
            $error = "Đây không phải file ảnh!!";
            $allowUpload = false;
        }
        else $allowUpload = true;


        // Kiểm tra file có tồn tại hay không 
        if (file_exists($target_file)) 
        {
            $error =  "File đã tồn tại!!!";
            $allowUpload = false;
        }


        // Kiểm tra kích thước file
        if ($_FILES["file"]["size"] > $maxfilesize) 
        {
            $error =  "Kích thước file quá lớn.";
            $allowUpload = false;
        }

        //*Những loại file được phép upload
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
    if (!in_array(strtolower($imageFileType),$allowtypes ))
    {
        $error = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
    }
    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $target_file))
        {
            $success = "File ". basename( $_FILES["file"]["name"]).
            " Đã upload thành công.";
        }
        else
        {
            $error = "Có lỗi xảy ra khi upload file.";
        }
    }
    else
    {
        $error = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
    }
}
$page_image = $target_file;
$sql="UPDATE tbl_page SET page_name='$page_name',page_slug='$page_slug',page_desc='$page_desc',page_image='$page_image' WHERE page_id='$id'";
mysqli_query($con,$sql);
if (empty($error)) 
{
    echo "<script>alert('Bạn đã sửa thành công!')</script>";
    require("list_page.php");
}
else echo $error;

?>