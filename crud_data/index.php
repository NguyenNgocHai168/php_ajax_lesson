<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Ajax lesson</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h3>Insert dữ liệu trong FORM - AJAX</h3>
            <form method="POST" id="insert_data_hoten">
                <label>Họ và tên</label>
                <input type="text" class="form-control" id="havaten" placeholder="Họ và tên">
                <label>Số phone</label>
                <input type="text" class="form-control" id="sophone" placeholder="Số phone">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ">
                <label>Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email">
                <label>Ghi chú</label>
                <input type="text" class="form-control" id="ghichu" placeholder="Ghi chú">
                <br>
                <input type="button" class="btn btn-success" name="insert_data" id="button_insert" value="Insert">
            </form>
            <h3>Load dữ liệu trong AJAX</h3>
            <div id="load_data">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        // khi $(document).ready(function(){}) => reload page thì tất cả command(lệnh) bên trong sẽ được executed(thực thi). 
        $(document).ready(function(){
            // get data
            function fetch_data() {
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    success:function(data) {
                        $('#load_data').html(data);
                    }
                });
            }
            fetch_data();
            // Edit data
            function edit_data(id, text, column_name) {
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: {
                        id: id,
                        text: text,
                        column_name: column_name
                    },
                    success:function(data) {
                        alert('Edit dữ liệu thanh công');
                        fetch_data(); // khi Edit tự động load lại form data -> view.
                    }
                });
            }
            // on.('blur') => khi input edit xong => click bất kỳ đâu trên page sẽ save => edit đó.
            // edit trực tiếp trên table..load data
                // edit hovaten: use on.('blur')
                    $(document).on('blur','.hovaten', function() {
                        var id = $(this).data('id1');
                        var text = $(this).text();
                        edit_data(id, text, "hovaten");
                    });
                // edit phone: tương tự trên
                // edit diachi: tương tự trên
                // edit email: tương tự trên
                // edit ghichu: tương tự trên

            //-----------------End Edit---------------------------
            // Delete data
            $(document).on('click','.del_data', function() {
                var id = $(this).data('id_del');
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: { id_1:id },
                    success:function(data) {
                        alert('Delete successfully!');
                        fetch_data(); // khi delete tự động load lại form data -> view.
                    }
                });
            });
            // insert data into
            $('#button_insert').on('click', function() {
                var hovaten = $('#havaten').val();
                var sophone = $('#sophone').val();
                var diachi = $('#diachi').val();
                var email = $('#email').val();
                var ghichu = $('#ghichu').val();

                if (hovaten == '' || sophone == '' || diachi == '' || email == '' || ghichu == '') {
                    alert("không được bỏ trống các trường");
                } else {
                    $.ajax({
                        url: "ajax_action.php",
                        method: "POST",
                        data: {
                            hovaten: hovaten,
                            sophone: sophone,
                            diachi: diachi,
                            email: email,
                            ghichu: ghichu
                        },
                        success:function(data) {
                            alert('insert dữ liệu thanh công');
                            $('#insert_data_hoten')[0].reset();
                            fetch_data(); // khi add new tự động load lại form data -> view.
                        }
                    });
                }

            });
        })
    </script>
</body>

</html>