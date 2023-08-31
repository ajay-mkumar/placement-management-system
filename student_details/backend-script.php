<?php

include('C:\xampp\htdocs\placement\config\db_config.php');
$db=$conn;
// fetch query
function fetch_data(){
 global $db;
 global $id;
  $query="SELECT * from student_details WHERE id='$id'";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$id=$_GET['id'];
$fetchData= fetch_data();
show_data($fetchData);

function show_data($fetchData){
 echo '<table border="1">
        <tr>
        <th>Name of the Student</th>
        <th>Register Number</th>
        <th>Department</th>
        <th>Accademic Year</th>
          <th>Year</th>
          <th>sem</th>
          <th>10th percentage</th>
          <th>12th percentage</th>
            <th>diplpoma</th>
            <th>cgpa</th> </tr>';
  
   if(count($fetchData)>0){

        $sn=1;
        foreach($fetchData as $detail){ 
  
    echo "<tr>
              <td>  ".$detail['student_name']." </td>
        <td>  ".$detail['register_num']. "</td>
        <td>  ".$detail['branch']. "</td>
        <td>  ".$detail['accademic_year']." </td>
        <td>  ".$detail['year']. "</td>
        <td>  ".$detail['sem']. "</td>
        <td>  ".$detail['sslc_percent']." </td>
        <td>  ".$detail['hsc_percent']. "</td>
        <td>  ".$detail['diploma']. "</td>
        <td>  ".$detail['cgpa']. "</td></tr>";
      }}

  echo    '<tr>
            
            <th>I sem</th>
            <th>II sem</th>
            <th>III sem</th> 
            <th>IV sem</th>
            <th>V sem</th>
            <th>VI sem</th> 
            <th>VII sem</th>
            <th>VIII sem</th>   
            <th>email</th>
            <th>gender</th>
            <th>primary skills</th>
            <th>secondary skiils</th>  
              
          </tr>';
        
  if(count($fetchData)>0){

        $sn=1;
        foreach($fetchData as $detail){ 

         echo    "<tr>
        <td>  ".$detail['I_sem']. "</td>
         <td>  ".$detail['II_sem']." </td>
        <td>  ".$detail['III_sem']. "</td>
        <td>  ".$detail['IV_sem']. "</td>
         <td>  ".$detail['V_sem']." </td>
        <td>  ".$detail['VI_sem']. "</td>
        <td>  ".$detail['VII_sem']." </td>
        <td>  ".$detail['VIII_sem']. "</td>
        <td>  ".$detail['email']." </td>
        <td>  ".$detail['gender']. "</td>
         <td>  ".$detail['primary_skills']." </td>
        <td>  ".$detail['secondary_skills']. "</td>
        
     
     </tr>";
 
}}
else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
   

?>