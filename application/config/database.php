<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "zh";
$active_record = TRUE;
//中文
$db['zh']['hostname'] = "localhost";
$db['zh']['username'] = "root";
$db['zh']['password'] = "root";
$db['zh']['database'] = "lb_cn";
$db['zh']['dbdriver'] = "mysql";
$db['zh']['dbprefix'] = "mysys_";
$db['zh']['pconnect'] = false;
$db['zh']['db_debug'] = TRUE;
$db['zh']['cache_on'] = FALSE;
$db['zh']['cachedir'] = "";
$db['zh']['char_set'] = "utf8";
$db['zh']['dbcollat'] = "utf8_general_ci";
//英文

$db['en']['hostname'] = "localhost";
$db['en']['username'] = "root";
$db['en']['password'] = "root";
$db['en']['database'] = "lb_en";
$db['en']['dbdriver'] = "mysql";
$db['en']['dbprefix'] = "mysys_";
$db['en']['pconnect'] = false;
$db['en']['db_debug'] = TRUE;
$db['en']['cache_on'] = FALSE;
$db['en']['cachedir'] = "";
$db['en']['char_set'] = "utf8";
$db['en']['dbcollat'] = "utf8_general_ci";
