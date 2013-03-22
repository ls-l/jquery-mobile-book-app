function checkValidContactForm(id)
{
	
	if(document.getElementById('email').value=='' || document.getElementById('email').value=='Email *')
	{
		alert('Please enter email');
		document.getElementById('email').focus();
		return false;
	}
	else if(!isValidEmail(document.getElementById('email').value))
	{
		alert('Please enter valid email');
		document.getElementById('email').focus();
		return false;
	}
	
	if(document.getElementById('fullname').value=='' || document.getElementById('fullname').value=='Full Name *')
	{
		alert('Please enter full name');
		document.getElementById('fullname').focus();
		return false;
	}
	if(document.getElementById('phone').value=='' || document.getElementById('phone').value=='Phone *')
	{
		alert('Please enter phone');
		document.getElementById('phone').focus();
		return false;
	}
	
	return true;
}
function getBlurText(id,defaultValue)
{
		if (document.getElementById(id).value == '')
		{
			document.getElementById(id).value = defaultValue;
		}
}
function getFocusText(id,defaultValue)
{
		if(document.getElementById(id).value == defaultValue) 
		{
			document.getElementById(id).value = '';
		}
}

