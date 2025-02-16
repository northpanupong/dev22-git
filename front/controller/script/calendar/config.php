<?php
## setting modulus ##
$settingModulus = array(
  'subject' => $lang['menu']['calendar'],
  'title' => $lang['menu']['calendar'],
  'tgp' => '/assets/img/background/mock-top-grapphic-2.png',
);

$date_array = array(
    "th" => array(// Full month
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    ),
    "en" => array(// Full month
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    ),
);

// $day_array = array(
//     "th" => array(// Full Day
//         "01" => "M",
//         "02" => "T",
//         "03" => "W",
//         "04" => "T",
//         "05" => "F",
//         "06" => "S",
//         "07" => "S",
//     ),
//     "en" => array(// Full Day
//         "01" => "Monday",
//         "02" => "Tuesday",
//         "03" => "Wednesday",
//         "04" => "Thursday",
//         "05" => "Friday",
//         "06" => "Saturday",
//         "07" => "Sunday",
//     ),
// );

$day_array = array(
    "th" => array(// Full Day
        "01" => "M",
        "02" => "T",
        "03" => "W",
        "04" => "T",
        "05" => "F",
        "06" => "S",
        "07" => "S",
    ),
    "en" => array(// Full Day
        "01" => "M",
        "02" => "T",
        "03" => "W",
        "04" => "T",
        "05" => "F",
        "06" => "S",
        "07" => "S",
    ),
);

//#####  Small Calendar #######################
//-----------  Day Name & Number ------
$mod_calendar_config["cell-width"] = "60";
$mod_calendar_config["cell-height"] = "60";
$mod_calendar_config["calendar-width"] = "180";
$mod_calendar_config["calendar-height"] = "55";


//#####  Big Calendar #######################
//-----------  Day Name ------
$mod_calendar_config["dayname-cell-width"] = "40";
$mod_calendar_config["dayname-cell-height"] = "50";
$mod_calendar_config["dayname-calendar-width"] = "250";
$mod_calendar_config["dayname-calendar-height"] = "50";
//-----------  Number ------
$mod_calendar_config["big-cell-width"] = "33";
$mod_calendar_config["big-cell-height"] = "50";
$mod_calendar_config["big-calendar-width"] = "248";
$mod_calendar_config["big-calendar-height"] = "200";

//#####


?>