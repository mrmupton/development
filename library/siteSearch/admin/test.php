<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include_once('../../../config/includeFiles.class.php'); include_once("../../../config/search/settings/database.php");
	$db->exec("create table ".$table_prefix."[sites](site_id INTEGER PRIMARY KEY NOT NULL, url VARCHAR(255), title VARCHAR(255), short_desc TEXT, indexdate date, spider_depth INTEGER DEFAULT 2, required TEXT,	disallowed TEXT, can_leave_domain bool)");
	
?>
</body>
</html>