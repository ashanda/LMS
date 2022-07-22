<?php

session_start();

require_once 'includes.php';

?>

<?php

require_once("config.php");

require_once 'dbconfig4.php';

$msg = '';

$msg5 = '';	

if(isset($_POST['save']))

{

		$class = $_POST['class'];
		
		$name = $_POST['name'];
	
		$price = $_POST['price'];
		
		$fvp = $_POST['fees_valid_period'];

		$status = $_POST['status'];

		if(empty($class)){
			$errMSG = "Please Enter Class.";
		}
		else if(empty($name)){
			$errMSG = "Please Enter Name.";
		}
		else if(empty($price)){
			$errMSG = "Please Enter Price.";
		}
		else if(empty($status)){
			$errMSG = "Please Select Publilms Or Unpublilmsed.";
		}
		
		// if no error occured, continue ....

		if(!isset($errMSG))

		{

			$stmt = $DB_con->prepare('INSERT INTO lmssubject(class_id,name,price,fees_valid_period,status) VALUES(:class,:name,:price,:fees_valid_period,:status)');

			$stmt->bindParam(':class',$class);

			$stmt->bindParam(':name',$name);
			
			$stmt->bindParam(':price',$price);
			
			$stmt->bindParam(':fees_valid_period',$fvp);

			$stmt->bindParam(':status',$status);
			
			if($stmt->execute())

			{

				$successMSG = "Successfully! Add Your Subject....";

				header("refresh:2;subject.php"); // redirects image view page after 5 seconds.

			}

			else

			{

				$errMSG = "error while inserting....";

			}

		}

	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Subject | Online Learning Platforms | Dashboard</title>
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
                            <h4>Add Subject</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Subject</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Subject</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Subject</h4>
							</div>
							<div class="card-body">
							<?php

							if(isset($errMSG)){

							?>
			
							<div class="alert alert-danger alert-dismissible alert-alt solid fade show">
							<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
							<strong>Error!</strong> <?php echo $errMSG; ?>
							</div>

							<?php

							}
	
							else if(isset($successMSG)){

							?>
			
							<div class="alert alert-success alert-dismissible alert-alt solid fade show">
							<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
							<strong>Success!</strong> <?php echo $successMSG; ?>.
							</div>

							<?php

							}

							?>
								<form method="POST" enctype="multlmsrt/form-data">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Grade</label>
												<select name="class" class="form-control">
												<option selected>Select Grade</option>
												<?php

												$stmt = $DB_con->prepare('SELECT * FROM lmsclass ORDER BY cid');

												$stmt->execute();

												if($stmt->rowCount() > 0)

												{

												while($row=$stmt->fetch(PDO::FETCH_ASSOC))

												{

												extract($row);

												?>
												<option value="<?php echo $row['cid']; ?>"><?php echo $row['name']; ?></option>
												<?php } 

												}
												?>
												</select>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject Name</label>
												<input type="text" class="form-control" name="name" placeholder="Enter Subject Name" required>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Price</label>
												<input type="text" class="form-control" name="price" placeholder="Enter Price" required>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Fees Valid Period</label>
												<select name="fees_valid_period" class="form-control">
													<option value="1">1 Day</option>
													<option value="30">30 Days</option>
													<option value="40">40 Days</option>
													<option value="45">45 Days</option>
													<option value="90">90 Days</option>													
												</select>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select class="form-control" name="status" required>
													<option>Publish</option>
													<option>Unpublish</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input type="submit" name="save" class="btn btn-primary" value="Save changes">
											<a class="btn btn-light" href="subject.php"><i class="fa fa-times"></i> Cancel</a>
										</div>
									</div>
								</form>
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