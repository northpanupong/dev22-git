<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";


$sql = "SELECT ";
if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "" . $mod_tb_set . "_id ";
} else {
    $sql .= "" . $mod_tb_set . "_id  ";
}

$sql .= "     FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_set . "_id     ='" . $_POST["valEditID"] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
// print_pre($sql);
$valid = $Row[0];

$valhtml = $mod_path_html . "/" . $Row[1];
$valhtmlname = $Row[1];

$valhtmlHome = $mod_path_html . "/" . $Row[8];
$valhtmlnameHome = $Row[8];


$valcredate = DateFormat($Row[2]);
$valcreby = $Row[3];
$valstatus = $Row[4];
$valmetatitle = $Row[5];
$valdescription = $Row[6];
$valkeywords = $Row[7];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="../css/theme.css" rel="stylesheet"/>

                <title><?php echo  $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                <script language="JavaScript" type="text/javascript">

                    function executeSubmit() {
                        with (document.myForm) {
                            // var alleditDetail = CKEDITOR.instances.editDetail.getData();
                            // if (alleditDetail == "") {
                            //     jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
                            //     window.location.hash = '#inputEditHTML';
                            //     return false;
                            // } else {
                            //     jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
                            // }
                            // jQuery('#inputHtml').val(alleditDetail);

                            // var alleditDetailHome = CKEDITOR.instances.editDetailHome.getData();
                            // if (alleditDetailHome == "") {
                            //     jQuery("#inputEditHomeHTML").addClass("formInputContantTbAlertY");
                            //     window.location.hash = '#inputEditHomeHTML';
                            //     return false;
                            // } else {
                            //     jQuery("#inputEditHomeHTML").removeClass("formInputContantTbAlertY");
                            // }
                            // jQuery('#inputHtmlHome').val(alleditDetailHome);


                        }
                        updateContactNew('updateFrom.php');
                    }



                    // jQuery(document).ready(function () {

                    //     jQuery('#myForm').keypress(function (e) {
                    //         /* Start  Enter Check CKeditor */
                    //         var focusManager = new CKEDITOR.focusManager(editDetail);
                    //         var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;

                    //         if (e.which == 13) {
                    //             //e.preventDefault();
                    //             if (checkFocus) {
                    //             } else {
                    //                 executeSubmit();
                    //                 return false;
                    //             }
                    //         }
                    //         /* End  Enter Check CKeditor */
                    //     });
                    // });

                </script>
                </head>

                <body>
                    <form action="?" method="get" name="myForm" id="myForm">
                        <input name="execute" type="hidden" id="execute" value="update" />
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
                        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
                        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGh'] ?>" />
                        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
                        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
                        <input name="valDelFile" type="hidden" id="valDelFile" value="" />

                        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
                        <input name="inputHtmlHome" type="hidden" id="inputHtmlHome" value="" />

                        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo  $valhtmlname ?>" />
                        <input name="inputHtmlHomeDel" type="hidden" id="inputHtmlHomeDel" value="<?php echo  $valhtmlnameHome ?>" />
                        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
                        <div class="divRightNav">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                <tr>
                                    <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('from.php')" target="_self">แบบฟอร์ม</a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" />  แก้ไขข้อมูลแบบฟอร์ม<?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                                    <td  class="divRightNavTb" align="right">



                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleedit"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?php echo  getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<?php } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <?php if ($valPermission == "RW") { ?>
                                                        <div  class="btnSave" title="<?php echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                                    <?php } ?>
                                                    <div  class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('from.php')"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >

                            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:titleHome"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo  $langMod["txt:titleDeHome"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor">
                                        <div id="inputEditHomeHTML" > <textarea name="editDetailHome" id="editDetailHome" >
                                                <?php
                                                if (is_file($valhtmlHome)) {
                                                    $fd = @fopen($valhtmlHome, "r");
                                                    $contents = @fread($fd, @filesize($valhtmlHome));
                                                    @fclose($fd);
                                                    echo txtReplaceHTML($contents);
                                                }
                                                ?>
                                            </textarea></div>     </td>
                                </tr>

                            </table> -->

                            <!-- <br/>

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:title"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo  $langMod["txt:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor">
                                        <div id="inputEditHTML" > <textarea name="editDetail" id="editDetail" >
                                                <?php
                                                if (is_file($valhtml)) {
                                                    $fd = @fopen($valhtml, "r");
                                                    $contents = @fread($fd, @filesize($valhtml));
                                                    @fclose($fd);
                                                    echo txtReplaceHTML($contents);
                                                }
                                                ?>
                                            </textarea></div>     </td>
                                </tr>

                            </table> -->
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " >
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:attfile"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo  $langMod["txt:attfileDe"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr style="display:none;">
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName" id="inputFileName" type="text"  class="formInputContantTb"/></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="file-input-wrapper">
                                            <button class="btn-file-input"><?php echo  $langTxt["us:inputpicselect"] ?></button>
                                            <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                                        </div>

                                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:notefile"] ?></span>
                                        <div class="clearAll"></div>
                                        <div id="boxFileNew" class="formFontTileTxt">
                                            <?php
                                            $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid     ='" . $valid . "'  AND   " . $mod_tb_file . "_language ='" . $_REQUEST['inputLt'] . "' ORDER BY " . $mod_tb_file . "_id ASC";
                                            // print_pre($sql);
                                            $query_file = wewebQueryDB($coreLanguageSQL, $sql);
                                            $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
                                            if ($number_row >= 1) {
                                                $txtFile = "";
                                                while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
                                                    $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                                                    $downloadFile = $row_file[1];
                                                    $downloadID = $row_file[0];
                                                    $downloadName = $row_file[2];
                                                    $countDownload = $row_file[3];
                                                    $imageType = strstr($downloadFile, '.');
                                                    $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                                }
                                            }

                                            echo $txtFile;
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:seo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php echo  $langMod["txt:seoDe"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?php echo  $valmetatitle ?>"/><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seotitlenote"] ?></span></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?php echo  $valdescription ?>"/><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seodesnote"] ?></span></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?php echo  $valkeywords ?>"/><br />
                                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seokeynote"] ?></span></td>
                                </tr>

                            </table>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                                <tr >
                                    <td colspan="7" align="right"  valign="top" height="20"></td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                </tr>
                            </table> -->
                        </div>
                    </form>
                    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
                    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
                    <script type="text/javascript" language="javascript">

                                                function ajaxFileUploadDoc() {
                                                    var valuefilename = jQuery("input#inputFileName").val();
                                                    jQuery.blockUI({
                                                        message: jQuery('#tallContent'),
                                                        css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                                        }
                                                    });


                                                    jQuery.ajaxFileUpload({
                                                        url: 'loadUpdateFileFrom.php?myID=<?php echo  $_POST["valEditID"] ?>&masterkey=<?php echo  $_REQUEST['masterkey'] ?>&langt=<?php echo  $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo  $_REQUEST['menukeyid'] ?>',
                                                        secureuri: true,
                                                        fileElementId: 'inputFileUpload',
                                                        dataType: 'json',
                                                        success: function (data, status) {
                                                            if (typeof (data.error) != 'undefined') {

                                                                if (data.error != '') {
                                                                    alert(data.error);
                                                                } else {
                                                                    jQuery("#boxFileNew").show();
                                                                    jQuery("#boxFileNew").html(data.msg);
                                                                    document.myForm.inputFileName.value = "";
                                                                    setTimeout(jQuery.unblockUI, 200);
                                                                }

                                                            }
                                                        },
                                                        error: function (data, status, e) {
                                                            alert(e);
                                                        }
                                                    }
                                                    )

                                                    return false;

                                                }

                                                /*################### Load FCK Editor ######################*/
                                                // jQuery(function () {
                                                //     onLoadFCKAbout();
                                                // });


                    </script>
                    <?php include("../lib/disconnect.php"); ?>

                </body>
                </html>
