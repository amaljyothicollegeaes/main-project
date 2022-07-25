<?php
// (A) CREATE NEW DATE TIME OBJECT
$dt = new DateTime("2019-08-14");
echo "ORIGINAL DATE: " . $dt->format("d M Y") . "<br>";

// (B) ADD DAYS WEEKS MONTHS
$dt->modify("+4 days");
echo "+4 DAYS: " . $dt->format("d M Y") . "<br>";
$dt->modify("+2 weeks");
echo "+2 WEEKS: " . $dt->format("d M Y") . "<br>";
$dt->modify("+1 month");
echo "+1 MONTH: " . $dt->format("d M Y") . "<br>";
$dt->modify("+4 year");
echo "+4 year: " . $dt->format("d M Y") . "<br>";

// (C) SUBTRACT DAYS WEEKS MONTHS
$dt->modify("-2 days");
echo "-2 DAYS: " . $dt->format("d M Y") . "<br>";
$dt->modify("-1 week");
echo "-1 WEEK: " . $dt->format("d M Y") . "<br>";
$dt->modify("-2 months");
echo "-2 MONTHS: " . $dt->format("d M Y") . "<br>";

////////////////////////////////
$string = "Hello India";
print_r(str_split($string));
?><br>
<?php

////////////////////////////////
$url = "aas33.11";
$fullArray = explode('.', $url);
print_r($fullArray);
?><br>
<?php
print_r($fullArray[0]);
?><br>
<?php
print_r($fullArray[1]);
?><br>
<?php
$v = $fullArray[1];
echo $v;
?><br>
<?php

$var  = 2.29;

echo $var2 = strval($var);  // '2.29'
?><br>
<?php
echo $var3 = intval($var);  // 2
?><br>
<?php
echo $var4 = boolval($var); // true
?><br>
<?php
echo $var5 = floatval($var); // 2.29
?><br>
<?php
//Converts the $var type
echo $d = settype($var, 'string');
