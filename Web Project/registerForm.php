<?php

include('template.php');
include_once('validation.php');



viewError();

?>


<html>
	<head>
		<title> Registeration </title>
		<script type ="text/javascript">
			
			function f1(){
				var username  = document.getElementById('Username').value;
				var i,len = username.length;
				var nameRegex = /^[a-zA-Z\-]+$/;
				var validusername = username.match(nameRegex);
				if(validusername== null){
					var msg = '<span style="color:red;">Your UserName is not valid. Only characters A-Z, a-z and - are  acceptable.</span>';
					document.getElementById('msg1').innerHTML = msg;
					document.getElementById('Username').focus();
					valid[1] = false;
				}else{
					var msg = '<span style="color:red;"></span>';
					document.getElementById('msg1').innerHTML = msg;
					document.getElementById('Username').focus();
				}
				valid[1] = true;
				return valid[1];
			}
		
			function f2(){
				var email = document.getElementById('Email').value;
				var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/img;
				if (email == '' || !email.match(re))
				{
					var msg = '<span style="color:red;">Please enter a valid email address.</span>';
					document.getElementById('msg2').innerHTML = msg;
					valid[2] = false;
				}else{
					var msg = '<span style="color:red;"></span>';
					document.getElementById('msg2').innerHTML = msg;
					valid[2] = true;
					
				}
				return valid[2];
			}
			function f3(){
				var txtpass = document.getElementById('Password').value;
				var desc = new Array();
				desc[0] = "Very Weak";
				desc[1] = "Weak";
				desc[2] = "Better";
				desc[3] = "Medium";
				desc[4] = "Strong";
				desc[5] = "Strongest";
				var score   = 0;
				 //if txtpass bigger than 6 give 1 point
				if (txtpass.length > 6) score++;
				 //if txtpass has both lower and uppercase characters give 1 point
				if ( ( txtpass.match(/[a-z]/) ) && ( txtpass.match(/[A-Z]/) ) ) score++;
				 //if txtpass has at least one number give 1 point
				if (txtpass.match(/\d+/)) score++;
				 //if txtpass has at least one special caracther give 1 point
				if ( txtpass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
				 //if txtpass bigger than 12 give another 1 point
				if (txtpass.length > 12) score++;
				var strenghtMsg = desc[score];
				if (txtpass.length < 6) {
					var msg = '<span style="color:red;">Password Should be Minimum 6 Characters</span>';
					document.getElementById('msg3').innerHTML = msg;
					document.getElementById('Confirm').disabled = true;
					valid[3] = false;
					
				}else{
					var msg = '<span style="color:green;">'+strenghtMsg+'</span>';
					document.getElementById('msg3').innerHTML = msg;
					document.getElementById('Confirm').disabled = false;
					valid[3] = true;
					
				}
				return valid[3];
			}
			
			function f4() {
				var pass1 = document.getElementById('Password').value;
				var pass2 = document.getElementById('Confirm').value;
				var len1 = pass1.length;
				var len2 = pass2.length;
				if (pass1== pass2&&len1!=0) {
					document.getElementById('msg4').innerHTML = '<span style="color:green;">Passwords Match!</span>';
					valid[4] = true;
					
				}else{
					var msg = '<span style="color:red;">Passwords Do Not Match!</span>';
					document.getElementById('msg4').innerHTML = msg;
					valid[4] = false;
					
				}
				return valid[4];
			}
			
			function f5(){
				var first  = document.getElementById('FirstName').value;
				var i,lenf = first.length;
				var nameRegex = /^[a-zA-Z\-]+$/;
				var validfirstname = first.match(nameRegex);
				if(validfirstname == null){
					var msg = '<span style="color:red;">Your first name is not valid. Only characters A-Z, a-z and - are  acceptable.</span>';
					document.getElementById('msg5').innerHTML = msg;
					document.getElementById('FirstName').focus();
					valid[5] = false;
					return valid[5];
				}else{
					var msg = '<span style="color:red;"></span>';
					document.getElementById('msg5').innerHTML = msg;
					document.getElementById('FirstName').focus();
				}
				valid[5] = true;
				return valid[5];
				
			}
			function f6(){
				var last  = document.getElementById('LastName').value;
				var i,lenl = last.length;
				var nameRegex = /^[a-zA-Z\-]+$/;
				var validlastname = last.match(nameRegex);
				if( validlastname == null){
					var msg = '<span style="color:red;">Your last name is not valid. Only characters A-Z, a-z and - are  acceptable.</span>';
					document.getElementById('msg6').innerHTML = msg;
					return valid[6] = false;
				}else{
					var msg = '<span style="color:red;"></span>';
					document.getElementById('msg6').innerHTML = msg;
					document.getElementById('LastName').focus();
				}
				return valid[6] = true;
				
			}	
			function f7(){
				var date = document.getElementById('DateOfBirth').value;
				return valid[7] = date != '';
				/*var months = [0,31,28,31,30,31,30,31,31,30,31,30,31];
				var selm = document.getElementById('month');
				var sely = document.getElementById('year');
				var m = selm.options[selm.selectedIndex].value;
				var y = sely.options[sely.selectedIndex].value;
				m = parseInt(m);
				y = parseInt(y);
				if((y%4==0 && y%100!= 0) || y%400 == 0){
					months[2] = 29;
				}else{
					months[2] = 28;
				}
				document.getElementById("day").options.length=0;
				var x = document.getElementById("day");
				var option = document.createElement("option");
				option.text = 'Day';
				x.add(option);
				for(var i=1;i<=months[m];i++){
					var x = document.getElementById("day");
					var option = document.createElement("option");
					option.text = i;
					x.add(option);
					//document.getElementById('days').innerHTML = '<option value="Day" id = "day">'+i+'</option>';
				}
				valid[7] = true;
				return Validate();*/
			}
			function f8(){
				var genders= document.getElementsByName('Gender');
				if(genders[1].checked == false && genders[0].checked == false){
					alert("You must select your gender!");
					return valid[8] = false;
				}
				return valid[8] = true;
			}
			function f9()
			{
				var type= document.getElementsByName('Type');
				if(type[1].checked == false && type[0].checked == false){
					alert("You must select your Type!");
					return valid[9] = false;
				}
				return valid[9] = true;
			}
			var valid = [false,false,false,false,false,false,false,false,false,false];
			var validations = [f1,f2,f3,f4,f5,f6,f7,f8,f9];
			
			function Validate() {
				var isValid = true;
				for (var i in validations) {
					if (!validations[i]()) {
						isValid = false;
						return false;
					}
						
				}
				return isValid;
				/*var cnt = 0;
				for(var i=1;i<=9;i++){
					if(valid[i]==true){
						cnt++;
					}
				}
				
				return cnt == 9;*/
			}
		</script>
	</head>
	<body>
		<form action = "register.php" method = "post" onsubmit = "return Validate()">
			<table>
				<tr>
					<td>Username</td>
					<td><input type = "text" name = "Username" id = "Username" oninput = "f1();"> *</td>
					<td><div id="msg1"></div></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type = "text" name = "Email" id = "Email" oninput = "f2()" /> *</td>
					<td><div id="msg2"></div></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type = "password" name = "Password" id = "Password" oninput = "f3()"/> *</td>
					<td><div id="msg3"></div></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type = "password" id = "Confirm" oninput = "f4()" disabled = "false" /> *</td>
					<td><div id="msg4"></div></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type = "text" name = "FirstName" id = "FirstName" oninput = "f5()"/> *</td>
					<td><div id="msg5"></div></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type = "text" name = "LastName" id = "LastName" oninput = "f6()"/> *</td>
					<td><div id="msg6"></div></td>
				</tr>
				<tr>
					<td>Institution</td>
					<td><input type = "text" name = "Institution" id = "Institution" /></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type = "text" name = "Address" id = "Address" /></td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td>
						<input type = "date" name = "DateOfBirth" id = "DateOfBirth" onchange = "f7()">
						<!-- <select name="year" id="year">
							<script>
								document.write('<option value="Year" >'+'Year'+'</option>');
								for(var i=2015;i>=1;i--){
									document.write('<option value="'+i+'">'+i+'</option>');
								}
							</script>
						</select>
						<select name="month" onchange = "f7()" id="month">
							<script>
								document.write('<option value="Month" >'+'Month'+'</option>');
								for(var i=1;i<=12;i++){
									document.write('<option value="'+i+'" " id = "month" >'+i+'</option>');
								}
							</script>
						</select>
						<select name="day" id="day">
							<script>
								document.write('<option value="Day" >'+'Day'+'</option>');
							</script>
						</select>		 -->
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type = "radio" name = "Gender" value = "Male" id = "male" onchange = "f8()"> Male
						<input type = "radio" name = "Gender" value = "Female" id = "female" onchange = "f8()"> Female
					<td>
				</tr>
				<tr>
					<td>Type</td>
					<td>
						<input type = "radio" name = "Type" value = "Student" id = "student" onchange = "f9()" > Student
						<input type = "radio" name = "Type" value = "Educator" id = "educator" onchange = "f9()" > Educator
					</td>
				</tr>
				<tr>
					<td>
						<input type="reset" title="Reset Your Info" value="Reset" id ="reset">
					</td>
					<td>
						<input type = "submit" value = "Submit"  id = "Submit">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>