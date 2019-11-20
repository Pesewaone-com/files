<?php
$con=mysqli_connect("localhost","root","","one");

$level=$_POST['level'];
$equity=$_POST['equity'];
$request=$_POST['request'];
$user_id=$_POST['user_id'];
$business_id=$_POST['business_id'];


$sql=mysqli_query($con,"SELECT * FROM enterpreneur_manager_table WHERE user_id='$user_id'") or die(mysqli_error($con));
$rowcount=mysqli_num_rows($sql);
if($rowcount>0){
    exit();
}
else{
    $run=mysqli_query($con, "INSERT into enterpreneur_manager_table(user_id, business_id) 
                                VALUES($user_id, $business_id)")
    or die(mysqli_error($con));

    $run=mysqli_query($con, "INSERT into ent_manager_add_information(user_id, business_id,level,
                                  request, equity) 
                                  VALUES($user_id, $business_id, $level, '$request','$equity')")
    or die(mysqli_error($con));

    if($run){
        echo "Thank You for Applying, YOu will be contacted soon";
    }

}
