<?php
/*-----------------------------------------------------------------
！！！！警告！！！！
以下为系统文件，请勿修改
-----------------------------------------------------------------*/

//不能非法包含或直接执行
if (!defined("IN_BAIGO")) {
    exit("Access Denied");
}

class MODEL_SESSION {
    // session-lifetime
    private $lifeTime;

    function __construct() { //构造函数
        $this->obj_db = $GLOBALS["obj_db"]; //设置数据库对象
    }

    function mdl_create_table() {
        $_arr_ssinCreat = array(
            "session_id"        => "varchar(255) NOT NULL COMMENT 'ID'",
            "session_data"      => "text NOT NULL COMMENT 'SESSION 数据'",
            "session_expire"    => "int NOT NULL COMMENT 'SESSION 过期时间'",
        );

        $_num_mysql = $this->obj_db->create_table(BG_DB_TABLE . "session", $_arr_ssinCreat, "session_id", "SESSION", "InnoDB");

        if ($_num_mysql > 0) {
            $_str_alert = "y030105"; //更新成功
        } else {
            $_str_alert = "x030105"; //更新失败
        }

        return array(
            "alert" => $_str_alert, //更新成功
        );
    }


    function mdl_open($str_savePath, $str_ssinName) {
        // get session-lifetime
        $this->lifeTime = get_cfg_var("session.gc_maxlifetime");
        // open database-connection
        /*$dbHandle       = @mysql_connect("server","user","password");
        $dbSel          = @mysql_select_db("database",$dbHandle);
        // return success
        if (!$dbHandle || !$dbSel) {
            return false;
        }
        $this->dbHandle = $dbHandle;*/
        return true;
    }


    function mdl_close() {
        /*$this->gc(ini_get("session.gc_maxlifetime"));
        // close database-connection*/
        return @mysql_close($this->dbHandle);
    }


    function mdl_read($str_ssinId) {
        $_arr_ssinRow = $this->mdl_readDb($str_ssinId, time());

        if ($_arr_ssinRow["alert"] != "y030102") {
            return "";
        }

        return $_arr_ssinRow["session_data"];
    }


    function mdl_write($str_ssinId, $str_ssinData) {
        $tm_expire = time() + $this->lifeTime;
        // is a session with this id in the database?

        $_arr_ssinData = array(
            "session_data"      => $str_ssinData,
            "session_expire"    => $tm_expire,
        );

        $_arr_ssinRow = $this->mdl_readDb($str_ssinId);

        //print_r(strlen($str_ssinData));

        if ($_arr_ssinRow["alert"] == "y030102") {
            $_num_mysql  = $this->obj_db->update(BG_DB_TABLE . "session", $_arr_ssinData, "session_id='" . $str_ssinId . "'");

            if ($_num_mysql > 0) { //数据库更新是否成功
                return true;
            } else {
                return false;
            }
        } else { // if no session-data was found,
            $_arr_ssinData["session_id"] = $str_ssinId;
            $_num_ssinId = $this->obj_db->insert(BG_DB_TABLE . "session", $_arr_ssinData);

            if ($_num_ssinId > 0) { //数据库插入是否成功
                return true;
            } else {
                return false;
            }
        }
        // an unknown error occured
        return false;
    }


    function mdl_destroy($str_ssinId) {
        // delete session-data
        $_num_mysql = $this->obj_db->delete(BG_DB_TABLE . "session",  "session_id='" . $str_ssinId . "'"); //删除数据

        //如车影响行数小于0则返回错误
        if ($_num_mysql > 0) {
            return true;
        } else {
            return false;
        }

        return false;
    }


    function mdl_gc($sessMaxLifeTime) {
        $_num_mysql = $this->obj_db->delete(BG_DB_TABLE . "session",  "session_expire<" . time()); //删除数据

        if ($_num_mysql > 0) {
            return true;
        } else {
            return false;
        }
    }


    private function mdl_readDb($str_ssinId, $tm_expire = 0) {
        $_arr_ssinSelect = array(
            "session_id",
            "session_data",
            "session_expire",
        );

        $_str_sqlWhere  = "session_id='" . $str_ssinId . "'";
        if ($tm_expire > 0) {
            $_str_sqlWhere .= " AND session_expire>" . $tm_expire;
        }
        $_arr_ssinRows   = $this->obj_db->select(BG_DB_TABLE . "session", $_arr_ssinSelect, $_str_sqlWhere, "", "", 1, 0); //检查本地表是否存在记录

        if (isset($_arr_ssinRows[0])) {
            $_arr_ssinRow    = $_arr_ssinRows[0];
        } else {
            return array(
                "alert" => "x030102", //不存在记录
            );
        }

        $_arr_ssinRow["alert"] = "y030102";

        return $_arr_ssinRow;
    }
}