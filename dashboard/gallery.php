<?php

session_start();

require_once 'includes.php';

require_once 'conn.php';

require_once 'dbconfig4.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gallery | Online Learning Platforms | Dashboard</title>
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
                            <h4>All Gallery</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Gallery</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Gallery</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
						<ul class="nav nav-pills mb-3">
							<li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li>
							<li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li>
						</ul>
					</div>
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">All Gallery</h4>
										<a href="add_gallery.php" class="btn btn-square btn-secondary">+ Add Gallery</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="table table-bordered">
												<thead>
													<tr>
														<th>ID</th>
						<th>Image</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
													</tr>
												</thead>
												<tbody>
								<?php

								$stmt = $DB_con->prepare('SELECT * FROM lmsgallery ORDER BY id');

								$stmt->execute();

								if($stmt->rowCount() > 0)

								{

								while($row=$stmt->fetch(PDO::FETCH_ASSOC))

								{

								extract($row);

								?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
						<td><img src="images/gallery/<?php echo $row['image']; ?>" alt="" width="100" height="60"></td>
						<td><?php echo $row['add_date']; ?></td>
						<td><span class="badge badge-success"><?php echo $row['status']; ?></span></td>
						<td><a class="btn btn-primary" href="edit_gallery.php?glid=<?php echo $row["id"]; ?>">
												<i class="fa fa-edit"></i>
												</a>
												<a class="btn btn-danger" href="delete_gallery.php?glid=<?php echo $row["id"]; ?>">
												<i class="fa fa-times-circle"></i> 
												</a></td>										
													</tr>
								<?php 
								}
								}
								?>
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>
							<div id="grid-view" class="tab-pane fade col-lg-12">
								<div class="row">
									<tbody>
<?php

								$stmt = $DB_con->prepare('SELECT * FROM lmsgallery ORDER BY id');

								$stmt->execute();

								if($stmt->rowCount() > 0)

								{

								while($row=$stmt->fetch(PDO::FETCH_ASSOC))

								{

								extract($row);

								?>
									<div class="col-lg-4 col-md-6 col-sm-6 col-12">
										<div class="card">
											<div class="card-body">
												<div class="text-center">
													<div class="profile-photo">
													<img src="images/gallery/<?php echo $row['image']; ?>"  width="100%" height="250">
													</div>
													<ul class="list-group mb-3 list-group-flush">
													<li class="list-group-item px-0 d-flex justify-content-between">
															<span class="mb-0">Status : </span><strong><span class="badge badge-success"><?php echo $row['status']; ?></span></strong></li>
													<li class="list-group-item px-0 d-flex justify-content-between">
															<span class="mb-0">Added Date : </span><strong><?php echo $row['add_date']; ?></strong></li>
													</ul>
												<a class="btn btn-primary btn-rounded mt-3 px-4" href="edit_gallery.php?glid=<?php echo $row["id"]; ?>">
												<i class="fa fa-edit"></i>
												</a>
												<a class="btn btn-danger btn-rounded mt-3 px-4" href="delete_gallery.php?glid=<?php echo $row["id"]; ?>">
												<i class="fa fa-times-circle"></i> 
												</a>	
												</div>
											</div>
										</div>
									</div>
<?php 
								}
								}
								?>
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