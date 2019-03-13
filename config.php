<?php 
class Product
{
  public $server = "localhost";
  public $user = "maknam_anas";
  public $pass = "Racespeed@#!@";
  public $dbname = "maknam_halal_product";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($brand_name,$product_name,$bar_code,$batch_no,$exp_date,$ingredients,$final,$qrimage,$qrlink)
 	{
 			$sql = "INSERT INTO brands(brand_name,product_name,bar_code,batch_no,exp_date,ingredients,qrContent,qrImg,qrlink) VALUES('$brand_name','$product_name','$bar_code','$batch_no','$exp_date','$ingredients','$final','$qrimage','$qrlink')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT qrimg,qrlink from records where qrimg='$qrimage'";

 	}
}
$records = new product();