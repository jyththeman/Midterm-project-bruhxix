<?php
$con = mysqli_connect("localhost","root","","bruhxix") or die("Connection was not established");
//function for inserting post
function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;
		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image', NOW())";
				$run = mysqli_query($con, $insert);
				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}
				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image',NOW())";
						$run = mysqli_query($con, $insert);
						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
						exit();
					}else{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						$run = mysqli_query($con, $insert);
						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}
function get_posts(){
	global $con;
	$per_page = 4;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}
	$start_from = ($page-1) * $per_page;
	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
	$run_posts = mysqli_query($con, $get_posts);
	while($row_posts = mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];
		$user = "select *from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
        $first_name = $row_user['f_name'];
        $last_name = $row_user['l_name'];
		$user_image = $row_user['user_image'];
		//now displaying posts from database
		if($content=="No" && strlen($upload_image) >= 1)
        {
            ?>

<!-- begin timeline -->
<ul class="timeline">
    <li>
        <!-- begin timeline-time -->
        <div class="timeline-time">
            <span class="time">
                <?php echo $post_date ?></span>
        </div>
        <!-- end timeline-time -->
        <!-- begin timeline-icon -->
        <div class="timeline-icon">
            <a href="javascript:;">&nbsp;</a>
        </div>
        <!-- end timeline-icon -->
        <!-- begin timeline-body -->
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' alt="" /></span>
                <span class="username"><a href="javascript:;"> <?php echo $first_name . " " . $last_name ?></a> <small></small></span>
                <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
            </div>
            <div class="timeline-content">
              <center><div id="gallery" class="gallery">
                    <!-- begin image -->
                    <div class="image gallery-group-1">
                        <div class="image-inner">
                            <a href="imagepost/<?php echo $upload_image ?>" data-lightbox="gallery-group-1">
                                <img src="imagepost/<?php echo $upload_image ?>" alt="" />
                            </a>
                            <br>
                        </div>
                    </div>
                    <!-- end image -->
                </div></center>  
            </div>
            <div class="timeline-comment-box">
                <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' /></div>
                <div class="input">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                            <span class="input-group-btn p-l-10">
                                <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end timeline-body -->
    </li>
</ul>
<!-- end timeline -->

<?php
		}
		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
            ?>
<!-- begin timeline -->
<ul class="timeline">
    <li>
        <!-- begin timeline-time -->
        <div class="timeline-time">
            <span class="time">
                <?php echo $post_date ?></span>
        </div>
        <!-- end timeline-time -->
        <!-- begin timeline-icon -->
        <div class="timeline-icon">
            <a href="javascript:;">&nbsp;</a>
        </div>
        <!-- end timeline-icon -->
        <!-- begin timeline-body -->
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' alt="" /></span>
                <span class="username"><a href="javascript:;"> <?php echo $first_name . " " . $last_name ?></a> <small></small></span>
                <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
            </div>
            <div class="timeline-content">
              <center><div id="gallery" class="gallery">
                    <!-- begin image -->
                    <div class="image gallery-group-1">
                        <div class="image-inner">
                            <a href="imagepost/<?php echo $upload_image ?>" data-lightbox="gallery-group-1">
                                <img src="imagepost/<?php echo $upload_image ?>" alt="" />
                            </a>
                            <br>
                        </div>
                    </div>
                    <!-- end image -->
                </div></center>  
                <p>
                    <?php echo $content ?>
                </p>
            </div>
            <div class="timeline-comment-box">
                <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' /></div>
                <div class="input">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                            <span class="input-group-btn p-l-10">
                                <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end timeline-body -->
    </li>
</ul>
<!-- end timeline -->
<?php
		}
		else{
            ?>
<!-- begin timeline -->
<ul class="timeline">
    <li>
        <!-- begin timeline-time -->
        <div class="timeline-time">
            <span class="time">
                <?php echo $post_date ?></span>
        </div>
        <!-- end timeline-time -->
        <!-- begin timeline-icon -->
        <div class="timeline-icon">
            <a href="javascript:;">&nbsp;</a>
        </div>
        <!-- end timeline-icon -->
        <!-- begin timeline-body -->
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="userimage"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' alt="" /></span>
                <span class="username"><a href="javascript:;"><?php echo $first_name . " " . $last_name ?></a> <small></small></span>
                <span class="pull-right text-muted">PHOTO SHARE COMMUNITY</span>
            </div>
            <div class="timeline-content"> 
                <p>
                    <?php echo $content ?>
                </p>
            </div>
            <div class="timeline-comment-box">
                <div class="user"><img src="users/<?php echo $user_image ?>" class='img-circle' width='100px' height='100px' /></div>
                <div class="input">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-corner" placeholder="Write a comment..." />
                            <span class="input-group-btn p-l-10">
                                <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end timeline-body -->
    </li>
</ul>
<!-- end timeline -->
<?php
		}
	}
	include("pagination.php");
}
?>