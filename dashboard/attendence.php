<?php

session_start();

require_once 'includes.php';

require_once 'conn.php';

require_once 'dbconfig4.php';

if(isset($_GET['remove'])){
	$remove=mysqli_real_escape_string($conn,$_GET['remove']);
	mysqli_query($conn,"DELETE FROM lmsclass_schlmsle WHERE classid='$remove'");
	echo "<script>window.location='class_schedule.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Class Schedule | Online Learning Platforms | Dashboard</title>
   <?php
	require_once 'headercss.php';
	?>

</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?php require_once 'navheader.php';?>

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="images/profile/pic1.jpg" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="admin.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2"><?php echo $user_name;?></span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
<?php

require_once 'sidebarmenu.php';

?>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Students Attendence</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Students Attendence</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Students Attendence</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="table table-bordered">
												<thead>
													<tr>
														<th>#</th>
														<th>Teacher</th>
														<th>Lesson</th>
														<th>Grade</th>
														<th>Subject</th>
														<th>Month</th>
														<th>Date</th>
														<th>Start</th>
														<th>End</th>
														<th>Add Time</th>
													</tr>
												</thead>
												<tbody>
<?php
$count=0;
$list_qury=mysqli_query($conn,"SELECT * FROM lmsclass_schlmsle INNER JOIN lmstealmsr ON lmsclass_schlmsle.tealmsr=lmstealmsr.tid ORDER BY classid DESC");

while($list_resalt=mysqli_fetch_array($list_qury)){
$count++;
	
$level_qury=mysqli_query($conn,"SELECT * FROM lmsclass WHERE cid='$list_resalt[level]'");
$level_resalt=mysqli_fetch_array($level_qury);

$subject_qury=mysqli_query($conn,"SELECT * FROM lmsclass_schlmsle WHERE classid='$list_resalt[classid]'");
$subject_resalt=mysqli_fetch_array($subject_qury);
?>
<tr>
<td><?php echo number_format($count,0); ?></td>		
<td style="text-transform: capitalize;"><?php echo $list_resalt['fullname']; ?></td>
<td style="text-transform: capitalize;"><a href="attendence_result.php?att_res=<?php echo $list_resalt['classid']; ?>"><?php echo $list_resalt['lesson']; ?></a></td>
<td style="text-transform: capitalize;"><?php echo $level_resalt['name']; ?></td>
<td style="text-transform: capitalize;">
<?php

						$id = $subject_resalt['subject'];

						require_once 'dbconfig4.php';
								
						$query = $DB_con->prepare('SELECT name FROM lmssubject WHERE sid='.$id);

						$query->execute();

						$result = $query->fetch();

						echo $result['name'];

?>
</td>
<td><span class="badge badge-primary" style="font-size:14px;"> <?php echo date_format(date_create($list_resalt['add_date2']),"F"); ?></span></td>
<td><?php echo date_format(date_create($list_resalt['classdate']),"M d, Y"); ?></td>
<td><?php echo date_format(date_create($list_resalt['class_start_time']),"h:i:s A"); ?></td>
<td><?php echo date_format(date_create($list_resalt['class_end_time']),"h:i:s A"); ?></td>
<td><?php echo date_format(date_create($list_resalt['add_date2'])," h:i:s A"); ?></td>
													
													</tr>
								<?php 
								}
								?>
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>

						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <?php
		require_once 'footer.php';
		?>

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php
	require_once 'footerjs.php';
	?>
    
	
</body>
</html>