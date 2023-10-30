<?php
include_once "Db.php";

class User extends Db
{
   //SIGNUP METHOD
    public function signup($user_firstname, $user_lastname, $user_email, $user_password, $user_dob, $user_gender, $user_height, $user_weight){
        $sql = "SELECT * FROM user WHERE user_email = ?";
        $db1 = new Db();
        $conn= $db1->connect();
        // print_r($conn);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $user_email, PDO::PARAM_STR);
        $stmt->execute();

        //count all rows in db 
        $user_count = $stmt->rowCount();
        if($user_count > 0) {
        $_SESSION["signup_error"] = "Email already exist";
        header("location:../signup.php");        
        }

        //IF IT DONT EXIST, INSERT INTO DB
        $sql = "INSERT INTO user(user_firstname, user_lastname, user_email, user_password) VALUES(?,?,?,?)";
        $stmt = $db1->connect()->prepare($sql);

        $stmt -> bindParam(1, $user_firstname, PDO::PARAM_STR);
        $stmt -> bindParam(2, $user_lastname, PDO::PARAM_STR);
        $stmt -> bindParam(3, $user_email, PDO::PARAM_STR);
        $stmt -> bindParam(4, $user_password, PDO::PARAM_STR);

        $response = $stmt->execute();
        // return $response;

        if($response){
            header("location:../login.php");   
        }      
    }//REGISTER METHOD ENDS HERE

    //LOGIN METHOD
    public function login($user_email, $user_password){
        //check if email is in db 
        $sql = "SELECT * FROM user WHERE user_email = ?"; 
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $user_email, PDO::PARAM_STR);
            $stmt->execute();
            $user_count = $stmt->rowCount();
            //if usercount is less than one, email exists
            if ($user_count < 1) {
               //if it is not in db, send error return msg
               return "Either email or password is incorrect";
               exit();
            }

            //if it is in db, fetch that user email for d user to login to ur app
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //check if pasword matches using password verify
            $password_matches = password_verify($user_password, $user["user_password"]);
            
            //if it matches, set session
            if ($password_matches){
               $_SESSION["user_id"] = $user["user_id"];  //store pwd in session
               header("location:../profile.php");      //redirect user to their profile
               exit();
            }
        }catch (PDOException $ex){
            // Handle database exceptions
            error_log("Database error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        } catch (Exception $ex){
            // Handle other exceptions
            error_log("Error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }
    } //END OF LOGIN MMETHOD


     //fetching a user detail with user id
    public function fetch_user_details($user_id){
        $sql = "SELECT * FROM user WHERE user_id = ?";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $user_id, PDO::PARAM_STR);
            $stmt->execute();
            $user_details = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user_details;
        }catch (PDOException $ex){
            // Handle database exceptions
            error_log("Database error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        } catch (Exception $ex){
            // Handle other exceptions
            error_log("Error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }
            
    }


      //uploadprofileimage method
    public function upload_profile_image($user_id, $user_dp){
        $sql = "UPDATE user SET user_dp = ? WHERE user_id = ?";
            try{
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $user_dp, PDO::PARAM_STR);
                $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
                $response = $stmt->execute();
                return $response;
          
                if ($response) {
                   return true;
                }else{
                   return false;
                }
            }catch (PDOException $ex){
                // Handle database exceptions
                error_log("Database error: " . $ex->getMessage());
                return false; // Return false to indicate an error occurred
            }catch (Exception $ex){
                // Handle other exceptions
                error_log("Error: " . $ex->getMessage());
                return false; // Return false to indicate an error occurred
            }
    }

    //FETCH ALL USER for ADMIN
    public function fetch_all_users(){
        $sql =  "SELECT * FROM user";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $all_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $all_users;
        }catch (PDOException $ex){
            // Handle database exceptions
            error_log("Database error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        } catch (Exception $ex){
            // Handle other exceptions
            error_log("Error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }
    }
  
    //VIEW USER DETAIL
    public function get_user_detail($user_id){
        $sql = "SELECT * FROM user WHERE user_id = ?";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $user_count = $stmt->rowCount();

            if ($user_count === 1){
                // Fetch the user details as an associative array
                $user_detail = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user_detail;
            } else{
                return false; // No user found with the given ID
            }
        } catch (PDOException $ex){
            // Handle database exceptions
            error_log("Database error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        } catch (Exception $ex){
            // Handle other exceptions
            error_log("Error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }
    } 

    //DELETE USER METHOD
    public function delete_user($user_id){
        $sql = "DELETE FROM user WHERE user_id =?";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
            $deleted = $stmt->execute();
             return $deleted;
        }catch(PDOException $ex){
            // Handle database exceptions
            error_log("Database error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }catch(Exception $ex){
            // Handle other exceptions
            error_log("Error: " . $ex->getMessage());
            return false; // Return false to indicate an error occurred
        }
    }

        //UPDATE METHOD
        public function update_user_profile($user_id, $user_firstname, $user_lastname, $user_email){
            $sql = "UPDATE user SET user_firstname = ?, user_lastname = ?, user_email = ? WHERE user_id = ?";
        
            try {
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$user_firstname, $user_lastname, $user_email, $user_id]);
                
                // Check if any rows were affected (update was successful)
                $rowsAffected = $stmt->rowCount();
                
                if ($rowsAffected > 0) {
                    $_SESSION['update_successful'] = "Profile update successful";
                    return true; // Return true to indicate success
                } else {
                    $_SESSION['update_error'] = "No changes made to the profile"; // Optional: Handle the case where no changes were made
                    return false; // Return false to indicate no changes were made
                }
            } catch (PDOException $ex) {
                // Handle the exception here, e.g., log the error or display an error message
                error_log($ex->getMessage());
                $_SESSION['update_error'] = "An error occurred while updating the profile";
                return false; // Return false to indicate an error occurred
            }
        }
    

}    //END OF CLASS


//REGISTER test
//$user1 = new User();
//$registeredUser = $user1-> register("Emeka", "e@yahoo.com", "pasword123", "thank");
//echo $registeredUser;

//LOGIN test
// $user1 = new User();
// $loggedin = $user1-> login("victoriasuave07@gmail.com", "12345678");
//echo $loggedin;
//echo "<pre>";
// print_r($loggedin);
// echo "</pre>";

//FETCH test
// $user1 = new User();
// $fetched = $user1->fetch_user_details("user_id");
// echo $fetched;
// echo "<pre>";
// print_r($fetched);
// print_r($user1->fetch_user_details(12));
// echo "</pre>";


// $user1 = new User();
// $uploadpic = $user1->upload_profile_image("user_id", "user_dp");
// echo "<pre>";
// print_r($uploadpic);
// echo "</pre>";
?>