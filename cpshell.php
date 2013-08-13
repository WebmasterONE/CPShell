<?php
######################################################################################
#  Copyright (C) 2012 Elite.So. All rights reserved.
#
#  This program is free software; you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation; either version 2 of the License, or
#  (at your option) any later version.
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
######################################################################################

header("Content-Type: text/html\n\n");

// *** Common variables ***
$cpAppName = 'CP Shell';
$cpAppVersion = '1.0 Beta Version';

// *** update stuff *** //
function checkUpdate()
{
	$newv = file_get_contents('http://www.elite.so/cpshell/vrsctl.db');
	$thisv = shell_exec("cat /usr/local/cpanel/whostmgr/docroot/cgi/cpshell/verctl.db");
	if ($newv != $thisv)
	{
		return true;
	}
	else {
		return false;
	}
}
// *** end update stuff *** //
$user = getenv('REMOTE_USER');
if($user != "root") { echo "You do not have the proper permissions to access CPShell..."; exit; }
$run = "Down";
$checkstat = shell_exec("ps -A");
if(strstr($checkstat,"sshd")) { $run = "UP"; }
 ob_start();
 if (!empty($_GET['cmd'])){
 $ff=$_GET['cmd'];
 #shell_exec($ff);
 system($ff);
 #exec($ff);
 #passthru($ff);
 }
 else {
?>
<html>
<head>
<title><?php echo $cpAppName; ?></title>
<meta name="description" content="WHM Plug-in to use ssh without needing putty for cPanel servers" />
<link rel='stylesheet' type='text/css' href='/themes/x/style_optimized.css' />
<script type="text/javascript" language="javascript">var CommHis=new Array();var HisP;
function doReq(_1,_2,_3){var HR=false;if(window.XMLHttpRequest){HR=new XMLHttpRequest();if(HR.overrideMimeType){HR.overrideMimeType("text/xml");}}
else{if(window.ActiveXObject){try{HR=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{HR=new ActiveXObject("Microsoft.XMLHTTP");}
catch(e){}}}}if(!HR){return false;}HR.onreadystatechange=function(){if(HR.readyState==4){
if(HR.status==200){if(_3){eval(_2+"(HR.responseXML)");}else{eval(_2+"(HR.responseText)");}}}};HR.open("GET",_1,true);HR.send(null);}
function pR(rS){var _6=document.getElementById("outt");var _7=rS.split("nn");
var _8=document.getElementById("cmd").value;_6.appendChild(document.createTextNode(_8));
_6.appendChild(document.createElement("br"));for(var _9 in _7){var _a=document.createElement("pre");
_a.style.display="inline";line=document.createTextNode(_7[_9]);_a.appendChild(line);_6.appendChild(_a);
_6.appendChild(document.createElement("br"));}_6.appendChild(document.createTextNode(":-> "));_6.scrollTop=_6.scrollHeight;
document.getElementById("cmd").value="";}function keyE(_b){switch(_b.keyCode){
case 13:var _c=document.getElementById("cmd").value;if(_c){CommHis[CommHis.length]=_c;HisP=CommHis.length;var _d=document.location.href+"?cmd="+escape(_c);
doReq(_d,"pR");}break;
case 38:if(HisP>0){HisP--;document.getElementById("cmd").value=CommHis[HisP];}break;
case 40:if(HisP<commHis.length-1){HisP++;document.getElementById("cmd").value=CommHis[HisP];}break;default:break;}}
</script>
<script type="text/javascript">
function okay() {
if(confirm('Are you sure of save configuration?')) {
document.getElementById('okay').submit();
}
return false;
}
function clog() {
document.getElementById('log').submit();
}
</script>
<style>
div#wrap {
margin: 0 auto;
width: 700px;
}
</style>
</head>
<body class="yui-skin-sam">
<div id="pageheader">
        <div id="breadcrumbs">
                <p>&nbsp;<a href="/scripts/command?PFILE=main">Main</a> &gt;&gt; <a href="cpshell.php" class="active"><?php echo 
$cpAppName; ?></a></p>
        </div>
<div id="doctitle"><h1><?php echo $cpAppName; ?> (v<?php echo $cpAppVersion; ?>)</h1></div>
</div>
<div id="wrap">
<!-- content -->
<form onsubmit="return false" style="color:#3F0;background:#000;position:relative;min-height:300px;max-height:350px">
<div id="outt" style="overflow:auto;padding:5px;height:90%;min-height:300px;max-height:350px">:-></div>
<input tabindex="1" onkeyup="keyE(event)" style="color:#FFF;background:#333;width:100%;" id="cmd" type="text" />
</form>
<?php
echo "SSH Service Status: <font style=\"color: #0c0\"><b>{$run}</b></font>";
if (checkUpdate())
{
	echo '<br><p><b><u><a href="cpshell.php?op=update">Update Available!</a></u></b></p><br>';
}
?>
<p style="color: #03F"><b>What is Shell?</b></p>
<p>Cron is used to schedule jobs (commands or shell scripts) to run periodically at fixed times, dates, or intervals.<br></p>
<p style="color: #03F"><b>About CPShell</b></p>
<p>Crontab Admin was created so cPanel & WHM System Administrators can edit the crontab file of the dedicated server without needing to use ssh.<br></p>
<p>For Support Visit <a href="http://www.elite.so" target='_blank'>Elite.So</a></p>
<p>SS5 Manager: v<?php echo $cpAppVersion; ?></p><p>©2013, <a href="http://www.elite.so" target='_blank'>Elite.So</a></p>
</div>
</body>
</html>
<?php } ?>