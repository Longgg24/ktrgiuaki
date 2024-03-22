<?php
  require_once("config/db.class.php");


  class Product{
    public $MaNV;
    public $TenNV;
    public $Phai;
    public $NoiSinh;
    public $MaPhong;
    public $Luong;


    public function __construct($MaNV, $TenNV, $Phai, $NoiSinh, $MaPhonG){
      $this->MaNV = $MaNV;
      $this->TenNV= $TenNV;
      $this->Phai= $Phai;
      $this->NoiSinh= $NoiSinh;
      $this->MaPhong= $MaPhonG;
    }
    public function save(){
      $db= new Db();
      $sql = "INSERT INTO Product (MaNV, TenNV,Phai,NoiSinh,MaPhong) VALUES
      ('$this->MaNV','$this->TenNV','$this->Phai','$this->NoiSinh','$this->MaPhong)";
      $result = $db->query_execute($sql);
      return $result;
    }
    public static function list_product(){
			$db=new Db();
			$sql="SELECT * FROM nhanvien";
			$result = $db->select_to_array($sql);
			return $result;
		}

    
  }
?>
