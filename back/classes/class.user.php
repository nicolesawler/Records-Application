<?php
class USER
{
    /** @var object PDO connection */
    private $db;
     /** @var object of the logged in user */
    private $userloggedin;
    /** @var string error msg */
    public $error;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
    
    public function getDB() 
    { 
        return $this->db; 
    } 
    
    public static function getDBInstance()
     {
         return self::$db;
     }


     // Block the clone method
     private function __clone() {}

        
        
    /**
    * Return the logged in user.
    * @return user array data
    */
    public function getUser(){
        return $this->userloggedin;
    }

    /**
    * Check if email is already used function
    * @param string $email User email.
    * @return boolean of success.
    */
    public function checkEmail($email){
        $stmt = $this->db->prepare('SELECT user_id FROM users WHERE email = ? limit 1');
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    /**
    * Register function
    * @param string $umail User email.
    * @param string $upass User password.
    * @param strings $first and $last User first and last name.
    *
    * @return returns user id if needed.
    */
    public function register($fname,$lname,$umail,$upass)
    {
        $activation_code = $this->hashPass(date('Y-m-d H:i:s').$umail);
       try
       {
        
           $hash = $this->hashPass($upass);
           $stmt = $this->db->prepare("INSERT INTO users(first, last, email, password, activation_code) VALUES(:fname, :lname, :umail, :upass, :activate)");
              
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $hash);            
           $stmt->bindparam(":fname", $fname);            
           $stmt->bindparam(":lname", $lname);      
           $stmt->bindparam(":activate", $activation_code);      
           $stmt->execute(); 
           
           $lastId = $this->db->lastInsertId();
           if($stmt){
               return $lastId; 
           }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    
    /**
    * Login function
    * @param string $umail User email.
    * @param string $upass User password.
    * @param string $uname User name.
    *
    * @return bool Returns login success.
    */
    public function login($umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:umail LIMIT 1");
          $stmt->execute(array(':umail'=>$umail));
          $userInfo=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              
            if(password_verify($upass,$userInfo['password'])){
                
                    $this->updateUserLoggedIn($userInfo['user_id']);//update last login date to now
                    
                    $this->userloggedin = $userInfo;
                    session_regenerate_id();
                    $_SESSION['user_id'] = $userInfo['user_id'];
                    $_SESSION['first'] = $userInfo['first'];
                    $_SESSION['last'] = $userInfo['last'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['role'] = $userInfo['role'];
                    return true;
                
            }else{
                $this->error = 'Invalid login information or the account is not activated.';
                return false;
            } 
              

          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

 
   /**
    * Check if user is logged in
    * Sets session for user_id *IMPORTANT*
    * @return bool.
    */
   public function is_loggedin()
   {
      if(isset($_SESSION['user_id']))
      {
         return true;
      }
   }
    
      
    /**
    * @description validation for all inputs
    * @author nicole
    * @param string
    * @return string validated
    */
    public function basicValidation($input)
    {
        $input = trim($input);
        $input = strip_tags($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input; 
    } 
    
    
    /**
    * Redirect to URL
    * @return void.
    */
   public function redirect($url)
   {
       header("Location: $url");
   }
 
    /**
    * @description Password hash function
    * @author nicole
    * @param string
    * @return string hashed
    */
    private function hashPass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    
   /**
    * @description prints out error message where html output
    * @author nicole
    * @return print string
    */
    public function printError(){
        print $this->error;
    }

    
    /**
    * @description Connects user with database
    * @author nicole
    * @return void
    */
    public function logout()
    {
        $_SESSION['user_id'] = null;
        session_regenerate_id();
        session_destroy();
        unset($_SESSION['user_id']);
        return true; 
    }

   

    
    
    /**
    * @description Update user account information
    * @author nicole
    * @return void
    */
    public function updateAccount($user_id,$staticFirst,$staticLast,$staticPassword,$staticCCType,$staticCCNumber,$staticExpiryMonth,$staticCCExpiryYear,$staticCCCVV)
    {
        //this will eventually pass through to call function
        //if user is not using this card as primary card then credit card info should be ignored
        $ccverify = false;
        
        if($ccverify){
            $this->verify_creditcard($staticCCType,$staticCCNumber,$staticExpiryMonth,$staticCCExpiryYear,$staticCCCVV);
        }
        
        //User is updating their password
        if($staticPassword != ""){
            $hash = $this->hashPass($staticPassword);
            $sql = "UPDATE `records`.`users` 
            SET first = :first, last = :last, password = :pass, cctype = :cctype, ccnumber = :ccnum, ccmonth = :ccmonth,  ccyear = :ccyear, cccvv = :cccvv
            WHERE user_id = :id";
        }
        else
        {
            $sql = "UPDATE `records`.`users` 
            SET first = :first, last = :last, cctype = :cctype, ccnumber = :ccnum, ccmonth = :ccmonth,  ccyear = :ccyear, cccvv = :cccvv
            WHERE user_id = :id";
        }
        
        try
             {

                $stmt = $this->db->prepare($sql);                                  
                $stmt->bindParam(':first', $staticFirst, PDO::PARAM_STR);       
                $stmt->bindParam(':last', $staticLast, PDO::PARAM_STR);    
                $stmt->bindParam(':cctype', $staticCCType, PDO::PARAM_STR);
                $stmt->bindParam(':ccnum', $staticCCNumber, PDO::PARAM_STR);  
                $stmt->bindParam(':ccmonth', $staticExpiryMonth, PDO::PARAM_STR);  
                $stmt->bindParam(':ccyear', $staticCCExpiryYear, PDO::PARAM_STR);  
                $stmt->bindParam(':cccvv', $staticCCCVV, PDO::PARAM_STR);  
                $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);   
               if($staticPassword != ""){
                    $stmt->bindParam(':pass', $hash);   
                }
                $stmt->execute(); 

                if($stmt){
                    return true;
                }
             }
             catch(PDOException $e)
             {
                 echo $e->getMessage();
             }    
    }

    /**
    * @description Verify credit card information
    * @author nicole
    * @return void
    */
    public function verify_creditcard($staticCCType,$staticCCNumber,$staticExpiryMonth,$staticCCExpiryYear,$staticCCCVV)
    {
        return;
    }
   
    
    
    /**
    * @description Outputs pretty date
    * @author nicole
    * @return date string
    */  
    
    public function dateTimeConvert($date)
    {
        $newdate = new DateTime($date);
        return $newdate->format('M d, Y h:ia');
    }
    public function dateConvert($date)
    {
        $newdate = new DateTime($date);
        return $newdate->format('M d, Y');
    }

    
        
    /**
    * @description Update Last Login date of user
    * @author nicole
    * @return user id
    */  
    
    public function updateUserLoggedIn($user_id)
    {

        try
             {

                $stmt = $this->db->prepare("UPDATE `records`.`users` SET last_login = NOW() WHERE user_id = :id");                                   
                $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);   
                $stmt->execute(); 

                if($stmt){
                    return true;
                }
             }
             catch(PDOException $e)
             {
                 echo $e->getMessage();
             }  
    }

    
    

function generateRandomPassword() 
 {
   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@$#%&';
   $length = 12;
   $password = substr( str_shuffle( $chars ), 0 , $length );
   return $password;
}
    
    
}//class
