<?php

    require_once("entities/product.class.php");

    if(isset($_POST["btnsubmit"])){
        $MaNV = $_POST["txtName"];
        $TenNV = $_POST["txtTenNV"];
        $Phai = $_POST["txtPhai"];
        $NoiSinh = $_POST["txtNoiSinh"];
        $MaPhong = $_POST["txtMaPhong"];
        $newProduct = new Product($MaNV, $TenNV, $Phai, $NoiSinh, $MaPhong);
        $result = $newProduct->save();
        if(!$result)
        {
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php include_once("header.php"); ?>

<?php
    if(isset($_GET["inserted"]))
    {
        echo "<h2>Thêm sản phảm thành công</h2>";
    }
?>

<form method="post">
	<div class="row">
		<div class="lbtitle">
			<label>Mã NV</label>
		</div>
		<div class="lbinput">
			<input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "";  ?>" />
		</div>
	</div>
	<div class="row">
		<div class="lbtitle">
			<label>Tên NV</label>
		</div>
		<div class="lbinput">
			<textarea name="txtTenNV" cols="21" rows="18" value="<?php echo isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : "";  ?>"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="lbtitle">
			<label>Phái</label>
		</div>
		<div class="lbinput">
			<input type="text" name="txtPhai" value="<?php echo isset($_POST["txtPhai"]) ? $_POST["txtPhai"] : "";  ?>" />
		</div>
	</div>
	<div class="row">
		<div class="lbtitle">
			<label>Noi Sinh</label>
		</div>
		<div class="lbinput">
			<input type="text" name="txtNoiSinh" value="<?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : "";  ?>" />
		</div>
	</div>
	<div class="row">
		<div class="lbtitle">
			<label>Mã Phòng</label>
		</div>
		<div class="lbinput">
			<input type="text" name="txtMaPhong" value="<?php echo isset($_POST["txtMaPhong"]) ? $_POST["txtMaPhong"] : "";  ?>" />
		</div>
	</div>
	<div class="row">
		<div class="submit">
			<input type="submit" name="btnsubmit" value="Thêm nhân viên">
		</div>
	</div>
</form>


<?php include_once("footer.php"); ?>
