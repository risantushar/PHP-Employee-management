<?php

include('database/database.php');

$obj = new query();
    $name='';
	$email='';
	$info='';
	$date_of_birth='';
	$mobile='';
	$gender='';
	$profile_image='';
    $id='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$result=$obj->getData('employee','*',$condition_arr);
	$name=$result['0']['name'];
	$email=$result['0']['email'];
	$info=$result['0']['info'];
	$date_of_birth=$result['0']['date_of_birth'];
	$mobile=$result['0']['mobile_number'];
	$gender=$result['0']['gender'];
	$profile_image=$result['0']['profile_image'];
}

if(isset($_POST['submit'])){
	$name=$obj->get_safe_str($_POST['name']);
	$email=$obj->get_safe_str($_POST['email']);
	$info=$obj->get_safe_str($_POST['info']);
	$date_of_birth=$obj->get_safe_str($_POST['date_of_birth']);
	$mobile=$obj->get_safe_str($_POST['mobile_number']);
	$gender=$obj->get_safe_str($_POST['gender']);

    //image upload section start
    $profile_image=$_FILES['profile_image'];
    $profile_image_name= $profile_image['name'];

    $profile_image_temp=$profile_image['tmp_name'];
    //get extention of the file
    $profile_image_ext=explode('.',$profile_image_name);
    $file_check= strtolower(end($profile_image_ext));
    $profile_image_ext_store=array('png','jpg','jpeg');
    if(in_array($file_check,$profile_image_ext_store))
    {
        $destination_path= 'images/profile images/'.$profile_image_name;
        move_uploaded_file($profile_image_temp,$destination_path);
    }
    //image upload end

	
	$condition_arr=array('name'=>$name,'email'=>$email,'info'=>$info,'date_of_birth'=>$date_of_birth,'mobile_number'=>$mobile,'gender'=>$gender,'profile_image'=>$destination_path);
	
	$obj->updateData('employee',$condition_arr,'id',$id);
	
	header('location:index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Employee Management</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h1 class="modal-title">Edit Employee</h1>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" value="<?php echo $name?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="<?php echo $email?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Info</label>
							<textarea class="form-control" name="info" required><?php echo $info?></textarea>
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="date_of_birth" value="<?php echo $date_of_birth?>">
						</div>
						
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" name="mobile_number" class="form-control" value="<?php echo $mobile?>" required>
						</div>					
						<div class="form-group">
                          <label for="">Gender</label>
                          <select class="form-control" name="gender" id="">
                            <option value="Male"><?php echo $gender ?></option>
                          </select>
                        </div>	

                        <div class="form-group">
							<label>Profile Image</label>
							<img style="height:120px;width:auto" src="<?php echo $profile_image?>" alt="">
						</div>

                        <div class="form-group">
							<label>New Image</label>
							<input type="file" name="profile_image" class="form-control" required>
						</div>	
                    			
					</div>
					<div class="modal-footer">
                    <a href='index.php' class="btn btn-default" value="Cancel">Cancle</a>
						<button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Edit Employee</button>
					</div>
				</form>      
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="js/main.js"></script> -->

</body>
</html>