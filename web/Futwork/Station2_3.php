<?php

session_start();
include 'database.php';
$player1Name;
$player2Name;
$player3Name;
$player1Profile;
$player2Profile;
$player3Profile;
$player1Score=0;
$player2Score=0;
$player3Score=0;

$sql = "select * from leage_player_detail order by RAND() LIMIT 3";

$result = $conn->query($sql);
$rowCount = 0;
$leage_table_id;
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $rowCount = $rowCount + 1;
    if ($rowCount == 1) {
      $player1Name = $row["player_name"];
      $player1Profile = $row["profile_image"];
      $leage_table_id=$row["leage_table_id"];
      $player1Score=$row["total_score"];
    }
    if ($rowCount == 2) {
      $player2Name = $row["player_name"];
      $player2Profile = $row["profile_image"];
      $player2Score=$row["total_score"];
    }
    if ($rowCount == 3) {
      $player3Name = $row["player_name"];
      $player3Profile = $row["profile_image"];
      $player3Score=$row["total_score"];
    }
  }
}
$idd=(int) $leage_table_id;
$playTime=0;
$exp_date="";
$sql = "select player_time,exp_date  from leage_table_name where id=$idd";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $playTime=$row["player_time"];
    $exp_date=$row["exp_date"];
  }
}

 $time = strtotime($exp_date);

// $newformat = date('Y-m-d',$time);


$now = time(); // or your date as well
// $your_date = strtotime($newformat);
$datediff =  $time-$now;

$dayLeft= round($datediff / (60 * 60 * 24));

if($dayLeft<0){
//   $sql = "delete  from leage_player_detail";
//   $conn->query($sql);
//   $sql = "delete  from leage_table_name";
//   $conn->query($sql);
//   $sql = "delete  from leage_table_player_score";
//   $conn->query($sql);
$sql="delete from leage_table_player_score";

 $conn->query($sql);
 $sql="update leage_player_detail set total_score=0"; 

 $conn->query($sql);
  echo '<script>alert("Leage Table is Expire Restig the Table")</script>';


}
?>
<html>

<head>


    <script>
      

    </script>



    <title>PASSKiK</title>
    <style>
      /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 20px;
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .column1 {
      margin-left: 20px;
      float: left;
      width: 78%;
    }

    .column2 {
      float: left;
      width: 20%;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .header {
        width: 100%;
        height: 50px;
        background-color: yellow;
        border: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .placeholder {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: calc(100% - 90px);
    }

    .placeholder img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

 

  
    h1 {
        margin-top: 50px;
    }




    .container {
        text-align: center;
        margin-top: 50px;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    p {
        font-size: 24px;
    }

    .clicks {
        font-size: 50px;
    }



    .container {
        background-color: silver;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
    }

    .placeholder2 {
        height: 55px;
        width: 500px;
        border: 1px solid #ccc;
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    .green {
        background-color: green;
    }

    .yellow {
        background-color: yellow;
    }

    .blue {
        background-color: blue;
    }

    .thumbnail {
        height: 20px;
        width: 60px;
        margin-right: 10px;
    }

    .text-placeholder {
        margin-right: 90px;
    }

    .number-placeholder {
        margin-right: 200px;
    }
    </style>
</head>

<body onmousedown="WhichButton(event)" oncontextmenu="return false;">
    <div class="header">
        <div class="placeholder">
            <img src="LeagePlayerProfileImages/<?php echo $player1Profile; ?>" id="img1">
            <div  style="font-size: 40px;" id="player1Name" name="player1Name"><?php echo $player1Name; ?></div>
            <div class="digit3-placeholder" style="font-size: 45px;" id="leftPersonScore" name="leftPersonScore">0</div>


            <img src="LeagePlayerProfileImages/<?php echo $player2Profile; ?>" id="img2">
            <div  style="font-size: 40px;" id="player2Name" name="player2Name"><?php echo $player2Name; ?></div>
            <div class="digit2-placeholder" style="font-size: 45px;" id="rightPersonScore" name="rightPersonScore">0</div>

            <img src="LeagePlayerProfileImages/<?php echo $player3Profile; ?>" id="img3">
            <div  style="font-size: 40px;" id="player3Name" name="player3Name"><?php echo $player3Name; ?></div>
            <div class="digit-placeholder" style="font-size: 45px;" id="centerPersonScore" name="centerPersonScore">0</div>
        </div>
    </div>




   

    <div class="row" >
    <div class="column1" style="background-color:black;">
          <div style="background-color:black;width:100%;height:490px;" >
            <!--<img src="" id="showImage" alt="Girl in a jacket" style="background-color:black;width:90%;height:490px;">-->
                                <img src="GOOD\\good1.gif" id="showImage1" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good2.gif" id="showImage2" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
            <img src="GOOD\\good3.gif" id="showImage3" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
            <img src="GOOD\\good4.gif" id="showImage4" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
            <img src="GOOD\\good5.gif" id="showImage5" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
            <img src="GOOD\\good6.gif" id="showImage6" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
            <img src="GOOD\\good7.gif" id="showImage7" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">
                
                
            <img src="BAD\\1.gif" id="showImageBad1" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">        
            <img src="BAD\\2.gif" id="showImageBad2" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">     
            <img src="BAD\\3.gif" id="showImageBad3" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">     
             <img src="BAD\\4.gif" id="showImageBad4" alt="Girl in a jacket" style="background-color:black;width:90%;height:500px;display:none;">   

          </div>
        </div>
        <div class="column2">
 
        <div class="row" style="background-color:green;height:490px;" id="timerFrame">
            <div class="row"><br>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:yellow;"><b>Timer</b></label></div>
            </div>
            <div class="row">
              <br>

              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 50px;color:  #fcfafc  ;" id="PlayerTimerStart"><?php echo $playTime;?></label></div>
            </div>
            <div class="row">
              <br>

              <div style="text-align:center" style="margin-top:20px;"><input  type="button" value="Start Play" onclick="startApp();" style="width:80px; height:50px;font-weight: bold;"></div>
            </div>
            <div class="row">
              <br>
              <br>
              <br>
              <br>
              <div style="text-align:center" style="margin-top:20px;"><input  type="button" onclick="shuffelPlayers();" value="Shuffel" style="width:80px; height:50px;font-weight: bold;"></div>
            </div>

            <div class="row">
              <br>
              <br>
          
              <div style="text-align:center" style="margin-top:20px;"><label style="color:white;font-size:24px;">Exp Date:<?php echo    $exp_date;?></label></div>
            </div>
            <div class="row">
              <br>
          
              <div style="text-align:center" style="margin-top:20px;"><label style="color:white;font-size:24px;">Days Left:<?php echo    $dayLeft;?></label></div>
            </div>



            
         
          </div>
        </div>
    </div>



    <!-- your content here -->

    <div class="placeholder" style="background-color:grey;width:100%;">
        <img src="LeagePlayerProfileImages/<?php echo $player1Profile; ?>" id="img1">
        <span class="name" id="name1" style="font-size: 40px;"><?php echo $player1Name; ?></span>
        <input type="checkbox" id="click-checkbox-left" />
        <label for="click-checkbox" style="color:white"><b>Left Mouse Enable</b></label>


        <img src="LeagePlayerProfileImages/<?php echo $player2Profile; ?>" id="img2">
        <span class="name" id="name2" style="font-size: 40px;"><?php echo $player2Name; ?></span>
        <input type="checkbox" id="click-checkbox-right" />
          <label for="click-checkbox"><b>Right Mouse Enable</b></label>

        <img src="LeagePlayerProfileImages/<?php echo $player3Profile; ?>" id="img3">
        <span class="name" id="name3" style="font-size: 40px;"><?php echo $player3Name; ?></span>
        <input type="checkbox" id="click-checkbox-center" />
          <label for="click-checkbox" style="color:white"><b>Scroll Mosue Enable</b></label>
    </div>
    <br>
    <br>

    <footer>
        <p>&copy; Kele Buay 2023 PasskiK Football Skill Development Technology</p>
    </footer>


    <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content" style="width:20%;height:150px;background-color:black;">
  <br><br>
  <div class="row" style="color:yellow;text-align:center;font-size:25px;">Start In</div><br>

  <div class="row" style="color:#41ec0b;text-align:center;font-size:35px;"><label id="Timer">8</label></div>
</div>

</div>

<audio id="goodSoundPlay1" src="..\3CANPLAY\\correct.wav" preload="auto"></audio>
  <audio id="goodSoundPlay2" src="..\3CANPLAY\\correct1.wav" preload="auto"></audio>
  <audio id="goodSoundPlay3" src="..\3CANPLAY\\correct2.wav" preload="auto"></audio>
  <audio id="badSoundPlay" src="..\3CANPLAY\\Error1.wav" preload="auto"></audio>
    <audio id="badSoundPlay2" src="..\3CANPLAY\\Error2.wav" preload="auto"></audio>

  <div id="gameEnd" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:20%;height:150px;background-color:black;">
      <br><br>
      <div class="row" style="color:yellow;text-align:center;font-size:25px;">Game End </div><br>

      <div class="row" style="color:white;text-align:center;font-size:18px;"><input onclick="hideMe();" type="button" value="close"></div>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

 
var playTimer='<?php echo $playTime;?>';
var p1Score='<?php echo   $player1Score;?>';
var p2Score='<?php echo   $player2Score;?>';
var p3Score='<?php echo   $player3Score;?>';
var startToPlay ='false';
var leftPersonScore = 0;
    var middlePersonScore = 0;
    var rightPersonScore = 0;






 function hideMe()
 {
        document.getElementById("gameEnd").style.display='none';
      }
function startApp() {

//first check checkboxes are selected
var leftCheckBox = document.getElementById("click-checkbox-left");
var rightCheckBox = document.getElementById("click-checkbox-right");
var centerCheckBox = document.getElementById("click-checkbox-center");
if (leftCheckBox.checked == false) {
  alert("Please Check Left Mouse Click Checkbox");
  return;
}

if (rightCheckBox.checked == false) {
  alert("Please Check Right Mouse Click Checkbox");
  return;
}

if (centerCheckBox.checked == false) {
  alert("Please Check Center Mouse Click Checkbox");
  return;
}

var modal = document.getElementById("myModal");
modal.style.display = "block";
var time = 8;
var x = setInterval(function() {

  time = time - 1;
  document.getElementById("Timer").innerHTML = time;
  if (time == 0) {

    startToPlayGame();
    document.getElementById("Timer").innerHTML = '8';
    modal.style.display = "none";
    time = 8;

    clearInterval(x);
  }

}, 1000);





}

function startToPlayGame() {
      startToPlay = 'true';
      var y = setInterval(function() {

        playTimer = playTimer - 1;
        document.getElementById("PlayerTimerStart").innerHTML = playTimer;
        if (playTimer == 0) {
           document.getElementById("PlayerTimerStart").innerHTML = '0';

          startToPlay = 'false';

          var player1Name = document.getElementById("player1Name").innerHTML;
          var player1Score = document.getElementById("leftPersonScore").innerHTML;

          var player2Name = document.getElementById("player2Name").innerHTML;
          var player2Score = document.getElementById("rightPersonScore").innerHTML;

          var player3Name = document.getElementById("player3Name").innerHTML;
          var player3Score = document.getElementById("centerPersonScore").innerHTML;


         saveScoreToDataBase( player1Name, player1Score, player2Name, player2Score, player3Name, player3Score);


          clearInterval(y);
        }

      }, 1000);
    }

    function saveScoreToDataBase(player1Name, player1Score, player2Name, player2Score, player3Name, player3Score) {

    var  p1Score1=p1Score+parseInt(player1Score);
    var  p2Score2=p2Score+parseInt(player2Score);
    var  p3Score3=p3Score+parseInt(player3Score);
     


$.ajax({
  type: 'POST',
  url: "save_score_station2.php",
  data: {
    
    'player1Name': player1Name,
    'player1Score': player1Score,
    'player2Name': player2Name,
    "player2Score": player2Score,
    'player3Name': player3Name,
    'player3Score': player3Score,
    'player1Total':p1Score1,
    'player2Total':p2Score2,
    'player3Total':p3Score3

  },
  success: function(data) {
 
    if (data == 'successfully') {


      var modal = document.getElementById("gameEnd");
      modal.style.display = "block";

    }


  },
  error: function(xhr, status, error) {
     alert(xhr.responseText);
  }
});
}
function shuffelPlayers(){
  window.location.href = "Station2_3.php";

}
var playBad=false;
   // Add event listener on keydown
   document.addEventListener('keydown', (event) => {
      // var name = event.key;
      // var code = event.code;
      // // Alert the key name and key code on keydown
      // alert(`Key pressed ${name} \r\n Key code value: ${code}`);
      if (startToPlay == 'true') {
          if(playBad==false){
              playBad=true;
        document.getElementById('badSoundPlay').play();
          }else{
              playBad=false;
                      document.getElementById('badSoundPlay2').play();
          }
        showBadImages();
      }

    }, false);
var play1=false;
var play2=false;
var play3=false;
    function WhichButton(event) {
      if (startToPlay == 'true') {

        if (event.button == 0) {
          leftPersonScore = leftPersonScore + 1;
          document.getElementById("leftPersonScore").innerHTML = leftPersonScore;
          if(play1==false){
                  document.getElementById('goodSoundPlay1').play();
                  play1=true;
          }else{
                document.getElementById('goodSoundPlay2').play();
                  play1=false;
          }
      


        }

        if (event.button == 1) {
          //  alert('middle button presssed');
          middlePersonScore = middlePersonScore + 1;
          document.getElementById("centerPersonScore").innerHTML = middlePersonScore;
             if(play2==false){
                  document.getElementById('goodSoundPlay2').play();
                  play2=true;
          }else{
                document.getElementById('goodSoundPlay3').play();
                  play2=false;
          }
        }
        if (event.button == 2) {
          // alert('right button presssed');
          rightPersonScore = rightPersonScore + 1;
          document.getElementById("rightPersonScore").innerHTML = rightPersonScore;
                   if(play3==false){
                  document.getElementById('goodSoundPlay1').play();
                  play3=true;
          }else{
                document.getElementById('goodSoundPlay3').play();
                  play3=false;
          }
        }
                showGoodImages();
        }

      }
    




    const shuffleBtn = document.getElementById('shuffle');
    const img1 = document.getElementById('img1');
    const img2 = document.getElementById('img2');
    const img3 = document.getElementById('img3');
    const name1 = document.getElementById('name1');
    const name2 = document.getElementById('name2');
    const name3 = document.getElementById('name3');
    const clicks1 = document.getElementById('clicks1');
    const clicks2 = document.getElementById('clicks2');
    const clicks3 = document.getElementById('clicks3');
    let shuffledNames = [];

    function shuffle(arr) {
        for (let i = arr.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [arr[i], arr[j]] = [arr[j], arr[i]];
        }
        return arr;
    }




    let countdownTimer; // variable to hold reference to the countdown timer

    function displayNames() {
        img1.src = 'images/logo1.jpg';
        img2.src = 'images/logo1.jpg';
        img3.src = 'images/logo1.jpg';

        name1.textContent = shuffledNames[0];
        name2.textContent = shuffledNames[1];
        name3.textContent = shuffledNames[2];

        clicks1.textContent = '0';
        clicks2.textContent = '0';
        clicks3.textContent = '0';
    }

    // shuffleBtn.addEventListener('click', () => {
    //     shuffledNames = shuffle(names).slice(0, 3);
    //     displayNames();
    // });








    var goodImages = new Array();
    //add here good images 
    goodImages[0] = 'good1.gif';
    goodImages[1] = 'good2.gif';
    goodImages[2] = 'good3.gif';
    goodImages[3] = 'good4.gif';
    goodImages[4] = 'good5.gif';
    goodImages[5] = 'good6.gif';
    goodImages[6] = 'good7.gif';





    var badImages = new Array();
    //add here good images 
    badImages[0] = '1.gif';
    badImages[1] = '2.gif';
    badImages[2] = '3.gif';
    badImages[3] = '4.gif';






    function showGoodImages() {
     
      var j = 0
      var p = goodImages.length;
      var preBuffer = new Array();
      for (i = 0; i < p; i++) {
        preBuffer[i] = new Image();
        preBuffer[i].src = goodImages[i];
      }
      var whichImage = Math.round(Math.random() * (p - 1));

        var ranNumber=Math.floor(Math.random() * 7) + 1;
      for(var t=1;t<8;t++){
              document.getElementById("showImage"+t).style.display='none';
      }
      
         for(var t=1;t<5;t++){
              document.getElementById("showImageBad"+t).style.display='none';
      }
      document.getElementById("showImage"+ranNumber).style.display='block';
       // document.getElementById("showImage").src = "GOOD\\" + goodImages[whichImage];

    }


    function showBadImages() {
      var j = 0
      var p = badImages.length;
      var preBuffer = new Array()
      for (i = 0; i < p; i++) {
        preBuffer[i] = new Image()
        preBuffer[i].src = badImages[i]
      }
      var whichImage = Math.round(Math.random() * (p - 1));
        var ranNumber=Math.floor(Math.random() * 4) + 1;
      for(var t=1;t<5;t++){
              document.getElementById("showImageBad"+t).style.display='none';
      }
            for(var t=1;t<8;t++){
              document.getElementById("showImage"+t).style.display='none';
      }
      document.getElementById("showImageBad"+ranNumber).style.display='block';
    //    document.getElementById("showImage").src = "BAD\\" + badImages[whichImage];


    }

    </script>




    <script>
    const checkbox = document.getElementById("click-checkbox");
    const digitPlaceholder = document.querySelector(".digit-placeholder");
    const digit2Placeholder = document.querySelector(".digit2-placeholder");
    const digit3Placeholder = document.querySelector(".digit3-placeholder");

    const images = [
        "good1.gif",
        "good2.gif",
        "good3.gif",
        "good4.gif",
        "good5.gif",
        "good6.gif",
        "good7.gif",
        "good8.gif",
        "good9.gif",
        "good10.gif",
        "good11.gif",
        "good12.gif",
        "good13.gif",
        "good14.gif",
        "good15.gif",
        "good16.gif",
        "good17.gif",
        "good18.gif",
        "good19.gif",
        "good20.gif",
        "good21.gif",
        "good22.gif",
        "good23.gif",
        "good24.gif",
        "good25.gif",
        "good26.gif",
        "good27.gif",
        "good28.gif",
        "good29.gif",
        "good30.gif",
        "good31.gif",
        "good32.gif",
        "good33.gif",
        "good34.gif",
        "good35.gif",
        "good36.gif",
        "good37.gif",
        "good38.gif",
        "good39.gif",
        "good40.gif",
        "good41.gif",
        "good42.gif",
        "good43.gif",
        "good44.gif",
        "good45.gif",
        "good46.gif",
        "good47.gif",
        "good48.gif",
        "good49.gif",
        "good50.gif",
        "good51.gif",
        "good52.gif",
        "good53.gif",
        "good54.gif",
        "good55.gif",
        "good56.gif",
        "good57.gif",
        "good58.gif",
        "good59.gif",
        "good60.gif",
        "good61.gif",
        "good62.gif",
        "good63.gif",
        "good64.gif",
        "good65.gif",
        "good66.gif",
        "good67.gif",
        "good68.gif",
        "good69.gif",
        "good70.gif",
        "good71.gif",
        "good72.gif",
        "good73.gif",
        "good74.gif",
        "good75.gif",
        "good76.gif",
        "good77.gif",
        "good78.gif",
        "good79.gif",
        "good80.gif",
        "good81.gif",
        "good82.gif",
        "good83.gif",
        "good84.gif",
        "good85.gif",
        "good86.gif",
        "good87.gif",
        "good88.gif",
        "good89.gif",
        "good90.gif",
        "good91.gif",
        "good92.gif",
        "good93.gif",
        "good94.gif",
        "good95.gif",
        "good96.gif",
        "good97.gif",
        "good98.gif",
        "good99.gif",
        "good100.gif",
        "good101.gif",
        "good102.gif",
        "good103.gif",
        "good104.gif",
        "good105.gif",
        "good106.gif",
        "good107.gif",
        "good108.gif",
        "good109.gif",
        "good110.gif",
        "good111.gif",
        "good112.gif",
        "good113.gif",
        "good114.gif",
        "good115.gif",
        "good116.gif",
        "good117.gif",
        "good118.gif",
        "good119.gif",
        "good120.gif",
        "good121.gif",
        "good122.gif",
        "good123.gif",
        "good124.gif",
        "good125.gif",
        "good126.gif",
        "good127.gif",
        "good128.gif",
        "good129.gif",
        "good130.gif",
        "good131.gif",
        "good132.gif",
        "good133.gif",
        "good134.gif",
        "good135.gif",
        "good136.gif",
        "good137.gif",
        "good138.gif",
        "good139.gif",
        "good140.gif",
        "good141.gif",
        "good142.gif",
        "good143.gif",
        "good144.gif",
        "good145.gif",
        "good146.gif",
        "good147.gif",
        "good148.gif",
        "good149.gif",
        "good150.gif",
        "good151.gif",
        "good152.gif",
        "good153.gif",
        "good154.gif",
        "good155.gif",
        "good156.gif",
        "good157.gif",
        "good158.gif",
        "good159.gif",
        "good160.gif",
        "good161.gif",
        "good162.gif",
    ];
    const displayedImages = [];
    let leftClickNumber = 0;
    let rightClickNumber = 0;
    let scrollClickCount = 0;
    let timerId;




    // Function to increment the number on left-click
    // function leftClickHandler() {
    //     if (!checkbox.checked) {
    //         return;
    //     }
    //     digitPlaceholder.textContent = ++leftClickNumber;
    //     document.getElementById("correct-sound").play();
    //     displayRandomImage();
    // }

    // Function to display a random image from the "GOOD" folder
    // function displayRandomImage() {
    //     const unusedImages = images.filter((image) => !displayedImages.includes(image));
    //     let imageName;
    //     if (unusedImages.length === 0) {
    //         displayedImages.length = 0;
    //         imageName = images[Math.floor(Math.random() * images.length)];
    //     } else {
    //         imageName = unusedImages[Math.floor(Math.random() * unusedImages.length)];
    //     }
    //     displayedImages.push(imageName);
    //     imagePlaceholder.innerHTML =
    //         `<img src="./GOOD/${imageName}" alt="${imageName}" style="height: 500px; width: 1370px;">`;
    // }

    // Function to play the audio file on right-click
    // function rightClickHandler(event) {
    //     if (!checkbox.checked) {
    //         return;
    //     }
    //     event.preventDefault();
    //     document.getElementById("correct-sound").play();
    //     displayRandomImage();
    //     digit2Placeholder.textContent = ++rightClickNumber;
    // }






    // // Function to update scroll click count
    // function updateScrollClickCount() {
    //     if (!checkbox.checked) {
    //         return;
    //     }
    //     document.getElementById("correct-sound").play();
    //     digit3Placeholder.textContent = ++scrollClickCount;
    // }

    // // Event listeners
    // document.addEventListener("contextmenu", rightClickHandler);
    // document.addEventListener("mousedown", (event) => {
    //     if (event.button === 0) {
    //         leftClickHandler();
    //     } else if (event.button === 2) {
    //         rightClickHandler(event);
    //     } else if (event.button === 1) {
    //         updateScrollClickCount(event);
    //     }
    // });


    // CSS for the footer
    // const footer = document.querySelector(".footer");
    // footer.style.position = "fixed";
    // footer.style.bottom = "0";
    // footer.style.left = "0";
    // footer.style.right = "0";
    // footer.style.textAlign = "center";
    // footer.style.backgroundColor = "#f5f5f5";
    // footer.style.padding = "20px";
    </script>



</body>

</html>