<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Web_model extends CI_Model
{
	
	
  	public function select_table($table,$sql,$fields='*'){		
		$query = $this->db->query("select $fields from $table where $sql");		
		return $query->result();
	}
	
  	public function get_sizes($term){		
		$query = $this->db->query("select size from product_variants where size like '$term%' group by size");		
		return $query->result();
	}
	
  	public function get_product_quantity($pid){		
		$query = $this->db->query("select sum(IF(pq.type='A',pq.quantity,null)) as added, sum(IF(pq.type='R',pq.quantity,null)) as removed from product_quantity pq where pq.pid = $pid group by pq.pid");		
		return $query->row();
	}
	
  	public function get_offer_products(){		
		$query = $this->db->query("SELECT * FROM `products` where status = 0 and retail_price > 0 and retail_price <> sale_price order by createdTime desc");	
		return $query->result();
	}
	
  	public function get_trending_products(){		
		$query = $this->db->query("SELECT * FROM `products` where status = 0 and trending = 1 order by createdTime desc");	
		return $query->result();
	}
	
	
	public function get_customer_address($cid){		

		$query = $this->db->query("SELECT a.* FROM address a where a.cid = $cid and a.status = 0");		
		
		return $query->result();
	}
	
	public function get_todays_offer($amount){		
		$today = date('Y-m-d');		
		$query = $this->db->query("SELECT type, offer_val, offer_id FROM offers where start_date <= '$today' and end_date >= '$today' and amount <= $amount and status = 0 order by amount desc");		
		
		return $query->row();
	}
	
	public function customer_loyalty_points($cid){

		$query = $this->db->query("select sum(IF(type='A',points,null)) as added, sum(IF(type='R',points,null)) as remove from loyalty_points where cid = $cid");		
		return $query->row();
	}
	
	public function get_todays_coupon($coupon){		
		$today = date('Y-m-d');		
		$query = $this->db->query("SELECT * FROM coupons where start_date <= '$today' and end_date >= '$today' and code = '$coupon' and status = 0 order by amount desc");		
		
		return $query->row();
	}
	
	public function get_orders_with_status($status){		
		$query = $this->db->query("SELECT o.*, c.mobile, c.firstname, (select time_slot from delivery_time where tid = o.delivery_time) as slot,dc.name as city FROM orders o, customers c, address a, delivery_city dc where c.cid = o.cid and o.status = $status and a.aid = o.aid and a.city = dc.city_id order by o.createdTime");		
		return $query->result();
	}
	
	public function get_orders_by_customer($id){		
		$query = $this->db->query("SELECT o.*, c.mobile, c.firstname, (select time_slot from delivery_time where tid = o.delivery_time) as slot,dc.name as city FROM orders o, customers c, address a, delivery_city dc where c.cid = o.cid and o.cid = $id and a.aid = o.aid and a.city = dc.city_id order by o.createdTime");		
		return $query->result();
	}
	
	public function get_garden_products($gid){		
		$query = $this->db->query("SELECT * FROM garden_products g, products p where p.pid = g.pid and g.gid = $gid");		
		return $query->result();
	}
	
	
	public function get_order_details($oid){		
		$query = $this->db->query("select * from order_details od, products p where od.oid = $oid and od.pid = p.pid");		
		return $query->result();
	}
	
   	public function get_order_record($oid){		
		$query = $this->db->query("SELECT * FROM orders o, delivery_time dt, address a where o.oid = $oid and a.aid = o.aid and o.delivery_time = dt.tid");		
		return $query->row();
	}
	
	public function get_address($aid){		

		$query = $this->db->query("SELECT a.* FROM address a where a.aid = $aid");		
		
		return $query->row();
	}
}




