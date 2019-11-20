<?php
	$output = '';
	$output .='
		<style>
		      body{
		        background-image:url(../dashboard/asset/img/background.jpg);
		        background-image:url(../dashboard/asset/img/background.jpg) no-repeat center center fixed;
		        -webkit-background-size: cover!important;
		        -moz-background-size:cover!important;
		        -o-background-size:cover !important;
		        background-size: cover!important;
				background-attachment:fixed!important;
				height:inherit;
		      }
		      .well2{
		      	background:transparent;
		      }
		      .well1{
		      	height:100%;
		      }
		      .btn{
		      	background:transparent;
		      }
		      input[type="text"]{
		      	background:transparent;
		      	color:white;
		      	outline:none;
		      	border-color: white;
		      	box-shadow:0 1px 4px white;
		      	border-left:blue;
		      	border-right:blue;
		      }

		      input[type="password"]{
		      	background:transparent;
		      	color:white;
		      	outline:none;
		      	border-color: white;
		      	box-shadow:0 1px 4px white;
		      	border-left:blue;
		      	border-right:blue;
		      }

		      input[type="submit"]{
		      	color:white;
		      	width:55%;
		      }
		      .btn:hover{
		      	color:white;
		      }
		      .form-control::-webkit-input-placeholder{
		      	color:white;
		      }
		</style>
	';
	echo $output;
?>