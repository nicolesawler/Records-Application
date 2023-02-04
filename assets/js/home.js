window.onload = function(){
	document.getElementById('in-warnings').style.display = 'none';
        
}
//document.getElementById('in-warnings').style.display = 'block'; 
function textLength(value){
   var maxLength = 255;
   if(value.length > maxLength) return false;
   return true;
}

var oldValue = '';
var chars = document.getElementById('characters-used');

document.getElementById('in-single-mom').onkeyup = function(){

	if(!textLength(this.value))
     {
         this.value = oldValue;
         chars.innerHTML = '0'
     }
     else 
     
     chars.innerHTML = 255 - this.value.length;
     oldValue = this.value;
};



