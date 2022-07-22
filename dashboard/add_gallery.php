<?php

session_start();

require_once 'includes.php';

require_once 'conn.php';

require_once 'dbconfig4.php';

$msg = '';

$msg5 = '';	

function imageResize($imageResourceId, $width, $height)
{

    $targetWidth = 1920;
    $targetHeight = 1200;

    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
	
}

if(isset($_POST['save']))

{

		$status = $_POST['status'];
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

		if(empty($status)){
			$errMSG = "Please Select Publilms Or Unpublilmsed.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select image File.";
		} else {
        $upload_dir = 'images/gallery/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'docx', 'pdf', 'video', 'mp3'); // valid extensions

        // rename uploading image
        $userpic = rand(1, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // lmsck file size '5MB'
            if ($imgSize < 5000000) {
                $file = $tmp_dir;
                $sourceProperties = getimagesize($file);
                $fileNewName = time();
                $folderPath = "images/gallery/";
                $ext = pathinfo($imgFile, PATHINFO_EXTENSION);
                $imageType = $sourceProperties[2];


                switch ($imageType) {


                    case IMAGETYPE_PNG:
                        $imageResourceId = imagecreatefrompng($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                        break;


                    case IMAGETYPE_GIF:
                        $imageResourceId = imagecreatefromgif($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                        break;


                    case IMAGETYPE_JPEG:
                        $imageResourceId = imagecreatefromjpeg($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                        break;


                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;
                }


                move_uploaded_file($file, $folderPath . $fileNewName . "." . $ext);
                // echo "Image Resize Successfully.";
                // move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF , DOCX & PDF files are allowed.";
        }
		}
		$upload_name = $fileNewName . "_thump." . $ext;
		
		// if no error occured, continue ....

		if(!isset($errMSG))

		{

			$stmt = $DB_con->prepare('INSERT INTO lmsgallery(image,status) VALUES(:upic,:status)');

			$stmt->bindParam(':upic',$upload_name);

			$stmt->bindParam(':status',$status);
			
			if($stmt->execute())

			{

				$successMSG = "Successfully! Add Your Gallery....";

				header("refresh:2;gallery.php"); // redirects image view page after 5 seconds.

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
    <title>Add Gallery | Online Learning Platforms | Dashboard</title>
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
                            <h4>Add Gallery</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Gallery</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Gallery</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Gallery</h4>
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
												<label class="form-label">Add Image</label>
												<input type="file" class="form-control" name="user_image" required>
					  <hr>
					  <p style="font-weight:bold;color:red;">Note : "Max Width - 1920px x Height - 1200px | Only Upload - Jpg|Png"</p>
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
											<a class="btn btn-light" href="gallery.php"><i class="fa fa-times"></i> Cancel</a>
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