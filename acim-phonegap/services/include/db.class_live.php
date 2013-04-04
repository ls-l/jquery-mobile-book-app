<?php
define('DB_HOST', 'localhost');
define('DB_PASSWORD', 'K11hh%hQmhky');
define('DB_UNAME', 'phigib_acimdb');
define('DB_NAME', 'phigib_acimdb');
define('SITE_URL','http://thelaunchengine.com/acim/demo/');


class db {

    private static $db;
    public $_link;

    public function __construct() {
            $this->_link = mysql_connect(DB_HOST, DB_UNAME, DB_PASSWORD) or trigger_error(mysql_error(), 1024);
            mysql_select_db(DB_NAME) or trigger_error(mysql_error(), 1024);
        mysql_query("SET NAMES 'utf8'");

    }

    public static function __d($explicit=0) {
        if ($explicit == 1) {
            self::$db = new db(C_DB_HOST, C_DB_UNAME, C_DB_PASSWORD, C_DB_NAME);
        } else if (!isset($db)) {
            self::$db = new db();
        }
        return self::$db;
    }

    public function query($query) {

        if ($res = mysql_query($query))
            return $res;
        else {
            d(mysql_error());
            back_trace();
            d($query);

        }
    }

    public function format_data($result, $field=NULL, $second_field=NULL, $third_field=NULL) {
        $data_array = array();
        if ($result) {
            while ($array = mysql_fetch_assoc($result)) {
                $t = array();
                foreach ($array as $field_name => $value) {
                    //$t[$field_name] = utf8_encode($value);				
                    $t[$field_name] = ($value);
                }
                if (isset($field)) {
                    if (isset($second_field)) {
                        if (isset($third_field)) {
                            $data_array[$t[$field]][$t[$second_field]][$t[$third_field]] = $t;
                        } else {
                            $data_array[$t[$field]][$t[$second_field]] = $t;
                        }
                    } else {
                        $data_array[$t[$field]][] = $t;
                    }
                } else {
                    $data_array[] = $t;
                }
            }
        }
        return $data_array;
    }
    
}

function d($arr, $hideStyle="block") {
    if (is_array($arr) || is_object($arr)) {
        print "<pre style='display:{$hideStyle}'>" . "...";
        print_r($arr);
        print "</pre>";
    } else {
        print "<div class='debug' style='display:{$hideStyle}'>Debug:<br>$arr</div>";
    }
}


function q($query='') {
    $_db = db::__d();
    return $_db->format_data($_db->query($query));
}

function qs($q) {
    $d = q($q);
    if(count($d) > 0){
	   return $d[0];
	} else {
	   return "";
	}
}

?>