<?php
    require '../connection/dbconn.php';
    session_start();
    $current_user=$_SESSION['user_name'];
    if($_POST){
        $q=$_POST['searchword'];
        $sql_res=mysqli_query($database,"select * from users where user_firstname like '%$q%' or user_lastname like '%$q%' order by user_id LIMIT 5");
        //$result=  mysql_query($sql_res) or die(mysql_errno());
        $trws= mysqli_num_rows($sql_res);
        if($trws>0){
            while($row=mysqli_fetch_array($sql_res)){
            $fname=$row['user_firstname'];
            $lname=$row['user_lastname'];
            $user_name=$row['user_name'];
            $re_fname='<b>'.$q.'</b>';
            $re_lname='<b>'.$q.'</b>';
            $final_fname = str_ireplace($q, $re_fname, $fname);
            $final_lname = str_ireplace($q, $re_lname, $lname);
?>  
<a href="./profile.php?user_name=<?php echo $user_name; ?>">
    <div class="display_box" align="left">
        <i class="fa fa-user"></i>
<?php echo $final_fname; ?>&nbsp;<?php echo $final_lname; ?>    
    </div>    
</a>
<?php
            }
        }
        else{
?>        
<div class="display_box" align="left">    
<?php echo "No results to show"; ?>
</div>
<?php   
        }
    }
    else{
    }
?>