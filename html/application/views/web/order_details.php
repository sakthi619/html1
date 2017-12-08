<?php

$addressArr = array();
$addressArr[] = $address->house_no;
$addressArr[] = $address->residential;										
$addressArr[] = $address->street;
$addressArr[] = $address->name;
$addressArr[] = $address->landmark;
$addressArr = array_filter($addressArr);


echo "<table border='1' width='100%' class='order'>";
	echo "<tr>";
		echo "<td width='50%'>Delivery Date: ".date('d-m-Y',strtotime($order->delivery_date))."</td>";
		echo "<td>Delivery Time: ".$order->time_slot."</td>";
	echo "</tr>";	
	echo "<tr>";
		echo "<td colspan='2'>Address: ".implode(', ',$addressArr)."</td>";
	echo "</tr>";
echo "</table>";

if(isset($details) && !empty($details)){
	
	
	echo "<table border='1' width='100%' class='order_details'>";
	echo "<tr>";
		echo "<th>Item Description</th>";
		echo "<th>Unit Price</th>";
		echo "<th>Quantity</th>";
		echo "<th>Sub Total</th>";
	echo "</tr>";
	$total = array();
	foreach($details as $tmp){		
		
	
		echo "<tr>";
			echo "<td width='55%'>".$tmp->name." - ".$tmp->size."</td>";
			echo "<td width='15%' align='right'>".number_format($tmp->price,2)."</td>";
			echo "<td width='15%' align='right'>".$tmp->quantity."</td>";
			echo "<td width='15%' align='right'>".number_format($tmp->subtotal,2)."</td>";
		echo "</tr>";	
	
		$total[] = $tmp->total;
	}	
	echo "<tr>";
		echo "<td colspan='3' align='right'>Subtotal</td>";
		echo "<td width='25%' align='right'>Rs.".number_format(array_sum($total),2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Coupon Discount</td>";
		echo "<td width='25%' align='right'>Rs.".number_format($order->coupon_amount,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Offer Discount</td>";
		echo "<td width='25%' align='right'>Rs.".number_format($order->offer_amount,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Delivery</td>";
		echo "<td width='25%' align='right'>Rs.".number_format($order->delivery,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Total</td>";
		echo "<td width='25%' align='right'>Rs.".number_format(($order->delivery + array_sum($total) - ($order->coupon_amount + $order->offer_amount)),2)."</td>";
	echo "</tr>";
	echo "</table>";
	
}

