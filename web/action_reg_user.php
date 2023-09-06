<?php
include 'database.php';
$team_name = $_POST['teamName'];
//$team_logo = $_POST['teamLogo'];
$path = $_FILES['teamLogo']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$team_logo= pathinfo($_FILES['teamLogo']['name'], PATHINFO_FILENAME);
$team_logo=$team_logo.'.'.$ext;

$name1 = $_POST['name1'];
$age1 = $_POST['age1'];
$location1 = $_POST['location1'];
$path = $_FILES['picture1']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
//$profile_pic1 = $_POST['picture1'];
$profile_pic1= pathinfo($_FILES['picture1']['name'], PATHINFO_FILENAME);
$profile_pic1=$profile_pic1.'.'.$ext;

$name2 = $_POST['name2'];
$age2 = $_POST['age2'];
$location2 = $_POST['location2'];
$path = $_FILES['picture2']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
//$profile_pic2 = $_POST['picture2'];
$profile_pic2= pathinfo($_FILES['picture2']['name'], PATHINFO_FILENAME);
$profile_pic2=$profile_pic2.'.'.$ext;

$name3 = $_POST['name3'];
$age3 = $_POST['age3'];
$location3 = $_POST['location3'];
$path = $_FILES['picture3']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
//$profile_pic3 = $_POST['picture3'];
$profile_pic3= pathinfo($_FILES['picture3']['name'], PATHINFO_FILENAME);
$profile_pic3=$profile_pic3.'.'.$ext;


$name4 = $_POST['name4'];
$age4 = $_POST['age4'];
$location4 = $_POST['location4'];
$path = $_FILES['picture4']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
//$profile_pic4 = $_POST['picture4'];
$profile_pic4= pathinfo($_FILES['picture4']['name'], PATHINFO_FILENAME);
$profile_pic4=$profile_pic4.'.'.$ext;



$category_name = $_POST['category'];

$sql = "insert into user_reg (team_name,team_logo_name,name_player1,age_player1,location_player1,profile_pic1,name_player2,age_player2,location_player2,profile_pic2
,name_player3,age_player3,location_player3,profile_pic3,name_player4,age_player4,location_player4,profile_pic4,category_player)
values('$team_name','$team_logo','$name1','$age1','$location1','$profile_pic1','$name2','$age2','$location2','$profile_pic2'
,'$name3','$age3','$location3','$profile_pic3','$name4','$age4','$location4','$profile_pic4','$category_name')";
$conn->query($sql);

//uploading Team Logo image here......................................................
$target_dir = "team_logo/";
$target_file = $target_dir . basename($_FILES["teamLogo"]["name"]);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["teamLogo"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["teamLogo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["teamLogo"]["tmp_name"], $target_file)) {

    }
}
//..............................................................................................

//uploading Team Logo image here......................................................
$target_dir = "profile_pic/";
$target_file = $target_dir . basename($_FILES["picture1"]["name"]);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture1"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["picture1"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture1"]["tmp_name"], $target_file)) {

    }
}

$target_file = $target_dir . basename($_FILES["picture2"]["name"]);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture2"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["picture2"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture2"]["tmp_name"], $target_file)) {

    }
}

$target_file = $target_dir . basename($_FILES["picture3"]["name"]);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture3"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["picture3"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture3"]["tmp_name"], $target_file)) {

    }
}

$target_file = $target_dir . basename($_FILES["picture4"]["name"]);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture4"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["picture4"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture4"]["tmp_name"], $target_file)) {

    }
}

header("Location: Reg2.php?message='Registration Successfully'");
