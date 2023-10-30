<?php
include "Db.php";


class Price extends Db{

    //INSERT 
    public function add_price($cat_price_id, $price_name){
        $sql = "INSERT INTO price (cat_price_id, price_name) VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt -> bindParam(1, $cat_price_id, PDO::PARAM_INT);
        $stmt -> bindParam(2, $price_name, PDO::PARAM_STR);
        $added = $stmt->execute();
            if($added){
                $_SESSION['added'] = "Price added successfully";
                return true;
            }else{
                $_SESSION['added'] = "error, unable to add Price";
                return false;
            }
    }

    //UPDATE
    public function update_price($price_name, $cat_price_id, $price_id){
        $sql = "UPDATE price SET price_name = ?, cat_price_id=? WHERE price_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt -> bindParam(1, $price_name, PDO::PARAM_STR);
        $stmt -> bindParam(2, $cat_price_id, PDO::PARAM_INT);
        $stmt -> bindParam(3, $price_id, PDO::PARAM_INT);
        $updated= $stmt->execute();
            if ($updated){
                $_SESSION['updated'] = " price was successfully updated";
                return true;
            }else{
                $_SESSION['updated'] = "error, Unable to update price";
                return false;
            }
    }

    //DELETE
    public function delete_price($price_id){
        $sql = "DELETE FROM price WHERE price_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $price_id, PDO::PARAM_INT);
        $deleted = $stmt->execute();
        return $deleted;
    }

    //FETCH ALL
    public function fetch_all_prices(){
        $sql = "SELECT * FROM price"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fetched;
    }

    //FETCH A PRICE WITH ID
    public function fetch_price_detail($price_id){
        $sql = "SELECT * FROM price WHERE price_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $price_id, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();      //count how many recoreds with the id
            if($count < 1) {                //if count is less than 1, no record with that id
                return false;
            }else{
            //It means d price exist, fetch it with d fetch function()
                $price_detail = $stmt->fetch(PDO::FETCH_ASSOC);
                return $price_detail;
            }
    }

}

?>