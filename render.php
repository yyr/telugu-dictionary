<html>
<head>
<title>Rendering Problems</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"><!--
#ques {
                        background:SteelBlue ;
                        color: Navy;
                        font-family:sans;
                        font-weight: bold;
                        font-size : 14;
                        padding: 2px;
                }

#dict {
        text-decoration: none;
        color: grey;
        font-family: sans;
        font-size: smaller;
}

--></style>
</head>
<body bgcolor="LightSteelBlue">
<form>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td colspan="2" rowspan="1" style="text-align: center;"><img style="width: 138px; height: 132px;" alt="Swecha Dictionary" src="logo_dictionary14.png"><div><a id="dict" href="http://ltrc.iiit.net/onlineServices/Dictionaries/Eng-Tel-DictDwnld.html">Charles Philip Brown English-Telugu Dictionary</a></div>
</td>
</tr>
<tr></tr></tbody></table>
<table style="width:100%; text align: left; margin-left: auto; margin-right:auto;" border="0" cellpadding="10" cell spacing="2">
<tbody>
<tr>
<td  id="ques" style="text-align: left; font-size:100%; color:Navy">Do i need to install anything?</td></tr>
<tr><td style="text-align: left; font-size:90%; color:Navy">&nbsp;&nbsp;You should have the Unicode fonts for the Indian language in which you are going to give your suggestions.</td></tr>
<tr>
<td  id="ques" style="text-align: left; font-size:100%; color:Navy">How do I install Indian Language fonts?</td></tr>
<tr><td  style="text-align: left; font-size:90%; color:Navy">&nbsp;&nbsp;&nbsp;&nbsp;Unicode fonts for Indian languages are available online.<br/><br>
			For Telugu, you can get <a href="http://www.kavya-nandanam.com/dload.htm" >Pothana2000</a> 
			font from <a href="http://www.kavya-nandanam.com/" >Kavya-nandanam</a>. <br /><br />
			<b> Installing fonts for GNU/Linux applications</b><br />
			<div style="padding:25px;padding-bottom:15px;padding-top:10px">

			 
			   1. Unzip the font package file and find Pothana2000.ttf<br />
			   <div style="padding:25px;padding-bottom:15px;padding-top:10px;">
			   <table  frame="border" width="600"><tr><td style= "color:Navy">
				<code >	$ unzip Pothana2k.zip</code>
			   </td></tr></table>
			   </div>
			   2. Copy this file to ".fonts" directory in your home directory<br />

			   <div style="padding:25px;padding-bottom:15px;padding-top:10px">
			   <table  frame="border" width="600"><tr><td style= "color:Navy">
				<code>	$ mkdir ~/.fonts<br />
					copy Pothana2000.ttf ~/.fonts<br /></code>
			   </td></tr></table>
			   </div>
			   3. Update the font cache<br />

			   <div style="padding:25px;padding-bottom:15px;padding-top:10px">
			   <table frame="border" width="600"><tr><td style= "color:Navy">
				<code>	$ fc-cache<br /></code></td></tr></table>
			   </div>
			</div>

		</td>

	</tr>
<tr><td id="ques" style="text-align: left; font-size:100%; color:Navy">I cannot see Indian language characters in my web browser.</td>
        </tr>
<tr><td style="text-align: left; font-size:90%; color:Navy"><br>&nbsp;&nbsp;You have to setup your web browser in order for you to see Indian language characters

                You can choose from the many available web browsers. Currently Konqueror, Mozilla and Firefox
                are known to render Indian languages properly.<br /> <br />
                <b>Konqueror</b><br /><br>

                &nbsp;&nbsp;&nbsp;&nbsp;Konqueror renders Indian languages properly if it uses Qt version 3.2 or above.
                Typically you have the required Konqueror if you are running KDE 3.2 or above.<br /><br />
                <b>Mozilla</b><br /><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Mozilla browser that is readily avaiable on most distributions ''does not'' properly render
                Indian languages text. You need to get an
                <a href="ftp://ftp.mozilla.org/pub/mozilla.org/mozilla/releases/mozilla1.7/contrib/mozilla-1.7-i686-pc-linux-gnu-gtk2-xft-pango.tar.gz">Indic enabled build </a>
 of Mozilla 1.7 from the
                <a href="ftp://ftp.mozilla.org/pub/mozilla.org/mozilla/releases/mozilla1.7/contrib/">contributed builds</a>.
                <br /><br>On Fedora Core 3, you do not need to download the special build because Mozilla already has the capability to render Indian language text.
                But it has to be enabled explictly while running Mozilla. To start Mozilla use the following command on the shell:<br /><br>

                <div style="padding:25px;padding-bottom:15px;padding-top:10px">

                <table  frame="border" width="600"><tr><td style="color:Navy">
                        <code>$ MOZ_ENABLE_PANGO=1 mozilla</code>
                </td></tr></table>
                </div>


                <b>Firefox</b><br /><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Firefox build that is readily available on most distributions ''does not'' properly render
                Indian languages text. You need to get an
                <a href="http://bunny.medhas.org/download/firefox-1.0.en-US.linux-pango_patch-xft-gtk2-i686.tar.gz">Indic enabled build</a>
                 of Firefox 1.0.
<br /><br>On Fedora Core 3, you do not need to download the special build because Mozilla already has the capability to render Indian language text.
                But it has to be enabled explictly while running Mozilla. To start Mozilla use the following command on the shell:<br /><br>


                <div style="padding:25px;padding-bottom:15px;padding-top:10px">
                <table  frame="border" width="600"><tr><td style="color:Navy">
                        <code>
                        $ MOZ_ENABLE_PANGO=1 firefox
                        </code>
                </td></tr></table>
                </div>

                </td>
        </tr>
</tbody></table></form><body><html>
