//global var to validate input field.
var inputOK = [false,false,false,false,false,false];
//index 0 => name, 1=> password , 2>phone,3>email,4>verCode

window.onload=function(){
        //generate verification code.
        createCode(4);
        



        //validate username when input
        var username=document.getElementById("username");
        var name=document.getElementById("name");
        var password=document.getElementById("password");
        var phone=document.getElementById("phone");
        var email=document.getElementById("email");
        var verification = document.getElementById("inputCode");
        
            

        name.onkeyup = function(){
            inputOK[0] = validateName("name");
            
        }

        password.onkeyup = function(){
            inputOK[1] = validatePassword("password")
        }

        phone.onkeyup = function(){           
             inputOK[2] = validatePhone("phone");           
        }

        email.onkeyup = function(){
            inputOK[3] = validateEmail("email");
        }

        inputCode.onkeyup=function(){
            inputOK[4] = validateCode();    
        }
        
        username.onkeyup=function(){
            inputOK[5] = validateYourname("username");
        }

      

}   

    //validate user name;
    function validateYourname(username){
        var flag = document.getElementById(username);
        
        if (flag != "") {
            document.getElementById("announcement_yourName").innerText = "Ok";
            document.getElementById("announcement_yourName").style.color = "green";      
            return true;
        }
        else
        {
            document.getElementById("announcement_yourName").style.color = "red";
            document.getElementById("announcement_yourName").innerText = "Invalid"; 
            return false;
        }
    }


    //validate id
	function validateName(name){
        var flag = document.getElementById(name);
        
        var usernameReg = /^\w{3,15}$/;

        if (flag.value.match(usernameReg)) {
            document.getElementById("announcement_userName").innerText = "Ok";
            document.getElementById("announcement_userName").style.color = "green";      
            return true;
        }
        else
        {
            document.getElementById("announcement_userName").style.color = "red";
            document.getElementById("announcement_userName").innerText = "Invalid"; 
            return false;
        }
    
    }

    //validate phone number 
    function validatePhone(phone){
        var flag = document.getElementById(phone);
        
        var phoneReg = /^1+\d{10}$/;

        if (flag.value.match(phoneReg)) {
                document.getElementById("announcement_phoneNumber").innerText = "Ok";
                document.getElementById("announcement_phoneNumber").style.color = "green";
                return true;
            }
        else{
                document.getElementById("announcement_phoneNumber").style.color = "red";
                document.getElementById("announcement_phoneNumber").innerText = "Invalid";
                return false;
        }
    
    }

    //validate email
    function validateEmail(email){
        var flag = document.getElementById(email);
        
        var emailReg = /^\w+@\w+(\.\w+)+$/;

        if (flag.value.match(emailReg)) {
                document.getElementById("announcement_email").innerText = "Ok";
                document.getElementById("announcement_email").style.color = "green";
                return true;
            }
        else{
                document.getElementById("announcement_email").style.color = "red";
                document.getElementById("announcement_email").innerText = "Invalid";
                return false;
        }
    
    }   
	
    //validate password
    function validatePassword(password){
        var flag = document.getElementById('password');
        
        var passwordReg = /^((?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,})$$/;

        if (flag.value.match(passwordReg)) {
                document.getElementById("announcement_Password").innerText = "Ok";
                document.getElementById("announcement_Password").style.color = "green";
                return true;
            }
        else{
                document.getElementById("announcement_Password").style.color = "red";
                document.getElementById("announcement_Password").innerText = "Invalid";
                return false;
        }    
    }





    //validate verification code
    function validateCode()
    {
        
        var checkCode = document.getElementById("checkCode").innerHTML;
        
        var inputCode = document.getElementById("inputCode").value;
        if (inputCode.length <= 0)
        {   
            document.getElementById("announcement_code").style.color="red";
            document.getElementById("announcement_code").innerHTML = ("Please enter the verification code！");
            return false;
        }
        else if (inputCode.toUpperCase() != checkCode.toUpperCase())
        {   
            document.getElementById("announcement_code").style.color="red";
            document.getElementById("announcement_code").innerHTML =("Wrong！");
            return false;    
        
        }
        else
        {
            document.getElementById("announcement_code").style.color="green";
            document.getElementById("announcement_code").innerHTML =("Correct！");
            return true;
        } 
    }

   
    
    function createCode(length) {
        var code = "";
        var codeLength = parseInt(length); //verification length
        var checkCode = document.getElementById("checkCode");
        
        //verification code elements
        var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); 
        
        for (var i = 0; i < codeLength; i++)
        {
            
            var charNum = Math.floor(Math.random() * 62);
            //concate 4 charaters
            code += codeChars[charNum];
        }
        if (checkCode)
        {
            
            checkCode.className = "code";
            //display in html
            checkCode.innerHTML = code;
        }
    }

    //check all input value
    //return true when all requierment has been satisfied.
    //then form will submit to php.
    function allValide(){
        if (inputOK[0] && inputOK[1] && inputOK[2] && inputOK[3] && inputOK[4] && inputOK[5]) {
            return true;
        }else{
            alert("Need to satisfy all requierment!");
            return false;
        }       
    }

    
    


	







    