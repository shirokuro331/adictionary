<?php
  $keyword = $_GET['text'];

  $p0 = 'http://public.dejizo.jp/NetDicV09.asmx/';
  $p1 = 'SearchDicItemLite?Dic=EJdict';
  $p2 = '&Word=';
  $p3 = '&Scope=HEADWORD';
  $p4 = '&Match=STARTWITH';
  $p5 = '&Merge=AND';
  $p6 = '&Prof=XHTML';
  $p7 = '&PageSize=1';
  $p8 = '&PageIndex=0';

  $url = $p0.$p1.$p2.$keyword.$p3.$p4.$p5.$p6.$p7.$p8;

  $result = simplexml_load_file($url);
  $itemID = $result->TitleList->DicItemTitle->ItemID;

  $i0 = 'http://public.dejizo.jp/NetDicV09.asmx/GetDicItemLite?Dic=EJdict';
  $i1 = '&Item=';
  $i2 = '&Loc=';
  $i3 = '&Prof=XHTML';

  $item = $i0.$i1.$itemID.$i2.$i3;

  $resultid = simplexml_load_file($item);
  $resultword = $resultid->Body->div->div;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <title>a Dictionary</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
  <link rel="stylesheet" href="./css/style.css" />
  <link href='http://fonts.googleapis.com/css?family=Domine' rel='stylesheet' type='text/css'>

</head>
<body>
  <section id="content">
    <div class="search-text"><h1><?php echo $keyword; ?></h1></div>

    <p class="result"><?php echo $resultword; ?></p>
      
    </div> <!-- #container -->

    <p class="top"><a href="index.php">Search Page</a></p>

  </section> <!-- #content -->

<footer>
  <p>&copy; 2013 a Dictionary by <a href="https://twitter.com/shirokuro331" target="_blank">@shirokuro331</a></p>
</footer>
  

</body>
</html>