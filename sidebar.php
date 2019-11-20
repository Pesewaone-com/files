<?php
	$output = '';
	$output .='
		<aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                <li class="active">
                  <a class="" href="index.html">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                  </a>
                </li>
                  ';
                    if($role == "r1" || $role == "r2" || $role == "admin"){
                      $output .= '
                        <li class="sub-menu">
                          <a href="javascript:;" class="">
                              <i class="icon_document_alt"></i>
                              <span>Records</span>
                              <span class="menu-arrow arrow_carrot-right"></span>
                          </a>
                          <ul class="sub">
                              ';
                                if($role == 'r1'){
                                  $output .='
                                    <li><a class="" href="record/">Patient Record</a></li>
                                  ';
                                }else{
                                  $output .='
                                    <li><a class="" href="record/">Patient Record</a></li>
                                    <li><a class="" href="record/manage">Manage Staff</a></li>
                                  ';
                                }
                              $output .='                     
                          </ul>
                      </li>
                      ';
                    }

                    if($role == 'w1' || $role == 'o1' || $role == 'admin'|| $role == 'e1' || $role == 'd1' || $role == 'ea1' || $role == 'i1' || $role == 'p1' || $role == 'a1' || $role == 'em1' || $role == 'ddms'){
                       $output .= '
                        <li class="sub-menu">
                          <a href="javascript:;">
                              <i class="icon_document_alt"></i>
                              <span>Nursing Care</span>
                              <span class="menu-arrow arrow_carrot-right"></span>
                          </a>
                          <ul class="sub">
                              ';
                                if($role == 'w1' || $role == 'o1' || $role == 'e1' || $role == 'd1' || $role == 'ea1' || $role == 'i1' || $role == 'p1' || $role == 'a1' || $role == 'em1'){
                                  $output .='
                                    <li class="active"><a href="nurse/">Vital Information</a></li>
                                  ';
                                }else{
                                  $output .='
                                    <li class="active"><a href="nurse/">Vital Information</a></li>
                                    <li><a class="" href="nurse/ward">Manage Staff</a></li>
                                    <li><a class="" href="nurse/manage">Manage Staff</a></li>
                                  ';
                                }
                              $output .='                     
                          </ul>
                      </li>
                      ';
                    }

                    if($role == 'wd1' || $role == 'od1' || $role == 'ed1' || $role == 'd1' || $role == 'ead1' || $role == 'id1' || $role == 'pd1' || $role == 'ad1' || $role == 'emd1' || $role == 'admin'){
                       $output .= '
                        <li class="sub-menu">
                          <a href="javascript:;" class="">
                              <i class="icon_desktop"></i>
                              <span>Doctors Care</span>
                              <span class="menu-arrow arrow_carrot-right"></span>
                          </a>
                          <ul class="sub">
                              ';
                                if($role == 'wd1' || $role == 'od1' || $role == 'ed1' || $role == 'dd1' || $role == 'ead1' || $role == 'id1' || $role == 'p1' || $role == 'ad1' || $role == 'emd1'){
                                  $output .='
                                    <li><a href="doctor/">Diagnose Patient</a></li>
                                  ';
                                }else{
                                  $output .='
                                    <li ><a href="doctor/">Diagnose Patient</a></li>
                                    <li><a class="" href="nurse/ward">Manage Staff</a></li>
                                    <li><a class="" href="nurse/manage">Manage Staff</a></li>
                                  ';
                                }
                              $output .='                     
                          </ul>
                      </li>
                      ';
                    }
                  
                  $output .='
              </ul>
          </div>
      </aside>
	';
	echo $output;
?>