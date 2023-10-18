<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>tinh dien tich HCN</title>

    <style type="text/css">
        body {

            background-color: #d24dff;

        }

        table {

            background: #ffd94d;

            border: 0 solid yellow;

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

   
    ?>

    <form align='center' action="2.php" method="post">

        <table style="width: 700px;">
            <thead>

                <th colspan="4" align="center">
                    <h3>QUẢN LÝ GIÁO DỤC</h3>
                </th>
            </thead>
            <tr>
                <td>Họ tên:</td>
                <td><input colspan="1" type="text" name="name" value="<?php echo $name; ?>" /></td>
                <td>Số con:</td>
                <td><input style="width: 30%;" colspan="1" type="text" name="children"
                        value="<?php echo $children; ?>" /></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input colspan="1" type="radio" value="Nam" name="GT" <?php if ($GT == "Nam")
                        echo "checked"; ?> />Nam
                    <input colspan="1" type="radio" value="Nữ" name="GT" <?php if ($GT == "Nữ")
                        echo "checked"; ?> />Nữ
                </td>
            </tr>
            <tr>
                <td>Thuộc:</td>
                <td>
                    <input colspan="1" type="radio" value="Văn phòng" name="staffType" <?php if ($staffType == "Văn phòng")
                        echo "checked"; ?> />Học sinh
                    <input colspan="1" type="radio" value="Sản xuất" name="staffType" <?php if ($staffType == "Sản xuất")
                        echo "checked"; ?> />Giáo viên
                </td>

            </tr>
            <tr>
                <td></td>
                <td colspan="3" align="center"><input type="submit" value="Tính lương" name="Tinh" />
            </tr>
            <tr>
                <td>Tiền thưởng:</td>
                <td><input style="width: 60%;" colspan="1" type="text" name="thuong" disabled value="<?php echo $thuong; ?>" />
                </td>
                <td>Tiền phạt:</td>
                <td><input style="width: 60%;" colspan="1" type="text" name="phat" disabled value="<?php echo $phat; ?>" /></td>
            </tr>
            <tr>
                <td  colspan="2" align="right">Thực lĩnh:</td>
                <td  colspan="2" align="left"><input style="width: 60%;" colspan="1" disabled type="text" name="thucLinh" value="<?php echo $thucLinh; ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>



</html>