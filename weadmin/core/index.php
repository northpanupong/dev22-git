<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">

                <link href="../css/theme.css" rel="stylesheet"/>
                <title><?php echo $core_name_title ?></title>
                <link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.9.0.css">
                    <link rel="stylesheet" type="text/css" href="../js/colorbox.css" media="screen" />

                    <script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
                    <script language="JavaScript"  type="text/javascript" src="../js/jquery-ui-1.9.0.js"></script>
                    <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
                    <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                    <script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
                    <script language="JavaScript"  type="text/javascript" src="../js/jquery.colorbox.js"></script>

                    <script type="text/javascript">
                        jQuery(function () {
                            boxContantLoad('../core/loadHome.php');
                        });
                    </script>

                    </head>
                    <body>
                        <div class="allBackOffice">
                            <!-- #################### Head ###############  -->
                            <?php include("../core/incHead.php"); ?>
                            <!-- #################### Main ###############  -->
                            <div class="mainBackOffice">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th  class="tbLeftMenu" align="left"  valign="top" >
                                            <div class="mLeftBackOffice">
                                                <?php include("../core/incLeft.php"); ?>
                                            </div>
                                        </th>
                                        <th  align="left" class="borderLeft" valign="top">
                                            <form action="?" method="post" name="myFormHome" id="myFormHome">
                                                <input name="masterkey" type="hidden" id="masterkey" value="1<?php echo  $masterkey ?>" />
                                                <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $menukeyid ?>" />
                                            </form>

                                            <div class="mRightBackOffice" id="boxContantLoad">
                                                <?php include("../core/incWaitting.php") ?>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="clearAll"></div>
                            <!-- #################### Footer ###############  -->
                            <?php include("../core/incFooter.php"); ?>
                            <?php include("../core/incLoderBox.php"); ?>
                        </div>

                    </body>
                    </html>
