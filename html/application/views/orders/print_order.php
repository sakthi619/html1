<title>Mychedi Print</title>
<center>
	<h2>Mychedi</h2>	
	<p class="small_font"><br>
	</p>
</center>

<table width="100%" class="small_font">
	<tr>
		<td align='left'><?php echo get_order_id($order->oid);?></td>
		<td align='center'><?php echo date("d-m-Y",strtotime($order->createdTime));?></td>
		<td align='right'><?php echo date("D",strtotime($order->createdTime));?></td>
	</tr>
	<tr>
		<td colspan="3">**************************************************************</td>
	</tr>
</table>
<?php


if(isset($details) && !empty($details)){
	
	
	echo "<table border='0' width='100%' class='order_details'>";

	$total = array();
	foreach($details as $tmp){		
		
	
		echo "<tr>";
			echo "<td width='50%'>".$tmp->product_name_english."</td>";
			echo "<td width='20%' align='right'>".number_format($tmp->price,2)."</td>";
			echo "<td width='10%' align='right'>".$tmp->quantity."</td>";
			echo "<td width='20%' align='right'>".number_format(($tmp->total) - (($tmp->total * $tmp->tax)/100),2)."</td>";
		echo "</tr>";	
		
		if($tmp->tax > 0){
			
			echo "<tr>";
				echo "<td width='50%' align='right'></td>";
				echo "<td width='20%' align='right'>SGST</td>";
				echo "<td width='10%' align='right'>".round(($tmp->tax/2),2)."%</td>";
				echo "<td width='20%' align='right'>".round(($tmp->total * ($tmp->tax/2))/100,2)."</td>";
			echo "</tr>";	
		
			echo "<tr>";
				echo "<td width='50%' align='right'></td>";
				echo "<td width='20%' align='right'>CGST</td>";
				echo "<td width='10%' align='right'>".round(($tmp->tax/2),2)."%</td>";
				echo "<td width='20%' align='right'>".round(($tmp->total * ($tmp->tax/2))/100,2)."</td>";
			echo "</tr>";	
			
		}
	
		$total[] = $tmp->total;
	}	
	echo "<tr>";
		echo "<td colspan='3' align='right'><h4>Subtotal</h4></td>";
		echo "<td width='25%' align='right'><h4>".number_format(array_sum($total),2)."</h4></td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Coupon Discount</td>";
		echo "<td width='25%' align='right'>".number_format($order->coupon_amount,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Offer Discount</td>";
		echo "<td width='25%' align='right'>".number_format($order->offer_amount,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'>Delivery</td>";
		echo "<td width='25%' align='right'>".number_format($order->delivery,2)."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align='right'><h4>Total</h4></td>";
		echo "<td width='25%' align='right'><h4>".number_format(($order->delivery + array_sum($total) - ($order->coupon_amount + $order->offer_amount)),2)."</h4></td>";
	echo "</tr>";
	echo "</table>";
	
}

?>
<table width="100%" class="small_font">	
	<tr>
		<td colspan="3">**************************************************************</td>
	</tr>
</table>
<style>
.order_details tr td{
	font-size:13px;
	font-family: Arial, Helvetica, sans-serif;
}
.small_font{
	font-size:13px;
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<script>
window.print();
//window.close();
</script>