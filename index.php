<?php 
$msg = " ";
$sql = " ";

 include('config/db.connect.php');


  $profileImageName = $name = $email = $phone = $brand = $department = $faculty = $instagram = $twitter = $matric = $state = $what = $level =  $school = '';
  $errors = array('profileImageName' =>'' ,'name' => '', 'email' => '', 'phone' => '' , 'brand' => '' , 'department' => '' , 'faculty' => '' , 'instagram' => '' , 'twitter' => '' , 'matric' => '','state' =>'','what' =>'','level' =>'','school' =>'');

  if(isset($_POST['submit'])){
    
    // check email
    if(empty($_POST['email'])){
      $errors['email'] = 'An email is required';
    } else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email address';
      }
    }

    // check location
   if(empty($_POST['name'])){
      $errors['name'] = 'A name is required';
    } else{
      $name = $_POST['name'];
        if(!preg_match('/^[0-9a-zA-Z\s-]+$/', $name)){
        $errors['name'] = 'name must be letters and spaces only';
      }
    }

    if(empty($_POST['phone'])){
      $errors['phone'] = 'A phone number is required';
    } else{
      $phone = $_POST['phone'];
      if(!preg_match('/^\d{11}$/', $phone)){
        $errors['phone'] = 'Phone number must be numeric and 11 digits only';
      }
    }
    // check destination
    if(empty($_POST['brand'])){
      $errors['brand'] = 'Brand is required';
    } else{
      $brand = $_POST['brand'];
      if(!preg_match('/^[0-9a-zA-Z\s,._-]+$/', $brand)){
        $errors['brand'] = 'brand must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }
    
    // check time_of_travel
    if(empty($_POST['department'])){
      $errors['department'] = 'A department is required';
    } else{
      $department = $_POST['department'];
      if(!preg_match('/^[0-9a-zA-Z\s_,.-]+$/', $department)){
        $errors['department'] = 'Department must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }

    if(empty($_POST['faculty'])){
      $errors['faculty'] = 'A faculty is required';
    } else{
      $faculty = $_POST['faculty'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $faculty)){
        $errors['faculty'] = 'A faculty must be letters and spaces only';
      }
    }


   if(empty($_POST['instagram'])){
      $errors['instagram'] = ' An Instagram account is required';
    } else{
      $instagram = $_POST['instagram'];
      if(!preg_match('/^[0-9a-zA-Z\s_,.-]+$/', $instagram)){
        $errors['instagram'] = 'Instagram must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }


     if(empty($_POST['twitter'])){
      $errors['twitter'] = 'A Twitter account is required';
    } else{
      $twitter = $_POST['twitter'];
      if(!preg_match('/^[0-9a-zA-Z\s_,.-]+$/', $twitter)){
        $errors['twitter'] = 'Twitter must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }



     if(empty($_POST['matric'])){
      $errors['matric'] = 'Matric Number is required';
    } else{
      $matric = $_POST['matric'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $matric)){
        $errors['matric'] = 'Matric Number must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }



     if(empty($_POST['state'])){
      $errors['state'] = 'State of origin is required';
    } else{
      $state = $_POST['state'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $state)){
        $errors['state'] = 'State must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }

     if(empty($_POST['what'])){
      $errors['what'] = 'An Answer is required';
    } else{
      $what = $_POST['what'];
      if(!preg_match('/^[0-9a-zA-Z\s,._-]+$/', $what)){
        $errors['what'] = 'Answer must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }


     if(empty($_POST['level'])){
      $errors['level'] = 'Level is required';
    } else{
      $level = $_POST['level'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $level)){
        $errors['level'] = 'level must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }



   
     if(empty($_POST['school'])){
      $errors['school'] = 'School is required';
    } else{
      $school = $_POST['school'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $school)){
        $errors['school'] = 'School must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }

  if (isset($_POST['submit']) && !empty('profile_image')) {
      
    
  
  echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";
  

  $profileImageName = time () . '_' . $_FILES['profileImage']['name'];

  $target = 'images/' . $profileImageName;

  if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
   echo "";
    if (mysqli_query($conn, $sql)) {

  }else{
         
  }
  

  
  }else{
    $msg = "failed to upload image";


}
  




}



    if(array_filter($errors)){
      echo '<h4 style="color:red;"><em>Error in the form</em></h4>';
    }else{
            
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
             $brand = mysqli_real_escape_string($conn, $_POST['brand']);
             $department = mysqli_real_escape_string($conn, $_POST['department']);
             $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
             $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
             $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
             $matric = mysqli_real_escape_string($conn, $_POST['matric']);
             $state = mysqli_real_escape_string($conn, $_POST['state']);
             $what = mysqli_real_escape_string($conn, $_POST['what']);
             $level = mysqli_real_escape_string($conn, $_POST['level']);
             $school = mysqli_real_escape_string($conn, $_POST['school']);


  
  
            //create sql
            $sql = "INSERT INTO panda (email,name,phone,brand,department,faculty,instagram,twitter,matric,state,what,level,school,profile_image) VALUES ('$email','$name','$phone','$brand','$department','$faculty','$instagram','$twitter','$matric','$state','$what','$level','$school','$profileImageName')";

            //save to db and check;
             if(mysqli_query($conn, $sql)){
              echo "<h4 style=color:blue;>Booking successful, we will get back to you soon</h4>";
              //header('Location: index.php');

            }else {

              //error
              echo 'query error:' . mysqli_error($conn);
            }

            
    
    }

  } // end POST check

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Defem Autocare</title>
   <style>
    .brand-logo{
     height: 30px;
     width: 30px;
    }
    ul li a:hover{
      background-color: black;
    }
   .defem{
      margin-left: -20px;
    }
    .defem1{
      margin-left: -20px;
    }
    .con{
      background-color: red;
      width: 10px;

    }
    #profileDisplay{
      max-width: 200px;
      min-height: 200px;
    }
  </style>
</head>
<body>
<header>
   
    
  </header>


 <div class="container z-depth-2 section"> 
 <div class="row">
      <div class="m6 l8 col push-l2 push-m4 s9 push-s2">
        <h3 style="font-family: sans-serif; color: red;">PANDA SPORT WELCOMES YOU</h3>
      </div>
    </div> 
    <div class="row">
      <div class="m6 l8 col push-l4 push-m4 s9 push-s2">
        <h4 style="font-family: sans-serif;">SUBMIT APPLICATION</h4>
      </div>
    </div>
  </div>



<form class="white" action="index.php" method="POST" enctype="multipart/form-data">

  
      <?php if(!empty($msg)): ?>
        <?php echo $msg; ?>
      <?php endif; ?>
            <div class="container">
            <img src="images/download.png" onclick="triggerClick()" id="profileDisplay" />
            </div>
      <label for="profileImage">profileImage</label>
      <input type="file" name="profileImage"  value="<?php echo htmlspecialchars($profile_image) ?>" onchange="displayImage(this)" id="profileImage" style="display: none;">
    

    <script src="scripts.js"></script>


<!--<div class="form-group">
  <label for="Image">Image</label>
  <input type="file" name="Image" id="image" class="form-control">
  
</div>-->


<div class="container section" style="background-color:white">
    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Full Name</h6>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
      </div>
    </div> 
  

    <div class="hide-on-small-only">
    <div class="input-field" value="<?php echo htmlspecialchars($state) ?>">
      <div class="red-text center"><?php echo $errors['state']; ?></div>
      <div class="row">
        <div class="col l6 m6 push-m3 push-l3">
          <h6>State</h6>
          <select name="state">
            <option value="" disabled selected>select</option>
            <option>Abia</option>
            <option>Adamawa</option>
            <option>Akwa Ibom</option>
            <option>Anambra</option>
             <option>Bauchi</option>
            <option>Bayelsa</option>
            <option>Benue</option>
            <option>Borno</option>
             <option>Cross River</option>
            <option>Delta</option>
            <option>Ebonyi</option>
            <option>Edo</option>
             <option>Ekiti</option>
            <option>Enugu</option>
            <option>Gombe</option>
            <option>Imo</option>
             <option>Jigawa</option>
            <option>Kaduna</option>
            <option>Kano</option>
            <option>Kastsina</option>
             <option>Kebbi</option>
            <option>Kogi</option>
            <option>Kwara</option>
            <option>Lagos</option>
             <option>Nasarawa</option>
            <option>Niger</option>
            <option>Ogun</option>
            <option>Ondo</option>
             <option>Osun</option>
            <option>Oyo</option>
            <option>Plateau</option>
            <option>Rivers</option>
            <option>Sokoto</option>
            <option>Taraba</option>
            <option>Yobe</option>
            <option>Zamfara</option>
          </select>
        </div>
      </div>

    </div>

  </div>

      


    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">School</h6>
        <input type="text" name="school" value="<?php echo htmlspecialchars($school) ?>">
         <div class="red-text"><?php echo $errors['school']; ?></div>
      </div>
    </div>


     <div class="hide-on-small-only">
    <div class="input-field" value="<?php echo htmlspecialchars($faculty) ?>">
      <div class="red-text center"><?php echo $errors['faculty']; ?></div>
      <div class="row">
        <div class="col l6 m6 push-m3 push-l3">
          <h6>Faculty</h6>
          <select name="faculty">
            <option value="" disabled selected>select</option>
            <option>Arts</option>
            <option>Agriculture</option>
            <option>Engineering</option>
            <option>Education</option>
            <option>Management Science</option>
            <option>Social Science</option>
            <option>Others</option>
          </select>
        </div>
      </div>

    </div>

  </div>


     
    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Department</h6>
        <input type="text" name="department" value="<?php echo htmlspecialchars($department) ?>">
         <div class="red-text"><?php echo $errors['department']; ?></div>
      </div>
    </div>

     <div class="hide-on-small-only">
    <div class="input-field" value="<?php echo htmlspecialchars($level) ?>">
      <div class="red-text center"><?php echo $errors['level']; ?></div>
      <div class="row">
        <div class="col l6 m6 push-m3 push-l3">
          <h6>Level</h6>
          <select name="level">
            <option value="" disabled selected>select</option>
            <option>100</option>
            <option>200</option>
            <option>300</option>
            <option>400</option>
            <option>500</option>
            <option>Extra Year</option>
          </select>
        </div>
      </div>

    </div>

  </div>


    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Matric Number</h6>
        <input type="text" name="matric" value="<?php echo htmlspecialchars($matric) ?>">
        <div class="red-text"><?php echo $errors['matric']; ?></div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">Email</h6>
        <div class="input-field">
          <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
          <div class="red-text"><?php echo $errors['email']; ?></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Phone Number</h6>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>">
         <div class="red-text"><?php echo $errors['phone']; ?></div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">Twitter Handle</h6>
        <div class="input-field">
          <input type="text" name="twitter" class="" value="<?php echo htmlspecialchars($twitter) ?>">
          <div class="red-text"><?php echo $errors['twitter']; ?></div>
        </div>
      </div>
    </div>

 

  <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">Instagram Handle</h6>
        <div class="input-field">
          <input type="text" name="instagram" class="" value="<?php echo htmlspecialchars($instagram) ?>">
          <div class="red-text"><?php echo $errors['instagram']; ?></div>
        </div>
      </div>
    </div>

     <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">What are your thoughts about africa can play tournament</h6>
        <div class="input-field">
          <input type="text" name="what" class="" value="<?php echo htmlspecialchars($what) ?>">
          <div class="red-text"><?php echo $errors['what']; ?></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">What brand do you represent</h6>
        <div class="input-field">
          <input type="text" name="brand" class="" value="<?php echo htmlspecialchars($brand) ?>">
          <div class="red-text"><?php echo $errors['brand']; ?></div>
        </div>
      </div>
    </div>

<div class="center section">
        <input type="submit" name="submit" value="Submit" class="btn brand black z-depth-0">
      </div>
    </div>

  </form>

<div class="row">
  <div class="col l6 push-l5 s8 push-s3 m6 push-m4">
<p><i>*Please ensure your email address and phone number is correct*</i></p>
</div>
</div>
 

    <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  <script>
    $(document).ready(function(){

      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({
        disableWeekends: true
      })
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
       $('.slider').slider();
       $('select').formSelect();
    });
  </script>





</body>