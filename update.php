<?php
include 'connect.php';
session_start();
error_reporting(0);

$id = $_GET['id'];

$userprofile = $_SESSION['user_name'];

if($userprofile == true)
{

}
else
{
  header('location:login.php'); 

}

$sql = "SELECT * FROM FORM where id='$id'";
$data = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($data);
$lan = $result['language'];
$lan2 = explode(",", $lan);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="style.css">
    

</head>

<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
            Update Student Details</div>

    <div class="form">

    <div class="input_field">
        <label>Upload Image</label>
        <input type="file" name="uploadfile" style= "width: 100%">
        <img src="<?php echo $result['std_image']; ?>" width="100" height="100" alt="Current Image">
    </div>        
    
    <div class="form">
    <div class="input_field">
        <label>First Name</label>
        <input type="text" value="<?php echo $result['fname'];?>" class="input" name="fname" required>
    </div>
    
    <div class="input_field">
        <label>Last Name</label>
        <input type="text" value="<?php echo $result['lname'];?>" class="input" name="lname" required>
    </div>
    <div class="input_field">
        <label>Password</label>
        <input type="password" value="<?php echo $result['password'];?>" class="input" name="password" required>
    </div>
    <div class="input_field">
        <label>Confirm Password</label>
        <input type="password"value="<?php echo $result['cpassword'];?>" class="input" name="conpassword" required>
    </div>
    <div class="input_field">
        <label>Gender</label>
        <div class="custom_select">
        <select name="gender" required>
            <option value="">Select</option>
            <option value="male"
            <?php
            if($result['gender'] == 'male')
            {
               echo "selected";
            }
            
            ?>
            
            >

            Male</option>
            <option value="female"
            <?php
            if($result['gender'] == 'female')
            {
               echo "selected";
            }
            
            ?>
            >Female</option>
        </select>
        </div>
    </div>
    <div class="input_field">
        <label>Email Address</label>
        <input type="text" value="<?php echo $result['email'];?>" class="input" name="email" required>
    </div>
    
<div class="input_field">
        <label>Phone Number</label>
        <input type="text" value="<?php echo $result['phone'];?>" class="input" name="phone" required>
    </div>

<div class="input_field">
        <label style="margin-right: 92px;">Are you?</label>
        <input type="radio" name="r1" value="Hafiz-e-Quran"
        <?php if($result['you'] == "Hafiz-e-Quran"){echo "checked";}?>>
<label style="margin-left: 5px;">Hafiz-e-Quran</label>
        <input type="radio" name="r1" value="Orphan" <?php if($result['you'] == "Orphan"){echo "checked";}?>>
        <label style="margin-left: 5px;" >Orphan</label>
        <input type="radio" name="r1" value="Disable" <?php if($result['you'] == "Disable"){echo "checked";}?>>
        <label style="margin-left: 5px;">Disable</label>
        <input type="radio" name="r1" value="Other"><label style="margin-left: 5px;">Other</label>

    </div>
<div class="input_field">
        <label style="margin-right: 92px;">Language</label>
        <input type="checkbox" name="language[]" value="English" <?php if(in_array("English",$lan2))
        {echo "checked";}?> >
        <label style="margin-left: 5px;">English</label>
        <input type="checkbox" name="language[]" value="Urdu" <?php if(in_array("Urdu",$lan2))
        {echo "checked";}?> >
        <label style="margin-left: 5px;">Urdu</label>
        <input type="checkbox" name="language[]" value="Hindi" <?php if(in_array("Hindi",$lan2))
        {echo "checked";}?> >
        <label style="margin-left: 5px;">Hindi</label> 
    </div>
<div class="input_field">
        <label>Address</label>
        <textarea class="textarea" name="address" required><?php echo $result['address'];?>
        </textarea>
    </div>
<div class="input_field term">
        <label class="check">
        <input type="checkbox" name="terms" required>
        <span class="checkmark"></span>
        </label>
        <P>Agree to term and condition </P>
    </div>
<div class="input_field">
    <input type="submit" value="Update Details" class="btn" name="update">
</div>
</form>
    </div>
</body>

</html>
<?php
include'connect.php';
if (isset($_POST['update']))

{
    $filename = $_FILES["uploadfile"]["name"];
    $tempname= $_FILES["uploadfile"]["tmp_name"];

    if (!empty($filename)) {
    $folder = "images/".$filename;
    //echo $folder;
    move_uploaded_file($tempname, $folder);
    } else {
        //Keep the old image..
        $folder = $result['std_image'];
    }

    
    $fname  =$_POST['fname'];
    $lname  =$_POST['lname']; 
    $password  =$_POST['password']; 
    $cpassword  =$_POST['conpassword']; 
    $gender =$_POST['gender']; 
    $email  =$_POST['email'];  
    $phone  =$_POST['phone'];
    $you  =$_POST['r1'];
    
    
    $language  =$_POST['language'];
    $lang1 = implode(",",$language);

    $address =$_POST['address']; 


    $sql  = "UPDATE FORM set std_image='$folder',fname='$fname',lname='$lname',password='$password',cpassword='$cpassword',gender='$gender',email='$email',phone='$phone',you='$you',language='$lang1',address='$address' WHERE id='$id'";


    if ($conn->query($sql)) {
        echo "<script>alert('Record Updated!')</script>";
        ?>
<meta http-equiv = "refresh" content = "0; url = http://localhost/php_crud/display.php" />

        <?php
    } else {
        echo "<p>Failed to update: " . $conn->error . "</p>";
    }
}


?>
