<?php
    include('database/database.php');
    $obj= new query();

//add user
// $condition_arr=array('name'=>'Md Alam','email'=>'alam@gmail.com','info'=>'My self Md ALam','date_of_birth'=>'1998-01-01','gender'=>'Male','mobile_number'=>'+88018352472','hobbies'=>'Gaming');
// $result= $obj->insertData('employee',$condition_arr);

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

	$hobbies=$_POST['hobbies'];
    $hobbies_array=implode(',',$hobbies);

	
	$condition_arr=array('name'=>$name,'email'=>$email,'info'=>$info,'date_of_birth'=>$date_of_birth,'mobile_number'=>$mobile,'gender'=>$gender,'profile_image'=>$destination_path,'hobbies'=>$hobbies_array);

	$obj->insertData('employee',$condition_arr);

	header('location:index.php');
	die();
	
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
						<h1 class="modal-title">Add Employee</h1>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Info</label>
							<textarea class="form-control" name="info" required></textarea>
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="date_of_birth" value="2015-08-09">
						</div>
						
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" name="mobile_number" class="form-control" required>
						</div>					
						<div class="form-group">
                          <label for="">Gender</label>
                          <select class="form-control" name="gender" id="">
                            <option>Select one option</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>	

                        <div class="form-group">
							<label>Profile Image</label>
							<input type="file" name="profile_image" class="form-control" required>
						</div>	

                        <div class="form-group">
							<label>Hobbies</label>
						    </div>	
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="hobbies[]" value="Sports" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Sports</label>

                            <input type="checkbox" name="hobbies[]" value="Gaming" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Gaming</label>

                            <input type="checkbox" name="hobbies[]" value="Gardening" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Gardening</label>

                            <input type="checkbox" name="hobbies[]" value="Reading" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Reading</label>
                        </div>
                    			
					</div>
					<div class="modal-footer">
						<a href='index.php' class="btn btn-default" value="Cancel">Cancle</a>
						<button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Add Employee</button>
					</div>
				</form>      
    </div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="js/main.js"></script> -->

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</body>
</html>