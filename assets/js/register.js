
window.onload = function(){

	document.getElementById('in-warnings').style.display = 'none';
	
        var FirstName = document.getElementById('in-first-name');
	var LastName = document.getElementById('in-last-name');
	var eMail = document.getElementById('in-e-mail');
	var Password = document.getElementById('in-pass-word');

        FirstName.onblur = validateInputStringLength;
	LastName.onblur = validateInputStringLength;
	eMail.onblur = validateInputStringLength;
	Password.onblur = validateInputStringLength;

	function validateInputStringLength(){
	    if(this.value == null || this.value.length < 3)
	      this.style.borderColor = "red";
	    else
	      this.style.borderColor = "green";
	    
	}
	
	FirstName.onkeyup = validateInputLettersOnly;
	LastName.onkeyup = validateInputLettersOnly;
	eMail.onkeyup = validateInputEMail;
	Password.onkeyup = validateInputPassword;

	function validateInputLettersOnly() {
		
		if(/[^a-zA-Z]/.test(this.value)){              
			//alert("Your Password Cant Have any thing other than a-zA-Z0-9!@#$%^*_| ");
			this.style.borderColor = "red";
			document.getElementById('in-warnings').style.display = 'block'; // show
			document.getElementById('in-warnings').innerHTML = 'Names can only include letters and hyphens.';
			//this.value = this.value.replace(/[^a-zA-Z]+/g, '');
		}else{
			document.getElementById('in-warnings').style.display = 'none'; // show
			this.style.borderColor = "green";
		}   
	}
	
	
	function validateInputLettersDigitsUndersOnly() {
		
		if(/[^a-zA-Z0-9-_]/.test(this.value)){              
			this.style.borderColor = "red";
			document.getElementById('in-warnings').style.display = 'block'; // show
			document.getElementById('in-warnings').innerHTML = 'Usernames cannot contain special characters.';
			//this.value = this.value.replace(/[^a-zA-Z]+/g, '');
		}else{
			document.getElementById('in-warnings').style.display = 'none'; // show
			this.style.borderColor = "green";
		}   
	}
	
	function validateInputEMail() {
		
	 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.value))  {  
		 	document.getElementById('in-warnings').style.display = 'none'; // show
			this.style.borderColor = "green";
	    return (true)  
	  }  
	    	this.style.borderColor = "red";
			document.getElementById('in-warnings').style.display = 'block'; // show
			document.getElementById('in-warnings').innerHTML = 'Please enter a valid email adress.';
	    return (false)  
	}
	
//	function validateInputPassword() {
//		
//	 if (/[^a-zA-Z0-9-_$&^%#@!*]+/.test(this.value))  {  
//		 	//alert("Your Password Cant Have any thing other than a-zA-Z0-9!@#$%^*_| ");
//			this.style.borderColor = "red";
//			document.getElementById('in-warnings').style.display = 'block'; // show
//			document.getElementById('in-warnings').innerHTML = 'Password contains illegal characters.';
//	    return (true)  
//	  }  
//	   		document.getElementById('in-warnings').style.display = 'none'; // show
//			this.style.borderColor = "green";
//
//	    return (false)  
//	}




}//end onload windows