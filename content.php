<?php
require 'global.inc.php';
include 'header.php';
$news_data = include( 'news_data.php' );
$id = (int)$_GET['id'];
if( !$news_data[$id] )
{
	header( "Location:index.php" );
	exit();
}
echo "<h1>".$news_data[$id]["title"]."</h1><br />";
echo "时间:<strong>".$news_data[$id]["pubTime"]."</strong><hr />";
echo  $news_data[$id]["contents"];