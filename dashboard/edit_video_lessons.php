<?php

session_start();

require_once 'includes.php';

require_once 'conn.php';

require_once 'dbconfig4.php';

	if(isset($_GET['leid']) && !empty($_GET['leid']))
	{
		$id = $_GET['leid'];

		$stmt_edit = $DB_con->prepare('SELECT * FROM lmslesson WHERE lid =:leid');

		$stmt_edit->execute(array(':leid'=>$id));

		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);

		extract($edit_row);

	}

	else

	{

		header("Location: video_lessons.php");

	}	

	if(isset($_POST['update']))

	{

		$tid = $_POST['tid'];
		
		$type = $_POST['type'];
		
		$class = $_POST['class'];
		
		$subject = $_POST['subject'];
		
		$title = $_POST['title'];
		
		$video = $_POST['video'];
			
		$status = $_POST['status'];
		
		date_default_timezone_set("Asia/Colombo");
	
	    $payment_month=mysqli_real_escape_string($conn,$_POST['payment_month'].date("-d H:i:s"));
		
		$available_days = $_POST['available_days'];
		$no_of_views_per_day = $_POST['no_of_views_per_day'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		if($imgFile)

		{

			$upload_dir = 'images/lesson/cover/'; // upload directory	

			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif' ,'docx' , 'pdf' , 'video' , 'mp3'); // valid extensions

			$userpic = rand(1,1000000).".".$imgExt;

			if(in_array($imgExt, $valid_extensions))

			{			

				if($imgSize < 5000000)

				{

					unlink($upload_dir.$edit_row['cover']);

				 	move_uploaded_file($tmp_dir,$upload_dir.$userpic);

				}

				else

				{

					$errMSG = "Sorry, your file is too large it lmsould be less then 5MB";

				}

			}

			else

			{

				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		

			}	

		}

		else

		{

			// if no image selected the old image remain as it is.

			$userpic = $edit_row['cover']; // old image from database

		}

		if(!isset($errMSG))

		{

			$stmt = $DB_con->prepare('UPDATE lmslesson

									     SET tid=:tid,
		
										     type=:type,
											 
											 class=:class,
										 
											 subject=:subject,
											 
											 title=:title,

											 cover=:upic,

											 video=:video,
											 
											 add_date=:payment_month,

											 status=:status,

											 available_days=:available_days,
											 
											 no_of_views_per_day=:no_of_views_per_day

								       WHERE lid=:leid');

			$stmt->bindParam(':tid',$tid);
			
			$stmt->bindParam(':type',$type);
			
			$stmt->bindParam(':class',$class);
			
			$stmt->bindParam(':subject',$subject);

			$stmt->bindParam(':title',$title);

			$stmt->bindParam(':upic',$userpic);

			$stmt->bindParam(':video',$video);
			
			$stmt->bindParam(':payment_month',$payment_month);
			
			$stmt->bindParam(':status',$status);
			
			$stmt->bindParam(':available_days',$available_days);
			
			$stmt->bindParam(':no_of_views_per_day',$no_of_views_per_day);

			$stmt->bindParam(':leid',$id);

			if($stmt->execute()){

				$successMSG = "Video Lesson Successfully Updated ...";

				header("refresh:2;video_lessons.php"); // redirects image view page after 5 seconds.

			}

			else{

				$errMSG = "Sorry Data Could Not Updated !";

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
    <title>Edit Video Lessons | Online Learning Platforms | Dashboard</title>
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
                            <h4>Edit Video Lessons</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="class_tute.php">Video Lessons</a></li>
                            <li class="breadcrumb-item active"><a href="edit_class_tute.php">Edit Video Lessons</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Edit Video Lessons</h5>
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
                                <form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Teacher</label>
												<select class="form-control" name="tid" required>
                      <option value="<?php

						$id = $tid;

						$query = $DB_con->prepare('SELECT tid FROM lmstealmsr WHERE tid='.$id);

						$query->execute();

						$result = $query->fetch();

						echo $result['tid'];

						?>"><?php

						$id = $tid;

						$query = $DB_con->prepare('SELECT fullname FROM lmstealmsr WHERE tid='.$id);

						$query->execute();

						$result = $query->fetch();

						echo $result['fullname'];

						?></option>
                      <?php
												$stmt = $DB_con->prepare('SELECT * FROM lmstealmsr ORDER BY tid');

												$stmt->execute();

												if($stmt->rowCount() > 0)

												{

												while($row=$stmt->fetch(PDO::FETCH_ASSOC))

												{

												extract($row);

												?>
												<option value="<?php echo $row['tid']; ?>"><?php echo $row['fullname']; ?></option>
												<?php 
												} 
												}
												?>
                      </select>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Type</label>
												<select class="form-control" name="type" required>
                      <option><?php echo $type; ?></option>
                      <option>Free</option>
                      <option>Paid</option>
                      </select>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Al Year</label>
												<select class="form-control" id="input-6" name="class" required onChange="JavaScript:send_level(this.value);">
						<option value="<?php

						$id = $class; 

						$query = $DB_con->prepare('SELECT cid FROM lmsclass WHERE cid='.$id);

						$query->execute();

						$result = $query->fetch();

						echo $result['cid'];

						?>" hidden="lms"><?php

						$id = $class; 

						$query = $DB_con->prepare('SELECT name FROM lmsclass WHERE cid='.$id);

						$query->execute();

						$result = $query->fetch();

						echo $result['name'];

						?>
						</option>
					  <?php
								
								require_once 'dbconfig4.php';
								
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
										<script>
			function send_level(level_id){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("subject_dis").innerHTML = this.responseText;
				}
				};
				xhttp.open("GET", "ajax_subject_filter.php?level_id="+level_id, true);
				xhttp.send();
			}
			</script>
										<div class="col-lg-3 col-md-3 col-sm-12">
											<div class="form-group">
												<label class="form-label">Class Subject</label>
												<span id="subject_dis">
						<select name="subject" id="" required class="form-control">
						
						<?php
							if($_GET['leid']){
								$sub_qury=mysqli_query($conn,"SELECT * FROM lmslesson WHERE lid='$_GET[leid]'");
								$sub_resalt=mysqli_fetch_array($sub_qury);
							}
							?>
						<option hidden="lms"><?php if(isset($_GET['leid'])){echo $sub_resalt['subject'];}else{echo "Subject Not Found";} ?></option>
						</select>
						</span>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<div class="form-group">
												<label class="form-label">Title</label>
												<input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Cover Image</label>
												<input type="file" class="form-control" name="user_image">
					  <hr>
					  <p style="font-weight:bold;color:red;">Note : "Only Upload - Jpg|Png"</p>
											</div>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-12">
											<div class="form-group">
												<label class="form-label">Video URL</label>
												<input class="form-control" type="text" name="video" placeholder="Video URL" value="<?php echo $video; ?>" required>
											</div>
										</div>
										
										<div class="col-lg-3 col-md-6 col-sm-12 mb-2">
											<label class="form-label">Upload Month</label>
											<input name="payment_month" type="month" id="payment_month" class="form-control" value="<?php echo date_format(date_create($edit_row['add_date']),"Y-m"); ?>">
										</div>

										<div class="col-lg-2 col-md-2 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select class="form-control" name="status" required>
					  <option value="1"<?php if(['status']=="1"){echo "selected";} ?>>Published</option>
                      <option value="0"<?php if(['status']=="0"){echo "selected";} ?>>Unpublished</option>
                      </select>
											</div>
										</div>


										<div class="col-lg-2 col-md-2 col-sm-12">
											<div class="form-group">
												<label class="form-label">Available Days</label>
												<input class="form-control" type="text" name="available_days" placeholder="Available Days" value="<?php echo $available_days; ?>" required>
											</div>
										</div>


										<div class="col-lg-2 col-md-2 col-sm-12">
											<div class="form-group">
												<label class="form-label">Views Per Day</label>
												<input class="form-control" type="text" name="no_of_views_per_day" placeholder="Views Per Day" value="<?php echo $no_of_views_per_day; ?>" required>
											</div>
										</div>


										<div class="col-lg-12 col-md-12 col-sm-12">
											<input type="submit" name="update" class="btn btn-primary" value="Update">
											<a class="btn btn-light" href="video_lessons.php"><i class="fa fa-times"></i> Cancel</a>
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