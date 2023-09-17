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
    <title>upload image</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12" style="margin-bottom: 100px;">
            <form id="submit_form" action="ajax_action.php" method="POST">
                <div class="form-group">
                    <label>Chọn ảnh</label>
                    <input type="file" name="file" id="image_file">
                    <span class="help-block">Cho phép ảnh: jpg,jpeg,png,gif</span>
                </div>
                <input type="submit" name="upload_button" class="btn btn-success" value="Uploads">
            </form>
            <br>
            <h3 align="center">Xem trước ảnh</h3>
            <div id="image_preview"></div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit_form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#image_preview').html(data);
                        $('#image_file').val('');
                    }
                });
            });
            $(document).on("click", "#remove_button", function() {
                if(confirm("bạn có muốn xóa ảnh này không ?")) {
                    var path = $('#remove_button').data('path');
                    $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: {path: path},
                    success: function(data) {
                        $('#image_preview').html('');
                        alert("Đã xóa ảnh!");
                    }
                });
                }
            })
        });
    </script>
</body>
</html>