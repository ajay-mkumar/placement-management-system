<?php  
include('C:\xampp\htdocs\placement\config\db_config.php');
session_start();

$register_num=$student_name=$sem=$year=$branch=$sslc_percent=$hsc_percent=$diploma='';
$cgpa=$I_sem=$II_sem=$III_sem=$IV_sem=$V_sem=$VI_sem=$VII_sem=$VIII_sem='';
$address=$email=$gender=$contact=$interest=$dob=$religion=$arear=$aadhar=$pan=$blood_group=$primary_skills=$secondary_skills=$father_name='';

$errors=array('student_name'=>'','reg_num'=>'','10th'=>'','12th'=>'','year'=>'');
if(isset($_POST['submit'])){

    if(empty($_POST['name'])){
        $errors['student_name']="student name is required";
    }
    if(empty($_POST['reg_no'])){
        $errors['reg_num']="Register number is required";
    }
    
    if(empty($_POST['10th'])){
        $errors['10th']="10th percentage is required";
    }
    if(empty($_POST['12th'])){
        $errors['12th']="12th percentage is required";
    }



    if(array_filter($errors)){

    }else{
        $id=$_SESSION['id'];
        $accademic_year=mysqli_real_escape_string($conn,$_POST['accademic-year']);    
        $register_num=mysqli_real_escape_string($conn,$_POST['reg_no']);
        $student_name=mysqli_real_escape_string($conn,$_POST['name']);
        $sem=mysqli_real_escape_string($conn,$_POST['sem']);
        $year=mysqli_real_escape_string($conn,$_POST['year']);
        $branch=mysqli_real_escape_string($conn,$_POST['branch']);
        $sslc_percent=mysqli_real_escape_string($conn,$_POST['10th']);
        $hsc_percent=mysqli_real_escape_string($conn,$_POST['12th']);
        $diploma=mysqli_real_escape_string($conn,$_POST['diploma']);
        $CGPA=mysqli_real_escape_string($conn,$_POST['cgpa']);
        $I_sem=mysqli_real_escape_string($conn,$_POST['I_sem']);
        $II_sem=mysqli_real_escape_string($conn,$_POST['II_sem']);
        $III_sem=mysqli_real_escape_string($conn,$_POST['III_sem']);
        $IV_sem=mysqli_real_escape_string($conn,$_POST['IV_sem']);
        $V_sem=mysqli_real_escape_string($conn,$_POST['V_sem']);
        $VI_sem=mysqli_real_escape_string($conn,$_POST['VI_sem']);
        $VII_sem=mysqli_real_escape_string($conn,$_POST['VII_sem']);
        $VIII_sem=mysqli_real_escape_string($conn,$_POST['VIII_sem']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $gender=mysqli_real_escape_string($conn,$_POST['gender']);
        $contact=mysqli_real_escape_string($conn,$_POST['phone']);
        $father_name=mysqli_real_escape_string($conn,$_POST['father_name']);
        $interest=mysqli_real_escape_string($conn,$_POST['interest']);
        $dob=mysqli_real_escape_string($conn,$_POST['dob']);
        $religion=mysqli_real_escape_string($conn,$_POST['religion']);
        $arear=mysqli_real_escape_string($conn,$_POST['arear']);
        $aadhar=mysqli_real_escape_string($conn,$_POST['aadhar']);
        $pan=mysqli_real_escape_string($conn,$_POST['pan']);
        $blood_group=mysqli_real_escape_string($conn,$_POST['blood_group']);
        $primary_skills=mysqli_real_escape_string($conn,$_POST['primary_skills']);
        $secondary_skills=mysqli_real_escape_string($conn,$_POST['secondary_skills']);

    

        $sql="INSERT INTO student_details(st_id,register_num,student_name,accademic_year,year,branch,sem,sslc_percent,hsc_percent,diploma,cgpa,I_sem,II_sem,III_sem,IV_sem,V_sem,VI_sem,VII_sem,VIII_sem,email,gender,address,contact,interest,father_name,dob,religion,arears,aadhar,pan,blood_group,primary_skills,secondary_skills) VALUES('$id','$register_num','$student_name','$accademic_year','$year','$branch','$sem','$sslc_percent','$hsc_percent','$diploma','$CGPA','$I_sem','$II_sem','III_sem','IV_sem','V_sem','VI_sem','VII_sem','VIII_sem','$email','$gender','$address','$contact','$interest','$father_name','$dob','$religion','$arear','$aadhar','$pan','$blood_group','$primary_skills','$secondary_skills')";

        if(mysqli_query($conn,$sql)){
            $message=urlencode("successfully added details");
            
            header('location: view_your_details.php?Message='.$message,true,303);
            exit;
            
        }else{
            echo "error:" .mysqli_error($conn);
        }

}
}


 ?>





<?php include('header.php'); ?>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>A.V.C College Of Engineering</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="full_student_details.php" role="tab" aria-controls="profile" aria-selected="false">view details</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <form method="POST" action="add_student_details.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Studen Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                <div class="form-group">
                                            <select class="form-control" name="accademic-year">
                                                <option class="hidden"  selected disabled>Accademic Year</option>
                                                <option value="2018-2019">2018-2019</option>
                                                <option value="2019-2020">2019-2020</option>
                                                <option value="2020-2021">2020-2021</option>
                                                <option value="2021-2022">2021-2022</option>
                                                <option value="2022-2023">2022-2023</option>
                                                <option value="2023-2024">2023-2024</option>
                                                <option value="2024-2025">2024-2025</option>
                                                <option value="2025-2026">2025-2026</option>
                                            </select>
                                        </div>
                                
                                        <div class="form-group">
                                            <input type="number" name="reg_no" class="form-control" placeholder="Register Number *" value="<?php echo $register_num; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name *" value="<?php echo $student_name; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="sem" class="form-control" placeholder="Sem *" value="<?php echo $sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="year" class="form-control"  placeholder="year" value="<?php echo $year; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="branch" class="form-control" placeholder="Branch" value="<?php echo $branch; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="10th" class="form-control" placeholder="10th percentage*" value="<?php echo $sslc_percent; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="12th" class="form-control" placeholder="12th percentage " value="<?php echo $hsc_percent; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="diploma" class="form-control" placeholder="Diploma" value="<?php echo $diploma; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cgpa" class="form-control" placeholder="CGPA" value="<?php echo $cgpa; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email *" value="<?php echo $email; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="<?php echo $contact; ?>" />
                                        </div>
                                          </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="I_sem" class="form-control" placeholder="I sem" value="<?php echo $I_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="II_sem" class="form-control" placeholder="II sem" value="<?php echo $II_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="III_sem" class="form-control" placeholder="III_sem" value="<?php echo $III_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="IV_sem" class="form-control" placeholder="IV_sem" value="<?php echo $IV_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="V_sem" class="form-control" placeholder="V_sem" value="<?php echo $V_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="VI_sem" class="form-control" placeholder="VI_sem" value="<?php echo $VI_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="VII_sem" class="form-control" placeholder="VII_sem" value="<?php echo $VII_sem; ?>" />
                                        </div><div class="form-group">
                                            <input type="text" name="VIII_sem" class="form-control" placeholder="VIII_sem" value="<?php echo $VIII_sem; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="address" value="<?php echo $address; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male">
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                  
                                        
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="interest" placeholder="Area of Interest" value="<?php echo $interest; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="father_name" class="form-control" placeholder="Father Name" value="<?php echo $father_name; ?>" />
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="date" name="dob" class="form-control" placeholder="D.O.B" value="<?php echo $dob; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="Religion" value="<?php echo $religion; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="arear" class="form-control" placeholder="No of Arears *" value="<?php echo $arear; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="aadhar" class="form-control" placeholder="Aadhar Number *" value="<?php echo $aadhar; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="pan" class="form-control" placeholder="PAN number" value="<?php echo $pan; ?>" />
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        
                                         <div class="form-group">
                                            <input type="text" name="blood_group" class="form-control" placeholder="blood group" value="<?php echo $blood_group; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="primary_skills" class="form-control" placeholder="Primary skills" value="<?php echo $primary_skills; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="secondary_skills" class="form-control" placeholder="Secondary skills" value="<?php echo $secondary_skills; ?>" />
                                        </div>

                                        <input type="submit" class="btnRegister" name="submit"  value="add student"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
                           