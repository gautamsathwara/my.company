<?php
include_once 'dbconnect.php';
include_once  'interface1.php';

class dao implements interface1 
{    
    private $conn;
    function __construct() {
        $db=new DbConnect();
        $this->conn=$db->connect();
    }

    function dbCon() {
        $db=new dbconnect();
        return  $this->conn=$db->connect();
    }

    //data insert funtion
    function insert($table,$value){
        $field="";
        $val="";
        $i=0;

        foreach ($value as $k => $v)
        {
            $v = $this->conn->real_escape_string($v);
            if($i == 0)
            {
                $field.=$k;
                $val.="'".$v."'";
            }

            else 
            {
                $field.=",".$k;
                $val.=",'".$v."'";

            }
            $i++;

        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"INSERT INTO $table($field) VALUES($val)") or die(mysqli_error($this->conn));
    }

    // insert log
    function insert_log($site_id,$user_id,$user_name,$log_name) {   
        $log_name = $this->conn->real_escape_string($log_name);
        $user_name = $this->conn->real_escape_string($user_name);
        $now=date("y-m-d H:i:s");
        $val="'$site_id','$user_id','$user_name','$log_name','$now'";
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"INSERT INTO log_master(site_id,user_id,user_name,log_name,log_time) VALUES($val)") or die(mysqli_error($this->conn));
    }

    //insert admin notification
    function insert_admin_noti($admin_title,$admin_description,$admin_click_link,$user_id,$user_status){   
        $admin_title = $this->conn->real_escape_string($admin_title);
        $admin_description = $this->conn->real_escape_string($admin_description);
        $admin_click_link = $this->conn->real_escape_string($admin_click_link);
        $now=date("Y-m-d H:i:s");
        $val="'$admin_title','$admin_description','$admin_click_link','$user_id','$user_status','$now'";
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"INSERT INTO admin_notification_master(admin_title,admin_description,admin_click_link,admin_noti_sender_id,admin_noti_type,created_date) VALUES($val)") or die(mysqli_error($this->conn));
    }

    //select funtion display data
    function select($table, $where='', $other='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }

    //select funtion display data
    function selectRow($colum,$table, $where='', $other=''){
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT $colum FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }

    function select_row($table, $where='', $other='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT COUNT(*) as num_rows FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    
    //select funtion display data with DISTINCT  (not show duplicate)
    function select1($table, $column, $where='',$other='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT DISTINCT $column FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    
    function select2($table, $where='',$other='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT DISTINCT * FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    
    function selectColumnWise($table,$columnName='',$where=''){
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT $columnName FROM $table $where") or die(mysqli_error($this->conn));
        return $select;
    }

    //delete using update query(active_flag)
    function delete1($table ,$var, $where) {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'active_flag= ' .$var;
        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }

    //Update Product View (view_status)
    function view_status($table ,$var, $where) {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'view_status= ' .$var;
        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }

    //Comment ()
    function comment($table ,$var, $where) {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'status= ' .$var;
        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }
    //delete permanataly  function
    function delete($table , $where='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"delete FROM $table $where")or die(mysqli_error($this->conn));
    }

    //Upadate funtion
    function update($table ,$value, $where) {
        if($where != '')
        {
            $where= 'where ' .$where;
        }


        $val="";
        $i=0;
        foreach ($value as $k => $v)
        {
            $v = $this->conn->real_escape_string($v);
            if($i == 0)
            {
                $val.=$k."='".$v."'";    
            }

            else 
            {
                $val.=",".$k."='".$v."'";
            }
            $i++;

        }
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table SET $val $where");
    }
    //select next auto_increment_id
    function last_auto_id($table) {
        mysqli_set_charset($this->conn,"utf8");
        $select_id = mysqli_query($this->conn,"SHOW TABLE STATUS LIKE '$table'" ) or die(mysqli_error($this->conn));
        return $select_id;
    }

    //Count Data of Table
    function count_data($field='' ,$table ,$where='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $count_data = mysqli_query($this->conn,"SELECT $field,COUNT(*)  FROM $table $where" ) or die(mysqli_error($this->conn));
        return $count_data;
    }

    //Count Data of Table
    function count_data_direct($field='' ,$table ,$where='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $temp = mysqli_query($this->conn,"SELECT $field,COUNT(*)  FROM $table $where" ) or die(mysqli_error($this->conn));
        while($rowCount=mysqli_fetch_array($temp)) {
            $totalCount=$rowCount['COUNT(*)'];
            return $totalCount;
        }
    }
    //Count sum of  Table field
    function sum_data($field='' ,$table ,$where='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $sum_data = mysqli_query($this->conn,"SELECT SUM($field) from `$table` $where" ) or die(mysqli_error($this->conn));
        return $sum_data;
    }

    function send_sms($mobile,$otp,$link) {
        // $msg=urlencode($message);
//	    $sms= file_get_contents("https://2factor.in/API/R1/?module=TRANS_SMS&apikey=8b1efc48-9150-11eb-a9bc-0200cd936042&to=$mobile&from=GSHILP&templatename=shilp&var1=$otp&var2=$link");


	     $sms= file_get_contents("https://2factor.in/API/V1/8b1efc48-9150-11eb-a9bc-0200cd936042/SMS/$mobile/$otp/SHILP-RESETOTP");
    }

    function send_otp($mobile,$otp) {
        $sms= file_get_contents("https://2factor.in/API/V1/2eb6de0f-3a58-11e9-8806-0200cd936042/SMS/$mobile/$otp/Silverwing+OTP+for+BNI");
    }

    // get fcm token
    function getFcm($table,$where){
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8mb4");
        $select = mysqli_query($this->conn,"SELECT * FROM $table $where") or die(mysqli_error($this->conn));
        $totalUsers = mysqli_num_rows($select);
        $loopCount= $totalUsers/1000;
        $loopCount= round($loopCount)+1;

        for ($i=0; $i <$loopCount ; $i++) { 
            $limit_users = $i."000";
            $fcmArray=array();
            $q1 = mysqli_query($this->conn,"SELECT admin_fcm_token FROM $table $where GROUP BY admin_fcm_token") or die(mysqli_error($this->conn));
            while ($row=mysqli_fetch_array($q1)) {
                $admin_fcm_token= $row['admin_fcm_token'];
                array_push($fcmArray, $admin_fcm_token);
            }
            return $fcmArray;
        }
    }

    //update counter
    function updateCounter($table ,$value=''){
        mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table SET $value");
    }

    function selectArray($table, $where='', $other='') {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
        $data = mysqli_fetch_array($select);
        return $data;
    }

}
?>
