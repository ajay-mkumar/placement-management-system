<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST['sub'])){
	$y=$_POST['accademic-year'];
	echo $y;
	$sql="INSERT INTO demo(year) VALUES ('$y')";

	if(mysqli_query($conn,$sql)){
		echo "success";
	}else{
		echo "error:" .mysqli_error($conn);
	}
} ?>
<form action="dem.php" method="POST">
<select name="accademic-year" id="datepicker">
				<option value="2018-2019">2018-2019</option>
				<option value="2019-2020">2019-2020</option>
				<option value="2020-2021">2020-2021</option>
				<option value="2021-2022">2021-2022</option>
				<option value="2022-2023">2022-2023</option>
				<option value="2023-2024">2023-2024</option>
				<option value="2024-2025">2024-2025</option>
				<option value="2025-2026">2025-2026</option>
			</select>
			<button type="submit" name="sub">sub</button>
		</form>