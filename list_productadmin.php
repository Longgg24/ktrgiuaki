<?php require_once("entities/product.class.php"); ?>
<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<?php
    $prods = Product::list_product();
    
    foreach ($prods as $item) {
        echo "<div class='product'>";
        echo "<h3>Mã Nhân Viên: ".$item["MaNV"]."</h3>";
        echo "<p>Tên Nhân Viên: ".$item["TenNV"]."</p>";
        $genderImage = '';
        if ($item["Phai"] == "NU") {
            $genderImage = "woman.jpg";
        } else {
            $genderImage = "man.jpg";
        }
        echo "<img src='$genderImage' alt='".ucfirst(strtolower($item["Phai"]))."'>";
        echo "<p>Nơi Sinh: ".$item["NoiSinh"]."</p>";
        echo "<p>Mã Phòng: ".$item["MaPhong"]."</p>";

        // Thêm nút sửa và xóa
        echo "<a href='edit_product.php?id=".$item["MaNV"]."'>Sửa</a>";
        echo "<a href='delete_product.php?id=".$item["MaNV"]."'>Xóa</a>";
        echo "<a href='add_product.php?id=".$item["MaNV"]."'>thêm</a>";
        echo "</div>";
    }
?>
<?php include_once("footer.php"); ?>
