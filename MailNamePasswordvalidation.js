
function chkName()
{
	var myname = document.getElementById("Username") ; 
	var dom = document.getElementById("subBtn") ; 
	var pos = myname.value.search(/^[A-Z][a-z]+\.?/) ; 
	if(pos != 0)
	{
		alert("The name you entered (" + myname.value + ") is not in the correct form. \n" + "the correct form if: " + "last-name, first-name, middle-initial\n"
			+ "please go back and fix your name" + "pos = " + pos ) ; 
		dom.disabled = true ;
		return false ; 
	}
	else
	{
		var chk1 = chkMail1() ; 
		var chk2 = chkPasswords1() ;
		var chk3 = chkGinder1() ; 
		var chk4 = chkCheckBox1() ; 
		
		if(chk1==true && chk2==true && chk3 ==true && chk4==true )
			dom.disabled = false ; 
		return true ; 
	}
}


function chkMail()
{
	var em=document.getElementById("Email").value;
	var dom = document.getElementById("subBtn") ;
	if(em.indexOf("@") < 1 || em.indexOf(".") < 1  ) 
	{
	alert('Please check your email address');
	dom.disabled = true ;
	return false;
	}
	var chk1 = chkName1() ; 
	var chk2 = chkPasswords1() ;
	var chk3 = chkGinder1() ; 
	var chk4 = chkCheckBox1() ; 
	//var chk4 = chkGinder1() ;
	//var chk3 = chkCheckBox1() ;
	if(chk1==true && chk2==true && chk3 == true && chk4==true )
		dom.disabled = false ;
	return true;
}
function chkPasswordsStrength()
{
	var init = document.getElementById("Password");
	var chk1 = false , chk2 =  false , chk3 = false , chk4 = false , ans = 0   ; 
	var str = init.value ; 
	for (var i = 0; i < str.length; i++) {
		if(str.charAt(i) >= '0' && str.charAt(i) <= '9' )
		{
			if(chk1==false)
				ans++ ; 

			//alert(ans + "1 <br/>") ;
			chk1 = true ;
		}	
		else if(str.charAt(i) >= 'a' && str.charAt(i)<='z' )
		{
			if(chk2==false)
				ans++ ; 

			//alert(ans + "2 <br/>") ;
			chk2 = true ;
		}
		else if(str.charAt(i)>='A' && str.charAt(i)<='Z' )
		{
			if(chk3==false)
				ans++ ; 

			//alert(ans + "3 <br/>") ;
			chk3 = true ;
		}
		else if(str.charAt(i)=='?' || str.charAt(i)=='\'' || str.charAt(i)=='"' || str.charAt(i)==';' ||  str.charAt(i)==':' || str.charAt(i)=='[' || str.charAt(i)==']' || str.charAt(i)=='{' || str.charAt(i)=='}' || str.charAt(i)=='>' || str.charAt(i)=='<') 
		{
			if(chk4==false)
				ans++ ; 

			//alert(ans + "4 <br/>") ;
			chk4 = true ;
		}

		if(ans <= 1)
		{
			//alert( "weak <br/>") ;
			document.getElementById("prag1").innerHTML = "Weak";
			document.getElementById("prag1").color = "red"; 
		}
		if(ans == 2 || ans == 3)
		{
			//alert( "med <br/>") ;
			document.getElementById("prag1").innerHTML = "Medium";
			document.getElementById("prag1").color = "blue";
		}
		if(ans == 4)
		{
			//alert( "strong <br/>") ;
			document.getElementById("prag1").innerHTML = "Strong";
			document.getElementById("prag1").color = "green";
		}



	}
	//alert(ans + " <br/>" + typeof(ans)) ;
	
	
}

function chkCheckBox()
{
	var elem = document.getElementById("myform") ; 
	var dom = document.getElementById("subBtn") ;

	var cnt = 0 ; 
	for (var i = 0; i < elem.Type.length; i++) {
		if(elem.Type[i].checked)
			cnt++ ; 
	}
	if(cnt>=1)
	{
		var chk1 = chkMail1() ; 
		var chk2 = chkName1() ;
		var chk3 = chkPasswords1() ;
		var chk4 = chkGinder1() ;

		if(chk1==true && chk2==true && chk3==true && chk4==true )
			dom.disabled = false ;

		//alert(chk1 + " " + "chkbox" ) ;

		return true ; 
	}

	else
	{
		//alert(chk1 + " "  + "chkbox") ;
		dom.disabled = true ; 
		return false ; 
	} 
}
function chkGinder()
{
	var elem = document.getElementById("myform") ; 
	var dom = document.getElementById("subBtn") ;
	var cnt = 0 ; 
	for (var i = 0; i < elem.Gender.length; i++) {
		if(elem.Gender[i].checked)
			cnt++ ; 
	}
	if(cnt==1)
	{
		var chk1 = chkMail1() ; 
		var chk2 = chkName1() ;
		var chk3 = chkPasswords1() ;
		var chk4 = chkCheckBox1() ;
		//alert(chk4 + " " + "Ginder" ) ;
		if(chk1==true && chk2==true && chk3==true && chk4==true )
			dom.disabled = false ;

		return true ;
	}
			 
	else
	{
		//alert(chk4 + " " + "Ginder" ) ;
		dom.disabled = true ; 
		return false ;
	}
	  
}


function chkPasswords()
{
	var init = document.getElementById("Password");
	var sec = document.getElementById("ConfirmPassword") ;
	var dom = document.getElementById("subBtn") ;
	if(init.value=="")
	{
		alert("You didn't enter a password\n" , "please enter one now") ;
		dom.disabled = true ;
 
		return false ; 
	}
	else if(init.value != sec.value)
	{
		alert("The two password you entered are not the same\n" + "please re-enter both now") ;
		dom.disabled = true ;
		return false ;
	}
	else 
	{
		var chk1 = chkMail1() ; 
		var chk2 = chkName1() ;
		var chk4 = chkGinder1() ;
		var chk3 = chkCheckBox1() ;
		if(chk1==true && chk2==true && chk3==true && chk4==true )
			dom.disabled = false ;
		return true ; 
	}
}


function resetAll()
{
	//var re = document.getElementById("resBtn") ;
	var dom = document.getElementById("subBtn") ;
	dom.disabled = true ; 

}





