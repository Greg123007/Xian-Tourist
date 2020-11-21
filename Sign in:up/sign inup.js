window.onload=function(){
        createCode(4);
        /*Password strength*/
        function setCss(_this,cssOption){
            //判断节点类型
            if (!_this || _this.nodeType ===3 || _this.nodeType === 8 ||!_this.style) {
                return;
            }
            for(var cs in cssOption){
                _this.style[cs] = cssOption[cs];
            }
            return _this;
        } 

        function trim(chars){
            return (chars ||"").replace(/^(\s|\u00a0)+|(\s|\u00a0)+$/g,"");
        }
        function passwordStrength(passwordStrength,announcement_Password){
            var self = this;
/*
数字1，字母2，其他字符为3
p<6时>> too short
长度>=6，强度小于10，强度弱
长度>=6，强度>=10且<15，强度中
长度>=6，强度>=15，强*/
            passwordStrength.onkeyup = function(){
                var _color = ["red","yellow","orange","green"],
                        msgs = ["Too short","weak","Medium","Strong"],
                        _strength = 0,
                        _v= trim(passwordStrength.value)
                _vL= _v.length,
                        i=0;

                var charStrength = function(char){
                    //计算单个字符强度
                    if(char>=48 && char <=57){//数字
                        return 1;
                    }
                    if(char>=97 && char<=122){//小写
                        return 2;
                    }else{
                        return 3; //特殊字符
                    }
                }

                if(_vL<6){//计算模式
                    announcement_Password.innerText = msgs[0];
                    setCss(announcement_Password,{
                        "color":_color[0]
                    })
                }else{
                    for(;i<_vL;i++){
                        //遍历字符
                        _strength+=charStrength(_v.toLocaleLowerCase().charCodeAt(i));
                    }
                    if(_strength<10){
                        //强度小于10
                        announcement_Password.innerText = msgs[1];
                        setCss(announcement_Password,{
                            "color":_color[1]
                        })
                    }
                    if(_strength>=10&&_strength<15){
                        announcement_Password.innerText = msgs[2];
                        setCss(announcement_Password,{
                            "color":_color[2]
                        })
                    }
                    if(_strength>=15){
                        announcement_Password.innerText = msgs[3];
                        setCss(announcement_Password,{
                            "color":_color[3]
                        })
                    }
                }
            }
        }
        passwordStrength(
                document.getElementById("passwordStrength"),
                document.getElementById("announcement_Password"));

    }
	   
	    
    

   

    //生成验证码的方法
    function createCode(length) {
        var code = "";
        var codeLength = parseInt(length); //验证码的长度
        var checkCode = document.getElementById("checkCode");
        ////所有候选组成验证码的字符，当然也可以用中文的
        var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); 
        //循环组成验证码的字符串
        for (var i = 0; i < codeLength; i++)
        {
            //获取随机验证码下标
            var charNum = Math.floor(Math.random() * 62);
            //组合成指定字符验证码
            code += codeChars[charNum];
        }
        if (checkCode)
        {
            //为验证码区域添加样式名
            checkCode.className = "code";
            //将生成验证码赋值到显示区
            checkCode.innerHTML = code;
        }
    }
    
    //检查验证码是否正确
    function validateCode()
    {
        //获取显示区生成的验证码
        var checkCode = document.getElementById("checkCode").innerHTML;
        //获取输入的验证码
        var inputCode = document.getElementById("inputCode").value;
        if (inputCode.length <= 0)
        {
            document.getElementById("announcement_code").innerHTML = ("Please enter the verification code！");
        }
        else if (inputCode.toUpperCase() != checkCode.toUpperCase())
        {
            document.getElementById("announcement_code").innerHTML =("Wrong！");
            createCode(4);
        }
        else
        {
            document.getElementById("announcement_code").style.color="green";
            document.getElementById("announcement_code").innerHTML =("Correct！");
        } 
    	ValidateInput();


    }


	function ValidateInput(){

    	var userName=document.getElementById("name").value;
    	var phone=document.getElementById("phone").value;
    	var email=document.getElementById("email").value;
    	
    	


    	var usernameReg = /^\w{3,15}$/;
    	var phoneReg = /^1+\d{10}$/;
    	var emailReg = /^\w+@\w+(\.\w+)+$/;



    	var isValid = true;

    	if (usernameReg.test(userName)) {
    		document.getElementById("announcement_userName").innerHTML = "OK";
	    	document.getElementById("announcement_userName").style.color = "green";
    	}
    	else
    	{
    		document.getElementById("announcement_userName").innerHTML = "Invalid";
    		isValid = false;
    	}
    	
    	

    	if (phoneReg.test(phone)) {
    		document.getElementById("announcement_phoneNumber").innerHTML = "OK";
	    	document.getElementById("announcement_phoneNumber").style.color = "green";
    	}
    	else{
    		document.getElementById("announcement_phoneNumber").innerHTML = "Invalid";
    		isValid = false;
    	}

    	

    	if (emailReg.test(email)) {
    		document.getElementById("announcement_email").innerHTML = "OK";
	    	document.getElementById("announcement_email").style.color = "green";
    	}
    	else{
    		document.getElementById("announcement_email").innerHTML = "Invalid";
    		isValid = false;
    	}
    	
    	return isValid;



    }