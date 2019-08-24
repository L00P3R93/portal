<?php

function get_data($dbconn,$index,$title,$table)
{
     $all = array();
    $q0 = mysqli_query($dbconn, "SELECT * FROM $table");
    while($result = mysqli_fetch_assoc($q0)){
        $all[] = $result;
    }
    return $all[$index][$title];
}

function get_cond_data($dbconn,$index,$title,$table,$col,$param)
{
     $all = array();
    $q0 = mysqli_query($dbconn, "SELECT * FROM $table WHERE $col = '$param'");
    while($result = mysqli_fetch_assoc($q0)){
        $all[] = $result;
    }
    return $all[$index][$title];
}

function get_category($dbconn, $x, $index, $title, $table)
{
    $calls = array();
    $q = mysqli_query($dbconn, "SELECT * FROM $table WHERE post_category = '$x'");
    while($r = mysqli_fetch_assoc($q)){
        $calls[] = $r;
    }

    return $calls[$index][$title];
}

function get_post_data($dbconn, $index, $title, $id,$table)
{
    $all = array();
    $q0 = mysqli_query($dbconn, "SELECT * FROM $table WHERE id = '$id'");
    while($result = mysqli_fetch_assoc($q0)){
        $all[] = $result;
    }
    return $all[$index][$title];
}

function get_specific_data($dbconn, $table, $col, $param, $title){
    $all = array();
    $q = mysqli_query($dbconn, "SELECT * FROM $table WHERE $col = '$param'");
    $result = mysqli_fetch_assoc($q);
    return $result[$title];
}

function selected($value1, $value2, $return)
{
	if($value1==$value2){
		echo $return;
	}
}

function selected_and($value1, $value2, $value3, $value4, $return)
{
	if(($value1==$value2)&&($value3==$value4)){
		echo $return;
	}
}

function get_rows($database, $table){
    $all = mysqli_num_rows(mysqli_query($database,"SELECT * FROM $table"));
    return $all;
}

function get_rows_data($database, $table,$col,$param){
    $all = mysqli_num_rows(mysqli_query($database,"SELECT * FROM $table WHERE $col='$param'"));
    return $all;
}
//get_category($dbconn, $cat, $i, 'imagename')

?>