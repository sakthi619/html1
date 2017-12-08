<?php

$host = 'localhost';
$dbname = 'mychedi';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

$sql = "select * from bulksms where status = 0";
$result = $conn->query($sql);

if($result->num_rows){
	while($row = $result->fetch_assoc()){
		
		$message = $row['sms_text'];
		
		$sql = "select * from customers where status = 1";
		$cus_result = $conn->query($sql);		
		
		if($cus_result->num_rows){
			while($customer = $cus_result->fetch_assoc()){
				
				$number = $customer['mobile'];
		
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, "http://smsmsg.celladpay.com/api/sendhttp.php?authkey=164405AmHK99sW5960c763&mobiles=$number&message=$message&sender=MYCHED&route=4&country=91");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				$result = curl_exec($ch);

				curl_close ($ch);
				
			}
		
		}		
		
		
		$sql = "update bulksms set status = 1 where id = ".$row['id'];
		$conn->query($sql);
		
	}		
	
}