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
        echo "<img src='$genderImage' alt='".ucfirst(strtolower($item["Phai"]))."'>"; // Sử dụng ucfirst để chuyển đổi chữ cái đầu tiên thành chữ hoa, strtolower để chuyển đổi tất cả các chữ cái thành chữ thường
    
        echo "<p>Nơi Sinh: ".$item["NoiSinh"]."</p>";
        echo "<p>Mã Phòng: ".$item["MaPhong"]."</p>";
        
        echo "</div>";
    }
    
?>
<?php include_once("footer.php"); ?>

