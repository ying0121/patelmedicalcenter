<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--<![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <style type="text/css">
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; font-family: 'Muli', Arial, Helvetica, sans-serif !important; }
table { border-spacing: 0; table-layout: fixed; margin: 0 auto; }
table table table { table-layout: auto; }
img { display: block !important; overflow: hidden !important; }
.yshortcuts a { border-bottom: none !important; }

img:hover { opacity:0.9 !important;}
.textbutton a { font-family: 'Muli', Arial, Helvetica, sans-serif !important;}
.btn-link-1 a { color: #4A4A4A !important; }

/*Responsive*/
@media only screen and (max-width: 640px) {
body { width: auto !important; font-family: 'Muli', Arial, Helvetica, sans-serif !important;}
.table-inner { width: 90% !important;  max-width: 90%!important;}
.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important;}
.line { width: 49%!important; max-width: 49%!important;}
}

@media only screen and (max-width: 479px) {
body { width: auto !important; font-family: 'Muli', Arial, Helvetica, sans-serif !important;}
.table-inner{ width: 90% !important; text-align: center !important;}
.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important;}
.line { width: 49%!important; max-width: 49%!important;}
.panel-padding {height: 15px !important;}
}
</style>
</head>

<body>
  <repeater>
    <!--header 2-->
    <layout label="header 2">
      <table bgcolor="#F8F8F8" width="900px" style="margin: 0 auto;border: 1px solid #eee;border-bottom: none;" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <!--logo-->
            <table bgcolor="#FFF" width="100%" class="table-full" align="left" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td style="line-height: 0px;"><img src="<?php echo base_url(),'assets/images/logo.png'; ?>" alt="image" width="200" style="display:block; line-height:0px; margin: 20px; font-size:0px; border:0px;" editable label="logo" /></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td align="center" background="<?php echo base_url(),'assets/images/newsimg/'; ?><?php echo $data['img'] ?>" style="background-size: cover; background-position: top;">
            <table width="100%" style="max-width: 100%; height: 300px;" class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                  <table width="25" align="left" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                  <!--social-->
                  <table class="table-full" align="right" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="35"></td>
                    </tr>
                  </table>
                  <!--end social-->
                </td>
              </tr>
            </table>
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25" style="line-height:0px; font-size:0px;"><img src="<?php echo base_url(),'assets/images/newsletter/bottom-fade.png'; ?>" width="100%" height="30" alt="img" /></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </layout>
    <!--end header 2-->
    <!--1/2 right feature-->
    <layout label="1/2 right feature">
      <table bgcolor="#F8F8F8" width="900px" border="0" style="margin: 0 auto;border: 1px solid #eee;border-top: none;border-bottom: none;" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">
            <table width="620px" class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <table class="table-full" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center">
                        <table class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" style="text-align: center; padding-top: 50px; font-size: 25px;color: #4a4a4a; font-weight: bold; letter-spacing: 2px;">
                              <singleline label="headline"><?php echo $data['header'] ?></singleline>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" style="text-align: center; font-size: 16px;color: #4a4a4a; letter-spacing: 2px;">
                              <?php echo $data['author'] ?> - <?php echo $data['published'] ?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table width="620" class="table-inner" style="max-width: 620px; font-size: 16px;" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25"></td>
              </tr>
              <tr>
                <td>
                  <?php echo $data['desc'] ?>
                </td>
              </tr>
              <tr>
                <td height="25"></td>
              </tr>
              <tr>
                <td align="left">
                  <?php
                    if (count($edu_data['docs']) > 0){
                      echo "
                        <div style='font-size: 20px; color: #4a4a4a; font-weight: bold; letter-spacing: 2px;'>
                          Documents
                        </div>";
                      echo "<ul>";
                      for($i = 0;$i < count($edu_data['docs']);$i++){
                        $doc = $edu_data['docs'][$i];
                        echo "
                        <li style='font-size: 16px;'>
                          <a title='{$doc['desc']}' href='{$doc['url']}'>{$doc['name']}</a>
                        </li>";
                      }
                      echo "</ul>";
                    }
                  ?>
                  <?php
                    if (count($edu_data['videos']) > 0){
                      echo "
                        <div style='font-size: 20px; color: #4a4a4a; font-weight: bold; letter-spacing: 2px;'>
                          Videos
                        </div>";
                      echo "<ul>";
                      for($i = 0;$i < count($edu_data['videos']);$i++){
                        $doc = $edu_data['videos'][$i];
                        echo "
                          <li style='font-size: 16px;'>
                            <a href='{$doc['url']}'>{$doc['url']}</a>
                          </li>";
                      }
                      echo "</ul>";
                    }

                  ?>
                </td>
              </tr>
              <tr>
                <td height="25"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </layout>
    <!--end 1/2 right feature-->
  </repeater>
  <!--footer-->
  <table bgcolor="#F8F8F8" width="900px" border="0" style="margin: 0 auto;border: 1px solid #eee;" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" bgcolor="#FFFFFF">
        <table width="620" style="max-width: 620px;" class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">
              <table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25"></td>
                </tr>
                <!--social-->
                <tr>
                  <td align="center">
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" style="line-height: 0px;"><img src="<?php echo base_url(),'assets/images/newsletter/fb.png'; ?>" alt="image" width="20" style="display:block; line-height:0px; font-size:0px; border:0px;" editable label="social-1" /></td>
                        <td width="10"></td>
                        <td align="center" style="line-height: 0px;"><img src="<?php echo base_url(),'assets/images/newsletter/tw.png'; ?>" alt="image" width="20" style="display:block; line-height:0px; font-size:0px; border:0px;" editable label="social-2" /></td>
                        <td width="10"></td>
                        <td align="center" style="line-height: 0px;"><img src="<?php echo base_url(),'assets/images/newsletter/in.png'; ?>" alt="image" width="20" style="display:block; line-height:0px; font-size:0px; border:0px;" editable label="social-3" /></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!--end social-->
                <tr>
                  <td height="10"></td>
                </tr>
                <!--copyright-->
                <tr>
                  <td align="center" style="font-size: 12px;color: #747474;">
                    <singleline label="copyright">Copyright © <?php echo date("Y"); ?>, All rights reserved.</singleline>
                  </td>
                </tr>
                <!--end copyright-->
                <tr>
                  <td height="5"></td>
                </tr>
                <!--preference-->
                <tr>
                  <td class="btn-link-1" align="center" style="font-size: 12px;color: #747474;">
                    <webversion>Best Care Ever Med Group</webversion>
                  </td>
                </tr>
                <!--end preference-->
                <tr>
                  <td height="25"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--end footer-->
</body>

</html>
