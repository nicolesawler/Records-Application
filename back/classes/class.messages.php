<?php

class MESSAGES
{
    
    /** @var object PDO connection */
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

         
    /**
    * @description Get user by email
    * @author nicole sawler
    * @return array
    */ 
   
    public function getUserByEmail($email){
        $stmt = $this->db->prepare('SELECT user_id FROM records.users WHERE email = ? limit 1');
        $stmt->execute([$email]);
        $get = $stmt->fetch();
        
        if($stmt->rowCount() > 0){
            return $get['user_id'];
        }else{
            return false;
        }
    }
   
    
    
   /**
    * @description Insert Message To DB function
    * @param string user id, subject, message
    * @author nicole sawler
    * @return boolean
    *
    */
    public function addUserMessage($user,$subject,$message)
    {
       try
       {
        
           $stmt = $this->db->prepare("INSERT INTO records.messages(user_id,subject,message,status) VALUES(:user_id, :subject, :message, 'UNREAD')");
              
           $stmt->bindparam(":user_id", $user);
           $stmt->bindparam(":subject", $subject);            
           $stmt->bindparam(":message", $message);    
           $stmt->execute(); 
           
           //$lastId = $this->db->lastInsertId();
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
    * @description Get all messages for user
    * @param int user id
    * @author nicole sawler
    * @return array
    *
    */
    public function getUserMessages($user_id)
    {
       try
       {
        
           $stmt = $this->db->prepare("SELECT * FROM records.messages WHERE user_id = :user_id OR user_id = 0 AND status != 'DELETE' ORDER BY date_added DESC");
              
           $stmt->bindparam(":user_id", $user_id); 
           $stmt->execute(); 
           $get = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
          if($stmt->rowCount() > 0)
          {
               return $get; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
            
     /**
    * @description Gets single proccessing/requested application
    * @author nicole
    * @param int
    * @return row array
    */ 
   
    public function getMessage($user_id,$msg_id)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT msg_id, subject, message, status, date_added "
                  . "FROM records.messages WHERE user_id = :user_id AND msg_id = :msg_id "
                  . "ORDER BY msg_id DESC LIMIT 1");
           $stmt->bindparam(":msg_id", $msg_id);  
           $stmt->bindparam(":user_id", $user_id);  
		   $stmt->execute();
		   $get = $stmt->fetch();

          if($stmt->rowCount() > 0)
          {
            return $get;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
    
    
}