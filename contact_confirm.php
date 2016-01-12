<?php
// start your php code

//set date
$date = date("H:i, jS F Y");
//remove new lines from comments and replace with <br> for HTML
$messagehtml = preg_replace("/(\015\012)|(\015)|(\012)/","&nbsp;<br/>", $message);
$messageemail = preg_replace("/(\015\012)|(\015)|(\012)/","\n", $message);

//set the format of the email to be sent
$emailbody = "Contact form results from kennethreilly.com:

Date:          $date
Name:          $name
Email:         $email
Subject:       $subject
Message:       $messageemail
";

// set the variables for your email message
$emailto = "kreilly@visi.com";
$emailsubject = "$subject";
$emailfromaddr = "kenneth@kennethreilly.com";
$emailfromname = "Kenneth Reilly";
// don't edit these next two lines
$emailheaders = "From: $emailfromname <$emailfromaddr>\n";
$emailheaders .= "Reply-To: $emailfromaddr\n";
// you can uncomment these line if you want to cc or bcc another email
//$emailheaders .= "cc: ken@atomictech.com\n";
//$emailheaders .= "bcc: yazzer@badlan.com\n";

// this mail command send out the email
mail( $emailto, $emailsubject, StripSlashes($emailbody), $emailheaders);

// if you want to send the person a confirmation email, 
// simply set a few more variables

// $email already holds the value of their email address
$subject2 = "$name, Thanks for contacting me!";
$emailbody2 = "I have received the contact form that you submitted:

Date:          $date
Name:          $name
Email:         $email
Subject:       $subject
Message:       $messageemail

I will reply to your message shortly. If you haven't heard from 
me in a couple days, please feel free to contact me.

Thanks,
Kenneth Reilly
ken@atomictech.com
651-329-7711
";

// create another mail command like this one:
mail( $email, $subject2, StripSlashes($emailbody2), $emailheaders);

// end your php code
?>


<html><!-- #BeginTemplate "/Templates/iblue.dwt" -->
<head>
<!-- #BeginEditable "doctitle" --> 
<title>Contact</title>
<!-- #EndEditable --> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v3.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    if ((nbArr = document[grpName]) != null)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = args[i+1];
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
<script language="JavaScript">
function breadCrumbs(base, delStr, defp, cStyle, tStyle, dStyle, nl) {
    loc = window.location.toString();
    subs = loc.substr(loc.indexOf(base) + base.length + 1).split("/");
    document.write("<a href=\"" + getLoc(subs.length - 1) + defp + "\" class=\"" + cStyle + "\">Home</a>  " + "<span class=\"" + dStyle + "\">" + delStr + "</span> ");
    a = (loc.indexOf(defp) == -1) ? 1 : 2;
    for (i = 0; i < (subs.length - a); i++) {
        subs[i] = makeCaps(unescape(subs[i]));
        document.write("<a href=\"" + getLoc(subs.length - i - 2) + defp + "\" class=\"" + cStyle + "\">" + subs[i] + "</a>  " + "<span class=\"" + dStyle + "\">" + delStr + "</span> ");
    }
    if (nl == 1) {
        document.write("&nbsp");
    }
    document.write("<span class=\"" + tStyle + "\">" + document.title + "</span>");
}

function makeCaps(a) {
    g = a.split(" ");
    for (l = 0; l < g.length; l++) {
        g[l] = g[l].toUpperCase().slice(0, 1) + g[l].slice(1);
    }
    return g.join(" ");
}
 
function getLoc(c) {
    var d = "";
    if (c > 0) {
        for (k = 0; k < c; k++) {
            d = d + "../";
        }
    }
    return d;
}
 </script>
<link rel="stylesheet" href="/includes/sytles_blue.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('/images/nav/home_01-over.gif','/images/nav/resume_01-over.gif','/images/nav/projects_01-over.gif','/images/nav/links_01-over.gif','/images/nav/contact_01-over.gif','/images/nav/contact_01.gif')">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="5%">&nbsp;</td>
    <td width="90%"> 
      <div align="center"> <img src="/images/kennethreilly.gif" width="368" height="68"></div>
    </td>
    <td width="5%"><img src="/images/pixel.gif" width="25" height="25"></td>
  </tr>
  <tr> 
    <td width="5%" valign="top"> 
      <table border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td><a href="/index.htm" onClick="MM_nbGroup('down','group1','home','',1)" onMouseOver="MM_nbGroup('over','home','/images/nav/home_01-over.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="home" src="/images/nav/home_01.gif" border="0" onLoad=""></a></td>
        </tr>
        <tr> 
          <td><a href="/resume.htm" onClick="MM_nbGroup('down','group1','resume','',1)" onMouseOver="MM_nbGroup('over','resume','/images/nav/resume_01-over.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="resume" src="/images/nav/resume_01.gif" border="0" onLoad=""></a></td>
        </tr>
        <tr> 
          <td><a href="/projects.htm" onClick="MM_nbGroup('down','group1','projects','',1)" onMouseOver="MM_nbGroup('over','projects','/images/nav/projects_01-over.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="projects" src="/images/nav/projects_01.gif" border="0" onLoad=""></a></td>
        </tr>
        <tr> 
          <td><a href="/links.htm" onClick="MM_nbGroup('down','group1','links','',1)" onMouseOver="MM_nbGroup('over','links','/images/nav/links_01-over.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="links" src="/images/nav/links_01.gif" border="0" onLoad=""></a></td>
        </tr>
        <tr> 
          <td><a href="/contact.htm" onClick="MM_nbGroup('down','group1','contact','',1)" onMouseOver="MM_nbGroup('over','contact','/images/nav/contact_01-over.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="contact" src="/images/nav/contact_01.gif" border="0" onLoad=""></a></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> 
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
              &nbsp;Thanks for visiting!<br>
              &nbsp;<img src="/images/kpr_signature_sm.gif" width="125" height="55"> 
              </font></p>
          </td>
        </tr>
      </table>
      <p><img src="/images/pixel.gif" width="35" height="50"><img src="/images/usaribbon.gif" width="55" height="87"><br>
        <img src="/images/pixel.gif" width="150" height="10"> </p>
    </td>
    <td width="90%" valign="top"> <!-- #BeginEditable "title" -->
      <h1> Contact</h1>
      <!-- #EndEditable -->
<p>
	<!-- #BeginEditable "copy" --> 
      <h2>Contact Confirmation</h2>
      <blockquote><form name="contact_form" method="post" action="contact_confirm.php">
		<input type="hidden" name="somenotes" value="contact_form_sent_from_mywebsite">
          <table width="450" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td colspan="2"><strong>Here is the information that has been sent:</strong></td>
            </tr>
            <tr> 
              <td width="125">Name:</td>
              <td width="325"><?=$name?> 
              </td>
            </tr>
            <tr> 
              <td width="125">Email Address:</td>
              <td width="325">
                <?=$email?>
              </td>
            </tr>
            <tr> 
              <td width="125">Subject:</td>
              <td width="325"> 
                <?=$subject?>
              </td>
            </tr>
            <tr valign="top"> 
              <td width="125">Message:</td>
              <td width="325"> 
                <?=StripSlashes($messagehtml)?>
              </td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
		  <p><a href="/contact.htm"> Click here</a> to return to the <a href="/contact.htm">Contact</a> 
            page.</p>
        </form>
        <p><strong> </strong></p>
        <p>&nbsp;</p>
      </blockquote>
      <!-- #EndEditable -->
	</p>
	</td>
    <td width="5%" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="5%">&nbsp;</td>
    <td width="90%"> 
      <hr width="80%">
      <p> 
        <script language="JavaScript">
 breadCrumbs("www.kennethreilly.com","::","index.html","None","None","None","1");
</script>
      </p>
      <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">All 
        logos and trademarks in this site are property of their respective owner.<br>
        All other material is &copy; 2001 by Kenneth Reilly</font></p>
      <p align="center"><a href="http://www.atomictech.com"><img src="http://www.badlan.com/images/powered/atomictech2.gif" border="0" alt="AtomicTech.com"></a></p>
    </td>
    <td width="5%">&nbsp;</td>
  </tr>
</table>
</body>
<!-- #EndTemplate --></html>
