<?php
    if(!$user->isLoggedIn()){
        ?>
            <div class="navbar-header">
                        &nbsp;&nbsp;<a href="?u" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="assets/img/blue.png" alt="logo" style="width: 70px;" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="assets/img/blue.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                    </div>


                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h" style="color:blue;"></i></a></li>

                        <li>
                            <div class="btn-group mr-1 mb-2">
                                <a style="color:white;cursor:pointer" class="btn btn-info dropdown-toggle d-flex align-items-center text-white margin-top-15" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"  ></i>
                                   Sign in
                                </a>
                                <div class="dropdown-menu">
                                    <a class="widget-header bordered no-actions d-flex align-items-center"" style="font-size:12px;color:#31b0d5" href="?login"><strong>Individual</strong></a>
                                    <a class="dropdown-item" style="font-size:12px;color:#31b0d5;" href="?register"><strong>Entreprenuer</strong></a>
                                </div>
                            </div>
                        </li>&nbsp;&nbsp;&nbsp;
                    </ul>
        <?php
    }else
    {
        $data = $user->data();
        ?>
            <div class="navbar-header">
&nbsp;&nbsp;<a href="business.html" class="navbar-brand">
<div class="brand-image brand-big">
<img src="assets/img/blue.png" alt="logo" style="width: 70px;" class="logo-big">
<h6 style="color:gray;font-size:9px;">Jobs & Enterprise<br> in Africa</h6>
</div>
<div class="brand-image brand-small">
<img src="assets/img/blue.png" alt="logo" class="logo-small">
<h6 style="color:black;font-size:10px;">Jobs & Enterprises<br>          in Africa</h6>
</div>
</a>

<a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h align-items-md-center" style="font-size:30px;color:blue;position: absolute;top:23px;"></i></a>

</div>


<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">

<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search" style="color:blue;"></i></a></li>

    <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="assets/img/profile/<?php echo $data->image; ?>" alt="..." class="avatar rounded-circle"></a>
        <ul aria-labelledby="user" class="user-size dropdown-menu">
            <li class="welcome">
                <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                <img src="assets/img/profile/<?php echo $data->image; ?>" alt="..." class="rounded-circle">
            </li>
            <li class="text-center">
                <?php echo strtoupper($data->surname.' '.$data->firstname); ?>
            </li>
            <hr />
            <li>
                <a href="?profile=<?php echo Hash::unique(); ?>" class="dropdown-item">
                    Profile
                </a>
            </li>
            <?php
                $select = mysqli_query($con, "SELECT * FROM intern_table WHERE user_id = '$data->salt'");
                if(mysqli_affected_rows($con) != 0)
                {
                    ?>
                        <hr />
                        <li>
                            <a href="?internship=intern&signin=true&back=nsearch&unique=<?php echo Hash::unique(); ?>" class="dropdown-item no-padding-bottom">
                                Internship
                            </a>
                        </li>
                    <?php
                }else
                {

                }

                $select = mysqli_query($con, "SELECT * FROM jobbers_table WHERE user_id = '$data->salt'");
                if(mysqli_affected_rows($con) != 0)
                {
                    ?>
                        <hr />
                        <li>
                            <a href="#" class="dropdown-item no-padding-bottom">
                                Employment
                            </a>
                        </li>
                    <?php
                }else
                {

                }

                $select = mysqli_query($con, "SELECT * FROM enterpreneur_manager_table WHERE user_id = '$data->salt'");
                if(mysqli_affected_rows($con) != 0)
                {
                    ?>
                        <hr />
                        <li>
                            <a href="#" class="dropdown-item no-padding-bottom">
                                Management
                            </a>
                        </li>
                    <?php
                }else
                {

                }

                $select = mysqli_query($con, "SELECT * FROM enterpreneur_manager_table WHERE user_id = '$data->salt'");
                if(mysqli_affected_rows($con) != 0)
                {
                    ?>
                        <hr />
                        <li>
                            <a href="#" class="dropdown-item no-padding-bottom">
                                Investment
                            </a>
                        </li>
                    <?php
                }else
                {

                }
            ?>
            <hr />
            <li>
                <a href="#" class="dropdown-item no-padding-bottom">
                    Report
                </a>
            </li>
            <hr />
            <li><a rel="nofollow" href="?logout" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
        </ul>

    </li>&nbsp;&nbsp;&nbsp;



</ul>
        <?php
    }
?>