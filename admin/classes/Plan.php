<?php
error_reporting(E_ALL);
require_once "Db.php";

class Plan extends Db{
	//INSERT Plan METHOD
	public function insert_plan_record($plan_cat_id, $plan_refcode, $plan_amount, $plan_userid, $plan_status, $plan_data, $plan_time){
		$sql = "INSERT INTO plan (plan_cat_id, plan_refcode, plan_amount, plan_userid, plan_status, plan_data, plan_time) VALUES(?,?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindParam(1, $plan_cat_id, PDO::PARAM_INT);
		$stmt->bindParam(2, $plan_refcode, PDO::PARAM_STR);
		$stmt->bindParam(3, $plan_amount, PDO::PARAM_INT);
		$stmt->bindParam(4, $plan_userid, PDO::PARAM_INT);
		$stmt->bindParam(5, $plan_status, PDO::PARAM_STR);
		$stmt->bindParam(6, $plan_data, PDO::PARAM_STR);
		$stmt->bindParam(7, $plan_time, PDO::PARAM_STR);

		$record_inserted = $stmt->execute();
		if ($record_inserted) {
			return true;
		}else{
			return false;
		}

	}

	//FETCH PLAN RECORD
	public function fetch_all_plan(){
        $sql = "SELECT * FROM plan"; 
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $goals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $goals;
    }

	public function delete_plan($plan_id){
	    $sql = "DELETE FROM plan WHERE plan_id=?";
		       $stmt = $this->connect()->prepare($sql);
		       $stmt->bindParam(1, $plan_id, PDO::PARAM_INT);		        
		        $deleted = $stmt->execute();
		        return $deleted;
		    
	}


	public function fetch_amount($plan_amount){
		$sql = "SELECT * FROM plan WHERE plan_amount = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindParam(1, $plan_amount, PDO::PARAM_INT);
		$stmt->execute();
		$price_fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $price_fetched;
	}


}
//donation test
// $do1 = new Plan();
// $response = $do1->insert_plan_record("T884567898765", 6000, 2, "success", "all details are here", "2023-09-20T08:45:01.0007");
// echo $response;
?>