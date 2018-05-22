<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Products</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <?php
       require 'database-config.php';
        //Nếu là trường hợp gửi thông tin cập nhật sản phẩm
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Nếu có đủ các thông tin về sản phẩm
            if(isset($_POST["id"]) && isset($_POST["product_name"]) && isset($_POST["product_code"])&& isset($_POST["category"])&& isset($_POST["description"])){
                $product_id = $_POST["id"];
                $name = $_POST["product_name"];
                $code = $_POST["product_code"];
                $category = $_POST["category"];
                $description = $_POST["description"];
                //Cập nhật thông tin sản phẩm
                $sql = "UPDATE products SET product_name='".$name."', product_code='".$code."', category='".$category."', description='".$description."' WHERE id = ".$product_id;
                
                $result = mysqli_query($conn, $sql);
                //TODO Kiểm tra $result để thông báo kết quả
            }else{
                //Thiếu thông tin sản phẩm
                echo 'Missing product\'s information';
            }
        }
        //Kiểm tra xem có phải trường hợp hiển thị thông tin sản phẩm để có thể cập nhật
        if(isset($_GET["id"])){
            $product_id = $_GET["id"];
        }
            
        //Nếu không phải hai trường hợp trên thì thoát
        if(!isset($product_id)){
            echo "No product ID to display";
            die();
        }
        //Trường hợp hiển thị thông tin sản phẩm đề cập nhật
        $sql = "SELECT id, product_name, product_code, description, category from products WHERE id = ".$product_id;
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die( "Can't query data".mysqli_error($conn) );
        }
        if (mysqli_num_rows($result) > 0) {
            // 2. Đọc dòng dữ liệu
            if($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Mã html -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="product-form">
                <div class="container" style="max-width: 400px;">
                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="name"
                        value="<?php echo $row["product_name"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="code">Product Code</label>
                        <input type="text" class="form-control" name="product_code" id="code"
                        value="<?php echo $row["product_code"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category"
                        value="<?php echo $row["category"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" readonly>
                        <?php echo $row["description"] ?>
                        </textarea>
                    </div>
                    <button type="button" class="btn btn-info" id="edit-btn" style="width: 100%">Edit</button>
                </div>
            </form>
            <?php
            }
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
        <!-- JQUERY -->
        <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <!-- My Script -->
        <script type="text/javascript">
        var isSubmit = false;
        $('#edit-btn').click(function(event){
            if(isSubmit){
                $('#product-form').submit();
            }else{
                $('#name,#code,#category,#description').prop('readonly', false);
                $(this).removeClass('btn-info').addClass('btn-success');
                $(this).html('Save');
                isSubmit = true;
            }
        })
        </script>
    </body>
</html>