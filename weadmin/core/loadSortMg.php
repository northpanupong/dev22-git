<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:menuManage2"];

if ($_REQUEST["myParentID"] >= 1) {
  $sql = "SELECT " . $core_tb_menu . "_id , " . $core_tb_menu . "_namethai, " . $core_tb_menu . "_nameeng    FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_id='" . $_REQUEST["myParentID"] . "'";
  $query = wewebQueryDB($coreLanguageSQL, $sql);
  $row = wewebFetchArrayDB($coreLanguageSQL, $query);
  $valId = $row[0];
  if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
    $valName = rechangeQuot($row[$core_tb_menu . "_namethai"]);
  } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
    $valName = rechangeQuot($row[$core_tb_menu . "_nameeng"]);
  }
}
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
    var countArrSort = '';
    jQuery(function() {

      jQuery("#boxPermissionSort").sortable({
        update: function() {
          var order = jQuery('#boxPermissionSort').sortable('serialize');
          countArrSort = order;
          jQuery("#inputSort").val(countArrSort);
          //alert(countArrSort);
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
    <input name="myParentID" type="hidden" id="myParentID" value="<?php echo $_REQUEST['myParentID'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
    <input name="inputSort" type="hidden" id="inputSort" value="" />

    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <th class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('../core/menuManage.php')" target="_self"><?php echo $valNav2 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langTxt["mg:sortpermis"] ?><?php if ($_REQUEST["myParentID"] >= 1) { ?> (<?php echo $valName ?>)<?php } ?></span></th>
          <th class="divRightNavTb" align="right">



          </th>
        </tr>
      </table>
    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <th height="77" align="left"><span class="fontHeadRight"><?php echo $langTxt["mg:sortpermis"] ?><?php if ($_REQUEST["myParentID"] >= 1) { ?> (<?php echo $valName ?>)<?php } ?></span></th>
          <th align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <th align="right">
                  <div class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="sortingContactNew('../core/sortingMg.php');"></div>
                  <div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('../core/menuManage.php')"></div>
                </th>
              </tr>
            </table>
          </th>
        </tr>
      </table>
    </div>
    <div class="divRightMain">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" style="	border-top:#c8c7cc solid 1px;">
        <tr>
          <th colspan="7" align="left" valign="middle" class="formTileTxt">
            <?php
            $sql = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $myParentID . "' ";
            $sql .= " ORDER BY " . $core_tb_menu . "_order ASC";
            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $recordCount = wewebNumRowsDB($coreLanguageSQL, $query);
            if ($recordCount >= 1) {
            ?>
              <ul id="boxPermissionSort">
                <?php
                while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                  $valID =  $row[$core_tb_menu . "_id"];
                  if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                    $valName = rechangeQuot($row[$core_tb_menu . "_namethai"]);
                  } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                    $valName = rechangeQuot($row[$core_tb_menu . "_nameeng"]);
                  }

                  $valType =  $row[$core_tb_menu . "_moduletype"];
                  $valDateCredate = dateFormatReal($row[$core_tb_menu . "_credate"]);
                  $valTimeCredate = timeFormatReal($row[$core_tb_menu . "_credate"]);
                  $valStatus = $row[$core_tb_menu . "_status"];
                  if ($valStatus == "Enable") {
                    $valStatusClass =  "fontContantTbEnable";
                  } else {
                    $valStatusClass =  "fontContantTbDisable";
                  }

                  $valParentType = $row[$core_tb_menu . "_moduletype"];
                ?>
                  <li id="listItem_<?php echo $valID ?>" class="divSortDrop">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th width="58%" align="left" valign="top"><?php echo $valName ?></th>
                        <th width="14%" align="center" valign="top">
                          <span class="fontContantTbupdate"><?php echo $valType ?></span>
                        </th>
                        <th width="14%" align="center" valign="top">
                          <div id="load_status<?php echo $valID ?>">
                            <?php if ($valStatus == "Enable") { ?>

                              <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>

                            <?php } else { ?>

                              <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>

                            <?php } ?>

                            <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?php echo $valID ?>" />
                          </div>
                        </th>
                        <th width="14%" align="center" valign="top">
                          <span class="fontContantTbupdate"><?php echo $valDateCredate ?></span><br />
                          <span class="fontContantTbTime"><?php echo $valTimeCredate ?></span>
                        </th>
                      </tr>
                    </table>

                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
          </th>
        </tr>


        <tr>
          <td colspan="7" align="right" valign="top" height="20"></td>
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