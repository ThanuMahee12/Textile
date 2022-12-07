
function validation()
{
	if(document.getElementById("fname").value=="")
	{
		alert("First Name cannot be blanked");
	}
	else if(document.getElementById("lname").value=="")
	{
		alert("Last Name cannot be blanked");
	}
	else if(document.getElementById("addr").value=="")
	{
		alert("Address cannot be blanked");
	}
	else if(document.getElementById("email").value=="")
	{
		alert("Email cannot be blanked");
	}
	else if(document.getElementById("no").value=="")
	{
		alert("You must enter your contact number & It should be numeric");
	}
	else if(isNaN(document.getElementById("no").value))
	{
		alert("Contact number should be numeric");
	}
	else
	{
		document.getElementById("").submit();
	}


}
