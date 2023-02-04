<?php
/**
 * @description SESSION class to overwrite php session and move sessions to DB
 * @author 
 * OVERWRITE OF http://php.net/manual/en/class.sessionhandlerinterface.php
 * @param uses session table 
 * id = varchar(32) for session id 
 * data = stores all session info
 * access = stores time numerically
 * data_updated = stores data time 
 * @return bool
 */ 


/**
 * Session
 */
class SESSION implements SessionHandlerInterface {
 
/**
 * Db Object
 */
/** @var object $pdo Copy of PDO connection */
private $db;


public function __construct($DB_con){
  // Instantiate new Database object
   $this->db = $DB_con;

    // Set handler to overide SESSION
    session_set_save_handler(
        array($this, "open"),
        array($this, "close"),
        array($this, "read"),
        array($this, "write"),
        array($this, "destroy"),
        array($this, "gc")
        );
    register_shutdown_function('session_write_close');
    session_start();
}


/**
 * Open
 */
public function open($savepath, $id){

  if($this->db){
    // Return True
    return true;
  }
  // Return False
  return false;

}


/**
 * Close
 */
public function close(){
    $this->db = null;
    // Close the database connection
    if($this->db == null){
        // Return True
        return true;
    }
    // Return False
    return false;
}

/**
 * Read
 */
public function read($id){

  $stmt = $this->db->prepare('SELECT data FROM sessions WHERE id = :id LIMIT 1');
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if($stmt->rowCount() > 0){
    return $row['data'];
  }else{
    // Return an empty string
    return '';
  }

}


/**
 * Write
 */
public function write($id, $data){
        // Create time stamp
        $access = time();
        
        $stmt = $this->db->prepare('UPDATE sessions SET id=:id, access=:access, data=:data WHERE id=:id');
        //$stmt = $this->db->prepare('REPLACE INTO sessions VALUES (:id, :access, :data)');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':access', $access);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
      
        if($stmt){
          return true;
        }else{
          return false;
        }
}

/**
 * Destroy
 */
public function destroy($id){
    // Set query
    $stmt = $this->db->prepare('DELETE FROM sessions WHERE id = ? LIMIT 1');
    $stmt->execute([$id]);
    if ($stmt) {
        return true;
    } else {
        return false;
    }
} 

/**
 * Garbage Collection
 */
public function gc($max){
    // Calculate what is to be deemed old
    $old = time() - $max;
    $stmt = $this->db->prepare('DELETE FROM sessions WHERE access < ?');
    $stmt->execute([$old]);
    
    if ($stmt) {
        return true;
    } else {

        return false;
    }
    
}


/**
 * Destruct
 */
public function __destruct()
{
    $this->close();
}





}