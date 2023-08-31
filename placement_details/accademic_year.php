<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/table.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>

<form method="POST" action="attended_students_list.php">
  <select name="accademic_year">
<option value="2020-2021">2020-2021</option>
<option value="2021-2022">2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option>
</select>
<button type="submit" name="submit">submit</button>
</form>

<!-- <button onclick="sortTable(0)">Name</button> 
<button onclick="sortTable(1)">register number</button>
<button onclick="sortTable(2)">department</button>
<button onclick="sortTable(3)">accademic year</button>
<button onclick="sortTable(4)">year</button> -->
		


<script type="text/javascript">
       function showData(yr){
$(document).ready(function(){
    

      $.ajax({    
        type: "GET",
        url: "attended_students_list.php", 
        data: {
              // Get value
              yr: yr,
        },            
        dataType: "html",                  
        success: function(data){                    
           
           $('#list').html(data);
        }
    });
});
    }
      </script>