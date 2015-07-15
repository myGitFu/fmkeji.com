<?php
require 'global.inc.php';
include 'header.php';
$news_data = include( 'news_data.php' );


//记录有多少条数据记录
$rsCount = count( $news_data );
//每一页多少条
$pageSize = 2;
//记录一共有多少页
$pageTotal = ceil( $rsCount/$pageSize ); 
//计算当前页
$page = (int)$_GET['page'];
//echo "int之后的".$page;
$page = $page<=0 ? 1 : $page;
$page = $page>$pageTotal ? $pageTotal : $page;
//echo "<br />赋值后:".$page;
//offset算法
$offset = ($page - 1) * $pageSize;
$data = array_slice( $news_data,$offset,2 );

//diyPrintr( $news_data );
foreach( $data as $key=>$rs)
{
	echo "<li><a href='content.php?id={$key}'>".$rs['title']."</a>".$rs['pubTime']."</li>";
}

echo "<hr />";




echo "共有{$rsCount}篇,{$page}/{$pageTotal},页码:";

if( $page==1 )
{
	echo "首页&nbsp;&nbsp;|&nbsp;&nbsp;上一页&nbsp;&nbsp;";
}
else
{
	$pre = $page - 1;
	echo "<a href='?page=1'>首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='?page={$pre}'>上一页</a>&nbsp;&nbsp;";
}
for( $i=1;$i<=$pageTotal;$i++)
{
	if( $i==$page )
		echo "<strong>{$i}</strong>&nbsp;&nbsp;&nbsp;&nbsp;";
	else
		echo "<a href='?page={$i}'>{$i}</a>&nbsp;&nbsp;&nbsp;&nbsp;";
}
if( $page==$pageTotal )
{
	echo "下一页&nbsp;&nbsp;|&nbsp;&nbsp;尾页";
}
else
{
	$next = $page + 1;
	echo "<a href='?page={$next}'>下一页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='?page={$pageTotal}'>尾页</a>";
}