<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Enquiry</title>
<style type="text/css">
/* Outlook link fix */
#outlook a {
	padding: 0;
}
/* Hotmail background &amp; line height fixes */
.ExternalClass {
	width: 100% !important;
}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
	line-height: 100%;
}
/* Image borders &amp; formatting */
img {
	outline: none;
	text-decoration: none;
	-ms-interpolation-mode: bicubic;
}
a img {
	border: none;
}
/* Re-style iPhone automatic links (eg. phone numbers) */
.applelinks a {
	color: #222222;
	text-decoration: none;
}
/* Hotmail symbol fix for mobile devices */
.ExternalClass img[class^=Emoji] {
	width: 10px !important;
	height: 10px !important;
	display: inline !important;
}
.tpl-content {
	display: inline !important;
}
</style>
</head>

<body style="padding:0; margin:0; background:#000000;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#000000;">
  <tr>
    <td align="center"><!--[if (gte mso 9)|(IE)]>
<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" >
<![endif]-->
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:650px;" >
        <tr>
          <td style="background:#FFF; padding:15px 10px; border:#ddd solid 1px; "><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="70" width="66"  style="font-size:0px; line-height:0px;"><img src="<?php echo base_url()?>site/web/images/logo.png" style="width: 200px;"></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td style="font-size:0px; line-height:0px;" height="15">&nbsp;</td>
              </tr>
              <tr>
                <td style="padding:10px 0 10px 20px; line-height:22px; font-size:14px; font-family:tahoma, arial; color:#333">Hi</td>
              </tr>
              <tr>
                <td style="background:#fff; padding:20px 15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td style="font-size:14px; line-height:22px; color:#333; font-family:tahoma, arial; padding:8px 0;"> New Enquiry for your book: <?php echo $book_name;?> </td>
                    </tr>
                    <tr>
                      <td style="font-size:14px; line-height:22px; color:#333; font-family:tahoma, arial; padding:8px 0;">
					  <table width="50%">
						<tr>
							<td width="25%">Name: </td>
							<td><?php echo $enquiry_name;?></td>
						</tr>
						<tr>
							<td>Email: </td>
							<td><?php echo $enquiry_mail;?></td>
						</tr>
						<tr>
							<td>Phone: </td>
							<td><?php echo $enquiry_phone;?></td>
						</tr>
						<tr>
							<td>Time: </td>
							<td><?php echo date("d-m-Y h:i A",strtotime($createdTime));?></td>
						</tr>
					  </table>
					  <br>
					  </td>
                    </tr>
                    <tr>
                      <td height="5" style="font-size:0px; line-height:0px;"></td>
                    </tr>
                    <tr>
                      <td style="font-size:14px; color:#666; font-family:tahoma, arial;"> Enjoy </td>
                    </tr>
                    <tr>
                      <td style="font-size:14px; color:#333; font-family:tahoma, arial">Usedbooks4u</td>
                    </tr>
                    <tr>
                      <td style="font-size:0px; line-height:0px" height="20">&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="font-size:14px; line-height:0px; color:#333; font-family:tahoma, arial; padding:8px 0;"> We would love to hear from you on <a href="">contact@usedbooks4u.com</a> <br></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td style="font-size:0px; line-height:0px;" height="10">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" style="font-size:14px; color:#333; font-family:tahoma, arial; text-align:center; padding:0 0 20px 0; ">Buy your favourite Books!</td>
              </tr>
              <tr>
                <td style="font-size:0px; line-height:0px;" height="10">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
        <td style="background:#8e061e; text-align:center; font-size:12px; line-height:18px; color:#fff; font-family:tahoma, arial; padding:13px" align="center">&copy;(2017) Usedbooks4u. All rights reserved.</td>
        </tr>
      </table>
      
      <!--[if (gte mso 9)|(IE)]>
</table>
<![endif]--></td>
  </tr>
</table>
</body>
</html>