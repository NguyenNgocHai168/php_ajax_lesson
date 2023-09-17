<?php
    include('db.php'); // connect to database
    // insert data
    if(isset($_POST['hovaten'])) {
        $hovaten = $_POST['hovaten'];
        $sophone = $_POST['sophone'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $ghichu = $_POST['ghichu'];
        $result = mysqli_query($conn,"INSERT INTO tbl_khachhang(hovaten, phone, diachi, email, ghichu) 
                                    VALUES ('$hovaten','$sophone','$diachi','$email','$ghichu')");
    }

    // Edit data
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $text = $_POST['text'];
        $column_name = $_POST['column_name'];
        $result = mysqli_query($conn,"UPDATE tbl_khachhang SET $column_name='$text' where khachhang_id='$id'");
    }

    // delete data
    if(isset($_POST['id_1'])) {
        $id = $_POST['id_1'];
        $result = mysqli_query($conn,"DELETE FROM tbl_khachhang where khachhang_id='$id'");
    }

    // get data
    $output = '';
    $sql_select = mysqli_query($conn, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC");
    // .= '' => nối chuỗi.
    $output .= '
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr style="font-weight: bold;">
                    <td>Họ và tên</td>
                    <td>Phone</td>
                    <td>Địa chỉ</td>
                    <td>Email</td>
                    <td>Ghi chú</td>
                    <td colspan="2" style="text-align:center;">Hành động</td>
                </tr>
            
    ';

    if (mysqli_num_rows($sql_select) > 0) {
        // output data
        while ($rows = mysqli_fetch_array($sql_select)) {
            // contenteditable ==> add to <td contentedittable></td> ==> sẽ edit trực tiếp trên table của thẻ <td></td>
            $output .= '
                <tr>
                    <td class="hovaten" data-id1='.$rows['khachhang_id'].' contenteditable>'.$rows['hovaten'].'</td>
                    <td contenteditable>'.$rows['phone'].'</td>
                    <td contenteditable>'.$rows['diachi'].'</td>
                    <td contenteditable>'.$rows['email'].'</td>
                    <td contenteditable>'.$rows['ghichu'].'</td>
                    <td style="text-align:center;">
                        <button data-id_del='.$rows['khachhang_id'].' class="btn btn-sm btn-danger del_data" name="delete_data">
                            Delete
                        </button>
                    </td>
                    <td style="text-align:center;">
                        <button disabled data-id_edit='.$rows['khachhang_id'].' class="btn btn-sm btn-warning" name="edit_data">
                            Edit
                        </button>
                    </td>
                </tr>
                
            ';
        }
    } else {
        $output .= '
            <tr>
                <td colspan="7" style="text-align: center;color:red;">không có dữ liệu</td>
            </tr>
        ';
    }

    $output .= '
            </table>
        </div>
    ';

    echo $output;
?>