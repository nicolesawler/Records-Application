<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class REPORTS extends USER
{
    /** @var object PDO connection */
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    
    
       
    /**
    * @description Selects application based on USER ID (not app id)
    * @author nicole
    * @param int
    * @return array
    */ 
   
    public function getOpenApplications()
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT applicationid, user_id, firstname, lastname, middleinitial, "
                  . "formerfirstname, formerlastname, formermiddleinitial, hasformername, "
                  . "gender, birthdate, birthcountry, currentaddress, formeraddress, "
                  . "methodoftransport, dateofarrival, passportnumber, passportissued, passportexpiry, "
                  . "legalstatusnumber, legalstatusissued, legalstatusexpiry, occupation, placeofemployment, "
                  . "remarks, email, phonenumber, applicationstatus, datecreated "
                  . "FROM records.applications WHERE applicationstatus = 'PROCESSING' ORDER BY applicationid DESC");

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
    * @description Gets single application viewed based on app id for viewing
    * @author nicole
    * @param int
    * @return row array
    */ 
   
    public function getSingleApplication($appid)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT applicationid, user_id, firstname, lastname, middleinitial, formerfirstname, formerlastname, formermiddleinitial, hasformername, gender, birthdate, birthcountry, currentaddress, formeraddress, methodoftransport, dateofarrival, passportnumber, passportissued, passportexpiry, legalstatusnumber, legalstatusissued, legalstatusexpiry, occupation, placeofemployment, remarks, email, phonenumber, applicationstatus,datecreated "
                  . "FROM records.applications WHERE applicationid = :appid "
                  . "ORDER BY applicationid DESC LIMIT 1"); 
                   $stmt->bindparam(":appid", $appid);  
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
   
   
    /**
    * @description Get all images uploaded by a single user_id
    * @author nicole sawler
    * @param int
    * @return array
    */ 
   
    public function getPhotoDocuments($user_id)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT passport_id, name, original_name, mime_type, status, type, date_added "
                  . "FROM records.passport_images WHERE user_id = :user_id AND status = 'ACTIVE' AND type != '' ORDER BY passport_id DESC");
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
          array_push($this->error, $e->getMessage());
       }
   }
 
   
    /**
    * @description Get all images uploaded by a single user_id
    * @author nicole sawler
    * @param int
    * @return array
    */ 
   
    public function getAllSingleUserApplications($user_id)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT applicationid, firstname, lastname, applicationstatus, datecreated "
                  . "FROM records.applications WHERE user_id = :user_id AND applicationstatus != 'PROCESSING' ORDER BY applicationid DESC");
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
    * @description Get all users
    * @author nicole sawler
    * @return array
    */ 
   
    public function getAllUsers()
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT user_id, first, last, email, role, date_added, last_login FROM records.users WHERE role = 'USER' ORDER BY user_id DESC");
          
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
    * @description Get all admins
    * @author nicole sawler
    * @return array
    */ 
   
    public function getAllAdmins()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT user_id, first, last, email, role, date_added, last_login FROM records.users WHERE role = 'ADMIN' ORDER BY user_id DESC");
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
    * @description Manage user 
    * @author nicole sawler
    * @return array
    */ 
   
    public function manageUser($user_id)
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM records.users WHERE user_id = :user_id");
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
 
    
       
   
    /**
    * @description Update Manage User Accounts
    * @author nicole sawler
    * @return bool
    */ 
   
    public function updateManageUserAccount($user_id, $pass, $first, $last, $role)
    {
        if($pass != ""){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql ="UPDATE records.users SET password = '".$pass."', first = :first, last = :last, role = :role WHERE user_id = :user_id";
        }else{
            $sql ="UPDATE records.users SET first = :first, last = :last, role = :role WHERE user_id = :user_id";
        }
        
        
       try
       { 
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":user_id", $user_id);  
        $stmt->bindparam(":first", $first);  
        $stmt->bindparam(":last", $last);  
        $stmt->bindparam(":role", $role);  
        $stmt->execute();

          if($stmt)
          {
            return true;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   } 
 
    
    
    
    
    
    
    
    
    
   
}//class