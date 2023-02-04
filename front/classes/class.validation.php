<?php
class VALIDATE
{	
   /**
    * @description Validates a persons name (accounts for hyphens  ex: Mary-Kate)
    * @param string
    * @author nicole
    * @return string
    */
        public function validate_names($input)
	{
		//Make sure name meets length req.
		if(strlen($input) > 25){
			$input = "";
			return $input;
		}
		
		$input = strtolower($input);
	
		//Replace anything that isn't a letter
		if (!ctype_alpha($input)) {
	        $input = preg_replace("/[^a-z-]/i", "", $input);
	    }
	    
	    //Capitalize Second Name if Hyphened
	    $input = implode('-', array_map('ucfirst', explode('-', $input)));
	
	return ucfirst($input); 
	} 
	
        
   /**
    * @description Validates email
    * @param string
    * @author nicole
    * @return valid email string
    */        
        
	public function validate_email($input)
	{
		if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
		  $input = ""; 
		}
		return $input; 
	} 
	
        
   /**
    * @description Validates a string and only allows for 'a-z' '0-9' '-' '_' '.' good for usernames
    * @param string
    * @author nicole
    * @return string
    */     
	public function validate_string($input)
	{
            if (!ctype_alnum($input)) {
	        //Don't allow users to have anything other than a-z 0-9 -_.
                if(preg_replace("/[^a-z0-9-_.]/i", "", $input)){
                    $input = '';
                }
                 
	    }
	   return $input; 
	} 
        
    /**
    * @description Validates a jquery picker date to timestamp
    * @param string
    * @author nicole
    * @return string
    */     
	public function validate_date($input)
	{
//            $newdate = new DateTime($input);
//            return $newdate->format('M d, Y h:ia');
	   return $input; 
	} 
        
    /**
    * @description Validates int, returns input
    * @param int
    * @author nicole
    * @return int (or 0 if false)
    */     
	public function validate_int($input)
	{
            if (!ctype_digit($input)) {
                $input = 0;
	    }
            if (strlen($input) > 11) {
                $input = 0;
	    }
	   return $input; 
	} 
           
        
        
        
        
            
}//class