<?php
    // upload image
    if($_FILES['file']['name']!="") {
        $extension = explode(".", $_FILES['file']['name']); // tách file image 2 đầu(start . end): name_image      .       jpg
        $file_extension = end($extension);// lấy phần end: jpg
        $allowed_type = array('jpg', 'png', 'gif','jpeg');
        if(in_array($file_extension,$allowed_type)){ // kiểm tra xem .file có được cho phép không.
            $new_name = rand().".".$file_extension;
            $path = "uploads/".$new_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) { // Upload to file vào folder => uploads/
                echo '
                    <div class="col-md-8">
                        <img src="'.$path.'" class="img-responsive">
                    </div>

                    <div class="col-md-2">
                        <button type="button" data-path="'.$path.'" id="remove_button" class="btn btn-danger">X</button>
                    </div>
                ';
            }
        } else {
            echo '<script>alert("không phải là file ảnh")</script>';
        }
    } else {
        echo '<script>alert("Hãy chọn file ảnh!")</script>';
    }

    // delete image
    if(!empty($_POST['path'])) { // '!empty(...)' => nếu mà file ảnh ko rỗng 
        if(unlink($_POST['path'])) { // thực hiện unlink(); ==> xóa file ảnh
            echo '';
        }
    }
?>