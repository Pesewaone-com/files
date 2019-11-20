<?php
$con=mysqli_connect("localhost","root","","one");

$business_id=$_POST['business_id'];
$user_id=$_POST['user_id'];
$instituition=$_POST['instituition'];
$program=$_POST['program'];
$student_id=$_POST['student_id'];
$level=$_POST['student_id'];
$level=$_POST['level'];
$payment=$_POST['student_id'];
$mobile_no=$_POST['mobile_no'];
$account_no=$_POST['account_no'];
$user_id=$_POST['user_id'];

$sql=mysqli_query($con,"SELECT * FROM intern_table WHERE user_id='$user_id'") or die(mysqli_error($con));
$rowcount=mysqli_num_rows($sql);
if($rowcount>0){
    exit();
}
else{
    $run=mysqli_query($con, "INSERT into intern_table(user_id, business_id) 
                                VALUES($user_id, $business_id)")
                                or die(mysqli_error($con));

    $run=mysqli_query($con, "INSERT into intern_additional_information(user_id, business_id,institution_id,
                                  program,level,payment_method,mobile_number, account_no) 
                                  VALUES($user_id, $business_id, $instituition, '$program','$level','$payment', 
                                  $mobile_no,$account_no)")
                                    or die(mysqli_error($con));

    if($run){
        echo "Thank You for Applying, YOu will be contacted soon";
    }

    }
