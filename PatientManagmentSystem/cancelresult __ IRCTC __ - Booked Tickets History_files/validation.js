//
// JavaScript Validation file
// Author: BroadVision
// Modified Date: 15/01/2002
// Modified By:   K.V.Vinod Kumar
// Description: This set of functions are general includes for validation
// They are designed in pairs the validation and the event function
// the event function will call the validation with the event src

//********************************************************//
// Function name: diffDates(sday, smon, syy, day, mon, yy)//
// Parameters: sday, smon, syy, day, mon, yy		  //
// Return : Void					  //
// Description :This function is used to check for the    //
// difference between two dates			          //
//****************************************************** //

function diffDates(sday, smon, syy, day, mon, yy){  
	var d1;
	var d2;
	var j1 = Number(sday);
	var m1 = getMonthChar(Number(smon));
	var y1 = Number(syy);
	var j2 = Number(day);
    var m2 = getMonthChar(Number(mon));
	var y2 = Number(yy);
	var sdate = j1+" "+m1+" "+y1;
	var cdate = j2+" "+m2+" "+y2;
	d1 = new Date(sdate);
	d2 = new Date(cdate);
	return Math.round((d2-d1)/86400000);
}
//********************************************************//
// Function name: isEmpty(s,txt_fld)                      //
// Parameters:s											  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the field is empty or not				          //
//********************************************************//
function isEmpty(s,txt_fld)
{  
        if ((s == null) || (s.length == 0)){	
			alert("Enter Value for  "+txt_fld);
           	 return false;
		}//end of if

       for (var i=0; i<s.length; i++){
           if(s.charAt(i) != " ")
		      return true;
           else{
		      alert("Enter Value for "+txt_fld);
		  	  return false
		   }//end of else
		 }//end of for
		 return true;
}//end of function

//********************************************************//
// Function name: isDigit (c)                            //
// Parameters:c											  //
//Return : number										  //
//Description :This function is used to validate          //
//whether the field Value is Digit or not		          //
//********************************************************//

function isDigit (c)
{   return ((c >= "0") && (c <= "9"));
}//end of function

//********************************************************//
// Function name: isLetterOrDigit (c)                     //
// Parameters:c											  //
//Return : Digit or Letter								  //
//Description :This function is used to validate          //
//whether the fields Value is Digit or Character          //
//********************************************************//
function isLetterOrDigit (c)
{
    return (isLetter(c) || isDigit(c)  || (c == "-") || (c == "'") || (c == " "));
}//end of function

//********************************************************//
// Function name:isLetter (c)                             //
// Parameters:c											  //
//Return : Letter										  //
//Description :This function is used to validate          //
//whether the field Value is Character or not	          //
//********************************************************//
function isLetter (c)
{     return (((c >= "a") && (c <= "z"))||((c >= "A") && (c <= "Z")));
}//end of function

//********************************************************//
// Function name:isInteger (s,msg)                        //
// Parameters:s											  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the field Value is Integer or not	              //
//********************************************************//
function isInteger (s,msg)

{   
     for (var i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);

        if (!isDigit(c)){
		  alert("Enter Numeric Value for " + msg);
           return false;    
        }//end of if
    }//end of for
    return true;
}//end of function

//********************************************************//
// Function name: isDateGreaterThanToday (day,month,year) //
// Parameters:day,month,year							  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the Date field Value is Greater than Current Date//
//********************************************************//

function isDateGreaterThanToday (day,month,year)
{
	 var Tday = Today.getDate();
	 var Tmonth = (Today.getMonth()) + 1;
	 var Tyear = Today.getFullYear();
	 
    if (Number(year.value) < Tyear) {
        alert("Reservation is Permitted for the Current Year Only");
		  return false;
	 }//end of if
	 else if (Number(year.value) == Tyear)
	     if (Number(month.value < Tmonth)){
            alert("Reservation is Permitted 2 Months Before Schedule");
		      return false;
	     }//end of if
	     else if (Number(month.value == Tmonth))
		  	    if (Number(day.value <= Tday)){
                 alert("Reservation is Permitted for Days After the Current Date");
		           return false;
	          }//end of else if
	 return true;
}//end of function
//********************************************************//
// Function name: isDateGreaterOrEqualThanToday (day,month,year) //
// Parameters:day,month,year							  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the Date field Value is Greater than Current Date//
//or Equal to the Current Date
//********************************************************//

function isDateGreaterOrEqualThanToday (day,month,year)
{
	 
	 var Tday = Today.getDate();
	 var Tmonth = (Today.getMonth()) + 1;
	 var Tyear = Today.getFullYear();
	 
    if (Number(year.value) < Tyear) {
         alert("Reservation is Permitted for the Current Year Only");
		  return false;
	 }//end of if
	 else if (Number(year.value) == Tyear)
	     if(Number(month.value < Tmonth))
		 {
             alert("Reservation is Permitted 2 Months Before Schedule");
		      return false;
	     }//end of if
	     else if (Number(month.value == Tmonth))
		  	    if (Number(day.value < Tday)){
                  alert("Reservation is Permitted for Days After the Current Date");
		           return false;
	          }//end of else if
	 return true;
}//end of function

//********************************************************//
// Function name: isDateGreaterOrEqualThanToday (day,month,year) //
// Parameters:day,month,year							  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the Date field Value is Greater than Current Date//
//or Equal to the Current Date
//********************************************************//
function isDateLowerThanToday (day,month,year)
{
	 var Tday = Today.getDate();
	 var Tmonth = (Today.getMonth()) + 1;
	 var Tyear = Today.getFullYear();
	 
    if(Number(year.value) > Tyear) 
	{
         alert("Reservation is Permitted for the Current Year Only");
		  return false;
	 }//end of if
	 else if (Number(year.value) == Tyear)
	     if (Number(month.value > Tmonth)){
             alert("Reservation is Permitted 2 Months Before Schedule");
		      return false;
	     }//end of if
	     else if (Number(month.value == Tmonth))
		  	    if (Number(day.value > Tday)){
                 alert("Reservation is Permitted for Days After the Current Date");
		           return false;
	          }//end of else if
	 return true;
}//end of function

//********************************************************//
// Function name: isDateLowerThanAYear (day,month,year)	  //
// Parameters:day,month,year							  //
//Return : Void											  //
//Description :This function is used to validate          //
//whether the Date field Value is Greater than Current Date//
//or Equal to the Current Date
//********************************************************//

function isDateLowerThanAYear (day,month,year)
{
	 var TdayMax = Today.getDate() - 1;
	 var TmonthMax = (Today.getMonth()) + 1;
	 var TyearMax = Today.getFullYear() + 1;
	 
    if (Number(year.value) > TyearMax){
        alert("Reservation is Permitted for the Current Year Only");
		  return false;
	 }//end of if
	 else if (Number(year.value) == TyearMax)
	     if (Number(month.value > TmonthMax)){
            alert("Reservation is Permitted 2 Months Before Schedule");
		      return false;
	     }//end of if
	     else if (Number(month.value == TmonthMax))
		  	    if (Number(day.value > TdayMax)){
                 alert("Reservation is Permitted for Days After the Current Date");
		           return false;
	          }//end of if
	 return true;
}//end of function

//********************************************************//
// Function name: nonEdit(t)							  //
// Parameters:t 						                  //
//Return : Void											  //
//Description :This function is used to make an text field//
//no editable by losing the focus of the field(s) and	  //
//setting the focus to another field(t)					  //
//********************************************************//
function nonEdit(t)
{t.focus();}//end of function

//********************************************************//
// Function name: nonEdit(t)							  //
// Parameters:t 						                  //
//Return : Void											  //
//Description :This function is used to make an global    //
//variable assign the text field name so that the pop up  //
//is able to assign the selected value from the popup     //
// to the calling form text field                         //
//********************************************************//

function getWinVal()
{}
//********************************************************//
// Function name: validemail(email)                       //
// Parameters:email										  //
// Return : Void										  //
// Description :This function is used to validate         //
// whether the email field is empty or not in e           //
// email format.										  //
//********************************************************//
//SUNIL/22-APR-2004/Registration Specifications/MOD BEGINS
//Valid email method is replced extended email validation functionality
function validemail(email)
{
// a very simple email validation checking. 
// you can add more complex email checking if it helps 
    if(email.length <= 0)
	{
	  return true;
	}
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
return false;
}
//SUNIL/22-APR-2004/Registration Specifications/MOD ENDS

function getMonthChar(Str){
	 var month;
	 switch(Str){
		case 1:
		  month ="Jan";
		  break;
		case 2:
		  month = "Feb";
		  break;
		   case 3:
		  month ="Mar";
		  break;
		   case 4:
		  month ="Apr";
		  break;
		   case 5:
		  month ="May";
		  break;
		   case 6:
		  month ="Jun";
		  break;
		   case 7:
		  month ="Jul";
		  break;
		   case 8:
		  month ="Aug";
		  break;
		   case 9:
		  month ="Sep";
		  break;
		   case 10:
		  month ="Oct";
		  break;
		   case 11:
		  month ="Nov";
		  break;
		   case 12:
		  month ="Dec";
		  break;
	 }
	 return month;
}
//code added as per ticket098	
//******************************************************//
// Function name: isProper(string)	    				//
// Parameters:string						            //
// Return : Void										//
// Description :This function is used to validate       //
// whether the field Value has some special characters  //
//******************************************************//
function isProper(string) {
   if (!string) return false;
   var iChars = "\\*|,\":<>[]{}`\';@&$#%~!^*-+=?_/.";
   for (var i = 0; i < string.length; i++) {
        if (iChars.indexOf(string.charAt(i)) != -1)
     	 return true;
   }
   return false;
} 
//code added as per ticket262
///////////code inserted by vinod 07-08-2002. as per karel mail 8/7/02 11:53 PM 
//Due to change in the date from selection from popup to list box
function getBirthChar(Str){
	 var month;
	 switch(Str){
		case '1':
		  month ="Jan";
		  break;
		case '2':
		  month = "Feb";
		  break;
		   case '3':
		  month ="Mar";
		  break;
		   case '4':
		  month ="Apr";
		  break;
		   case '5':
		  month ="May";
		  break;
		   case '6':
		  month ="Jun";
		  break;
		   case '7':
		  month ="Jul";
		  break;
		   case '8':
		  month ="Aug";
		  break;
		   case '9':
		  month ="Sep";
		  break;
		   case '10':
		  month ="Oct";
		  break;
		   case '11':
		  month ="Nov";
		  break;
		   case '12':
		  month ="Dec";
		  break;
	 }
	 return month;
}

// Birth Date validation function
function isDate()
{
	var yy,mm,dd;
	var im,id,iy;
	 mm = document.forms[0].serDay.value;
	 dd = document.forms[0].serMon.value;
	 yr  = document.forms[0].serYear.value;
	
	//var present_date = new Date();
	//yy = 1900 + present_date.getYear();
	yy = 1900 + yr;
	if (yy > 3000)
	{
		yy = yy - 1900;
	}
	 
	//mm = present_date.getMonth();
	//dd = present_date.getDate();
	im = document.forms[0].month.selectedIndex;
	id = document.forms[0].day.selectedIndex;
	iy = document.forms[0].year.selectedIndex;
	var entered_month = document.forms[0].month.options[im].value;
	var invalid_month = document.forms[0].month.options[im].value - 1; 
	var entered_day = document.forms[0].day.options[id].value; 
	var entered_year = document.forms[0].year.options[iy].value; 
	//alert("entered day"+entered_day);
	//alert("entered month"+entered_month);
	//alert("entered year"+entered_year);
	if ( (entered_day == 0) || (entered_month == 0) || (entered_year == 0) )
	{
		alert("Please enter your full date");
		document.forms[0].day.focus();
		return false;
	}
	if ( is_greater_date(entered_year,entered_month,entered_day,yy,mm,dd) && is_valid_day(invalid_month,entered_day,entered_year) )
	{
		return true; 
	}
	return false;
}

//Greater day function
function is_greater_date(entered_year,entered_month,entered_day,yy,mm,dd)
{
	
	if (entered_year > yy)
	{
		alert("The Date field is entered incorrectly. The year entered exceeds the current year.");
		return false;
	}
	if (entered_year == yy)
	{
		
		if (entered_month > mm)
		{
			alert("The Date field is entered incorrectly.");
			return false;
		}
		
		if (entered_month == mm)
		{
		
			if (entered_day > dd)
			{
				alert("The Date field is entered incorrectly.");
				return false;
			}
		}
	}
	return true;
}

// Valid day function
function is_valid_day(entered_month,entered_day,entered_year)
{
	if ((entered_year % 4) == 0) 
	{ 
		var days_in_month = "312931303130313130313031";
 	}
 	else 
	{ 
		var days_in_month = "312831303130313130313031";
 	} 
	var months = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
	if (entered_month != -1)
	{
		if (entered_day > days_in_month.substring(2*entered_month,2*entered_month+2))
		{
			alert ("The Date is entered wrongly (the day field value exceeds the number of days for the month entered).");
			return false;
		}
	}
	return true;
}
//******************************************************//
// Function name: dateAssign()	      				    //
// Parameters:Void       					            //
// Return : Void										//
// Description :This function is used to get the list   //
// box values and reassign the values to an hidden field//
//******************************************************//
function dateAssign(){
     
	 //code added by vinod on 07-08-2002		
		im = document.forms[0].month.selectedIndex;
		id = document.forms[0].day.selectedIndex;
		iy = document.forms[0].year.selectedIndex;
		var entered_month = getBirthChar(document.forms[0].month.options[im].value);
		var entered_day = document.forms[0].day.options[id].value; 
		var entered_year = document.forms[0].year.options[iy].value; 
		var birth = entered_day+"-"+entered_month+"-"+entered_year;
		//document.forms[0].txt_dt.value = birth;
		document.forms[0].txt_dt.value = birth;
	
	//end code added by vinod on 07-08-2002	
}

// sharath

/********************************************************/
// Function name: isAlphabet (s,msg)                     //
// Parameters:string,string								 //
//Return : boolean										 //
//Description :This function is used to validate         //
//whether the given string  contains only Alphabets 	 //
//********************************************************//
function isAlphabet (str,msg)
{
	for(var i=0; i<str.length; i++)
	{
		var c = str.charAt(i);
		if(!isLetters(c))
		{
			alert("Enter Only Alphabets for " + msg);
			return false;
		}
	}
	return true;
}

function verify(a)
{
	if(a.indexOf('(')<0 && a.indexOf(')')<0 )
	{
		if(a.length>4)		
		return 3;	
	return 1;
	}
	
	else if(a.indexOf('(')<0 || a.indexOf(')')<0 )
		return 0;
	else
	{
		var q = a.indexOf('(');
		var w = a.indexOf(')');
		var z = w-q-1;
		if(z>0 && z<5)
		   return 1;
		else 
			return 0;
	}
}
function isLetters(c)
{     return (((c >= "a") && (c <= "z"))||((c >= "A") && (c <= "Z")) ||(c=="(" || c==")" ) || (c==" "));
}//end of function

function equal(fromStation,toStation)
{
	if(fromStation.indexOf("(")<0 && fromStation.indexOf(")")<0 && toStation.indexOf("(")<0 && toStation.indexOf(")")<0 )
	{
		if(fromStation==toStation)
			return true;			
	}
	else	
	{
		var sf = fromStation.substring(fromStation.indexOf("(")+1,fromStation.indexOf(")"));
		var ss = toStation.substring(toStation.indexOf("(")+1,toStation.indexOf(")"));
		if(sf.length==ss.length)
		{			
			if(sf==ss)
				return true;
		}	
	}	
	return false;	
}
// passengerList

function isSpace(s) 
{
	 if ((s == ""))	return true;		
	 for(i=0;i<s.length;i++)
	{
		 if(s.charAt(i)!=" ") return false;
	}
	return true;
}
function isPassengerLetter(c)
{   
	return (((c >= "a") && (c <= "z")) || ((c>="A") && (c<="Z")) || (c==" "));
}
function isPassengerAlphabet(str)
{
	for(i=0; i<str.length; i++)
	{
		if(!isPassengerLetter(str.charAt(i)))
			return false;
	}
	return true;
}


	