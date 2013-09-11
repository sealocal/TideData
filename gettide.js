//The gettide.js file is loaded by the SelectDayMaster.php file.
//The behavior of this file is to load XML data for the user-specified
//location, set the current date for the user, and retrieve the High and Low
//tides for the day with their respective times.  When the user changes the
//date, the checkDate() function will run and retrieve new data.

//This function retrieves the user's selected date (day, month, year, date) and returns it in an array.
function checkDate() {
  var date = document.getElementsByTagName("select");
  var day = date[0].value;
  var month = date[1].value;
  var year = date[2].value;

  return [month, day, year];
}

//This function converts the user's selected location into an XML path
//and redirects the browser to the home page if no location is selected.
//It is called when the SelectDay.php page loads.
function getLocationData() {
  //Determine user's selected location from HTML content, and create path variable
  var locationName = document.getElementById("SelectedLocation").innerHTML;
  locationName = locationName.toLowerCase();
  var xmlFilename = "data/" + locationName + ".xml";

  //Redirect users to the home page when there is no location selected
  if (xmlFilename === "data/.xml") {
    window.open("http://www.TideData.com/","_self");
  }
  
  //Store the XML document
  return locationData = loadXMLDoc(xmlFilename);
}


function getTide() {
  //check for date and store it in variables
  var date = checkDate();
  var month = parseInt(date[0], 10);
  var day = parseInt(date[1], 10);
  var year = parseInt(date[2], 10);
  var dateString = month + "/" + day + "/" + year;

  //Insert the date into the SPAN element
  document.getElementById("tabledate").innerHTML = dateString;
  
  //Shift the month value so it corresponds to the MONTH elements 
  //in the XML document tree
  month -= 1;

  //Disable date options that do not exist for a given month.
  //All months have 31 days, except...
  //April, June, September, and November have 30 days.
  if (month === 3 || month === 5 || month === 8 || month === 10) {
    document.getElementById("31").disabled = true;
  //Februrary for non-leap years has 28 days
  } else if (month === 1 && year % 4 !== 0) {
    document.getElementById("29").disabled = true;
    document.getElementById("30").disabled = true;
    document.getElementById("31").disabled = true;
  //Februray for leap years has 29 days
  } else if (month === 1) {
    document.getElementById("30").disabled = true;
    document.getElementById("31").disabled = true;
  } else {
    document.getElementById("29").disabled = false;
    document.getElementById("30").disabled = false;
    document.getElementById("31").disabled = false;
  }

  //Change day value so it corresponds to correct element tag in XML DOM structure.
  //There are 14 elements inside the root of each of the tidal data XML documents.
  //Internext Explorer will return 14.
  //Firefox will return 29.
  if (locationData.documentElement.childNodes.length === 29) {
    day = day * 2 + 3;
  } else if (locationData.documentElement.childNodes.length === 14) {
    day = day + 1;
  }

  //Finds tide data for the given date, formatted as a string.
  //Example: "01/04/2010 Mon 12:07AM LST -1.6 L 07:23AM LST 9.8 H 01:23PM LST 4.8 L 06:05PM LST 7.1 H"
  var tideChoice = locationData.getElementsByTagName("MONTH")[month].childNodes[day].childNodes[0].nodeValue;

  //Set the indexes of the times in tideChoice.
  //The first tide time will begin at the 16th character.
  var time1Index = 15;
  var time2Index = 35;
  var time3Index = 55;
  var time4Index = 75;

  //Set the indexes of the tides ("H" or "L").
  var tide1Index = 32;
  var tide2Index = 52;
  var tide3Index = 72;
  var tide4Index = 92;

  //Insert H and L labels into the HTML document.
  document.getElementById("firsttide").innerHTML = tideChoice.substr(tide1Index, 2);    
  document.getElementById("secondtide").innerHTML = tideChoice.substr(tide2Index, 2);
  document.getElementById("thirdtide").innerHTML = tideChoice.substr(tide3Index, 2);
  document.getElementById("fourthtide").innerHTML = tideChoice.substr(tide4Index, 2);

  //Insert times for each H and L tide into the HTML document.
  document.getElementById("tidetime1").innerHTML = tideChoice.substr(time1Index, 8);
  document.getElementById("tidetime2").innerHTML = tideChoice.substr(time2Index, 8);
  document.getElementById("tidetime3").innerHTML = tideChoice.substr(time3Index, 8);
  document.getElementById("tidetime4").innerHTML = tideChoice.substr(time4Index, 8);
}


function setToday() {
  //Declare a Date() object and store the date, month, and year separately
  var currentDate = new Date();  
  var todaysYear = currentDate.getFullYear();
  var todaysDate = currentDate.getDate();
  var todaysMonth = currentDate.getMonth();
  
  //Initialize an array for mapping the month integer to a three-letter abbreviation.
  var monthArray = new Array(12);
  monthArray[0] = "Jan";
  monthArray[1] = "Feb";
  monthArray[2] = "Mar";
  monthArray[3] = "Apr";
  monthArray[4] = "May";
  monthArray[5] = "Jun";
  monthArray[6] = "Jul";
  monthArray[7] = "Aug";
  monthArray[8] = "Sep";
  monthArray[9] = "Oct";
  monthArray[10] = "Nov";
  monthArray[11] = "Dec";

  //find the HTML SELECT elements and select the day, month, and year corresponding to the current date
  document.getElementById(todaysDate).selected = true;
  document.getElementById(monthArray[todaysMonth]).selected = true;
  //This line should set the date to the current year.
  //document.getElementById(todaysYear).selected = true;
  //However, the XML tidal data is outdated, so the year will be set to 2010 using this line.
  document.getElementById("2010").selected = true;

  getTide();
}


//This function inserats a note about the source of the data into the HTML document.
function footnote() {
  var tideNote = locationData.getElementsByTagName("FOOTNOTE")[0].childNodes[0].nodeValue;
  tideNote = "NOTE: " + tideNote + "All data is obtained from NOAA.";
  document.getElementById("note").innerHTML = tideNote;
}
