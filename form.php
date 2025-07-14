
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
            Registarion Form</div>
    
    <div class="form">

    <div class="input_field">
        <label>Upload Image</label>
        <input type="file" name="uploadfile" style= "width: 100%">
        <img src="<?php echo $result['std_image']; ?>" width="100" height="100" alt="Current Image">
    </div>
    <div class="input_field">
        <label>First Name</label>
        <input type="text" class="input" name="fname" required>
    </div>
    
    <div class="input_field">
        <label>Last Name</label>
        <input type="text" class="input" name="lname" required>
    </div>
    <div class="input_field">
        <label>Password</label>
        <input type="password" class="input" name="password" required>
    </div>
    <div class="input_field">
        <label>Confirm Password</label>
        <input type="password" class="input" name="conpassword" required>
    </div>
    <div class="input_field">
        <label>Gender</label>
        <div class="custom_select">
        <select name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        </div>
    </div>
    <div class="input_field">
        <label>Email Address</label>
        <input type="text" class="input" name="email" required>
    </div>
    
<div class="input_field">
        <label>Phone Number</label>
        <input type="text" class="input" name="phone" required>
    </div>

    <div class="input_field">
        <label style="margin-right: 92px;">Are you?</label>
        <input type="radio" name="r1" value="Hafiz-e-Quran"><label style="margin-left: 5px;">Hafiz-e-Quran</label>
        <input type="radio" name="r1" value="Orphan"><label style="margin-left: 5px;" >Orphan</label>
        <input type="radio" name="r1" value="Disable"><label style="margin-left: 5px;">Disable</label>
        <input type="radio" name="r1" value="Other"><label style="margin-left: 5px;">Other</label>

    </div>
    <div class="input_field">
        <label style="margin-right: 92px;">Language</label>
        <input type="checkbox" name="language[]" value="English"><label style="margin-left: 5px;">English</label>
        <input type="checkbox" name="language[]" value="Urdu"><label style="margin-left: 5px;" >Urdu</label>
        <input type="checkbox" name="language[]" value="Hindi"><label style="margin-left: 5px;">Hindi</label>
        
    </div>
<div class="input_field">
        <label>Address</label>
        <textarea class="textarea" name="address" required></textarea>
    </div>
<div class="input_field term">
        <label class="check">
        <input type="checkbox" name="terms" required>
        <span class="checkmark"></span>
        </label>
        <P>Agree to term and condition </P>
    </div>
<div class="input_field">
    <input type="submit" value="Register" class="btn" name="register">
</div>
</form>
    </div>
</body>

</html>
<?php
include'connect.php';
if (isset($_POST['register']))

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

    $id  =$_POST['id'];
    $image  =$_POST['std_image'];
    $fname  =$_POST['fname'];
    $lname  =$_POST['lname']; 
    $password   =$_POST['password']; 
    $cpassword    =$_POST['conpassword']; 
    $gender =$_POST['gender']; 
    $email  =$_POST['email'];  
    $phone  =$_POST['phone'];
    $you  =$_POST['r1'];

    $language  =$_POST['language'];
    $lang1 = implode(",",$language);

    $address =$_POST['address']; 


 
   {

    $sql = "INSERT INTO form (std_image, fname, lname, password, cpassword, gender, email, phone,you,language,address)
        VALUES ('$folder', '$fname','$lname','$password','$cpassword','$gender','$email','$phone','$you','$lang1','$address')";
 

    if ($conn->query($sql)) {
        echo "<script> alert('Data Inserted into Database')</script>";
    } else {
        echo "<script> alert('Failed') " . $conn->error . "</script>";
    }
}
}

?>