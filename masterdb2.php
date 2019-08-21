<?php	
	class DB{
        private $con;
		public function __construct(){
            $servername = "localhost";
            $username = "purerawa_adminMunna";
            $password = "jimunna1500"; 
            $databasename = "purerawa_waterContamination";
			$this->con = mysqli_connect($servername,$username,$password,$databasename);
            if($this->con===false){
                die("connect failed ");
            }
            else{
               // echo"connected";
            }
        }

        public function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        public function login_user($user,$pass){
            /* for Security */
            $user = $this->validate($user);
            $pass = $this->validate($pass);
            $pass = sha1($pass);
            //to prevent sql injection
            $sql = "SELECT * FROM user_table WHERE user_name = ? AND user_password = ? ";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ss", $user, $pass); //double s means two parameter 
			// set parameters and execute
			$stmt->execute();
            $stmt->store_result();
            $rows = $stmt->num_rows;
            if($rows == 1){
                return true;
            }
            else{
                return false;
            }
        }

        public function getUserIdWithName($userName){
            /* for Security */
            $userName = $this->validate($userName);
            $sql = "SELECT user_id FROM user_table WHERE user_name = ? ";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $userName);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $userid = $raw['user_id'];
                    return $userid;
                }
            }
        }
        
        public function addNewLoginInfo($userid){
            /* for Security */
            $userid = $this->validate($userid);
            date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka
            $date = date('Y-m-d');;
            $sql = "INSERT INTO login_information (user_id, login_date) 
                    VALUES (?,?) ";

            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ss", $userid, $date); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getLastAccessDate($userid){
            /* for Security */
            $userid = $this->validate($userid);
            $sql = "SELECT * FROM login_information WHERE user_id = ? ORDER BY login_date DESC LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $userid);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $date = $raw['login_date'];
                    return $date;
                }
            }
            else {
                $date = '000-00-0';
            }
        }

        public function __destruct(){
            mysqli_close($this->con);            
        }            
        
	}
?>