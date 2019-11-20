<?php
	require '../core/init.php';
	require '../core/db_con.php';
	$text = escape($_REQUEST['text']);
	$user = new User();
	if($text == "loggedin")
	{
		$username = escape($_POST['slocks']);
		$password = escape($_POST['plocks']);

		$remember = false;
		$login = $user->login($username,$password, $remember);

		if($login)
		{
			echo 'success';
		}else
		{
			echo 'wrong';
		}
	}elseif($text == "industry")
	{
		$output ='';
		$id = escape($_REQUEST['id']);
		$output .='
			<label class="float-left">Business Category</label>
			<select class="form-control">
				';
					$select = mysqli_query($con, "SELECT * FROM business_category WHERE industry_id = '$id'");
					if(mysqli_affected_rows($con) != 0)
					{
						while($row = mysqli_fetch_array($select))
						{
							$output.='
								<option class="form-control" value="'.$row['category_id'].'">'.$row['category_name'].'</option>
							';
						}	
					}
				$output .='
			</select>
		';

		echo $output;
	}
	else if($text == "save_info")
	{
		$firstname = escape($_POST['firstname']);
		$surname = escape($_POST['surname']);
		$email = escape($_POST['email']);
		$password = escape($_POST['password']);
		$gender = escape($_POST['gender']);
		$city = escape($_POST['city']);
		$country = escape($_POST['country']);
		$code = escape($_POST['code']);
		$occupation = escape($_POST['occupation']);
		$dob = escape($_POST['dob']);
		$mobile = escape($_POST['mobile']);
		$salt = Hash::unique();

		$select = mysqli_query($con, "SELECT * FROM lounge WHERE username = '$email'");
		if(mysqli_affected_rows($con) != 0)
		{

		}else
		{
			try
			{
				$user->create('lounge',array(
					'id' => mt_rand(),
					'firstname' => $firstname,
					'surname' => $surname,
					'username' => $email,
					'password' => Hash::make($password,$salt),
					'salt' => $salt,
					'gender' => $gender,
					'mobile' => $mobile,
					'city' => $city,
					'country' => $country,
					'occupation' => $occupation,
					'dob' => $dob,
					'code' => $code,
					'normal' => $password,
					'active' => '1',
					'adate' => date('Y-m-d H:i:s')
				));
				$remember = false;
				$login = $user->login($email, $password, $remember);
				if($login)
				{
					echo 'success';
				}
			}catch(Exception $e)
			{
				echo $e;
			}
		}
	}elseif($text == "entreprenuer")
	{
		$business = escape($_POST['business']);
		$line = escape($_POST['line']);
		$type = escape($_POST['type']);
		$status = escape($_POST['status']);
		$size = escape($_POST['size']);
		$resident = escape($_POST['resident']);
		$country = escape($_POST['country']);
		$contact = escape($_POST['contact']);
		$mail = escape($_POST['mail']);
		$password = escape($_POST['password']);
		$firstname = escape($_POST['first']);
		$surname = escape($_POST['surn']);
		$salt = Hash::unique();
		try
		{
			$user->create('lounge',array(
				'id' => mt_rand(),
				'firstname' => $firstname,
				'surname' => $surname,
				'username' => $mail,
				'password' => Hash::make($password,$salt),
				'salt' => $salt,
				'normal' => $password,
				'role' => '500'
			));

			$user->create('entreprenuer', array(
				'eid' => $salt ,
				'business' => $business,
				'line' => $line,
				'type' => $type,
				'status' => $status,
				'size' => $size,
				'location' => $resident,
				'country' => $country,
				'name' => $firstname .' '.$surname,
				'contact' => $contact,
				'email' => $mail,
				'salt' => $salt,
				'rdate' => date('Y-m-d H:i:s')
			));

			echo 'success';
		}catch(Exception $e)
		{
			echo $e;
		}
	}elseif($text == "apply-intern")
	{
		$data = $user->data();
		$con=mysqli_connect("localhost","root","","one");
		$business_id = $_POST['business_id'];
		$instituition = $_POST['institution'];
		$program = $_POST['program'];
		$student_id = $_POST['student_id'];
		$level = $_POST['student_id'];
		$level = $_POST['level'];
		$payment = $_POST['student_id'];
		$mobile_no = $_POST['mob_no'];
		$user_id = $data->salt;

		$sql=mysqli_query($con,"SELECT * FROM intern_table WHERE user_id = '$user_id'") or die(mysqli_error($con));
		$rowcount=mysqli_num_rows($sql);
		if($rowcount>0){
			exit();
		}
		else{

			try
			{
				$user->create('intern_table',array(
					'user_id' => $user_id,
					'business_id' => $business_id
				));

				$user->create('intern_additional_information',array(
					'user_id' => $user_id,
					'business_id' => $business_id,
					'institution_id' => $instituition,
					'program' => $program,
					'level' => $level,
					'payment_method' => $payment,
					'mobile_number' => $mobile_no
				));

				echo 'success';
			}catch(Exception $e)
			{

			}
		}
	}elseif($text == "apply-jobber")
	{
		$data = $user->data();
		$con=mysqli_connect("localhost","root","","one");
		$business_id = $_POST['business_id'];
		$instituition = $_POST['institution'];
		$program = $_POST['program'];
		$student_id = $_POST['student_id'];
		$level = $_POST['student_id'];
		$level = $_POST['level'];
		$payment = $_POST['student_id'];
		$mobile_no = $_POST['mob_no'];
		$user_id = $data->salt;

		$sql=mysqli_query($con,"SELECT * FROM intern_table WHERE user_id = '$user_id'") or die(mysqli_error($con));
		$rowcount=mysqli_num_rows($sql);
		if($rowcount>0){
			exit();
		}
		else{

			try
			{
				$user->create('intern_table',array(
					'user_id' => $user_id,
					'business_id' => $business_id
				));

				$user->create('intern_additional_information',array(
					'user_id' => $user_id,
					'business_id' => $business_id,
					'institution_id' => $instituition,
					'program' => $program,
					'level' => $level,
					'payment_method' => $payment,
					'mobile_number' => $mobile_no
				));

				echo 'success';
			}catch(Exception $e)
			{

			}
		}
	}
	elseif($text == "checkedmail")
	{
		$email = escape($_REQUEST['email']);
		$select = mysqli_query($con, "SELECT * FROM lounge WHERE username = '$email'");
		if(mysqli_affected_rows($con) != 0)
		{
			echo 'wrong';
		}else
		{
			echo 'right';
		}
	}elseif($text == "load_data")
	{
		$output	= '';
		?>
			<div class="row">
				<div class="col-xl-3 col-md-6 os-animation" data-os-animation="fadeInUp">
					<div class="widget widget-10 has-shadow">
						<div class="widget-header bordered d-flex align-items-center">
							<h2 style="color:orangered;"> Articles </h2>
						</div>
						<div class="widget-body no-padding">
							<ul class="ticket list-group w-100">
								<?php
									$select = mysqli_query($con, "SELECT * FROM portal WHERE category = '300' ORDER BY pdate DESC LIMIT 5");
									if(mysqli_affected_rows	($con) != 0)
									{
										while($row = mysqli_fetch_array($select))
										{
											$output .='
												<li class="list-group-item">
													<div class="media">
														<div class="media-left align-self-center pr-4">
															
														</div>
														<div class="media-body align-self-center">
															<div class="username">
																<h4 style="color:royalblue;">'.$row['title'].'</h4>
															</div>
															<div class="msg">
																'.htmlspecialchars_decode(stripslashes(substr($row['body'],0,200))).'...
															</div>
															<div class="status"><span class="read more mr-2"></span>
																<br>
																<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" target="_blank" data-href="https://ghanamusicplus.com/?read=28" data-layout="button_count" data-size="small" class="fa fas fa-facebook fb-share-button" data-href="ghanamusicplu?read='.$row['pid'].'" data-layout="button_count"> </a>
																<a href ="#"class="fa fas fa-twitter"> </a>
																<a href ="#"class="fa fas fa-linkedin"> </a>
																<a href ="?read='.$row['pid'].'" style="color:white"class="btn btn-info ripple mr-1 mb-2 btn-sm"> read more</a>
															</div>
														</div>
													</div>
												</li>
											';
										}
									}

									echo $output;
								?>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-md-6 os-animation" data-os-animation="fadeInUp">
					<div class="widget widget-10 has-shadow">
						<div class="widget-header bordered d-flex align-items-center">
							<h2 style="color:limegreen ">Ads</h2>
						</div>

						<div class="widget-body no-padding">
							<ul class="ticket list-group w-100">
								<?php
									$outpute = '';
									$select = mysqli_query($con, "SELECT * FROM portal WHERE category = '100' ORDER BY pdate DESC LIMIT 5");
									if(mysqli_affected_rows	($con) != 0)
									{
										while($row = mysqli_fetch_array($select))
										{
											$outpute .='
												<li class="list-group-item">
													<div class="media">
														<div class="media-left align-self-center pr-4">
															
														</div>
														<div class="media-body align-self-center">
															<div class="username">
																<h4 style="color:royalblue;">'.$row['title'].'</h4>
															</div>
															<div class="msg">
																'.htmlspecialchars_decode(stripslashes(substr($row['body'],0,200))).'...
															</div>
															<div class="status"><span class="read more mr-2"></span>
																<br>
																<a href ="#"class="fa fas fa-facebook"> </a>
																<a href ="#"class="fa fas fa-twitter"> </a>
																<a href ="#"class="fa fas fa-linkedin"> </a>
																<a href ="?read='.$row['pid'].'" style="color:white"class="btn btn-info ripple mr-1 mb-2 btn-sm"> read more</a>
															</div>
														</div>
													</div>
												</li>
											';
										}
									}

									echo $outpute;
								?>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-md-6 os-animation" data-os-animation="fadeInUp">
					<div class="widget widget-10 has-shadow">
						<div class="widget-header bordered d-flex align-items-center">
							<h2 style="color:darkslateblue">Timelines</h2>
						</div>

						<div class="widget-body no-padding">
							<ul class="ticket list-group w-100">
								<?php
									$outpu = '';
									$select = mysqli_query($con, "SELECT * FROM portal WHERE category = '200' ORDER BY pdate DESC LIMIT 3 ");
									if(mysqli_affected_rows	($con) != 0)
									{
										while($row = mysqli_fetch_array($select))
										{
											$outpu .='
												<li class="list-group-item">
													<div class="media">
														<div class="media-left align-self-center pr-4">
															
														</div>
														<div class="media-body align-self-center">
															<div class="username">
																<h4 style="color:royalblue;">'.$row['title'].'</h4>
															</div>
															<div class="msg">
																'.htmlspecialchars_decode(stripslashes(substr($row['body'],0,200))).'...
															</div>
															<div class="status"><span class="read more mr-2"></span>
																<br>
																<a href ="#"class="fa fas fa-facebook"> </a>
																<a href ="#"class="fa fas fa-twitter"> </a>
																<a href ="#"class="fa fas fa-linkedin"> </a>
																<a href ="?read='.$row['pid'].'" style="color:white"class="btn btn-info ripple mr-1 mb-2 btn-sm"> read more</a>
															</div>
														</div>
													</div>
												</li>
											';
										}
									}

									echo $outpu;
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
	}else if($text == "load-company")
	{
		$data = $user->data();
		$id = escape($_REQUEST['salt']);
		$output = '';
		$select = mysqli_query($con, "SELECT * FROM intern_table JOIN entreprenuer WHERE user_id = '$data->salt' AND business_id = '$id' AND entreprenuer.eid = intern_table.business_id");
		if(mysqli_affected_rows($con) != 0)
		{
			while($row = mysqli_fetch_array($select))
			{
				$output .='
					<div class="row">
	                    <div class="col-xl-12">
	                    	<div class="d-flex align-items-center">
                                <h2 class="page-header-title">'.$row['business'].'</h2>
                            <div>

                            <div class="page-header-tools">
                                <button type="button" id="'.$row['salt'].'" class="btn btn-lg btn-gradient-01 client">Register Client</button>
                            </div>
	                    </div>
	                </div>
	                <br>
	                <div class="row">
	                    <div class="col-xl-3 col-md-4 col-sm-6 col-remove">
	                        <div class="widget-image shadow">
	                            <div class="group-card">
	                                <div class="widget-body">
	                                    <h4 class="name"><a href="#">Clients Registered</a></h4>
	                                    <div class="stats text-center">
	                                        <span class="counter">
	                                        	';
	                                        		$sel = mysqli_query($con, "SELECT COUNT(nid) AS nid FROM intern_client WHERE user_id = '$data->id' AND business_id = '$id'");
	                                        		if(mysqli_affected_rows($con) != 0)
	                                        		{
	                                        			while($fetch = mysqli_fetch_array($sel))
	                                        			{
	                                        				$output .=''.$fetch['nid'].'';
	                                        			}
	                                        		}
	                                        	$output .='
	                                        </span>
	                                        <!--<span class="text">Clients</span>-->
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-xl-3 col-md-4 col-sm-6 col-remove">
	                        <div class="widget-image shadow">
	                            <div class="group-card">
	                                <div class="widget-body">
	                                    <h4 class="name"><a href="#">Assigned Tasks</a></h4>
	                                    <div class="stats text-center">
	                                        <span class="counter">
	                                        	';
	                                        		$sel = mysqli_query($con, "SELECT COUNT(tid) AS tid FROM task WHERE business_id = '$id'");
	                                        		if(mysqli_affected_rows($con) != 0)
	                                        		{
	                                        			while($fetch = mysqli_fetch_array($sel))
	                                        			{
	                                        				$output .=''.$fetch['tid'].'';
	                                        			}
	                                        		}
	                                        	$output .='
	                                        </span>
	                                        <!--<span class="text">Task</span>-->
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                </div>
	                <div class="row">

	                    <div class="col-xl-12">
	                        <div class="widget has-shadow">
	                            <div class="widget-header bordered no-actions d-flex align-items-center">
	                                <h4>Tasks</h4>
	                            </div>
	                            <div class="widget-body">
	                                <div class="table-responsive">
	                                    <table id="sorting" class="table table-bordered mb-0">
	                                        <thead>
	                                        <tr>
	                                            <th>#</th>
	                                            <th>Task Name</th>
	                                            <th>Task Description</th>
	                                            <th>Date Assigned</th>
	                                            <th><span style="width:100px;">Status</span></th>
	                                            <th>Actions</th>
	                                        </tr>
	                                        </thead>

	                                        <tbody>
	                                        	';
	                                        		$sel = mysqli_query($con, "SELECT * FROM task WHERE business_id = '$id'");
	                                        		if(mysqli_affected_rows($con) != 0)
	                                        		{
	                                        			$count = 1;
	                                        			while($fetch = mysqli_fetch_array($sel))
	                                        			{
	                                        				$output .='
	                                        					<tr>
	                                        						<td>'.$count.'</td>
	                                        						<td>'.$fetch['name'].'</td>
	                                        						<td>'.$fetch['description'].'</td>
	                                        						<td>'.$fetch['tdate'].'</td>
	                                        						<td></td>
	                                        						<td><button class="btn btn-shadow btn-gradient-01">View</button></td>
	                                        					</tr>
	                                        				';
	                                        			}
	                                        		}
	                                        	$output .='
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>


	                <div class="row">

	                    <div class="col-xl-12">
	                        <div class="widget has-shadow">
	                            <div class="widget-header bordered no-actions d-flex align-items-center">
	                                <h4>Registered Client</h4>&nbsp;
	                            </div>
	                            <div class="widget-body">
	                                <div class="table-responsive">
	                                    <table id="sorting-table" class="table table-bordered mb-0">
	                                        <thead>
		                                        <tr>
		                                            <th>#</th>
		                                            <th>Client Name</th>
		                                            <th>Email</th>
		                                            <th>Mobile Number</th>
		                                            <th><span style="width:100px;">Client Status</span></th>
		                                        </tr>
	                                        </thead>

	                                        <tbody>
	                                        	';
	                                        		$sel = mysqli_query($con, "SELECT * FROM intern_client WHERE user_id = '$data->id' AND business_id = '$id'");
	                                        		if(mysqli_affected_rows($con) != 0)
	                                        		{
	                                        			$count = 1;
	                                        			while($fetch = mysqli_fetch_array($sel))
	                                        			{
	                                        				$output .='
	                                        					<tr>
	                                        						<td>'.$count.'</td>
	                                        						<td>'.$fetch['firstname'].' '.$fetch['surname'].'</td>
	                                        						<td>'.$fetch['email'].'</td>
	                                        						<td>'.$fetch['mobile'].'</td>
	                                        						<td></td>
	                                        					</tr>
	                                        				';
	                                        			}
	                                        		}
	                                        	$output .='
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-xl-5">
	                        <div class="widget has-shadow">
	                            <div class="widget-body">
	                                <form>
	                                    <div class="form-group">
	                                        <h5>Upload Documents/Reports</h5>
	                                        <hr>
	                                        <input type="file" class="form-control-file btn-primary btn-lg btn-block" id="exampleFormControlFile1">
	                                    </div>
	                                    <div class="form-group">
	                                        <button type="submit" class="btn btn-gradient-04 btn-lg">Upload</button>
	                                    </div>

	                                </form>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-xl-7">
	                        <div class="widget has-shadow">
	                            <div class="widget widget-10 ">

	                                <div class="widget-header bordered d-flex align-items-center">
	                                    <h4>Uploaded Documents</h4>
	                                </div>

	                                <div class="widget-body no-padding">
	                                    <ul class="ticket list-group w-100">

	                                        <li class="list-group-item">
	                                            <div class="media">
	                                                <div class="media-left align-self-center pr-4">
	                                                    <!--<img src="assets/img/avatar/avatar-02.jpg" class="user-img rounded-circle" alt="...">-->
	                                                </div>
	                                                <div class="media-body align-self-center">
	                                                    <div class="username">
	                                                        <h4>Brandon Smith</h4>
	                                                    </div>
	                                                    <div class="msg">
	                                                        <p>
	                                                            Hello, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et mauris sapien sem, ornare id mauris vitae, ultricies volutpat ...
	                                                        </p>
	                                                    </div>
	                                                    <div class="status"><span class="open mr-2">Open</span>(1 hour ago)</div>
	                                                </div>
	                                            </div>
	                                        </li>


	                                        <li class="list-group-item">
	                                            <div class="media">
	                                                <div class="media-left align-self-center pr-4">
	                                                    <!--<img src="assets/img/avatar/avatar-04.jpg" class="user-img rounded-circle" alt="...">-->
	                                                </div>
	                                                <div class="media-body align-self-center">
	                                                    <div class="username">
	                                                        <h4>Nathan Hunter</h4>
	                                                    </div>
	                                                    <div class="msg">
	                                                        <p>
	                                                            Hello, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et mauris sapien sem, ornare id mauris vitae, ultricies volutpat ...
	                                                        </p>
	                                                    </div>
	                                                    <div class="status"><span class="pending mr-2">Pending</span>(2 hours ago)</div>
	                                                </div>
	                                            </div>
	                                        </li>

	                                    </ul>
	                                </div>

	                            </div>
	                        </div>
	                    </div>

	                </div>
				';
			}
		}

		echo $output;
	}else if($text == "apply-entreprenuer")
	{
		$level = $_POST['level'];
		$equity = $_POST['equity'];
		$request = $_POST['request'];
		$business_id = $_POST['business_id'];
		$data = $user->data();
		$user_id = $data->salt;
		$select = mysqli_query($con, "SELECT * FROM entrepreneur_manager_table WHERE user_id = '$data->salt'");
		if(mysqli_affected_rows($con) != 0)
		{
			
		}else
		{
			try
			{
				$user->create('enterpreneur_manager_table',array(
					'user_id' => $user_id,
					'business_id' => $business_id,
					'ent_manager_id' => Hash::unique()
				));

				$user->create('ent_manager_add_information',array(
					'user_id' => $user_id,
					'business_id' => $business_id,
					'level_of_education' => $level,
					'request' => $request,
					'equity' => $equity
				));

				echo 'success';
			}catch(Exception $e)
			{

			}
		}
	}
?>