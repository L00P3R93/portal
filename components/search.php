<?php
    require '../dbconn/dbconn.php';
    if($_POST){
        $q=$_POST['searchword'];
        $sql_res=mysqli_query($dbconn,"SELECT * FROM courses WHERE course_name like '%$q%'");
        //$result=  mysql_query($sql_res) or die(mysql_errno());
        $trws= mysqli_num_rows($sql_res);
        if($trws>0){
            while($row=mysqli_fetch_array($sql_res)){
            $name=$row['course_name'];
            $id = $row['course_id'];
            //$category=$row['category'];
            //$user_username=$row['user_username'];
            $re_name='<strong>'.$q.'</strong>';
            //$re_category='<b>'.$q.'</b>';
            $final_name = str_ireplace($q, $re_name, $name);
            //$final_category = str_ireplace($q, $re_category, $category);
            ?>
            <a href="search-course.php?searid=<?php echo $id; ?> ">
                <div class="display_box" align="left">
                        <?php echo $final_name; ?>
                </div>
            </a>
    <?php   }
        }else{ ?>
            <div class="display_box" align="left">
                <?php echo "No results to show"; ?>
            </div>
<?php   }
    }else{ }
?>
