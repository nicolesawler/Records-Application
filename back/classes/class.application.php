<?php

class APPLICATION extends USER
{
   
    /** @var object PDO connection */
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    
    
   /**
    * @description Insert new application
    * @author nicole
    * @param form elements
    * @return returns app id of just inserted for further use if needed
    */ 
    
    public function insertApplication($user_id,$first,$last,$m,$ffirst,$flast,$fm,$hasformername,$gender,$birthday,$country,$address,$faddress,$methodoftravel,$arrivaldate,$passportnum,$passportissue,$passportexpiry,$legalnum,$legalissue,$legalexpiry,$occupation,$placeofemployment,$remarks,$email,$phone)
    { 
        // cancel any previous open applications
        $this->cancelApplication($user_id);
        
       try
       { 
          $stmt = $this->db->prepare("INSERT INTO records.applications (
              `user_id`, 
              `firstname`, 
              `lastname`, 
              `middleinitial`, 
              `formerfirstname`,
              `formerlastname`, 
              `formermiddleinitial`, 
              `hasformername`,
              `gender`, 
              `birthdate`, 
              `birthcountry`, 
              `currentaddress`, 
              `formeraddress`, 
              `methodoftransport`, 
              `dateofarrival`, 
              `passportnumber`, 
              `passportissued`, 
              `passportexpiry`, 
              `legalstatusnumber`, 
              `legalstatusissued`, 
              `legalstatusexpiry`, 
              `occupation`, 
              `placeofemployment`, 
              `remarks`, 
              `email`, 
              `phonenumber`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

                $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
                $stmt->bindParam(2, $first, PDO::PARAM_STR, 100);
                $stmt->bindParam(3, $last, PDO::PARAM_STR, 100);
                $stmt->bindParam(4, $m, PDO::PARAM_STR, 45);
                $stmt->bindParam(5, $ffirst, PDO::PARAM_STR, 100);
                $stmt->bindParam(6, $flast, PDO::PARAM_STR, 100);
                $stmt->bindParam(7, $fm, PDO::PARAM_STR, 45);
                $stmt->bindParam(8, $hasformername, PDO::PARAM_INT);
                $stmt->bindParam(9, $gender, PDO::PARAM_STR, 1);
                $stmt->bindParam(10, $birthday);
                $stmt->bindParam(11, $country, PDO::PARAM_STR, 100);
                $stmt->bindParam(12, $address, PDO::PARAM_STR, 200);
                $stmt->bindParam(13, $faddress, PDO::PARAM_STR, 200);
                $stmt->bindParam(14, $methodoftravel, PDO::PARAM_STR, 3);
                $stmt->bindParam(15, $arrivaldate);
                $stmt->bindParam(16, $passportnum, PDO::PARAM_STR, 45);
                $stmt->bindParam(17, $passportissue);
                $stmt->bindParam(18, $passportexpiry);
                $stmt->bindParam(19, $legalnum, PDO::PARAM_STR, 45);
                $stmt->bindParam(20, $legalissue);
                $stmt->bindParam(21, $legalexpiry);
                $stmt->bindParam(22, $occupation, PDO::PARAM_STR, 150);
                $stmt->bindParam(23, $placeofemployment, PDO::PARAM_STR, 150);
                $stmt->bindParam(24, $remarks, PDO::PARAM_STR, 1000);
                $stmt->bindParam(25, $email, PDO::PARAM_STR, 100);
                $stmt->bindParam(26, $phone, PDO::PARAM_STR, 45);

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
    * @description Selects application based on USER ID (not app id)
    * @author nicole
    * @param int
    * @return array
    */ 
   
    public function getApplications($user_id)
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
    * @description Gets single proccessing/requested application
    * @author nicole
    * @param int
    * @return row array
    */ 
   
    public function getApplication($user_id)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT applicationid, firstname, lastname, applicationstatus, datecreated "
                  . "FROM records.applications WHERE user_id = :user_id AND applicationstatus = 'PROCESSING' "
                  . "ORDER BY applicationid DESC LIMIT 1");
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
    * @description Gets single application viewed based on app id for viewing
    * @author nicole
    * @param int
    * @return row array
    */ 
   
    public function getSingleApplication($user_id,$appid)
    {
       try
       { 
          $stmt = $this->db->prepare("SELECT applicationid, user_id, firstname, lastname, middleinitial, formerfirstname, formerlastname, formermiddleinitial, hasformername, gender, birthdate, birthcountry, currentaddress, formeraddress, methodoftransport, dateofarrival, passportnumber, passportissued, passportexpiry, legalstatusnumber, legalstatusissued, legalstatusexpiry, occupation, placeofemployment, remarks, email, phonenumber, applicationstatus,datecreated "
                  . "FROM records.applications WHERE user_id = :user_id AND applicationid = :appid "
                  . "ORDER BY applicationid DESC LIMIT 1");
            $stmt->bindparam(":user_id", $user_id);  
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
    * @description Cancel previous process if new app inserted
    * @author nicole
    * @param int
    * @return row array
    */ 
   
    public function cancelApplication($user_id)
    {
       try
       { 
          $stmt = $this->db->prepare("UPDATE records.applications SET applicationstatus = 'CANCELLED' WHERE user_id = :user_id AND applicationstatus = 'PROCESSING'");
            $stmt->bindparam(":user_id", $user_id); 
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