"use strict"

// storing Reference number to local storage
var url_string = window.location.href
var url = new URL(url_string);
var c = url.searchParams.get("jobID");

if(c){
	document.getElementById('Rnumber').value=c
	localStorage.setItem("Rnumber", c);
}else{
	document.getElementById("Rnumber").value = localStorage.getItem("Rnumber");
}

//  storing Reference number to local storage

//  session storage 
if (typeof(Storage) !== "undefined") {
  document.getElementById("FName").value = sessionStorage.getItem("FName"); 
  document.getElementById("LName").value = sessionStorage.getItem("LName"); 
  document.getElementById("Date").value = sessionStorage.getItem("Date"); 
  document.getElementById("address").value = sessionStorage.getItem("address"); 
  document.getElementById("taddress").value = sessionStorage.getItem("taddress"); 
  document.getElementById("State").value = sessionStorage.getItem("State"); 
  document.getElementById("Code").value = sessionStorage.getItem("Code"); 
  document.getElementById("email").value = sessionStorage.getItem("email"); 
  document.getElementById("phone").value = sessionStorage.getItem("phone");
  
  var radios = document.getElementsByName("Sex"); 
  var val = sessionStorage.getItem('Sex'); 
  for(var i=0;i<radios.length;i++){
    if(radios[i].value == val){
      radios[i].checked = true; 
    }
  }
}
//  session storage 


// form validation


function validate(){
  var errMsg = "";
	var result = true;

  var Date = document.getElementById("Date").value.trim();
	var State = document.getElementById("State").value.trim();
	var Code = 	document.getElementById("Code").value.trim();


  if (Date == ""){
    errMsg+="Please fill up the Date of Birth field of the form.\n";
  }

  if (State == ""){
    errMsg+="Please fill up the State field of the form.\n";
  }

  if (Code == ""){
    errMsg+="Please fill up the Postcode field of the form.\n";
  }

  

  if (errMsg != "") {
		alert (errMsg);
		result = false;
  }

  //  store data to session storage 
	if (typeof(Storage) !== "undefined") {
		sessionStorage.setItem("FName", document.getElementById('FName').value);
		sessionStorage.setItem("LName", document.getElementById('LName').value);
		sessionStorage.setItem("Date", document.getElementById('Date').value);
		sessionStorage.setItem("address", document.getElementById('address').value);
		sessionStorage.setItem("taddress", document.getElementById('taddress').value);
		sessionStorage.setItem("State", document.getElementById('State').value);
		sessionStorage.setItem("Code", document.getElementById('Code').value);
		sessionStorage.setItem("email", document.getElementById('email').value);
		sessionStorage.setItem("phone", document.getElementById('phone').value);
		sessionStorage.setItem("Sex", document.querySelector('input[name="Sex"]:checked').value);
	}
  //   store data to session storage 
	
return result;

      
}


function dateValidation(){
  var dob=document.getElementById('Date').value;
var today=new Date();
var dd = today.getDate();

var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();

today = mm+'/'+dd+'/'+yyyy;

var From_date = new Date(dob);
var To_date = new Date(today);
var diff_date =  To_date - From_date;

var years = Math.floor(diff_date/31536000000);


if(years<15||years>80){
  
  document.getElementById('datevalid').style.display = 'inline'
  document.getElementById('Date').value='';
}else{
  document.getElementById('datevalid').style.display = 'none'
}

}
  
function postcodeValidation(){
  var State=document.getElementById('State').value;
  var postCode=document.getElementById('Code').value;
  if(State=='VIC'){
    if(postCode.charAt(0)!="3" && postCode.charAt(0)!="8"){
      
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
    }
    else{
      document.getElementById('postCodeValid').style.display = 'none'
    }
  }
  
  else if(State=='NSW'){
    if(postCode.charAt(0)!=1 && postCode.charAt(0)!=2){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='QLD'){
    if(postCode.charAt(0)!=4 && postCode.charAt(0)!=9){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='NT'){
    if(postCode.charAt(0)!=0){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='WA'){
    if(postCode.charAt(0)!=6){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='SA'){
    if(postCode.charAt(0)!=5){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='TAS'){
    if(postCode.charAt(0)!=7){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else if(State=='ACT'){
    if(postCode.charAt(0)!=0){
      document.getElementById('postCodeValid').style.display = 'inline'
      document.getElementById('Code').value='';
} else{
  document.getElementById('postCodeValid').style.display = 'none'
}
  }
  else{
    if(State==''){
      alert("Select State");
      document.getElementById('Code').value='';
    }
   
     
  }
}

function Otherskills(){
  var chkarr =  document.getElementById("otherskills");

    if(chkarr.checked==true){
      document.getElementById("otherSkillsText").required=true;
     
    }
   else {
    document.getElementById("otherSkillsText").required=false;
    
   }
    
}


function init() {
  var form = document.getElementById("form");
  form.onsubmit = validate;
}
window.onload = init;

// form validation