<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stuid = $_GET['stuid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($stuid!='')
	{
		$sql = "SELECT collection FROM stu_info WHERE STU_ID = $stuid";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$n = $row[0];
		if($n!=0)
		{
			$dir = "/var/www/html/tushuliulang/db/collection/$stuid/collection.txt";
			$content = file_get_contents($dir);

			echo $content."<found>$n</found>".'<result>true</result><error>no_error</error>';
		}
		else
		{
			echo "<found>$n</found>".'<result>true</result><error>no_error</error>';
		}
	}
	else
	{
		echo '<result>false</result><error>input_error</error>';
	}
}
?>
