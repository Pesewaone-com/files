<?php
	class Views
	{
		function logout($user)
		{
			$output = '';
			$user->logout();
			$output = "<script>location.href = '?u';</script>";
			return $output;
		}

		function sidebar($con)
		{
			$output = '';
			$output .='
				<div class="off-sidebar from-right">
					            <div class="off-sidebar-container" >
					                <header class="off-sidebar-header">
					                    <a href="#off-canvas" class="off-sidebar-close"></a>
					                </header>
					                <div class="off-sidebar-content" style="box-shadow: inset 0px 2px 8px 2px #CCC;">
					                    <div class="tab-content">
					                        <ul class="menu list-group">
					                        	<li style="box-shadow: inset 0px -7px 9px -7px indigo;font-size: 15px;" class="list-group-item text-center"> <b>Services Categories</b> </li>
					                            ';
					                            	$select = mysqli_query($con, "SELECT * FROM categories ORDER BY created_at ASC");
					                            	if(mysqli_affected_rows($con) != 0)
					                            	{
					                            		while($row = mysqli_fetch_array($select))
					                            		{
					                            			$output .='
					                            				<li style="box-shadow: inset 0px -4px 3px -4px indigo;" class="text-center"><a href="?services='.$row['identifier'].'">'.$row['category'].'</a></li>
					                            			';
					                            		}
					                            	}
					                            $output .='
					                        </ul>
					                    </div>
					                </div>

					            </div>

					        </div>
			';
			return $output;
		}

		function intern_dashboard($user,$con)
		{
			$output = '';
			$data = $user->data();
			$output .='
				<div class="col-xl-11">
	                <div class="page-header pr-0 pl-0">
	                    <div class="d-flex align-items-center">
	                        <h2 class="page-header-title">Welcome '.$data->surname.' '.$data->firstname.'</h2>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-xl-4 col-sm-4">
	                        <div class="form-group">
	                            <label for="exampleFormControlSelect1">Choose Company</label>
	                            <select class="form-control" id="company">
	                                ';
	                                	$select = mysqli_query($con, "SELECT * FROM intern_table JOIN entreprenuer WHERE user_id = '$data->salt' AND entreprenuer.eid = intern_table.business_id");
	                                	if(mysqli_affected_rows($con) != 0)
	                                	{
	                                		while($row = mysqli_fetch_array($select))
	                                		{
	                                			$output .='
	                                				<option style="color:black;" class="form-control" value="'.$row['salt'].'">'.$row['business'].'</option>
	                                			';
	                                		}
	                                	}
	                                $output .='
	                            </select>
	                        </div>
	                    </div>

	                </div>
	                <br>
	                <div id="load-company"></div>

	            </div>
	            <div id="internship" class="modal fade">
	                <div class="modal-dialog modal-dialog-centered">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h4 class="modal-title">Modal Title</h4>
	                            <button type="button" class="close" data-dismiss="modal">
	                                <span aria-hidden="true">×</span>
	                                <span class="sr-only">close</span>
	                            </button>
	                        </div>
	                        <div class="modal-body">
	                            <form method="POST">

	                                <div class="form-group">
	                                    <label>Business Name</label>
	                                    <input type="text" class="form-control"  readonly/>
	                                </div>
	                                <div class="form-group">
	                                    <label>Last Name</label>
	                                    <input type="text" class="form-control" />
	                                </div>

	                                <div class="form-group">
	                                    <label>First Name</label>
	                                    <input type="text" class="form-control" />
	                                </div>

	                                <div class="form-group">
	                                    <label>Email</label>
	                                    <input type="text" class="form-control" />
	                                </div>

	                                <div class="form-group">
	                                    <label>Mobile Number</label>
	                                    <input type="text" class="form-control" />
	                                </div>

	                            </form>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
	                            <button type="button" class="btn btn-primary">Save</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
			';
			return $output;
		}

		function services($service, $con)
		{
			$output = '';
			$select = mysqli_query($con, "SELECT * FROM entreprenuer WHERE cate_id = '$service' AND state = '1'");
			if(mysqli_affected_rows($con) != 0)
			{
				while($row = mysqli_fetch_array($select))
				{
					$output .='
						<div class="col-xl-4 col-md-6 os-animation" data-os-animation="fadeInUp">
	                    	<div class="widget widget-10 has-shadow" style="box-shadow: inset 0px -11px 8px -10px #CCC;">
	                        	<div class="widget-body no-padding">
	                            	<ul class="ticket list-group w-100">
	                                	<li class="list-group-item">
	                                    	<div class="media">
	                                        	<div class="media-body align-self-center">
	                                            	<div class="username">
	                                                	<h4>'.$row['business'].'</h4>
	                                                	<hr />
	                                            	</div>
		                                            <div class="msg">
		                                                <div class="row">
		                                                    <div class="col-4">
		                                                        <img src="business/'.$row['pimage'].'" style="width:100%;height:100%;">
		                                                    </div>
		                                                    <div class="col-8">
		                                                        <p style="color:black;">'.$row['description'].' ...</p>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="status">
		                                                <hr />
		                                                <a href ="?serviced='.Hash::unique().'&business='.$row['salt'].'" class="btn btn-outline-info mr-1 mb-2">Read More</a>
		                                            </div>
	                                        	</div>
	                                    	</div>
	                                	</li>
	                            	</ul>
	                            </div>
	                        </div>
	                   	</div>
					';
				}
			}else
			{
				$output .='
					<div class="widget widget-10 has-shadow" style="box-shadow: inset 0px -11px 8px -10px #CCC;width:100%">
						<div class="widget-body no-padding">
							<ul class="ticket list-group w-100">
								<li class="list-group-item">
									<div class="media">
										<div class="media-body align-self-center">
											<div class="username">
												<h4>No Business Available</h4>
												<hr />
											</div>
											
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				';
			}
			return $output;
		}

		function jobber($con, $service, $user)
		{
			$output = '';
			$select = mysqli_query($con, "SELECT * FROM entreprenuer WHERE salt = '$service'");
			if(mysqli_affected_rows($con) != 0)
			{
				while($row = mysqli_fetch_array($select))
				{
					$output .='
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title"><button class="btn btn-outline-info" type="button">Back</button>&nbsp;&nbsp;Overview</h3>
										<hr />
										<div style="color:black;">
											'.htmlspecialchars_decode(stripslashes($row['intern'])).'
										</div>
									</div>
								</div>
							</div>


							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										';
											$data = $user->data();
											$sel = mysqli_query($con, "SELECT * FROM jobbers_table WHERE user_id = '$data->salt' AND business_id = '$service'");
											if(mysqli_affected_rows($con) != 0)
											{
												$output .='
													<h3 class="card-title">Registration Status</h3>
													<hr />
													sdfsdjlksjdfljslfkjsdkf
													<hr />
													<a href="" class="btn btn-outline-danger">View dashboard</a>
												';
											}else
											{
												$output .='
													<h3 class="card-title">Apply as a Jobber</h3>
													<hr />
													<form method="POST" id="applyjobber">
							                            <div>
							                            	<input type="hidden" value="'.$service.'" name="business_id" />
							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Level of Education</label>
							                                    <select class="form-control" name="level">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">Doctorate/PHD</option>
							                                        <option class="form-control">Masters</option>
							                                        <option class="form-control">Bachelors</option>
							                                        <option class="form-control">HND</option>
							                                        <option class="form-control">Diploma</option>
							                                        <option class="form-control">Certificate</option>
							                                    </select>
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Last Employment Details</label>
							                                    <hr />
							                                    <div class="form-group">
							                                        <label>Name of Company</label>
							                                        <input type="text" name="company_name" class="form-control"required />
							                                    </div>

							                                    <div class="form-group">
							                                        <label>Mobile No</label>
							                                        <input type="text" name="mobile_no" class="form-control"required />
							                                    </div>

							                                </div>


							                                <div class="form-group">
							                                    <label class="form-control-label">Are you Available?</label>
							                                    <div class="col-sm-9">
							                                        <div class="mb-3">
							                                            <div class="styled-radio">
							                                                <input type="radio" name="available" id="rad-1" value="Yes">
							                                                <label for="rad-1">Yes</label>
							                                            </div>
							                                        </div>

							                                        <div class="mb-3">
							                                            <div class="styled-radio">
							                                                <input type="radio" name="available" id="rad-2" value="NO">
							                                                <label for="rad-2">No</label>
							                                            </div>
							                                        </div>

							                                    </div>
							                                </div>

							                                <div class="form-group">
							                                    <label class="form-control-label">Are you Open to Other Job Options?</label>
							                                    <div class="col-sm-9">
							                                        <div class="mb-3">
							                                            <div class="styled-radio">
							                                                <input type="radio" name="job_options" id="rad-3">
							                                                <label for="rad-3">Yes</label>
							                                            </div>
							                                        </div>

							                                        <div class="mb-3">
							                                            <div class="styled-radio">
							                                                <input type="radio" name="job_options" id="rad-4">
							                                                <label for="rad-4">No</label>
							                                            </div>
							                                        </div>

							                                    </div>
							                                </div>

							                                <div class="form-group">
							                                	<button class="btn btn-shadow btn-gradient-01" type="submit">Submit</button>
							                                </div>
							                            </div>
							                        </form>
												';
											}
										$output .='
									</div>
								</div>
							</div>
						</div>
					';
				}
			}
			return $output;	
		}

		function entreprenuer($con, $service, $user)
		{
			$output = '';
			$select = mysqli_query($con, "SELECT * FROM entreprenuer WHERE salt = '$service'");
			if(mysqli_affected_rows($con) != 0)
			{
				while($row = mysqli_fetch_array($select))
				{
					$output .='
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title"><button class="btn btn-outline-info" type="button">Back</button>&nbsp;&nbsp;Overview</h3>
										<hr />
										<div style="color:black;">
											'.htmlspecialchars_decode(stripslashes($row['intern'])).'
										</div>
									</div>
								</div>
							</div>


							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										';
											$data = $user->data();
											$sel = mysqli_query($con, "SELECT * FROM enterpreneur_manager_table WHERE user_id = '$data->salt' AND business_id = '$service'");
											if(mysqli_affected_rows($con) != 0)
											{
												$output .='
													<h3 class="card-title">Registration Status</h3>
													<hr />
													sdfsdjlksjdfljslfkjsdkf
													<hr />
													<a href="" class="btn btn-outline-danger">View dashboard</a>
												';
											}else
											{
												$output .='
													<h3 class="card-title">Apply as entreprenuer manager</h3>
													<hr />
													<form method="POST" id="applyent">
							                            <div>
							                            	<input type="hidden" value="'.$service.'" name="business_id" />
							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Level of Education</label>
							                                    <select class="form-control" name="level">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">Doctorate/PHD</option>
							                                        <option class="form-control">Masters</option>
							                                        <option class="form-control">Bachelors</option>
							                                        <option class="form-control">HND</option>
							                                        <option class="form-control">Diploma</option>
							                                        <option class="form-control">Certificate</option>
							                                    </select>
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label class="form-control-label">Request for T&C</label>
							                                    <select class="form-control" name="request">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">No</option>
							                                        <option class="form-control">Yes</option>
							                                    </select>
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label class="form-control-label">Do you Agree to Work for Equity?</label>
							                                    <select class="form-control" name="equity">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">No</option>
							                                        <option class="form-control">Yes</option>
							                                    </select>
							                                </div>

							                                <div class="form-group">
							                                	<button class="btn btn-shadow btn-gradient-01" type="submit">Submit</button>
							                                </div>
							                            </div>
							                        </form>
												';
											}
										$output .='
									</div>
								</div>
							</div>
						</div>
					';
				}
			}
			return $output;	
		}

		function intern($con, $service, $user)
		{
			$output = '';
			$select = mysqli_query($con, "SELECT * FROM entreprenuer WHERE salt = '$service'");
			if(mysqli_affected_rows($con) != 0)
			{
				while($row = mysqli_fetch_array($select))
				{
					$output .='
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title"><button class="btn btn-outline-info" type="button">Back</button>&nbsp;&nbsp;Overview</h3>
										<hr />
										<div style="color:black;">
											'.htmlspecialchars_decode(stripslashes($row['intern'])).'
										</div>
									</div>
								</div>
							</div>


							<div class="col-xl-6">
								<div class="card">
									<div class="card-body">
										';
											$data = $user->data();
											$sel = mysqli_query($con, "SELECT * FROM intern_table WHERE user_id = '$data->salt' AND business_id = '$service'");
											if(mysqli_affected_rows($con) != 0)
											{
												$output .='
													<h3 class="card-title">Registration Status</h3>
													<hr />
													sdfsdjlksjdfljslfkjsdkf
													<hr />
													<a href="" class="btn btn-outline-danger">View dashboard</a>
												';
											}else
											{
												$output .='
													<h3 class="card-title">Apply as an Intern</h3>
													<hr />
													<form method="POST" id="applyintern">
							                            <div>
							                            	<input type="hidden" value="'.$service.'" name="business_id" />
							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Name of Institution</label>
							                                    <select class="form-control" name="institution" id="institution">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">Valley View University</option>
							                                        <option class="form-control">Koforidua Technical University</option>
							                                        <option class="form-control">University of Ghana Legon</option>
							                                        <option class="form-control">Ashesi University</option>
							                                        <option class="form-control">All Nations University</option>
							                                        <option class="form-control">University of Cape Coast</option>
							                                    </select>
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Program of Study</label>
							                                    <input type="text" class="form-control" name="program" id="program"required />
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Student ID No</label>
							                                    <input type="text" name="student_id" class="form-control"required />
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Level</label>
							                                    <select class="form-control" name="level" id="level">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">400</option>
							                                        <option class="form-control">300</option>
							                                        <option class="form-control">200</option>
							                                        <option class="form-control">100</option>

							                                    </select>
							                                </div>


							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label>Payment Method</label>
							                                    <select class="form-control" id="payment_method" name="payment_method">
							                                        <option class="form-control"required></option>
							                                        <option class="form-control">Mobile Money</option>
							                                        <option class="form-control">Bank Account</option>
							                                    </select>
							                                </div>

							                                <div class="form-group col-xl-12 col-lg-6 col-md-6">
							                                    <label id="mobile_no">Mobile Number</label>
							                                    <input type="text" class="form-control" name="mob_no" id="mob_no" />
							                                </div>

							                                <div class="sign-btn text-center">
									                            <button type="submit" class="btn btn-lg btn-gradient-02">
									                                Submit
									                            </button>
									                        </div>
							                            </div>
							                        </form>
												';
											}
										$output .='
									</div>
								</div>
							</div>
						</div>
					';
				}
			}
			return $output;
		}

		function business($service, $con, $user)
		{
			$output = '';
			$select = mysqli_query($con, "SELECT * FROM entreprenuer WHERE salt = '$service'");
			if(mysqli_affected_rows($con) != 0)
			{
				while($row = mysqli_fetch_array($select))
				{
					$output .='
						<div class="jumbotron jumbotron-fluid" style="background:url(cover/'.$row['bimage'].'"></div>

	                    <div class="container-fluid">
	                        <div class="row justify-content-center">
	                            <div class="col-xl-11">

	                                <div class="widget head-profile has-shadow">
	                                    <div class="widget-body pb-0">
	                                        <div class="row d-flex align-items-center">
	                                            <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
	                                                <ul>

	                                                    <li>
	                                                        <div class="counter">50</div>
	                                                        <div class="heading">Customers</div>
	                                                    </li>
	                                                    <li>
	                                                        <div class="counter">20</div>
	                                                        <div class="heading">Enterpreneurs</div>
	                                                    </li>

	                                                    <li>
	                                                        <div class="counter">30</div>
	                                                        <div class="heading">Interns</div>
	                                                    </li>
	                                                </ul>
	                                            </div>
	                                            <div class="col-xl-4 col-md-4 d-flex justify-content-center">
	                                                <div class="image-default">
	                                                    <img class="rounded-circle" style="height:120px;" src="business/'.$row['pimage'].'" alt="...">
	                                                </div>
	                                                <div class="infos">
	                                                    <h2>'.$row['business'].'</h2>
	                                                    <div class="location">.</div>
	                                                </div>
	                                            </div>
	                                            <!---->
	                                            <!--//new-->
	                                            <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
	                                                <ul>
	                                                    <li>
	                                                        <div class="counter">5</div>
	                                                        <div class="heading">Jobbers</div>
	                                                    </li>

	                                                    <li>
	                                                        <div class="counter">10</div>
	                                                        <div class="heading">Investors</div>
	                                                    </li>
	                                                    <li>
	                                                        <a class="btn btn-gradient-03 margin-bottom-25" style="color:white;" href="#meing">Apply</a>
	                                                    </li>
	                                                </ul>
	                                            </div>


	                                        </div>

	                                    </div>
	                                </div>

	                                <div class="row">
	                                    <div class="col-xl-12 column">

	                                        <div class="widget has-shadow">

	                                            <div class="widget-body" style="color:  #72706f;">
	                                                '.htmlspecialchars_decode(stripslashes($row['about'])).'
	                                            </div>
	                                        </div>


	                                    </div>



	                                </div>

	                            </div>

	                            <div class="col-xl-11">


	                                <div class="row flex-row">

	                                    ';
	                                    	if($row['customer_state'] == "1")
	                                    	{
	                                    		$output .='
	                                    			<div class="col-xl-4 col-md-6 col-sm-6" id="meing">
				                                        <div class="widget widget-12 has-shadow">
				                                            <div class="widget-body">
				                                                <div class="media">
				                                                    <div style="color: black; font-size: 10px;" class="media-body align-self-center">
				                                                        <div class="title text-facebook">Customers</div>
				                                                        <div class="number">
				                                                        	'.$row['customer'].'
				                                                        </div>
				                                                        <hr />
				                                                        <div class="form-group">
				                                                            <button class="btn btn-gradient-03 mr-1 mb-2 ">Apply</button>
				                                                        </div>
				                                                    </div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
	                                    		';
	                                    	}

	                                    	if($row['intern_state'] == "1")
	                                    	{
	                                    		$output .='
	                                    			<div class="col-xl-4 col-md-6 col-sm-6">
				                                        <div class="widget widget-12 has-shadow">
				                                            <div class="widget-body">
				                                                <div class="media">
				                                                    <div style="color: black;" class="media-body align-self-center">
				                                                        <div class="title text-facebook">Interns</div>
				                                                        <div class="number">
				                                                        	'.$row['intern'].'
				                                                        </div>
				                                                        <hr />
				                                                        <div class="form-group">
				                                                            ';
				                                                            	if(!$user->isLoggedIn()){
				                                                            		$output .='
				                                                            			<a href="?login&serviced='.Hash::unique().'&business='.$service.'&back=service" class="btn btn-gradient-03 mr-1 mb-2">Apply</a>
				                                                            		';
				                                                            	}else
				                                                            	{
				                                                            		$data = $user->data();
																					$sel = mysqli_query($con, "SELECT * FROM intern_table WHERE user_id = '$data->salt' AND business_id = '$service'");
																					if(mysqli_affected_rows($con) != 0)
																					{
																						$output .='
					                                                            			<a class="btn btn-outline-danger btn-shadow mr-1 mb-2" href="?serviced='.Hash::unique().'&service='.$service.'&intern='.Hash::unique().'">View dashboard</a>
					                                                            		';
																					}else
																					{
					                                                            		$output .='
					                                                            			<a class="btn btn-gradient-03 mr-1 mb-2" href="?serviced='.Hash::unique().'&service='.$service.'&intern='.Hash::unique().'">Apply</a>
					                                                            		';
					                                                            	}
				                                                            	}
				                                                            $output .='
				                                                        </div>
				                                                    </div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
	                                    		';
	                                    	}

	                                    	if($row['jobber_state'] == "1")
	                                    	{
	                                    		$output .='
	                                    			<div class="col-xl-4 col-md-6 col-sm-6">
				                                        <div class="widget widget-12 has-shadow">
				                                            <div class="widget-body">
				                                                <div class="media">
				                                                    <div style="color: black;" class="media-body align-self-center">
				                                                        <div class="title text-facebook">Jobbers</div>
				                                                        <div class="number">
				                                                        	'.$row['jobber'].'
				                                                       </div>
				                                                       <hr />
				                                                       <div class="form-group">
				                                                       		';
				                                                            	if(!$user->isLoggedIn()){
				                                                            		$output .='
				                                                            			<a href="" class="btn btn-gradient-03 mr-1 mb-2">Apply</a>
				                                                            		';
				                                                            	}else
				                                                            	{
				                                                            		$output .='
				                                                            			<a class="btn btn-gradient-03 mr-1 mb-2" href="?serviced='.Hash::unique().'&service='.$service.'&jobber='.Hash::unique().'">Apply</a>
				                                                            		';
				                                                            	}
				                                                            $output .='
					                                                    </div>
					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
	                                    		';
	                                    	}

	                                    	if($row['entreprenuer_state'] == "1")
	                                    	{
	                                    		$output .='
	                                    			<div class="col-xl-4 col-md-6 col-sm-6">
					                                    <div class="widget widget-12 has-shadow">
					                                        <div class="widget-body">
					                                            <div style="color: black;" class="media">
					                                                <div class="media-body align-self-center">
					                                                    <div class="title text-facebook">Entrepreneur Managers</div>
					                                                    <div class="number">
					                                                    	'.$row['entreprenuer'].'
					                                                    </div>
					                                                    <hr />
					                                                    <div class="form-group">
					                                                        ';
					                                                        	if(!$user->isLoggedIn()){
					                                                        		$output .='
					                                                            		<a href="" class="btn btn-gradient-03 mr-1 mb-2">Apply</a>
					                                                            	';
					                                                            }else
					                                                            {
					                                                            	$data = $user->data();
																					$sel = mysqli_query($con, "SELECT * FROM enterpreneur_manager_table WHERE user_id = '$data->salt' AND business_id = '$service'");
																					if(mysqli_affected_rows($con) != 0)
																					{
																						$output .='
					                                                            			<a class="btn btn-outline-danger btn-shadow mr-1 mb-2" href="?serviced='.Hash::unique().'&service='.$service.'&intern='.Hash::unique().'">View dashboard</a>
					                                                            		';
																					}else
																					{
					                                                            		$output .='
					                                                            			<a class="btn btn-gradient-03 mr-1 mb-2" href="?serviced='.Hash::unique().'&service='.$service.'&intern='.Hash::unique().'">Apply</a>
					                                                            		';
					                                                            	}
					                                                            }
					                                                       	$output .='
					                                                    </div>
					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
	                                    		';
	                                    	}

	                                    	if($row['investor_state'] == "1")
	                                    	{
	                                    		$output .='
	                                    			<div class="col-xl-4 col-md-6 col-sm-6">
					                                    <div class="widget widget-12 has-shadow">
					                                        <div class="widget-body">
					                                            <div style="color: black;" class="media">
					                                                <div class="media-body align-self-center">
					                                                    <div class="title text-facebook">Investors</div>
					                                                    <div class="number">
					                                                    	'.$row['investor'].'
					                                                    </div>
					                                                    <hr />
					                                                    <div class="form-group">
					                                                        ';
					                                                        	if(!$user->isLoggedIn()){
					                                                        		$output .='
					                                                            		<a href="" class="btn btn-gradient-03 mr-1 mb-2">Apply</a>
					                                                            	';
					                                                            }else
					                                                            {
					                                                            	$output .='
					                                                            		<a class="btn btn-gradient-03 mr-1 mb-2">Apply</a>
					                                                            	';
					                                                            }
					                                                       	$output .='
					                                                    </div>
					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
	                                    		';
	                                    	}
	                                    $output .='
	                    			</div>
	                    		</div>
	                		</div>
	            		</div>
					';
				}
			}
			return $output;
		}

		function profile($user)
		{
			$output = '';
			$data = $user->data();
			$output .='
				<div class=" profile">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="d-flex align-items-center">
									<h2 class="page-header-title">Profile</h2>
								<div>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html"><i class="ti ti-home"></i></a></li>
										<li class="breadcrumb-item"><a href="?profile='.Hash::unique().'">Pages</a></li>
										<li class="breadcrumb-item active">Profile</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-3">
							<div class="widget has-shadow">
								<div class="widget-body">
									<div class="mt-5">
										<img style="cursor:pointer;width:120px;height:120px;" id="'.$data->salt.'" src="assets/img/profile/'.$data->image.'" alt="..." class="avatar rounded-circle d-block mx-auto upload-button">
										<input type="file" accept="image/*" class="file-upload" style="display:none"/>
									</div>
									<h3 class="text-center mt-3 mb-1">'.$data->surname.' '.$data->firstname.'</h3>
									<p class="text-center">'.$data->username.'</p>
									<div class="em-separator separator-dashed"></div>
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-bell la-2x align-middle pr-2"></i>Notifications</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-bolt la-2x align-middle pr-2"></i>Activity</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-comments la-2x align-middle pr-2"></i>Messages</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-bar-chart la-2x align-middle pr-2"></i>Statistics</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-clipboard la-2x align-middle pr-2"></i>Tasks</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-gears la-2x align-middle pr-2"></i>Settings</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0)"><i class="la la-question-circle la-2x align-middle pr-2"></i>FAQ</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-9">
							<div class="widget has-shadow">
								<div class="widget-header bordered no-actions d-flex align-items-center">
									<h4>Update Profile</h4>
								</div>
							<div class="widget-body">

							<div class="col-10 ml-auto">
								<div class="section-title mt-3 mb-3">
									<h4>01. Personnal Informations</h4>
								</div>
							</div>
							<form class="form-horizontal">
								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Firstname</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->firstname.'" class="form-control" >
									</div>
								</div>

								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Surname</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->surname.'" class="form-control">
									</div>
								</div>

								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->email.'" class="form-control" placeholder="dgreen@mail.com">
									</div>

									<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->username.'" class="form-control" placeholder="dgreen@mail.com">
									</div>
									<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Mobile Number</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->mobile .'" class="form-control" placeholder="dgreen@mail.com">
									</div>
									<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->username.'" class="form-control" placeholder="dgreen@mail.com">
									</div>
								</div>
								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->mobile.'" class="form-control" placeholder="+00 987 654 32">
									</div>
								</div>
							</form>
							<div class="col-10 ml-auto">
								<div class="section-title mt-3 mb-3">
									<h4>02. Address Informations</h4>
								</div>
							</div>
							<form class="form-horizontal">
								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
									<div class="col-lg-6">
										<input type="text" value="'.$data->city.'" class="form-control" placeholder="Los Angeles">
									</div>
								</div>

								<div class="form-group row d-flex align-items-center mb-5">
									<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Zip</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" placeholder="90045">
									</div>
								</div>
							</form>
							<div class="em-separator separator-dashed"></div>
							<div class="text-right">
								<button class="btn btn-gradient-01" type="submit">Save Changes</button>
								<button class="btn btn-shadow" type="reset">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			';
			return $output;
		}

		function userboard()
		{
			$output = '';
			$output .='
				<div class="page-content">
			        <!--<div class="compact-sidebar light-sidebar has-shadow">-->

			        <div class="compact">
			            <div class="container-fluid">
			                <div class="row justify-content-center">
			                    <div class="col-xl-11">

			                        <div class="page-header pr-0 pl-0">
			                            <div class="d-flex align-items-center">
			                                <h2 class="page-header-title">Services Category</h2>
			                                <div>
			                                </div>
			                            </div>
			                        </div>

			                        <!--<div class="row align-items-center mt-3 mb-4">-->
			                            <!--<div class="col-12">-->
			                                <!--<h4 class="m-0">7 Business Services</h4>-->
			                            <!--</div>-->
			                            <!--<div class="col-8 text-right">-->
			                            <!--</div>-->
			                        <!--</div>-->
			                        <div class="row">
			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3"><a href="#">Business Services</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3"><a href="#">Education Services</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3"><a href="#">Technological Services</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3"><a href="#">Professional Services</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3"><a href="#">Design, Print & Media</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h4 class="mt-3 mb-3" ><a href="#">Market & Advertisement</a></h3>
			                                            <hr />
			                                            <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="col-xl-3 col-md-4 col-sm-6">
			                                <div class="widget has-shadow">
			                                    <div class="widget-body text-center">
			                                        <h3 class="mt-3 mb-3" ><a href="#">Money & Finance</a></h3>
			                                        <hr />
			                                        <a href="" class="btn btn-outline-dark">View Companies | <span class="badge-text badge-text-small" style="background:black;">5</span></a>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>

			                    </div>

			                </div>

			            </div>


			            <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

			            <footer class="main-footer">
			                <div class="row">
			                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
			                        <p class="text-gradient-02">Design By QrSquared</p>
			                    </div>
			                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center"></div>
			                </div>
			            </footer>


			        </div>

			    </div>
			';
			return $output;
		}

		function register($con)
		{
			$output = '';
			$output .='
			    <div class="row">
			    	<div class="col-xl-3 col-sm-6">
			    	</div>
			    	<div class="col-xl-6">
			    		<div class="widget has-shadow">
			    			<img src="assets/img/blue.png" style="width:17%;float:right;margin-top:10px;margin-right:10px;">
							<div class="widget-header bordered no-actions d-flex align-items-center">
								<h4>Sign Up</h4>
							</div>
							<div class="widget-body sliding-tabs">
								<ul class="nav nav-tabs" id="example-one" role="tablist">
									<li class="nav-item" style="width:50%">
										<a class="nav-link active text-center" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="false">Individual</a>
									</li>
									<li class="nav-item" style="width:50%">
										<a class="nav-link text-center" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">Entreprenuer</a>
									</li>
								</ul>
	 							<div class="tab-content pt-3">
									<div class="tab-pane fade active show" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
										<form method="POST" id="save_info">
				                            <div class="row">
				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Firstname</label>&nbsp;&nbsp;<span style="color:red;" id="ferror"></span>
				                                    <input type="text" name="firstname" id="first" class="form-control"required />
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Surname</label>&nbsp;&nbsp;<span style="color:red;" id="serror"></span>
				                                    <input id="surn" name="surname" type="text" class="form-control"required />
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Email</label>&nbsp;&nbsp;<span style="color:red;" id="eerror"></span>
				                                    <input type="email" name="email" id="emailed" class="form-control"required />
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Password</label>
				                                    <input type="password" id="passed" name="password" class="form-control"required /><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Confirm Password</label>&nbsp;&nbsp;<span style="color:red;" id="perror"></span>
				                                    <input type="password" id="unpass" class="form-control"required/>
				                                </div>

				                                 <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Country</label>
				                                    <select class="form-control" id="country" name="country" required>
				                                        <option class="form-control"></option>
				                                        ';
				                                       $select = mysqli_query($con, "SELECT * FROM country");
					                            	if(mysqli_affected_rows($con) != 0)
					                            	{
					                            		while($row = mysqli_fetch_array($select))
					                            		{
				                                        		$output .='
				                                        		<option value="'.$row['code'].'">'.$row['Country'].'</option>
				                                        		';
				                                        	}

				                                        	}

				                                        $output .='
				                                    </select>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Country Code</label>
				                                    <input type="text" id="code" name="code" class="form-control" readonly />
				                                </div>
				                               

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Mobile Number</label>
				                                    <input type="text" id="mobile" name="mobile" class="form-control" required />
				                                </div>


				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Date Of Birth</label>
				                                    <input type="date" id="dob" name="dob" class="form-control datepicker" required/>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Location / City</label>
				                                    <input type="text" id="city" name="city" class="form-control"required />
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Gender</label>
				                                    <select class="form-control" name="gender">
				                                        <option class="form-control"required></option>
				                                        <option class="form-control">Male</option>
				                                        <option class="form-control">Female</option>
				                                    </select>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Occupation</label>
				                                    <select class="form-control" name="occupation" required>
				                                        <option class="form-control"></option>
				                                        <option class="form-control">Student</option>
				                                        <option class="form-control">Entrepreneaur</option>
				                                        <option class="form-control">Employee</option>
				                                        <option class="form-control">Graduate</option>
				                                        <option class="form-control">Employer</option>
				                                        <option class="form-control">Unemployed</option>
				                                    </select>
				                                </div>

				                                

				                                <div class="col text-left">
				                                        <div class="styled-checkbox">
				                                            <input type="checkbox" name="checkbox" id="agree">
				                                            <label for="agree">I Accept <a href="#" class="margin-bottom-15">Terms and Conditions</a></label>
				                                        </div>
				                                </div>
				                                <br>
				                                <br>
				                                    <button type="submit" class="btn btn-block  btn-gradient-02 center">
				                                        Create an account
				                                    </button>


				                            </div>
				                        </form>
									</div>
									<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
										<form method="POST" id="entreprenuer">
				                            <div class="row">
				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Name of Business</label>
				                                    <input type="text" id="business" name="business" class="form-control" required />
				                                </div>

				                                   <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Type of Business</label>
				                                    <select class="form-control" required name="type">
				                                        <option class="form-control"></option>
				                                        <option class="form-control">Sole Proprietorship</option>
				                                        <option class="form-control">Partnership</option>
				                                        <option class="form-control">Corporatio</option>
				                                        <option class="form-control">Limited Limited Company</option>
				                                        <option class="form-control">Cooperative (Co-op)</option>
				                                        <option class="form-control">Non Profit Organization</option>
                                                        <option class="form-control">Limited Partnership</option>
				                                        
				                                    </select>
				                                </div>

				                                  <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Business Industry</label>
				                                    <select class="form-control" id="line" name="line" required>
				                                        <option class="form-control"></option>
				                                        ';
					                                       	$select = mysqli_query($con, "SELECT * FROM industry");
						                            		if(mysqli_affected_rows($con) != 0)
						                            		{
							                            		while($row = mysqli_fetch_array($select))
							                            		{
					                                        		$output .='
					                                        		<option value="'.$row['industry_id'].'">'.$row['industry_name'].'</option>
					                                        		';
					                                        	}
					                                        }
				                                        $output .='
				                                    </select>
				                                    </div>

				                                    <div class="form-group col-xl-6 col-lg-6 col-md-6">
					                                    <div id="category">
					                                    	<label class="float-left">Business Category</label>
						                                    <select class="form-control" id="cart" name="cart" required>
						                                        <option class="form-control"></option>
						                                        <div id=""></div>
						                                    </select>
					                                    </div>
				                                    </div>



				                             

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Registration Status</label>
				                                    <select class="form-control" name="status" required>
				                                        <option class="form-control"></option>
				                                        <option class="form-control">Registered</option>
				                                        <option class="form-control">Unregistered</option>
				                                        
				                                    </select>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Size of Business</label>
				                                    <select class="form-control" name="size" required>
				                                        <option class="form-control"></option>
				                                        <option class="form-control">Micro sized business</option>
				                                        <option class="form-control">small sized business</option>
				                                        <option class="form-control">Mediumn sized business </option>
				                                        <option class="form-control">Large sized business</option>
				                                        <option class="form-control">Employer</option>
				                                        <option class="form-control">Unemployed</option>
				                                    </select>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Location</label>
				                                    <select class="form-control" name="resident" required>
				                                        <option class="form-control"></option>
				                                        <option class="form-control">Student</option>
				                                        <option class="form-control">Entrepreneaur</option>
				                                        <option class="form-control">Employee</option>
				                                        <option class="form-control">Graduate</option>
				                                        <option class="form-control">Employer</option>
				                                        <option class="form-control">Unemployed</option>
				                                    </select>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Country</label>
				                                    <select class="form-control" name="country" id="country" required>
				                                        ';
				                                       $select = mysqli_query($con, "SELECT * FROM country");
					                            	if(mysqli_affected_rows($con) != 0)
					                            	{
					                            		while($row = mysqli_fetch_array($select))
					                            		{
				                                        		$output .='
				                                        		<option value="'.$row['code'].'">'.$row['Country'].'</option>
				                                        		';
				                                        	}

				                                        	}

				                                        $output .='
				                                    </select>

				                                </div>

				                                <div class="col-xl-12 mb-4">
				                                    <label class="float-left">Contact Person</label>
				                                </div>
				                                <br>
				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Firstname</label>&nbsp;&nbsp;<span style="color:red;" id="fferror"></span>
				                                    <input type="text" id="rst" name="first" class="form-control"required />
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Surname</label>&nbsp;&nbsp;<span style="color:red;" id="sserror"></span>
				                                    <input type="text" id="snt" name="surn" class="form-control"required />
				                                </div>
				                                <div>

				                               </div>


				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label>Contact</label>
				                                    <div class="row">
				                                    	<div class="col-md-4">
				                                    		<input  type="text" id="contact1" name="contact" required class="form-control" disabled/>
				                                    	</div>
				                                    	<div class="col-md-8">
				                                    		<input  type="text" id="contact" name="contact" required class="form-control"/>
				                                    	</div>
				                                    </div>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Email</label>&nbsp;&nbsp;<span style="color:red;" id="eeerror"></span>
				                                    <input type="email" name="mail" id="mail" class="form-control"/>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Password</label>
				                                    <input type="text" name="password" id="pas" class="form-control"required/>
				                                </div>

				                                <div class="form-group col-xl-6 col-lg-6 col-md-6">
				                                    <label class="float-left">Confirm Password</label><span style="color:red" id="pperror"></span>
				                                    <input type="text" id="unpas" class="form-control"required/>
				                                </div>

				                                <div class="form-group col-xl-12 col-lg-12 col-md-12">
				                                    <label class="float-left">Brief Description</label><span style="color:red" id="pperror"></span>
				                                    <textarea class="form-control" required></textarea>
				                                </div>
				                                <button type="submit" class="btn btn-block  btn-gradient-02 center">
				                                    Create an account
				                                </button>

				                            </div>
				                        </form>
									</div>
								</div>
							</div>
						</div>
			    	</div>

			    	<div id="delay-modal" class="modal fade">
						<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
						<div class="modal-body text-center">
						<div class="sa-icon sa-success animate" style="display: block;">
						<span class="sa-line sa-tip animateSuccessTip"></span>
						<span class="sa-line sa-long animateSuccessLong"></span>
						<div class="sa-placeholder"></div>
						<div class="sa-fix"></div>
						</div>
						<div class="section-title mt-5 mb-2">
						<h2 class="text-gradient-01">Hello!</h2>
						</div>
						<p class="mb-5">Thank You For Registration. <br> We will get back to you</p>
						<p class="mb-5"> :)</p>
						</div>
						</div>
						</div>
					</div>
			    	<div class="col-xl-3">
			    	</div>
			    </div>
			    <style>
			    	.field-icon {
  						float: right;
  						margin-left: -25px;
  						margin-top: -35px;
  						position: relative;
  						z-index: 2;
					}
			    	.page{
			    		background:transparent;
			    	}
			    	body {
				        /* background: url(../images/b2.jpg); */
				        background: url(assets/img/background/db-smarthome-dark.jpg);
				        background-repeat: no-repeat;
				        background-position: center;
				        background-size: cover;
				        -webkit-background-size: cover;
				        -moz-background-size: cover;
				        -o-background-size: cover;
				    }
			    </style>
			';
			return $output;
		}

		function thank()
		{
			$output = '';
			$output .='
				
			';
			return $output;
		}

		function login()
		{
			$output = '';
			$output .='
				<div class="container-fluid no-padding h-100">
						<div class="row flex-row h-100 bg-white">
							<div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
								<div class="authentication-form mx-auto">
									<div class="logo-centered">
										<a href="../">
											<img src="assets/img/blue.png" alt="logo">
										</a>
									</div>
									<h3>Sign In To PesewaOne</h3>

									<form method="POST" id="loggedin">
										<div class="group material-input">
											<input type="email" required name="slocks">
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>Email / Contact</label>
										</div>
										<div class="group material-input">
											<input type="password" required name="plocks">
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>Password</label>
										</div>


										<div class="row">
										<div class="col text-left">
										<div class="styled-checkbox">
										<input type="checkbox" name="checkbox" id="remeber">
										<label for="remeber">Remember me</label>
										</div>
										</div>
										<div class="col text-right">
										<a href="pages-forgot-password.html">Forgot Password ?</a>
										</div>
										</div>
										<div class="sign-btn text-center">
										<button type="submit" class="btn btn-lg btn-gradient-01">
										Sign in
										</button>
										</div>


										<div style="display:none" id="elogin">
											<hr />
											<div class="alert alert-danger text-center">
												Wrong Username Or Password
											</div>
										</div>
									</form>
						
						<div class="register">
						Don t have an account?
						<br>
						<a href="?register">Create an account</a>
						</div>
						</div>

						</div>
						        <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
						                <div class="elisyam-bg background-01">
						                        <div class="elisyam-overlay overlay-01"></div>
						                        <div class="authentication-col-content mx-auto">
						                                <h1 class="gradient-text-01">
						                                        Welcome To PesewaOne!
						                                </h1>
						                                <span class="description">
						Etiam consequat urna at magna bibendum, in tempor arcu fermentum vitae mi massa egestas.
						</span>
						                        </div>
						                </div>
						        </div>


						</div>
			';
			return $output;
		}
	}
?>