<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");


$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langMod["btn:mem"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
$valPermissionContent = getUserPermissionOnContent($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <link href="../css/theme.css" rel="stylesheet" />
  <title><?php echo $core_name_title ?></title>
  <script language="JavaScript" type="text/javascript" src="../js/jquery-1.9.0.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script type="text/javascript" language="javascript">


  </script>
</head>

<body>
  <?php
  // Check to set default value #########################
  $module_default_pagesize = $core_default_pagesize;
  $module_default_maxpage = $core_default_maxpage;
  $module_default_reduce = $core_default_reduce;
  $module_default_pageshow = 1;
  $module_sort_number = $core_sort_number;

  if ($_REQUEST['module_pagesize'] == "") {
    $module_pagesize = $module_default_pagesize;
  } else {
    $module_pagesize = $_REQUEST['module_pagesize'];
  }

  if ($_REQUEST['module_pageshow'] == "") {
    $module_pageshow = $module_default_pageshow;
  } else {
    $module_pageshow = $_REQUEST['module_pageshow'];
  }

  if ($_REQUEST['module_adesc'] == "") {
    $module_adesc = $module_sort_number;
  } else {
    $module_adesc = $_REQUEST['module_adesc'];
  }

  if ($_REQUEST['module_orderby'] == "") {
    $module_orderby = $mod_tb_apply . "_credate";
  } else {
    $module_orderby = $_REQUEST['module_orderby'];
  }

  if ($_REQUEST['inputSearch'] != "") {
    $inputSearch = trim($_REQUEST['inputSearch']);
  } else {
    $inputSearch = $_REQUEST['inputSearch'];
  }


  // SQL SELECT #########################
  $sql_export = "SELECT 
              " . $mod_tb_apply . "_id,
              " . $mod_tb_apply . "_name ,
              " . $mod_tb_root . "_subject,
              " . $mod_tb_apply . "_credate ,
              " . $mod_tb_apply . "_status,
              " . $mod_tb_apply . "_pic ,
              " . $mod_tb_apply . "_province,
              " . $mod_tb_apply . "_sex,
              " . $mod_tb_apply . "_history,
              " . $mod_tb_apply . "_salary ,
              " . $mod_tb_apply . "_email ,
              " . $mod_tb_apply . "_mobile 
        FROM " . $mod_tb_root;
  $sql_export = $sql_export . "  INNER JOIN  " . $mod_tb_apply . "  ON " . $mod_tb_root . "." . $mod_tb_root . "_id=" . $mod_tb_apply . "." . $mod_tb_apply . "_jID   WHERE " . $mod_tb_root . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";

  if ($_REQUEST['inputGh'] >= 1) {
    $sql_export = $sql_export . "  AND " . $mod_tb_apply . "_jID ='" . $_REQUEST['inputGh'] . "'   ";
  }


  if ($_REQUEST['inputProvince'] >= 1) {
    $sql_export = $sql_export . "  AND " . $mod_tb_apply . "_province ='" . $_REQUEST['inputProvince'] . "'   ";
  }


  if ($_REQUEST['inputSex'] >= 1) {
    $sql_export = $sql_export . "  AND " . $mod_tb_apply . "_sex ='" . $_REQUEST['inputSex'] . "'   ";
  }

  if (!empty($_REQUEST['inputEdu'])) {
    $sql_export = $sql_export . "  AND " . $mod_tb_apply . "_history LIKE '%" . $_REQUEST['inputEdu'] . "%'   ";
  }

  if ($_REQUEST['inputSalary'] >= 1) {

    if ($_REQUEST['inputSalary'] == 100) {
      $valMinSalary = $_REQUEST['inputSalary'] + 9000;
      $sql_export = $sql_export . "  AND  (" . $mod_tb_apply . "_salary <  '" . $valMinSalary . "'   )  ";
    } else if ($_REQUEST['inputSalary'] == 250000) {
      $valOverSalary = $_REQUEST['inputSalary'];
      $sql_export = $sql_export . "  AND  (" . $mod_tb_apply . "_salary >  '" . $valOverSalary . "'   )  ";
    } else {
      $valMaxSalary = $_REQUEST['inputSalary'] + 10000;
      $sql_export = $sql_export . "  AND  (" . $mod_tb_apply . "_salary BETWEEN '" . $_REQUEST['inputSalary'] . "' AND '" . $valMaxSalary . "'   )  ";
    }
  }


  if ($inputSearch <> "") {
    $sql_export = $sql_export . "  AND  ( 
		" . $mod_tb_apply . "_name LIKE '%$inputSearch%'  OR
		" . $mod_tb_apply . "_email LIKE '%$inputSearch%'   OR
		" . $mod_tb_apply . "_mobile LIKE '%$inputSearch%'    ) ";
  }

  $sql_export .= " ORDER BY $module_orderby  DESC ";

  //echo $sql_export;

  ?>
  <form action="?" method="post" name="myFormExport" id="myFormExport">
    <input name="sql_export" type="hidden" id="sql_export" value="<?php echo $sql_export ?>" />
    <input name="language_export" type="hidden" id="language_export" value="<?php echo $_SESSION[$valSiteManage . 'core_session_language'] ?>" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST["masterkey"] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST["menukeyid"] ?>" />
  </form>

  <form action="?" method="post" name="myForm" id="myForm">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $module_pageshow ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $module_pagesize ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $module_orderby ?>" />


    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" style="width: 30%;"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langMod["btn:mem"] ?></span></td>
          <td class="divRightNavTb" align="right">

            <!-- ######### Start Menu Sub Mod ########## -->
            <div class="menuSubMod">
              <a href="setting.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["meu:setPermis"] ?>
              </a>
            </div>
            <!-- <div class="menuSubMod ">
                            <a  href="from.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["btn:from"] ?>
                            </a>
                        </div> -->
            <div class="menuSubMod ">
              <a href="set.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["btn:set"] ?>
              </a>
            </div>
            <div class="menuSubMod active">
              <a href="mem.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["btn:mem"] ?>
              </a>
            </div>
            <!-- <div class="menuSubMod ">
                            <a  href="group.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["btn:position"] ?>
                            </a>
                        </div> -->
            <div class="menuSubMod ">
              <a href="index.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                <?php echo $langMod["btn:position"] ?>
              </a>
            </div>
            <!-- ######### End Menu Sub Mod ########## -->

          </td>
        </tr>

      </table>
    </div>
    <div style="clear:both;"></div>
    <div class="divRightHeadSearch">

      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">
        <tr>
          <td style="padding-right:10px;" width="33%"> <select name="inputGh" id="inputGh" class="formSelectSearchStyle" onchange="document.myForm.submit(); ">
              <option value="0"><?php echo $langMod["tit:selectg"] ?></option>
              <?php
              $sql_group = "SELECT " . $mod_tb_root . "_id," . $mod_tb_root . "_subject," . $mod_tb_root . "_subjecten," . $mod_tb_root . "_subjectcn FROM " . $mod_tb_root . " WHERE  " . $mod_tb_root . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ORDER BY " . $mod_tb_root . "_order DESC ";
              $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
              while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                $row_groupid = $row_group[0];
                $row_groupname = $row_group[1];
                $row_groupnameeng = $row_group[2];
                $row_groupnamecn = $row_group[3];
                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                  $valNameShow = $row_groupname;
                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                  // $valNameShow = $row_groupnameeng;
                  $valNameShow = $row_groupname;
                } else {
                  $valNameShow = $row_groupnamecn;
                }
              ?>
                <option value="<?php echo $row_groupid ?>" <?php if ($_REQUEST['inputGh'] == $row_groupid) { ?> selected="selected" <?php  } ?>><?php echo $valNameShow ?>
                </option>
              <?php } ?>
            </select></td>
          <td style="padding-right:10px;" width="34%">

            <select name="inputProvince" id="inputProvince" class="formSelectSearchStyle" onchange="document.myForm.submit(); ">
              <option value="0"><?php echo $langMod["ep:selectp"] ?> </option>
              <?php
              echo  $sql_province = "SELECT " . $other_tb_province . "_ID, " . $other_tb_province . "_NAME 	 FROM " . $other_tb_province . " 
							WHERE  1 ORDER BY " . $other_tb_province . "_NAME ASC ";
              $query_province = wewebQueryDB($coreLanguageSQL, $sql_province);
              $txt_count_province = wewebNumRowsDB($coreLanguageSQL, $query_province);
              while ($row_province = wewebFetchArrayDB($coreLanguageSQL, $query_province)) {
                $txt_province_id = $row_province[0];
                $txt_province_subject = $row_province[1];
              ?>
                <option value="<?php echo $txt_province_id ?>" <?php if ($_REQUEST['inputProvince'] == $txt_province_id) { ?> selected="selected" <?php } ?>><?php echo $txt_province_subject ?></option>
              <?php } ?>
            </select>
          </td>
          <td style="padding-right:3px;" width="33%"><select name="inputSex" id="inputSex" class="formSelectSearchStyle" onchange="document.myForm.submit(); ">
              <option value="0"><?php echo $langMod["ep:selectS"] ?> </option>
              <option value="ชาย" <?php if ($_REQUEST['inputSex'] == "ชาย") { ?> selected="selected" <?php } ?>><?php echo $modTxtSexThai[1] ?> </option>
              <option value="หญิง" <?php if ($_REQUEST['inputSex'] == "หญิง") { ?> selected="selected" <?php } ?>><?php echo $modTxtSexThai[2] ?> </option>
            </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" style="padding-right:10px;">&nbsp;</td>
        </tr>
        <tr>
          <td style="padding-right:10px;"><select name="inputEdu" id="inputEdu" class="formSelectSearchStyle" onchange="document.myForm.submit(); ">
              <option value="0"><?php echo $langMod["ep:selectE"] ?> </option>
              <?php
              $countTxtEduThaiArray = count($modTxtEduThai);
              for ($i = 1; $i < $countTxtEduThaiArray; $i++) {
              ?>
                <option value="<?php echo $modTxtEduThai[$i] ?>" <?php if ($_REQUEST['inputEdu'] == $modTxtEduThai[$i]) { ?> selected="selected" <?php } ?>>
                  <?php echo $modTxtEduThai[$i] ?>
                </option>
              <?php } ?>
            </select></td>
          <td style="padding-right:10px;">

            <select name="inputSalary" id="inputSalary" class="formSelectSearchStyle" onchange="document.myForm.submit(); ">
              <option value="0"><?php echo $langMod["ep:selectM"] ?> </option>
              <option value="100" <?php if ($_REQUEST["inputSalary"] == "100") { ?> selected="selected" <?php } ?>><?php echo $langMod["ep:below"] ?></option>
              <?php
              $end = 10000;
              for ($i = 10000; $i <= 240000; $i++) {
                $end = $end + 10000;
                $start = $i + 1;
              ?>
                <option value="<?php echo $i ?>" <?php if ($_REQUEST["inputSalary"] == $i) { ?> selected="selected" <?php } ?>><?php echo number_format($start) ?> - <?php echo number_format($end) ?></option>
              <?php
                $i = ($i + 10000) - 1;
              } ?>
              <option value="250000" <?php if ($_REQUEST["inputSalary"] == "250000") { ?> selected="selected" <?php } ?>><?php echo $langMod["ep:more"] ?></option>
            </select>
          </td>
          <!--  <td style="padding-right:10px;" id="boxSelectTest">

      <input name="inputSearch" type="text"  id="inputSearch" value="<?php echo trim($_REQUEST['inputSearch']) ?>" class="formInputSearchI"/></td>
    <td><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>-->

          <td id="boxSelectTest" width="42%" align="right">
            <input name="inputSearch" type="text" id="inputSearch" value="<?php echo trim($_REQUEST['inputSearch']) ?>" class="formInputSearchI" placeholder="<?php echo $langTxt["sch:search"] ?>" />
          </td>
          <td style="padding-right:10px;" align="right" width="5%"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();" type="button" class="btnSearch" value=" " /></td>
        </tr>
      </table>

    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?php echo $valNav2 ?></span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <?php if ($valPermission == "RW") { ?>

                    <div class="btnDel" title="<?php echo $langTxt["btn:del"] ?>" onclick="
if(Paging_CountChecked('CheckBoxID',document.myForm.TotalCheckBoxID.value)>0) {
	if(confirm('<?php echo $langTxt["mg:delpermis"] ?>')) {
          delContactNew('deleteMem.php');
	}
} else {
		alert('<?php echo $langTxt["mg:selpermis"] ?>');
}
				  "></div>
                    <div class="btnExport" title="<?php echo $langTxt["btn:export"] ?>" onclick="
                    document.myFormExport.action ='exportReport.php';
                    document.myFormExport.submit(); 
                  "></div>

                  <?php } ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>

    <div class="divRightMain">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
        <tr>
          <td width="3%" class="divRightTitleTbL" valign="middle" align="center">
            <input name="CheckBoxAll" type="checkbox" id="CheckBoxAll" value="Yes" onClick="Paging_CheckAll(this,'CheckBoxID',document.myForm.TotalCheckBoxID.value)" class="formCheckboxHead" />
          </td>

          <td align="left" valign="middle" class="divRightTitleTb"><span class="fontTitlTbRight"><?php echo $langMod["ep:name"] ?></span></td>
          <!-- <td width="20%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php echo $langMod["tit:by"] ?></span></td> -->

          <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langTxt["mg:status"] ?></span></td>
          <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langTxt["us:credate"] ?></span></td>
          <td width="12%" class="divRightTitleTbR" valign="middle" align="center"><span class="fontTitlTbRight"><?php echo $langTxt["mg:manage"] ?></span></td>
        </tr>
        <?php
        // SQL SELECT #########################
        $sql = "SELECT 
" . $mod_tb_apply . "_id,
" . $mod_tb_apply . "_name ,
" . $mod_tb_root . "_subject,
" . $mod_tb_apply . "_credate ,
" . $mod_tb_apply . "_status,
" . $mod_tb_apply . "_pic ,
" . $mod_tb_apply . "_province,
" . $mod_tb_apply . "_sex,
" . $mod_tb_apply . "_salary ,
" . $mod_tb_apply . "_email ,
" . $mod_tb_apply . "_address  as test
";
        $sql = $sql . " FROM  " . $mod_tb_root . "  INNER JOIN  " . $mod_tb_apply . "  ON " . $mod_tb_root . "." . $mod_tb_root . "_id=" . $mod_tb_apply . "." . $mod_tb_apply . "_jID   WHERE " . $mod_tb_root . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";

        if ($_REQUEST['inputGh'] >= 1) {
          $sql = $sql . "  AND " . $mod_tb_apply . "_jID ='" . $_REQUEST['inputGh'] . "'   ";
        }


        if ($_REQUEST['inputProvince'] >= 1) {
          $sql = $sql . "  AND " . $mod_tb_apply . "_province ='" . $_REQUEST['inputProvince'] . "'   ";
        }


        if (!empty($_REQUEST['inputSex'])) {
          $sql = $sql . "  AND " . $mod_tb_apply . "_sex ='" . $_REQUEST['inputSex'] . "'   ";
        }

        if (!empty($_REQUEST['inputEdu'])) {
          // $sql = $sql . "  AND " . $mod_tb_apply . "_history LIKE '%" . $_REQUEST['inputEdu'] . "%'   ";
          $sql = $sql . "  AND " . $mod_tb_apply . "_edu REGEXP '.*;s:[0-9]+:\"".$_REQUEST['inputEdu']."\".*'   ";
        }

        if ($_REQUEST['inputSalary'] >= 1) {

          if ($_REQUEST['inputSalary'] == 100) {
            $valMinSalary = $_REQUEST['inputSalary'] + 9000;
            $sql = $sql . "  AND  (" . $mod_tb_apply . "_salary <  '" . $valMinSalary . "'   )  ";
          } else if ($_REQUEST['inputSalary'] == 250000) {
            $valOverSalary = $_REQUEST['inputSalary'];
            $sql = $sql . "  AND  (" . $mod_tb_apply . "_salary >  '" . $valOverSalary . "'   )  ";
          } else {
            $valMaxSalary = $_REQUEST['inputSalary'] + 10000;
            $sql = $sql . "  AND  (" . $mod_tb_apply . "_salary BETWEEN '" . $_REQUEST['inputSalary'] . "' AND '" . $valMaxSalary . "'   )  ";
          }
        }


        if ($inputSearch <> "") {
          $sql = $sql . "  AND  ( 
		" . $mod_tb_apply . "_name LIKE '%$inputSearch%'  OR
		" . $mod_tb_apply . "_email LIKE '%$inputSearch%'   ) ";
        }

        //  $sql;
        // print_pre($sql);
        $query = wewebQueryDB($coreLanguageSQL, $sql);
        $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

        // Find max page size #########################
        if ($count_totalrecord > $module_pagesize) {
          $numberofpage = ceil($count_totalrecord / $module_pagesize);
        } else {
          $numberofpage = 1;
        }

        // Recover page show into range #########################
        if ($module_pageshow > $numberofpage) {
          $module_pageshow = $numberofpage;
        }

        // Select only paging range #########################
        $recordstart = ($module_pageshow - 1) * $module_pagesize;

        $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
        // print_pre($sql);
        $query = wewebQueryDB($coreLanguageSQL, $sql);
        $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
        $index = 1;
        $valDivTr = "divSubOverTb";
        if ($count_record > 0) {
          while ($index < $count_record + 1) {
            $row = wewebFetchArrayDB($coreLanguageSQL, $query);
            $valID = $row[0];
            $valName = rechangeQuot($row[1]);
            $valSubject = rechangeQuot($row[2]);
            $valDateCredate = dateFormatReal($row[3]);
            $valTimeCredate = timeFormatReal($row[3]);
            $valStatus = $row[4];
            $valPic = $mod_path_office . "/" . $row[5];
            if (is_file($valPic)) {
              $valPic = $valPic;
            } else {
              $valPic = "../img/btn/nopic.jpg";
            }

            $valProvince = $row[6];
            $valSex = $row[7];
            // $valHistory=json_decode($row[8],true);
            // $valEdu = array_slice($valHistory['grade'],0,1)[0];
            // print_pre($valEdu);
            $valSalary = number_format($row[8]);
            $valEmail = rechangeQuot($row[9]);


            if ($valStatus == "Read") {
              $valStatusClass =  "fontContantTbEnable";
            } else {
              $valStatusClass =  "fontContantTbDisable";
            }

            if ($valDivTr == "divSubOverTb") {
              $valDivTr =  "divOverTb";
              $valImgCycle = "boxprofile_l.png";
            } else {
              $valDivTr = "divSubOverTb";
              $valImgCycle = "boxprofile_w.png";
            }


        ?>
            <tr class="<?php echo $valDivTr ?>">
              <td class="divRightContantOverTbL" valign="top" align="center"><input id="CheckBoxID<?php echo $index ?>" name="CheckBoxID<?php echo $index ?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll,'CheckBoxID',document.myForm.TotalCheckBoxID.value)" value="<?php echo $valID ?>" /> </td>
              <td class="divRightContantOverTb" valign="top" align="left">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>
                    <td width="39" align="left">

                      <div style="width:29px; height:29px;  background:url(<?php echo $valPic ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "><img src="../img/btn/<?php echo $valImgCycle ?>" /></div>
                    </td>
                    <td width="577" align="left"><a href="javascript:void(0)" onclick="
    document.myFormHome.inputLt.value='Thai';
   document.myFormHome.valEditID.value=<?php echo $valID ?>;  
    viewContactNew('viewMem.php');"><?php echo $valName ?></a></td>
                  </tr>
                  <tr>
                    <td align="left">&nbsp;</td>
                    <td align="left"><span class="fontContantTbTime">
                        <?php echo $langMod["ep:email"] ?>: <?php echo $valEmail ?> | <?php echo $langMod["ep:mobile"] ?>: <?php echo $valMobile ?><br />
                        <?php echo $langMod["ep:select"] ?>: <?php echo $valSubject ?><br />
                        <?php echo $langMod["ep:province"] ?>: <?php echo loadNameProvince($valProvince) ?><br />
                        <?php echo $langMod["ep:sex"] ?>: <?php echo $$valSex; ?><br />
                        <?php echo $langMod["ep:edu"] ?>: <?php echo $valEdu ?><br />
                        <?php echo $langMod["ep:money"] ?>: <?php echo $valSalary ?><br />

                      </span></td>
                  </tr>
                </table>
              </td>

              <td class="divRightContantOverTb" valign="top" align="center">

                <?php if ($valStatus == "Read") { ?>
                  <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
                <?php } else { ?>
                  <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
                <?php } ?>

              </td>
              <td class="divRightContantOverTb" valign="top" align="center">
                <span class="fontContantTbupdate"><?php echo $valDateCredate ?></span><br />
                <span class="fontContantTbTime"><?php echo $valTimeCredate ?></span>
              </td>
              <td class="divRightContantOverTbR" valign="top" align="center">
                <?php if ($valPermission == "RW") { ?>
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>

                      <td valign="top" align="center" width="30">
                        <div class="divRightManage" title="<?php echo $langTxt["btn:export"] ?>" onclick="window.open('exportResume1.php?masterkey=<?php echo $_REQUEST["masterkey"] ?>&amp;valEditID=<?php echo $valID ?>&amp;nID=<?php echo txtReplaceDownload($valName) ?>','_self');">
                          <img src="../img/btn/pdf.png" /><br />
                          <span class="fontContantTbManage"><?php echo $langMod["btn:export3"] ?></span>
                        </div>
                      </td>

                      <td valign="top" align="center" width="30">
                        <div class="divRightManage" title="<?php echo $langTxt["btn:del"] ?>" onClick="
            if(confirm('<?php echo $langTxt["mg:delpermis"] ?>')) {
            Paging_CheckedThisItem( document.myForm.CheckBoxAll, <?php echo $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value );
          delContactNew('deleteMem.php');
            }
            ">
                          <img src="../img/btn/delete.png" /><br />
                          <span class="fontContantTbManage"><?php echo $langTxt["btn:del"] ?></span>
                        </div>
                      </td>
                    </tr>
                  </table>
                <?php } ?>
              </td>
            </tr>

          <?php
            $index++;
          }
        } else { ?>
          <tr>
            <td colspan="5" align="center" valign="middle" class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;"><?php echo $langTxt["mg:nodate"] ?></td>
          </tr>
        <?php } ?>

        <tr>
          <td colspan="6" align="center" valign="middle" class="divRightContantTbRL">
            <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td class="divRightNavTb" align="left"><span class="fontContantTbNav"><?php echo $langTxt["pr:All"] ?> <b><?php echo number_format($count_totalrecord) ?></b> <?php echo $langTxt["pr:record"] ?></span></td>
                <td class="divRightNavTb" align="right">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="right" style="padding-right:10px;"><span class="fontContantTbNav"><?php echo $langTxt["pr:page"] ?>
                          <?php if ($numberofpage > 1) { ?>
                            <select name="toolbarPageShow" class="formSelectContantPage" onChange="document.myForm.module_pageshow.value=this.value; document.myForm.submit(); ">
                              <?php
                              if ($numberofpage < $module_default_maxpage) {
                                // Show page list #########################
                                for ($i = 1; $i <= $numberofpage; $i++) {
                                  echo "<option value=\"$i\"";
                                  if ($i == $module_pageshow) {
                                    echo " selected";
                                  }
                                  echo ">$i</option>";
                                }
                              } else {
                                // # If total page count greater than default max page  value then reduce page select size #########################
                                $starti = $module_pageshow - $module_default_reduce;
                                if ($starti < 1) {
                                  $starti = 1;
                                }
                                $endi = $module_pageshow + $module_default_reduce;
                                if ($endi > $numberofpage) {
                                  $endi = $numberofpage;
                                }
                                //#####################
                                for ($i = $starti; $i <= $endi; $i++) {
                                  echo "<option value=\"$i\"";
                                  if ($i == $module_pageshow) {
                                    echo " selected";
                                  }
                                  echo ">$i</option>";
                                }
                              }
                              ?>
                            </select>
                          <?php } else { ?>
                            <b><?php echo $module_pageshow ?></b>
                          <?php } ?>
                          <?php echo $langTxt["pr:of"] ?> <b><?php echo $numberofpage ?></b></span></td>
                      <?php if ($module_pageshow > 1) { ?>
                        <td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21" onmouseover="this.src='../img/controlpage/playset_start_active.gif'; this.style.cursor='hand';" onmouseout="this.src='../img/controlpage/playset_start.gif';" onclick="document.myForm.module_pageshow.value=1; document.myForm.submit();" style="cursor:pointer;" /></td>
                      <?php } else { ?>
                        <td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
                      <?php } ?>
                      <?php if ($module_pageshow > 1) {
                        $valPrePage = $module_pageshow - 1;
                      ?>
                        <td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src='../img/controlpage/playset_backward_active.gif'; this.style.cursor='hand';" onmouseout="this.src='../img/controlpage/playset_backward.gif';" onclick="document.myForm.module_pageshow.value='<?php echo $valPrePage ?>'; document.myForm.submit();" /></td>
                      <?php } else { ?>
                        <td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
                      <?php } ?>
                      <td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src='../img/controlpage/playset_stop_active.gif'; this.style.cursor='hand';" onmouseout="this.src='../img/controlpage/playset_stop.gif';" onclick="
		with(document.myForm) {
		module_pageshow.value='';
		module_pagesize.value='';
		module_orderby.value='';
        document.myForm.submit();
		}
		" /></td>
                      <?php if ($module_pageshow < $numberofpage) {
                        $valNextPage = $module_pageshow + 1;
                      ?>
                        <td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src='../img/controlpage/playset_forward_active.gif'; this.style.cursor='hand';" onmouseout="this.src='../img/controlpage/playset_forward.gif';" onclick="document.myForm.module_pageshow.value='<?php echo $valNextPage ?>'; document.myForm.submit();" /></td>
                      <?php } else { ?>
                        <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
                      <?php } ?>
                      <?php if ($module_pageshow < $numberofpage) { ?>
                        <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src='../img/controlpage/playset_end_active.gif'; this.style.cursor='hand';" onmouseout="this.src='../img/controlpage/playset_end.gif';" onclick="document.myForm.module_pageshow.value='<?php echo $numberofpage ?>'; document.myForm.submit();" /></td>
                      <?php } else { ?>
                        <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
                      <?php } ?>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php echo $index - 1 ?>" />
      <div class="divRightContantEnd"></div>
    </div>

  </form>
  <?php include("../lib/disconnect.php"); ?>

</body>

</html>