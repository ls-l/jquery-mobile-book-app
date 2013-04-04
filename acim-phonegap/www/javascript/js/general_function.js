function isValidEmailCheck(obj) 
{
	var str=obj.value;
	var strid=obj.id;
	
	var at="@";
	var dot=".";
	var lat=str.indexOf(at);
	var lstr=str.length;
	var ldot=str.indexOf(dot);
	
	if (str.indexOf(at)==-1)
	{
	   alert("Invalid E-mail ID");
	   obj.value="";
	   return false;
	}
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
	{
	   alert("Invalid E-mail ID");
	   obj.value="";
	   return false;
	}
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
	{
		alert("Invalid E-mail ID");
		obj.value="";
		return false;
	}
	if (str.indexOf(at,(lat+1))!=-1)
	{
		alert("Invalid E-mail ID");
		obj.value="";
		return false;
	}

	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
	{
		alert("Invalid E-mail ID");
		obj.value="";
		return false;
	}

	if (str.indexOf(dot,(lat+2))==-1)
	{
		alert("Invalid E-mail ID");
		obj.value="";
		return false;
	}
	
	if (str.indexOf(" ")!=-1)
	{
		alert("Invalid E-mail ID");
		obj.value="";
		return false;
	}

	return true;				
}

function isValidEmail(email) 
{
	if (window.RegExp)
	{
		var reg1str = "(@.*@)|(\\.\\.)|(@\\.)|(\\.@)|(^\\.)";
		var reg2str = "^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,6}|[0-9]{1,3})(\\]?)$";
		var reg1 = new RegExp(reg1str);
		var reg2 = new RegExp(reg2str);
		if (!reg1.test(email) && reg2.test(email)) 
		{
			return true;
		}
		return false;
	} 
	else 
	{
		if(email.indexOf("@") >= 0)
			return true;
		return false;
	}
}

function isValidNumericChar(evnt) 
{
	var unicode=evnt.charCode? evnt.charCode : evnt.keyCode
	
	if (unicode<=46 || unicode>57 || unicode==47 || unicode==32)
	{ 
		if(unicode == 43 || unicode == 32 || unicode == 8  || unicode == 9)
			return true;	
		else
		{
			return false;
		}
	}
}

/*This function have not allow space and  allow dot(.)*/
function isValidNumericCharWithDot(evnt)
{
	var unicode=evnt.charCode? evnt.charCode : evnt.keyCode
	if (unicode<=46 || unicode>57 || unicode==47 || unicode==32)
	{
		if(( unicode == 32 || unicode == 8 || unicode == 9 || unicode == 45 || unicode == 46) && (unicode!=32) && (unicode!=116)  && (unicode!=45) && (unicode!=43))
			return true;
		else
			return false;
	}
}
	
function isValidAlphaNumericChar(evnt)
{
	var unicode=evnt.charCode? evnt.charCode : evnt.keyCode
	
	if((unicode>=65 && unicode<=90) ||(unicode>=97 && unicode<=122) || (unicode>=48 && unicode<=57) || unicode==8 || unicode==46) 
	{
		return true;
	} 
	else 
	{
		return false;
	}
}

function isValidMobileNumber(evnt)
{
	var unicode=evnt.charCode? evnt.charCode : evnt.keyCode
	if (unicode<47||unicode>57 || unicode==47)
	{
		if(unicode == 8 || unicode == 116 || unicode == 9)
			return true;
		else
			return false;
	}
}

function isValidTelephoneNumber(evntb)
{
	var unicode=evnt.charCode? evnt.charCode : evnt.keyCode

	if (unicode<47||unicode>57 || unicode==47)
	{
		if(unicode == 8 || unicode == 116 || unicode == 9)
		{
			return true;
		}
		else
			return false;
	}
}

function isValidNumber()
{
	val = event.keyCode;
	if(val<48)
	{
	  event.keyCode=0;
	
	}
	if(val>57)
	{
	  event.keyCode=0;	
	}
	return true;
}

function isValidURL(url)
{
	var url_str1=url.search(/^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$/);
	var url_str2=url.search(/^[http(s)://]+[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$/);	
	
	if(url_str1==-1 && url_str2==-1)
	{
		return false;	
	}
	else
	{
		return true;	
	}
}

function isValidImage(field_id)
{
	var imgpath = document.getElementById(field_id).value;
	
	if(imgpath != "")
	{
		// code to get File Extension..		
		var arr1 = new Array;		
		arr1 = imgpath.split("\\");
		var len = arr1.length;		
		var img1 = arr1[len-1];		
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		
		// Checking Extension		
		if(filext == "jpg" || filext == "jpeg" || filext == "gif" || filext == "bmp" || filext == "png" || filext=="tif")
		{
			//document.getElementById('imgUser').src = imgpath;
			/*alert('Valid Image');
			return true;*/
		}
		else	
		{	
			alert("Please upload only image");		
			document.getElementById(field_id).value = "";		
			return false;	
			//return "Please upload valid image file format";	
		}	
	}
}

function isImageOk(img) 
{
	// During the onload event, IE correctly identifies
	//any images that
	// weren't downloaded as not complete. Others should too. Gecko-based
	// browsers act like NS4 in that they report this incorrectly.
	if (!img.complete) 
	{
		return false;
	}
	
	// However, they do have two very useful properties:
	//naturalWidth and
	// naturalHeight. These give the true size of the image. If it failed
	// to load, either of these should be zero.
	if (typeof img.naturalWidth!= "undefined" && img.naturalWidth== 0) 
	{
		return false;
	}
	
	// No other way of checking: assume it's ok.
	return true;
}

//Call this function onLoad of body tag
function checkImages(img_src,img_width,img_height)
{
	for (var i = 0; i < document.images.length; i++) 
	{
		if (!isImageOk(document.images[i])) 
		{							
			if(img_src!='')
			{
				document.images[i].src=img_src;
			}
			if(img_width!='')
			{
				document.images[i].width=img_width;
			}
			if(img_width!='')
			{
				document.images[i].height=img_width;
			}
		}
	}
}
/* -------------------------------------------------------------------------------------------------------------------------*/
function tagShowHide(tagId,type) 
{
	var theTag = document.getElementById(tagId);

	if (theTag) 
	{
		if (theTag.style.display == 'none') 
		{
			tagShow(tagId,type);
		} 
		else 
		{
			tagHide(tagId);
		}
	}
}
function tagShow(tagId,type)
{
	var theTag = document.getElementById(tagId);
	if (theTag) 
	{
		if (theTag.style.display == 'none') 
		{
			if(type=='div')
			{
				theTag.style.display = 'block';
			}
			else
			{
				theTag.style.display = '';
			}
		}
	}
}		
function tagHide(tagId) 
{
	var theTag = document.getElementById(tagId);
	if (theTag) 
	{
		if (theTag.style.display != 'none') 
		{
			theTag.style.display = 'none';
		}
	}
}

/* -------------------------------------------------------------------------------------------------------------------------*/	
function windowOpen(theURL,winName,width,height,left,top)
{
	var win;
	var features='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width='+width+',height='+height+',left='+left+',top='+top+',screenX='+left+',screenY='+top;
	win=window.open(theURL,winName,features);
	win.focus();
}

function windowLocation(file)
{
	window.location=file;
}	

function refreshParentWindow() 
{
  window.opener.location.href = window.opener.location.href;

  if (window.opener.progressWindow)		
  {
	window.opener.progressWindow.close()
  }
  window.close();
}
  
/* -------------------------------------------------------------------------------------------------------------------------*/	



/* -------------------------------------------------------------------------------------------------------------------------*/
	
function checkRadioOption(radio,obj)
{
	if(radio.checked==1)
	{
		obj.disabled = false;
	}
	else if(radio.checked==0)
	{
		obj.disabled = true;
		obj.focus();
	}
} 

function checkAllCheckbox(obj,formname)
{					
	var len = document.forms[formname].elements.length;
	var obj_len = obj.name.length;
	
	for(i=0;i<len;i++) 
	{
		obj12 = document.forms[formname].elements[i].id;
		
		if((obj12.substring(0,obj_len) == obj.name) && (document.forms[formname].elements[i].type = "checkbox")) 
		{
			document.forms[formname].elements[i].checked = obj.checked;
		}
	}
}
function clearValue(input_id)
{
	document.getElementById(input_id).value='';
}

/* -------------------------------------------------------------------------------------------------------------------------*/
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

function textCounter(field,cntfield,maxlimit) 
{
	if (field.value.length > maxlimit)
	{
		field.value = field.value.substring(0, maxlimit);
	}
	else
	{
		cntfield.value = maxlimit - field.value.length;
	}
}

/* -------------------------------------------------------------------------------------------------------------------------*/
	
function delConfirm()
{
	ret=confirm('Are you sure you want to delete?');

	if(ret==false)
	{
		return false;
	}
	else 
	{
		return true;
	}
}	
	
function cancelConfirm()
{
	ret=confirm('Are you sure you want to Cancel?');

	if(ret==false)
	{
		return false;
	}
	else 
	{
		return true;
	}
}	
/* -------------------------------------------------------------------------------------------------------------------------*/
	
function displayDateTime(timeId)
{
	var months=new Array(13);
	months[1]="January";
	months[2]="February";
	months[3]="March";
	months[4]="April";
	months[5]="May";
	months[6]="June";
	months[7]="July";
	months[8]="August";
	months[9]="September";
	months[10]="October";
	months[11]="November";
	months[12]="December";
	
	var time=new Date();
	var lmonth=months[time.getMonth() + 1];
	var date=time.getDate();
	var year=time.getYear();
	if (year < 2000) 
	year = year + 1900; 
	
	//--- Get Time
	var now = new Date();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds()
	var timeValue = "" + ((hours >12) ? hours -12 :hours)
	if (timeValue == "0") timeValue = 12;
	timeValue += ((minutes < 10) ? ":0" : ":") + minutes
	//timeValue +=((seconds < 10) ? "0" : ":") + seconds
	timeValue += (hours >= 12) ? " PM" : " AM"
	
	//--- Get Day
	var days=new Array(7);
	days[0]="Sunday";
	days[1]="Monday";
	days[2]="Tuesday";
	days[3]="Wednesday";
	days[4]="Thursday";
	days[5]="Friday";
	days[6]="Saturday";
	var lday=days[time.getDay()];	
	
	var clocktime = lday + ", "  +lmonth + " " + date + ", " + year + " " + timeValue;
	
	if(document.getElementById(timeId)!=null)
	{
		document.getElementById(timeId).innerHTML = clocktime;
		setTimeout("displayDateTime()",1000);
	}
}	
	
function displayTime(timeId)
{
	var time = new Date();
	var hours = time.getHours();
	var timeOfDay = ( hours < 12 ) ? "AM" : "PM";
	var minutes = time.getMinutes();
	minutes=((minutes < 10) ? "0" : "") + minutes;
	var seconds = time.getSeconds();
	seconds=((seconds < 10) ? "0" : "") + seconds;
	var clocktime = hours + ":" + minutes + ":" + seconds + " " + timeOfDay;
	
	document.getElementById(timeId).innerHTML = clocktime;
	setTimeout("displayTime()",1000);
}	

function isValidImage(field_id)
{
	var imgpath = document.getElementById(field_id).value;
	
	/*var img = document.getElementById(field_id); 
	var file=img.files[0];
	alert(file.size);*/
	
	if(imgpath != "")
	{
		// code to get File Extension..		
		var arr1 = new Array;		
		arr1 = imgpath.split("\\");
		var len = arr1.length;		
		var img1 = arr1[len-1];		
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		
		// Checking Extension		
		if(filext == "jpg" || filext == "jpeg" || filext == "gif" || filext == "bmp" || filext == "png" || filext=="tif")
		{
			//document.getElementById('imgUser').src = imgpath;
			/*alert('Valid Image');
			return true;*/
		}
		else	
		{	
			alert("Please upload only image");		
			document.getElementById(field_id).value = "";		
			return false;	
			//return "Please upload valid image file format";	
		}	
	}
}