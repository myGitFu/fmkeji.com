<?php
define( "VIEW_ROLE",TRUE );
//有用的printr函数
function diyPrintr( $var,$flag = TRUE )
{
	echo "<pre>";
	if( $flag )
	{
		print_r( $var );
	}
	else
	{
		var_dump( $var );
	}
	echo "</pre>";
}