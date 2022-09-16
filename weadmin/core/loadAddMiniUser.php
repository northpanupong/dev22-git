<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberMini.php");
include("../core/incLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:userManage2"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="th">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link href="../css/theme.css" rel="stylesheet" />

  <title><?php echo $core_name_title ?></title>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript">
    function executeSubmit() {
      with(document.myForm) {
        if (isBlank(inputgroupid)) {
          inputgroupid.focus();
          jQuery("#inputgroupid").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputgroupid").removeClass("formInputContantTbAlertY");
        }

        /*	if(inputUnitID.value==0) { 
        		inputUnitID.focus();
        		jQuery("#inputUnitID").addClass("formInputContantTbAlertY"); 
        		return false; 
        	}else{ 
        		jQuery("#inputUnitID").removeClass("formInputContantTbAlertY"); 
        	}
        	*/

        if (isBlank(inputUserName)) {
          inputUserName.focus();
          jQuery("#inputUserName").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputUserName").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputPassword)) {
          inputPassword.focus();
          jQuery("#inputPassword").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputPassword").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputPassword1)) {
          inputPassword1.focus();
          jQuery("#inputPassword1").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputPassword1").removeClass("formInputContantTbAlertY");
        }

        if (inputPassword.value != inputPassword1.value) {
          inputPassword1.focus();
          jQuery("#inputPassword").addClass("formInputContantTbAlertY");
          jQuery("#inputPassword1").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputPassword").removeClass("formInputContantTbAlertY");
          jQuery("#inputPassword1").removeClass("formInputContantTbAlertY");
        }

        if (isBlank(inputfnamethai)) {
          inputfnamethai.focus();
          jQuery("#inputfnamethai").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputfnamethai").removeClass("formInputContantTbAlertY");
        }


        if (isBlank(inputlnamethai)) {
          inputlnamethai.focus();
          jQuery("#inputlnamethai").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputlnamethai").removeClass("formInputContantTbAlertY");
        }


        if (isBlank(inputfnameeng)) {
          inputfnameeng.focus();
          jQuery("#inputfnameeng").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputfnameeng").removeClass("formInputContantTbAlertY");
        }


        if (isBlank(inputlnameeng)) {
          inputlnameeng.focus();
          jQuery("#inputlnameeng").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputlnameeng").removeClass("formInputContantTbAlertY");
        }


        if (isBlank(inputemail)) {
          inputemail.focus();
          jQuery("#inputemail").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputemail").removeClass("formInputContantTbAlertY");
        }


        if (!isEmail(inputemail.value)) {
          inputemail.focus();
          jQuery("#inputemail").addClass("formInputContantTbAlertY");
          return false;
        } else {
          jQuery("#inputemail").removeClass("formInputContantTbAlertY");
        }

      }

      insertContactNew('../core/insertMiniUs.php');

    }


    function loadCheckUser() {
      with(document.myForm) {
        var inputValuename = document.myForm.inputUserName.value;
      }
      if (inputValuename != '') {
        checkUsermember(inputValuename);
      }
    }


    jQuery(document).ready(function() {

      jQuery('#myForm').keypress(function(e) {
        if (e.which == 13) {
          //e.preventDefault();
          executeSubmit();
          return false;
        }
      });
    });
  </script>
</head>

<body>
  <form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
    <input name="valUserOld" type="hidden" id="valUserOld" value="<?php echo $valUsername ?>" />
    <input name="valUserMain" type="hidden" id="valUserMain" value="<?php echo $_SESSION[$valSiteManage . "core_session_id"] ?>" />
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <th class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('../core/userMiniManage.php')" target="_self"><?php echo $valNav2 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langTxt["us:crepermis"] ?></span></th>
          <th class="divRightNavTb" align="right">



          </th>
        </tr>
      </table>
    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <th height="77" align="left"><span class="fontHeadRight"><?php echo $langTxt["us:crepermis"] ?></span></th>
          <th align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <th align="right">
                  <div class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                  <div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('../core/userMiniManage.php')"></div>
                </th>
              </tr>
            </table>
          </th>
        </tr>
      </table>
    </div>
    <div class="divRightMain">
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <th colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleuser"] ?></span><br />
            <span class="formFontTileTxt"><?php echo $langTxt["us:titleuserDe"] ?></span>
          </th>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="top" height="15"></td>
        </tr>
        <tr style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:permission"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <input name="inputgroupid" type="hidden" id="inputgroupid" value="<?php echo $valMiniPermissionUser ?>" />
          </td>
        </tr>

        <tr style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:part"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPart" id="inputPart" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:nameuser"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputUserName" id="inputUserName" type="text" class="formInputContantTb" onblur="loadCheckUser()" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:pass"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPassword" id="inputPassword" type="password" class="formInputContantTbShot" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:repass"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPassword1" id="inputPassword1" type="password" class="formInputContantTbShot" /></td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">

        <tr>
          <th colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?php echo $langTxt["us:titlesystem"] ?></span><br />
            <span class="formFontTileTxt"><?php echo $langTxt["us:titlesystemDe"] ?></span>
          </th>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:antecedent"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" checked="checked" value="Mr." onclick="
document.myForm.inputGender[0].checked=true
    " /></div>
              <div class="formDivRadioR"><?php echo $langTxt["us:mr"] ?></div>
            </label>

            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" value="Miss" onclick="
document.myForm.inputGender[1].checked=true " /></div>
              <div class="formDivRadioR"><?php echo $langTxt["us:miss"] ?></div>
            </label>
            <label>
              <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" value="Mrs." onclick="
document.myForm.inputGender[1].checked=true    " /></div>
              <div class="formDivRadioR"><?php echo $langTxt["us:mrs"] ?></div>
            </label>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:sex"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <label>
              <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb" checked="checked" onclick="document.myForm.inputPrefix[0].checked=true" value="Male" /></div>
              <div class="formDivRadioR"><?php echo $langTxt["us:male"] ?></div>
            </label>


            <label>
              <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb" onclick="document.myForm.inputPrefix[1].checked=true" value="Female" /></div>
              <div class="formDivRadioR"><?php echo $langTxt["us:female"] ?></div>
            </label>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:firstnamet"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputfnamethai" id="inputfnamethai" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:lastnamet"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputlnamethai" id="inputlnamethai" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:firstnamete"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputfnameeng" id="inputfnameeng" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:lastnamee"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputlnameeng" id="inputlnameeng" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:email"] ?><span class="fontContantAlert">*</span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputemail" id="inputemail" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:position"] ?><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputPosition" id="inputPosition" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:address"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <textarea name="inputlocation" id="inputlocation" cols="20" rows="5" class="formTextareaContantTb"></textarea>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:tel"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputtelephone" id="inputtelephone" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:mobile"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputmobile" id="inputmobile" type="text" class="formInputContantTb" /></td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:other"] ?></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputother" id="inputother" type="text" class="formInputContantTb" /></td>
        </tr>

      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

        <tr>
          <th colspan="7" align="right" valign="top" height="20"></th>
        </tr>
        <tr>
          <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
        </tr>
      </table>
    </div>
  </form>
  <?php include("../lib/disconnect.php"); ?>
</body>

</html>