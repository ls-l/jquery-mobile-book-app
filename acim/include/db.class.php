<?php
define('DB_HOST', 'localhost');
define('DB_PASSWORD', '');
define('DB_UNAME', 'root');
define('DB_NAME', 'acim');
define('SITE_URL','http://localhost/acim/');
define('SITE_URL_DEMO','');


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

  function insert_query($tableName, $values, $debug=false) {
        /* Insert the $values into the database. 
         * e.g. 
         * $values = array ("name"=>"kris","email"=>"karn@nucleus.com"); 
         * InsertQuery ("employee", $values); 
         */
        return $this->InsertUpdateQuery($tableName, $values, "", $debug);
    }

    /*     * ***************************************************** */

    /*
     * update_query 
     * Desc: Update data in the database. 
     * Parms: 
     *   $tableName - database table name. 
     *   $values - associative array of field names and corresponding values. 
     *   $where - SQL Where clause to specify which row(s) to update. 
     *   $debug - If true then return SQL query without executing. 
     * Returns: 
     *   Nothing on success. 
     *   Error String on failure. 
     */

    function update_query($tableName, $values, $where="", $debug=false) {

        /* Update the $values in the database. 
         * e.g. 
         * $values = array ("name"=>"kris","email"=>"karn@nucleus.com"); 
         * $where = "WHERE id='1'"; 
         * UpdateQuery ("employee", $values, $where); 
         */
        if (empty($where))
            $where = " ";

        return $this->InsertUpdateQuery($tableName, $values, $where, $debug);
    }

    /*     * ***************************************************** */

    function InsertUpdateQuery($tableName, $fieldValues, $type="", $debug=false) {

        $i = 0;
        $fields = "";
        $values = "";
        $updateList = "";
        $error = '';
        while (list ($key, $val) = each($fieldValues)) {
            //$val = mysql_real_escape_string($val);
            if ($i > 0) {
                $fields .= ", ";
                $values .= ", ";
                $updateList .= ", ";
            }

            $fields .= $key;

            // If you do not want to add quotes 
            // around the field then specify 
            // /*NO_QUOTES*/ when passing in the value. 
            // For update statements like 
            // "update poll set total_votes=total_votes+1", 
            // you do not want 
            // the value field to have quotes around it. 
            if (strstr($val, "/*NO_QUOTES*/")) {
                $val = str_replace("/*NO_QUOTES*/", "", $val);
                $updateList .= "$key=$val";
                $values .= $val;
            } else {
                $updateList .= "$key='$val'";
                $values .= "'$val'";
            }
            $i++;
        }

        if (empty($type)) {
            $query = "insert into $tableName ($fields) values ($values)";
        } else {
            $type = " where " . $type;
            $query = "update $tableName set $updateList $type";
        }
        /* print $query;
          exit; */
        if ($debug) {
            //@mysql_close($db); 
            return $query;
        }


        //$query =  mysql_real_escape_string($query);
        $stmt = mysql_query($query);


        if ($stmt == false) {
            echo mysql_errno() . ": " . mysql_error() . "<br>";
            echo "<Br>your query is: " . $query;
            //die();
        }
        @mysql_free_result($stmt);
        //@mysql_close($db); 

        return $error;
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