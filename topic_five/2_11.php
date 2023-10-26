<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>tinh dien tich HCN</title>

    <style type="text/css">
        body {

            background-color: #d24dff;

        }

        form {
            margin: auto;
        }

        table {

            background: #ffd94d;

            border: 0 solid yellow;
            width: 500px;

        }

        thead {

            background: #fff14d;

        }

        td {

            color: blue;

        }

        h3 {

            font-family: verdana;

            text-align: center;

            /* text-anchor: middle; */

            color: #ff8100;

            font-size: medium;

        }
    </style>

</head>



<body>

    <?php
    require_once("connect.php");
    $warning = "";
    mysqli_set_charset($conn, 'UTF8');
    if (isset($_POST['maSua'])) {
        $maSua = trim($_POST['maSua']);
        echo $maSua;
    } else {
        $maSua = "";
    }
    if (isset($_POST['hangSua'])) {
        $hangSua = trim($_POST['hangSua']);
        echo $hangSua;
    } else {
        $hangSua = "";
    }
    if (isset($_POST['loaiSua'])) {
        $loaiSua = trim($_POST['loaiSua']);
        echo $loaiSua;
    } else {
        $loaiSua = "";
    }
    if (isset($_POST['trongLuong'])) {
        $trongLuong = trim($_POST['trongLuong']);
        echo $trongLuong;
    } else {
        $trongLuong = 0;
    }
    if (isset($_POST['donGia'])) {
        $donGia = trim($_POST['donGia']);
        echo $donGia;
    } else {
        $donGia = 0;
    }
    if (isset($_POST['thanhPhanDinhDuong'])) {
        $thanhPhanDinhDuong = trim($_POST['thanhPhanDinhDuong']);
        echo $thanhPhanDinhDuong;
    } else {
        $thanhPhanDinhDuong = "";
    }
    if (isset($_POST['loiIch'])) {
        $loiIch = trim($_POST['loiIch']);
        echo $loiIch;
    } else {
        $loiIch = "";
    }
    $hang_sua = mysqli_query($conn, "SELECT Ma_hang_sua,Ten_hang_sua FROM hang_sua");
    $loai_sua = mysqli_query($conn, "SELECT * FROM loai_sua");
    if (isset($_FILES['img']) != NULL) {
        $errors = array();
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $file_ext = @strtolower(end(explode('.', $_FILES['img']['name'])));
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Don't accept image files with this extension, please choose JPEG or PNG.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size should be 2MB';
        }
        if (empty($errors) == true) {
            if (isset($_POST['Them'])) {
                move_uploaded_file($file_tmp, "C:\\xampp\\htdocs\\php\\excercive\\topic_five\\Hinh_sua\\" . $file_name);
                $sql = "INSERT INTO sua(Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,Tp_Dinh_Duong,Loi_ich,Hinh)
                VALUES ($maSua,$hangSua,$loaiSua,$trongLuong,$donGia,$thanhPhanDinhDuong,$loiIch,$file_name)";
                mysqli_query($conn, $sql);
            }
            //echo "Upload File successfully!!!";
        } else {
            print_r($errors);
        }
    }

    ?>

    <form align='center' action="2_11.php" method="post" enctype="multipart/form-data">

        <table>
            <thead>

                <th colspan="2" align="center">
                    <h3>THÊM SỮA MỚI</h3>
                </th>
            </thead>
            <tr>
                <td>Mã sữa:</td>
                <td><input colspan="1" type="text" name="maSua" value="<?php ?>" style="width: 100%;" /></td>
            </tr>
            <tr>
                <td>Hãng sửa:</td>
                <td>
                    <select name="hangSua" id="">
                        <option value="">Chọn hãng sữa</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($hang_sua)) {
                            echo "<option value='$row[Ma_hang_sua]'>$row[Ten_hang_sua]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td> <select name="loaiSua" id="">
                        <option value="">Chọn loại sữa</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($loai_sua)) {
                            echo "<option value='$row[Ma_loai_sua]'>$row[Ten_loai]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trọng lượng:</td>
                <td><input colspan="1" type="text" value="<?php ?>" style="width: 100%;" name="trongLuong" /></td>
            </tr>
            <tr>
                <td>Đơn giá:</td>

                <td><input colspan="1" type="text" value="<?php ?>" style="width: 100%;" name="donGia" /></td>

            </tr>
            <tr>
                <td>Thành phần dinh dưỡng:</td>
                <td><Textarea  style="width: 100%; min-height: 100px;"
                        name="thanhPhanDinhDuong"><?php ?></Textarea></td>

            </tr>
            <tr>
                <td>Lợi ích:</td>
                <td><Textarea  style="width: 100%; min-height: 100px;" name="loiIch"></Textarea>
                    <?php ?></Textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input colspan="1" type="file" name="img" /></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="1"><input type="submit" value="Thêm" name="Them" /></td>
            </tr>

        </table>
    </form>
</body>

</html>