<?php
include('database/database.php');

$obj = new query();

//fetch user
$result=$obj->getData('employee','*','','id','desc');

//delete user
if(isset($_GET['type']) && $_GET['type']=='delete')
{
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$obj->deleteData('employee',$condition_arr);

	header('location:index.php');
	die();
}

// if(isset($_POST['search']))
// {
// 	$con=mysqli_connect('localhost','risantushar','risantushar#*','db_employee_management');
// 	$searchkey= $obj->get_safe_str($_POST['search']);

// 	$sql="select * from employee where name like '%$searchkey%' or email like '%$searchkey%' ";

// 	$result=mysqli_query($con,$sql);
// 	if(mysqli_num_rows($result>0))
//             {
//                 echo "Yes";
//             }
//             else{
//                 echo "No";
//             }


// 	// $result=$obj->searchData('employee','*',$searchkey);

// 	// $sql ="SELECT * FROM employee WHERE name LIKE '%$searchkey%' ";
// }



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
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-4">
							<h2><b>Employee Management</b> System</h2>
						</div>
						<form action="" method="post">
							<div class="col-xs-4">
								<input style="float:right" type="text" id="search" class="form-control" placeholder="Search by name" onkeyup="searchFunction()">
								<!-- <button type="submit" name="submit" class="btn btn-primary">Search</button> -->
							</div>
						</form>
						<div class="col-xs-4">
							<a href="add.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover table-responsive" id="employee_table">
					<thead>
						<tr>
							<!-- <th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th> -->
							<th>ID</th>
							<th>Image</th>
							<th>Name</th>
							<th>Email</th>
							<th>Info</th>
							<th>Birthday</th>
							<th>Gender</th>
							<th>Mobile</th>
							<th>Hobbies</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
				if(isset($result['0'])){
				$id=1;	
				foreach($result as $list){
				?>
                  <tr>
							<!-- <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="<?php echo $list['id']?>">
									<label for="checkbox1"></label>
								</span>
							</td> -->
							<td><?php echo $id;?></td>
							<td><img style="height:50px;width:auto" src="<?php echo $list['profile_image']?>" alt=""></td>
							<td><?php echo $list['name']?></td>
							<td><?php echo $list['email']?></td>
							<td><?php echo $list['info']?></td>
							<td><?php echo $list['date_of_birth']?></td>
							<td><?php echo $list['gender']?></td>
							<td><?php echo $list['mobile_number']?></td>
							<td><?php echo $list['hobbies']?></td>
							<td>
								<a href="edit.php?id=<?php echo $list['id']?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="?type=delete&id=<?php echo $list['id']?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
				  <?php 
				  $id++;
				  } } else {?>
                  <tr>
                     <td colspan="8" align="center">No Records Found!</td>
                  </tr>
				  <?php } ?>
										
					</tbody>
				</table>
			</div>
		</div>        
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

function searchFunction(){
	var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("employee_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

}
</script>
</body>
</html>