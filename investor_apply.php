<?php
$con=mysqli_connect("localhost","root","","one");

$user_id=htmlspecialchars($_POST['user_id']);
$business_id=$_POST['business_id'];
$range=htmlspecialchars($_POST['range']);
$type_of_investment=htmlspecialchars($_POST['type_of_investment']);
$investment_experience=htmlspecialchars$_POST['investment_experience']);


$sql=mysqli_query($con,"SELECT * FROM investor_table WHERE user_id='$user_id'") or die(mysqli_error($con));
$rowcount=mysqli_num_rows($sql);
if($rowcount>0){
    exit();
}
else{
    $run=mysqli_query($con, "INSERT into investor_table(user_id, business_id) 
                                VALUES($user_id, $business_id)")
    or die(mysqli_error($con));

    $run=mysqli_query($con, "INSERT into investor_additional_information(user_id, business_id,type_of_investment,
                                  range_of_investment, investment_experience) 
                                  VALUES($user_id, $business_id, $type_of_investment, '$range','$investment_experience')")
    or die(mysqli_error($con));

    if($run){
        echo "Thank You for Applying, YOu will be contacted soon";
    }

}
