<?php
include 'database.php';

$catigory = "BMX";
$teamName = "Not set";
$player1Name = "";
$player2Name = "";
$player3Name = "";
$player4Name = "";

$player1Profile = "";
$player2Profile = "";
$player3Profile = "";
$player4Profile = "";

$player1Age = "";
$player2Age = "";
$player3Age = "";
$player4Age = "";

$player1Location = "";
$player2Location = "";
$player3Location = "";
$player4Location = "";
$totalScore="0";

$sql = "";
if (isset($_GET['clugName'])) {
  $cName = $_GET['clugName'];


  if ($cName == 'no') {

    $sql = "select * from  user_reg";
  } else {
    $sql = "select * from  user_reg where team_name='$cName'";
  }
} else {

  $sql = "select * from  user_reg";
}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $catigory = $row['category_player'];
    $player1Name = $row['name_player1'];
    $player2Name = $row['name_player2'];
    $player3Name = $row['name_player3'];
    $player4Name = $row['name_player4'];

    $player1Profile = $row['profile_pic1'];
    $player2Profile = $row['profile_pic2'];
    $player3Profile = $row['profile_pic3'];
    $player4Profile = $row['profile_pic4'];

    $player1Age = $row['age_player1'];
    $player2Age = $row['age_player2'];
    $player3Age = $row['age_player3'];
    $player4Age = $row['age_player4'];


    $player1Location = $row['location_player1'];
    $player2Location = $row['location_player2'];
    $player3Location = $row['location_player3'];
    $player4Location = $row['location_player4'];
    $teamName = $row['team_name'];


    $sqlTotalMarks="select total_score from player_total_score where team_name='$teamName'";
    $resultTotalScore = $conn->query($sqlTotalMarks);
    
if ($resultTotalScore->num_rows > 0) {
  // output data of each row
  while ($rowTotal = $resultTotalScore->fetch_assoc()) {

    $totalScore=$rowTotal['total_score'];
    break;
  }
}
    break;
  }
}




$VideofolderName = "";
$VideofolderSubPath = "";
$PicturesFolderPath = "";
$PicturesFolderSubPath = "";
$playFound = 'false';
$imagesFound = 'false';
$rootDir= dirname(__FILE__);

if (file_exists($_SERVER['DOCUMENT_ROOT'].'/CamVideos/' . $teamName )) {
  $playFound = 'true';
}


if (file_exists($_SERVER['DOCUMENT_ROOT'].'/CamImages/' . $teamName)) {
  $imagesFound = 'true';
}

if ($playFound == 'true') {


  $scan = scandir('CamVideos/' . $teamName . '/');
  foreach ($scan as $file) {
    if (!is_dir($teamName . "/$file")) {
      $VideofolderName = $file;
    }
  }

  $scan = scandir('CamVideos/' . $teamName . '/' . $VideofolderName . '/');
  foreach ($scan as $file) {
    if (!is_dir($teamName . "/" . $VideofolderSubPath . "/$file")) {
      $VideofolderSubPath = $file;
    }
  }

  if ($imagesFound == 'true') {



    $scan = scandir('CamImages/' . $teamName . '/');
    foreach ($scan as $file) {
      if (!is_dir($teamName . "/$file")) {
        $PicturesFolderPath = $file;
      }
    }

    $scan = scandir('CamImages/' . $teamName . '/' . $PicturesFolderPath . '/');
    foreach ($scan as $file) {
      if (!is_dir($teamName . "/" . $PicturesFolderPath . "/$file")) {
        $PicturesFolderSubPath = $file;
      }
    }
  }





  $camPictures = array();



  $vidoPath1 = 'CamVideos/' . $teamName . '/' . $VideofolderName . '/' . $VideofolderSubPath . '/' . 'cam1.wav';
  $vidoPath2 = 'CamVideos/' . $teamName . '/' . $VideofolderName . '/' . $VideofolderSubPath . '/' . 'cam2.wav';
  $picturePath = 'CamImages/' . $teamName . '/' . $VideofolderName . '/' .  $VideofolderSubPath . '/';
  if ($imagesFound == 'true') {
      if (file_exists($picturePath)) {
    

    foreach (new DirectoryIterator($picturePath) as $fileInfo) {
      if ($fileInfo->isDot() || !$fileInfo->isFile()) continue;
      if (strpos($fileInfo->getFilename(), "Cam1") !== false) {
        $camPictures[] = $fileInfo->getFilename();
      }
      if (strpos($fileInfo->getFilename(), "Cam2") !== false) {
        $camPictures[] = $fileInfo->getFilename();
      }
    }
      }
    
  }
}

//adding view codes here
if ($playFound == 'true') {



  $sql = "select * from  likeview where team_name ='$teamName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $view = (int)$row['views'];
      $view =  $view + 1;
      $sql = "update likeview set views ='$view' where team_name ='$teamName'";
      $conn->query($sql);
      break;
    }
  } else {
    $sql = "insert into likeview (team_name,likes,views) values('$teamName','0','1')";
    $conn->query($sql);
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>YouTube Video Watch Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      background-color: #f8f8f8;
    }

    .logo {
      width: 100px;
      height: 40px;
      background-color: rgb(254, 9, 9);
    }

    .search-bar {
      flex: 1;
      margin: 0 10px;
    }

    .header-tools {
      display: flex;
      align-items: center;
    }

    .video-container {
      width: 840px;
      height: 514px;
      margin: 20px auto;
      margin-left: 10px;
      position: relative;
    }

    #myVideo {
      width: 100%;
      height: 100%;
      object-fit: cover;

    }

    .bar-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 830px;
      height: 100px;

      border-radius: 5px;
      margin: 10px auto;
      margin-left: 10px;
      padding: 5px;
    }


    .search-bar {
      display: flex;
      align-items: center;
      width: 400px;
      height: 40px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 20px;
      padding: 5px;
    }

    .search-bar input[type="text"] {
      flex: 1;
      border: none;
      outline: none;
      padding: 5px;
    }

    .search-bar button {
      background-color: #f8f8f8;
      border: none;
      outline: none;
      padding: 5px;
      cursor: pointer;
    }

    .fa-search {
      color: #999;
    }


    .logo {
      width: 15px;
      height: 15px;
      border: 1px solid black;
    }

    .bar-item {
      margin: 0 10px;
    }

    .container {
      margin-left: 860px;
      margin-top: -535px;
    }

    .category-container {
      margin-bottom: 5px;
      width: 390px;
      height: 150px;
      background-color: gray;
      border: 1px solid black;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .category-box {
      display: flex;
      align-items: center;
    }

    .arrow-backward,
    .arrow-forward {
      width: 20px;
      height: 20px;
      margin: 0 10px;
    }

    .arrow-backward::before,
    .arrow-forward::before {
      content: "";
      display: block;
      width: 20;
      height: 20;
      border: 20px solid transparent;
    }

    .arrow-backward::before {
      border-right-color: black;
    }

    .arrow-forward::before {
      border-left-color: black;
    }

    .category {
      font-size: 70px;
      border: 2px solid green;
      padding: 5px;
    }

    .category-label {
      font-size: 20px;
      margin-top: 10px;
    }

    .score-container {
      margin-bottom: 5px;
      width: 390px;
      height: 150px;
      background-color: gray;
      border: 1px solid black;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .score-box {
      display: flex;
      align-items: center;
    }

    .score {
      font-size: 80px;
      border: 2px solid blue;
      padding: 10px;
    }

    .score-label {
      font-size: 20px;
      margin-top: 10px;
    }

    .user-details {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .img-thumbnail {
      display: inline-block;
      overflow: hidden;
      height: 40px;
      border: 5px solid #fff;
      border-radius: 50%;
    }

    .img-circle {
      background: green;
    }

    .user-text {
      margin-left: 10px;
    }

    .user-text span {
      font-size: 20px;
    }

    .clip {
      display: inline-block;
      overflow: hidden;
      width: 300px;
      height: 250px;
      margin-left: 183px;
      margin-top: -240px;
    }

    .clip img {
      width: 100%;
      height: 100%;
    }


    .container2 {
      margin: 0 auto;
      display: flex;
      margin-top: -50px;
      margin-left: 10px;
    }

    .rounded-link {
      flex: 0 0 auto;
      width: 250px;
      height: 10px;
      background-color: lightgray;
      border: 1px solid gray;
      border-radius: 10px;
      text-align: center;
      line-height: 60px;
      text-decoration: none;
      color: black;
      font-weight: bold;
      background-repeat: no-repeat;
      background-position: center;
      margin-right: 40px;
      margin-top: 50px;
    }

    footer {
      padding: 10px;
      background-color: #f8f8f8;
      text-align: center;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    #table-scroll {
      height: 150px;
      overflow: auto;
      width: 100%;
      margin-top: 20px;
    }
        video::-webkit-media-controls-panel {
  display: flex !important;
  opacity: 1 !important;
}
  </style>

  <script>
    //................................................
    var videoPath11 = '<?php echo $vidoPath1 ?>';
    var videoPath22 = '<?php echo $vidoPath2 ?>';
    var imgPath = '<?php echo $picturePath ?>';
    var imgArrayCam = <?php echo json_encode($camPictures); ?>;
    var bufferVideo='false';
    var videoOneStop='false';
    var time1=11;
    var time2=11;
    
    var myrun=false;
     
    
    
    
    
    
    
    
    
  
    function playVideo() {





      let videoFrame1 = document.getElementById("myVideo1");
      let videoFrame2 = document.getElementById("myVideo2");
      let imageFrame = document.getElementById("showImages");




    videoFrame1.addEventListener('loadedmetadata', function() {
        console.log('video 1 buffering');
    if (videoFrame1.buffered.length === 0) return;

    const bufferedSeconds = videoFrame1.buffered.end(0) - videoFrame1.buffered.start(0);
    console.log(`${bufferedSeconds} seconds of video are ready to play.`);
  });



    videoFrame2.addEventListener('loadedmetadata', function() {
                console.log('video 2 buffering');
    if (videoFrame2.buffered.length === 0) return;

    const bufferedSeconds = videoFrame2.buffered.end(0) - videoFrame2.buffered.start(0);
    console.log(`${bufferedSeconds} seconds of video are ready to play.`);
  });
  
  
      videoFrame1.src = videoPath11;
        videoFrame2.src = videoPath22;
        videoFrame1.play();
        document.getElementById("video_status").innerHTML="Status: Video 1 is Playing";

videoFrame1.addEventListener("timeupdate", () => {
    
    const timeWatched = getPlayedTime(videoFrame1);
     console.log('video one');
    console.log(timeWatched);
    
    if(timeWatched.total>10.0 && timeWatched.total<time1){
        time1=10;
        videoFrame1.pause();
        videoFrame1.style.display = "none";
         document.getElementById("video_status").innerHTML="Status: Video 2 is Playing";
        videoFrame2.style.display = "block";
         videoFrame2.play();
         
    }

   
});


videoFrame2.addEventListener("timeupdate", () => {
    const timeWatched = getPlayedTime2(videoFrame2);
    console.log('video frame 2');
    console.log(timeWatched);
    

    
    if(timeWatched.total>10.0 && timeWatched.total<time2){
         time2=10;
        console.log('i am stoping video 2 after 10 second');
        videoFrame2.pause();
        videoFrame2.style.display = "none";
        videoFrame1.style.display = "block";
     document.getElementById("video_status").innerHTML="Status: Video 1 is Playing";
        videoFrame1.play();
                  document.getElementById("myVideo1").style.display = "block";
         
    }
    
    
    
    
});




    //   setTimeout(function() {

    //     videoFrame1.pause();
    //     videoFrame1.style.display = "none";
    //     videoFrame2.src = videoPath22;
    //     videoFrame2.style.display = "block";
    //     videoFrame2.play();



    //   }, 10000);

    //   setTimeout(function() {

    //     videoFrame2.pause();
    //     videoFrame2.style.display = "none";

    //     videoFrame1.style.display = "block";
    //     videoFrame1.play();




    //   }, 21000);

      videoFrame1.onended = function() {
        videoFrame1.style.display = "none";
        imageFrame.style.display = 'block';
        //imageFrame.src=imgPath+imgArrayCam[0];
        document.getElementById("video_status").innerHTML="Status: Half Images are shown";
        var length = imgArrayCam.length;
        length = length / 2;
        showHalfPictures(length);


      };



      videoFrame2.onended = function() {
        let videoFrame2 = document.getElementById("myVideo2");
        videoFrame2.style.display = 'none';
        videoFrame2.pause();
        var fullLen = imgArrayCam.length;
        var length = imgArrayCam.length;

        length = Math.trunc(length / 2);
        showRestOfImages(length, fullLen);


      };


    }















const getPlayedTime = (player) => {
    let totalPlayed = 0;
    let played = player.played;

    for (let i = 0; i < played.length; i++) {
      totalPlayed += played.end(i) - played.start(i);
    }

    return {
      total: totalPlayed,
      percent: (totalPlayed / player.duration) * 100,
    };
  };

const getPlayedTime2 = (player) => {
    let totalPlayed = 0;
    let played = player.played;

    for (let i = 0; i < played.length; i++) {
      totalPlayed += played.end(i) - played.start(i);
    }

    return {
      total: totalPlayed,
      percent: (totalPlayed / player.duration) * 100,
    };
  };



    function showHalfPictures(length) {
      var c = 0;
      //startVideoRecording();
      console.log("Images Lenght::"+length);
      let imageFrame = document.getElementById("showImages");
      let videoFrame2 = document.getElementById("myVideo2");
      document.getElementById("images").innerHTML="Images: 0/"+length;
      var y = setInterval(function() {

        imageFrame.src = imgPath + imgArrayCam[c];
         console.log(imgPath + imgArrayCam[c]);
         c=c+1;
            document.getElementById("images").innerHTML="Images: "+c+"/"+length;
    
        if (c > length) {
             console.log('starting video 2');
           document.getElementById("images").innerHTML="Images: 0/0";
          imageFrame.style.display = "none";
          videoFrame2.pause();
         
          videoFrame2.style.display = "block";
         
          videoFrame2.play();
           videoFrame2.currentTime = 11;
                 videoFrame2.pause();
          videoFrame2.play();
            document.getElementById("video_status").innerHTML="Status: Video 2 is Playing";
          clearInterval(y);

        }

      }, 3500);
    }


    function showRestOfImages(length, arraySize) {
         document.getElementById("video_status").innerHTML="Status: Rest of Images are Shown";
      var c = length;
      let imageFrame = document.getElementById("showImages");
      imageFrame.style.display = 'block';
      var remImge=arraySize-1;

      document.getElementById("images").innerHTML="Images: 0/"+remImge;
      var y = setInterval(function() {

        //  alert(imgPath + imgArrayCam[c]);
        imageFrame.src = imgPath + imgArrayCam[c];
              document.getElementById("images").innerHTML="Images: "+c+"/"+remImge;
        c = c + 1;
        if (c >= arraySize) {
          clearInterval(y);
        }

      }, 3500);
    }
  </script>
</head>

<body onload="playVideo();">
  <header>
    <div class="logo">
      <!-- Logo image or text here -->
    </div>
    <div class="search-bar">
      <input type="text" placeholder="Search" />
      <button><i class="fa fa-search"></i></button>
    </div>

    <!-- Search bar HTML here -->
    </div>
    <div class="header-tools">
      <a href="Reg2.php"><b>Player Registration</b></a>
      <a href="#"><img src="images/oopsi3.png" style="width: 100px; height: 60px;"></a>
      <!-- Header tools (e.g., notifications, user profile) HTML here -->
      <a href="#"><img src="images/notification.png" style="width: 50px; height: 30px;"></a>
    </div>
    <div class="header-tools">
      <a href="CAMERAS.php?clubName='<?php echo  $teamName; ?>'" id="playerCamPage"><img src="images/Camera.png" style="width: 90px; height: 40px;"></a>
      <!-- Header tools (e.g., notifications, user profile) HTML here -->
      <a href="#"><img src="images/pic1.jpg" style="width: 40px; height: 40px; border-radius: 40px;"></a>
    </div>
  </header>

  <div class="video-container">
    <video id="myVideo1" src=""  muted controls Style="width:680px;height:480px;"> </video>
    <video id="myVideo2" src=""  muted controls style="display: none"> </video>
    <img src="" id="showImages" style="width:680px;height:480px;display: none;"></img>
   <br>
    <img src="images\like.png" style="width:40px;height:40px;padding:0px;" id="likeImage" onclick="addLike();"><b>Like</b></img>
    <label style="margin-left:200px;color:blue;font-size:18px;" id="video_status" >Status:</label>
        <label style="margin-left:50px;color:green;font-size:18px;" id="images" >Images: 0/0</label>
  </div>
<script>
function addLike(){
var like=parseInt(document.getElementById("<?php echo   $teamName ;?>").innerHTML);
like=like+1;
document.getElementById("<?php echo   $teamName ;?>").innerHTML=like+"";



$.ajax({
        type: 'POST',
        url: "like.php",
        data: {
          'likeCount': like,
          'teamName':'<?php echo   $teamName ;?>'

        },
        success: function(data) {
     

        },
        error: function(xhr, status, error) {
          //  alert(xhr.responseText);
        }
      });





















}

</script>

  <div class="container">
    <div class="category-container">
      <div class="category-box">
        <div class="arrow-backward" onclick="previousTeam();" ></div>
        <div class="category" id="categoryShow" style="margin-left:20px;"><?php echo $catigory; ?></div>
        <div class="arrow-forward" onclick="nextTeam()" ></div>
      </div>
      <div class="category-label">Category</div>
    </div>

    <div class="score-container">
      <div class="score-box">
        <div class="score"><?php echo $totalScore;?></div>
      </div>
      <div class="score-label">Score</div>
    </div>

    <div class="user-details">
      <div class="img-thumbnail img-circle">
        <div style="position: relative; padding: 0; cursor: pointer;" type="file">
          <img src="profile_pic/<?php echo $player1Profile; ?>" style="width: 40px; height: 40px;" id="player1Profile">
          <span style="position: absolute; color: red;">UPLOAD</span>
        </div>
      </div>
      <div class="user-text">
        <span id="player1Info"><?php echo $player1Name; ?>, <?php echo $player1Age; ?>, <?php echo $player1Location; ?></span>
      </div>
    </div>

    <div class="user-details">
      <div class="img-thumbnail img-circle">
        <div style="position: relative; padding: 0; cursor: pointer;" type="file">
          <img src="profile_pic/<?php echo $player2Profile; ?>" style="width: 40px; height: 40px;" id="player2Profile">
          <span style="position: absolute; color: red;">UPLOAD</span>
        </div>
      </div>
      <div class="user-text">
        <span id="player2Info"><?php echo $player2Name; ?>, <?php echo $player2Age; ?>, <?php echo $player2Location; ?></span>
      </div>
    </div>

    <div class="user-details">
      <div class="img-thumbnail img-circle">
        <div style="position: relative; padding: 0; cursor: pointer;" type="file">
          <img src="profile_pic/<?php echo $player3Profile; ?>" style="width: 40px; height: 40px;" id="player3Profile">
          <span style="position: absolute; color: red;">UPLOAD</span>
        </div>
      </div>
      <div class="user-text">
        <span id="player3Info"><?php echo $player3Name; ?>, <?php echo $player3Age; ?> , <?php echo  $player3Location; ?></span>
      </div>
    </div>

    <div class="user-details">
      <div class="img-thumbnail img-circle">
        <div style="position: relative; padding: 0; cursor: pointer;" type="file">
          <img src="profile_pic/<?php echo $player4Profile; ?>" style="width: 40px; height: 40px;" id="player4Profile">
          <span style="position: absolute; color: red;">UPLOAD</span>
        </div>
      </div>
      <div class="user-text">
        <span id="player4Info"><?php echo $player4Name; ?>, <?php echo $player4Age; ?>, <?php echo  $player4Location; ?></span>
      </div>
    </div>

    <div class="user-details" style="margin-left:100px;margin-top:50px;margin-left:150px;">
      <div class="clip">
        <div style="position: relative; padding: 0; cursor: pointer;" type="file">
          <img src="images/clip.png" style="width: 130px; height: 130px;">
        </div>
      </div>
    </div>
  </div>




  <div class="bar-container">
    <div id="table-scroll">
      <table>
        <tr>
          <th style="text-align:center;">
            <img src="images/pic1.jpg" style="margin-top: 0px; width: 40px; min-height: 40px;margin-left: -6px; border-radius: 5px;">


          </th>
          <th style="text-align:center;">
            Team

          </th>
          <th style="text-align:center;">
            League table

          </th>

          <th style="text-align:center;">
            Views


          </th>
          <th style="text-align:center;">
            Likes


          </th>
        </tr>
        <?php
        $sql = "select * from  user_reg";
        $result = $conn->query($sql);
           $viewCount='0';
           $likesCount='0';
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
             $teamName=$row["team_name"];
             $sql1 = "select * from  likeview where team_name='$teamName'";
             $viewCount='0';
             $likesCount='0';
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while ($row1 = $result1->fetch_assoc()) {
                $viewCount=$row1['views'];
                $likesCount=$row1['likes'];
                break;
              }
            }
             


        ?>

            <tr>
              <td style="text-align:center;"> <img src="team_logo/<?php echo $row["team_logo_name"]; ?>" style="margin-top: 0px; width: 40px; min-height: 40px;margin-left: -6px; border-radius: 5px;"></td>
              <td style="text-align:center;"><?php echo $row["team_name"]; ?></td>
              <td style="text-align:center;"><a href="table2.php?team_name='<?php echo $row["team_name"]; ?>'">View</a></td>
              <td style="text-align:center;"><?php echo $viewCount;?></td>
              <td style="text-align:center;" id="<?php echo $row["team_name"]; ?>"><?php echo $likesCount;?></td>
            
            </tr>



        <?php

          }
        }

        ?>



      </table>
    </div>




















  </div>

  <div class="bar-container" style="width: 380px; height: 30px; margin-left: 860px; margin-top: -53px;">
    <div class="bar-item"><a href="#">Read/Comment here</a>
      <!-- Bar item HTML here -->
    </div>
    <div class="bar-item"><a href="#">Challenge Me</a>
      <!-- Bar item HTML here -->
    </div>
  </div>
  <br>
  <footer>
    <p style="margin-left: -570px;">All rights reserved, KTI Technology Since 2008. Respect our terms and conditions at all times.</p>
  </footer>

  <script>
    var record = 1;

    function nextTeam() {

      window.location.href = "GetNextPlayer.php?recordCount=" + record;
      //   record=record+1;
      // $.ajax({
      //   type: 'POST',
      //   url: "GetNextPlayer.php",
      //   data: {
      //     'recordCount': record

      //   },
      //   success: function(data) {
      //     var obj = JSON.parse(data);
      //     if(obj.recFound=='true'){





      //       record=record+1;
      //       document.getElementById('categoryShow').innerHTML=obj.category;
      //       document.getElementById('player1Profile').src="profile_pic/"+obj.player1Profile;
      //       document.getElementById('player2Profile').src="profile_pic/"+obj.player2Profile;
      //       document.getElementById('player3Profile').src="profile_pic/"+obj.player3Profile;
      //       document.getElementById('player4Profile').src="profile_pic/"+obj.player4Profile;

      //       document.getElementById('player1Info').innerHTML=obj.player1Name+" , "+obj.player1Age+" , "+obj.player1Location;
      //       document.getElementById('player2Info').innerHTML=obj.player2Name+" , "+obj.player2Age+" , "+obj.player2Location;
      //       document.getElementById('player3Info').innerHTML=obj.player3Name+" , "+obj.player3Age+" , "+obj.player3Location;
      //       document.getElementById('player4Info').innerHTML=obj.player4Name+" , "+obj.player4Age+" , "+obj.player4Location;

      //       document.getElementById('playerCamPage').src="CAMERAS.php?clubName="+obj.teamName;
      //     }


      //   },
      //   error: function(xhr, status, error) {
      //     //  alert(xhr.responseText);
      //   }
      // });

    }

    function previousTeam() {
      // record = record - 1;

      window.location.href = "GetPreviousPlayer.php?recordCount=" + record;
      // $.ajax({
      //   type: 'POST',
      //   url: "GetPreviousPlayer.php",
      //   data: {
      //     'recordCount': record

      //   },
      //   success: function(data) {
      //     var obj = JSON.parse(data);
      //     if (obj.recFound == 'true') {

      //       document.getElementById('categoryShow').innerHTML = obj.category;
      //       document.getElementById('player1Profile').src = "profile_pic/" + obj.player1Profile;
      //       document.getElementById('player2Profile').src = "profile_pic/" + obj.player2Profile;
      //       document.getElementById('player3Profile').src = "profile_pic/" + obj.player3Profile;
      //       document.getElementById('player4Profile').src = "profile_pic/" + obj.player4Profile;

      //       document.getElementById('player1Info').innerHTML = obj.player1Name + " , " + obj.player1Age + " , " + obj.player1Location;
      //       document.getElementById('player2Info').innerHTML = obj.player2Name + " , " + obj.player2Age + " , " + obj.player2Location;
      //       document.getElementById('player3Info').innerHTML = obj.player3Name + " , " + obj.player3Age + " , " + obj.player3Location;
      //       document.getElementById('player4Info').innerHTML = obj.player4Name + " , " + obj.player4Age + " , " + obj.player4Location;

      //       document.getElementById('playerCamPage').src = "CAMERAS.php?clubName=" + obj.teamName;
      //     } else {
      //       record = record + 1;
      //     }


      //   },
      //   error: function(xhr, status, error) {
      //     //  alert(xhr.responseText);
      //   }
      // });

    }
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>