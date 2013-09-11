//This file contains only the loadXMLDoc function.
//When called, the browser will return the
//XML file that is stored at the path specified by
//the xmlFilename parameter.

function loadXMLDoc(xmlFilename)
{
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
  } else {
	//For Internet Explorer
    try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
      catch (e) {}
    try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
      catch (e) {}
    try { return new ActiveXObject("Msxml2.XMLHTTP"); }
      catch (e) {}
    throw new Error(
	  "Try using a different web browser, like Firefox, Chrome, or Safari." +
      "  If you report the error to us, we will fix the problem in the future.");
  }

  //Open the XML file
  xhttp.open("GET", xmlFilename, false);

  //Do not send any information.
  xhttp.send(null);

  //Return the XML file in the form of a responseXML
  return xhttp.responseXML;
} 