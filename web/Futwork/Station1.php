<?php
include 'database.php';
$player1 = "";
$player2 = "";
$player3 = "";
$age = "";
$timeer = "";
$id = "";
$foundUser = 'false';
if (isset($_GET["id"])) {

  $id = $_GET["id"];
}
$sql = "select * from player_registration where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $player1 = $row["name1"];
    $player2 = $row["name2"];
    $player3 = $row["name3"];
    $age = $row["age"];
    $timeer = $row["timer"];
    $foundUser = 'true';
  }
}



?>

<!DOCTYPE html>
<html>

<head>
  <script>
    var gameID = "";

    function enableFrames() {
      gameID = '<?php echo  $id; ?>';
      var isFound = '<?php echo $foundUser; ?>';
      if (isFound == 'true') {
        document.getElementById("imageFrame").style.display = 'block';
        document.getElementById("timerFrame").style.display = 'block';
        document.getElementById("scoreFrame").style.display = 'block';
      }

    }
  </script>

  <script>
    document.onkeydown = function(e) {
      document.getElementById("keyboardBtn").innerHTML = "WRONG!!!";
      var audio = new Audio('error.WAV');
      audio.play();

      var image = new Image();
      image.src = "BAD/" + Math.floor(Math.random() * 112 + 1) + ".gif";
      document.getElementById("image-placeholder").innerHTML = "";
      document.getElementById("image-placeholder").appendChild(image);
      image.style.height = "500px";
      image.style.width = "1370px";
      image.style.marginTop = "10px";
      image.style.marginBottom = "10px";
    }
  </script>



  <title>PASSKiK</title>
  <style>
    .appleNav {
      max-width: 0 auto;
      margin: 0 auto;
    }





    .wrapper {
      height: 100vh;
    }

    body {
      margin: 0;
    }

    nav {
      height: 40px;
      background: #323232;
    }

    nav ul {
      display: flex;
      height: 40px;
      justify-content: space-around;
      align-items: center;
      padding: 0;
      margin: 0 auto;
      list-style-type: none;
    }

    nav li {}

    nav a {
      display: block;
      color: white;
      font-size: 15px;
      font-weight: lighter;
      text-decoration: none;
      transition: 0.3s;
    }

    nav a:hover {
      color: #B8B8B8;
    }

    .container1 {
      background-color: silver;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px;
    }

    .placeholder {
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





    td,
    th {
      font-family: monospace;
      padding: 4px;
      background-color: #ccc;
    }

    label {
      vertical-align: top;
    }

    #PlayArea {
      border: 1px dotted blue;
      padding: 6px;
      background-color: #ccc;
      margin-right: 50%;
    }

    #items_table {
      border: 1px dotted blue;
      padding: 6px;
      margin-top: 12px;
      margin-right: 50%;
    }

    #items_table h2 {
      font-size: 18px;
      margin-top: 0px;
      font-family: sans-serif;
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
  </style>
</head>

<body onload="enableFrames()" onmousedown="WhichButton(event)" oncontextmenu="return false;">
  <div class="wrapper">
    <nav>
      <form method="POST" action="action_save_player.php">
        <div class="appleNav">
          <ul>
            <li>
              <a href="#"><img src="images/futworklogo.png" height="38"></a>
            </li>

            <li><a href="#">PASSKiK</a></li>
            <li>
              <div id="displayarea3">
            </li>
            <tr>
              <td><label style="color:white;">Names</label></td>
              <td><input type="text" name="name1" id="name1"></td>
            </tr>
            </li>
            <li>
              <tr>
                <td><label style="color:white;">Names</label></td>
                <td><input type="text" name="name2" id="name2"></td>
              </tr>
            </li>
            <li> <label style="color:white;">Names</label>: <input type="text" id="name3" name="name3"><br>
            </li>
            <li> <label style="color:white;"> Age:</label> <input type="number" id="age" name="age">
            </li>
            <li> <label style="color:white;"> Timer:</label> <input type="number" id="timer" name="timer">
            </li>
            <li>
            </li>

            <li>

            </li>
            <li>
              <tr>
                <td>&nbsp</td>
                <td style="text-align:center;"><input type="submit" value="Save" /></td>
              </tr>
              </table>
            </li>
          </ul>
        </div>
      </form>

      <div class="image-placeholder" id="image-placeholder"></div>





      <div class="container1">
        <div class="placeholder green">
          <img src="images/leftmouse.png" style="width:40px;height:40px ;">
          <td style="text-align:center;">
            <div id="displayarea1"></div>
          </td>
          <div class="Club-placeholder"></div>

          <input type="checkbox" id="click-checkbox-left" />
          <label for="click-checkbox" style="color:white"><b>Left Mouse Enable</b></label>
          <label style="color:white;font-size:30px;margin-left:20px;"><?php echo $player1; ?></label>


        </div>
        <div class="placeholder yellow">
          <img src="images/rightmouse.png" style="width:40px;height:40px ;">

          <td style="text-align:center;">
            <div id="displayarea2"></div>
          </td>

          <input type="checkbox" id="click-checkbox-right" />
          <label for="click-checkbox"><b>Right Mouse Enable</b></label>
          <label style="color:green;font-size:30px;margin-left:20px;"><?php echo $player2; ?></label>


        </div>
        <div class="placeholder blue">
          <img src="images/centermouse.png" style="width:40px;height:40px ;">
          <td style="text-align:center;">
            <div id="displayarea"></div>
          </td>

          <input type="checkbox" id="click-checkbox-center" />
          <label for="click-checkbox" style="color:white"><b>Scroll Mosue Enable</b></label>
          <label style="color:white;font-size:30px;margin-left:20px;"><?php echo $player3; ?></label>

        </div>
        <br>

      </div>


      <div class="row">
        <div class="column1">
          <div style="background-color:black;width:90%;height:640px;display:none;" id="imageFrame">
            <img src="GOOD\\good1.gif" id="showImage1" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good2.gif" id="showImage2" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good3.gif" id="showImage3" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good4.gif" id="showImage4" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good5.gif" id="showImage5" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good6.gif" id="showImage6" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
            <img src="GOOD\\good7.gif" id="showImage7" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">
                
                
            <img src="BAD\\1.gif" id="showImageBad1" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">        
            <img src="BAD\\2.gif" id="showImageBad2" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">     
            <img src="BAD\\3.gif" id="showImageBad3" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">     
             <img src="BAD\\4.gif" id="showImageBad4" alt="Girl in a jacket" style="background-color:black;width:90%;height:640px;display:none;">     

          </div>
        </div>
        <div class="column2">

          <div class="row" style="background-color:green;height:220px;display:none;" id="timerFrame">
            <div class="row"><br>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:yellow;"><b>Timer</b></label></div>
            </div>
            <div class="row">
              <br>

              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 50px;color:  #fcfafc  ;" id="PlayerTimerStart"><b><?php echo $timeer; ?></b></label></div>
            </div>
            <div class="row">
              <br>

              <div style="text-align:center" style="margin-top:20px;"><input onclick="startApp();" type="button" value="Start Play" style="width:80px; height:50px;font-weight: bold;"></div>
            </div>


          </div>

          <br>
          <div class="row" style="background-color:gray;height:400px;display:none;" id="scoreFrame">
            <div class="row"><br>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:yellow;"><b>Score</b></label></div>
            </div>
            <br>
            <div class="row" style="background-color:green;height:70px; border-radius: 50px;">
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 20px;color:yellow;"><b>Name:<label id="player1Name"><?php echo $player1; ?></label></b></label></div>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:yellow;"><b><label id="leftPersonScore">0</label></b></label></div>

            </div>


            <br>
            <div class="row" style="background-color:yellow;height:70px; border-radius: 50px;">
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 20px;color:black;"><b>Name:<label id="player2Name"><?php echo $player2; ?></label></b></label></div>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:black;"><b><label id="rightPersonScore">0</label></b></label></div>

            </div>



            <br>
            <div class="row" style="background-color:blue;height:70px; border-radius: 50px;">
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 20px;color:yellow;"><b>Name:<label id="player3Name"><?php echo $player3; ?></label></b></label></div>
              <div style="text-align:center" style="margin-top:20px;"><label style="font-size: 30px;color:yellow;"><b><label id="centerPersonScore">0</label></b></label></div>

            </div>







          </div>









        </div>
      </div>



  </div>

  </ul>


  </div>
  </nav>













  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

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

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:20%;height:150px;background-color:black;">
      <br><br>
      <div class="row" style="color:yellow;text-align:center;font-size:25px;">Start In</div><br>

      <div class="row" style="color:#41ec0b;text-align:center;font-size:35px;"><label id="Timer">8</label></div>
    </div>

  </div>



  <div id="gameEnd" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:20%;height:150px;background-color:black;">
      <br><br>
      <div class="row" style="color:yellow;text-align:center;font-size:25px;">Game End </div><br>

      <div class="row" style="color:white;text-align:center;font-size:18px;"><a href="homepage.html"><b>Return to home page</b></a></div>
    </div>

  </div>






  <audio id="goodSoundPlay1" src="3CANPLAY\\correct.wav" preload="auto"></audio>
  <audio id="goodSoundPlay2" src="3CANPLAY\\correct1.wav" preload="auto"></audio>
  <audio id="goodSoundPlay3" src="3CANPLAY\\correct2.wav" preload="auto"></audio>
  <audio id="badSoundPlay" src="3CANPLAY\\Error1.wav" preload="auto"></audio>
    <audio id="badSoundPlay1" src="3CANPLAY\\Error2.wav" preload="auto"></audio>
  <!-- your content here -->
  <footer>
    <p>&copy; Kele Buay 2023 PasskiK Football Skill Development Technology</p>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
    var leftPersonScore = 0;
    var middlePersonScore = 0;
    var rightPersonScore = 0;
    var startToPlay = 'false';

    var playTimer = '<?php echo $timeer; ?>';




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

          saveScoreToDataBase(gameID, player1Name, player1Score, player2Name, player2Score, player3Name, player3Score);


          clearInterval(y);
        }

      }, 1000);
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

    function saveScoreToDataBase(gameID, player1Name, player1Score, player2Name, player2Score, player3Name, player3Score) {

      $.ajax({
        type: 'POST',
        url: "save_score_to_db.php",
        data: {
          'gameID': gameID,
          'player1Name': player1Name,
          'player1Score': player1Score,
          'player2Name': player2Name,
          "player2Score": player2Score,
          'player3Name': player3Name,
          'player3Score': player3Score
        },
        success: function(data) {
          if (data == 'successfully') {


            var modal = document.getElementById("gameEnd");
            modal.style.display = "block";

          }


        },
        error: function(xhr, status, error) {
          //  alert(xhr.responseText);
        }
      });
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
                 document.getElementById('badSoundPlay').play();
                 playBad=true;
                 
          }else{
               document.getElementById('badSoundPlay1').play();
                 playBad=false;
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
              play1=true;
          document.getElementById('goodSoundPlay1').play();
          }else{
                            play1=false;
              document.getElementById('goodSoundPlay2').play(); 
          }


        }

        if (event.button == 1) {
          //  alert('middle button presssed');
          middlePersonScore = middlePersonScore + 1;
          document.getElementById("centerPersonScore").innerHTML = middlePersonScore;
          if(play2==false){
              play2=true;
          document.getElementById('goodSoundPlay2').play();
          }else{
               play2=false;
              document.getElementById('goodSoundPlay3').play(); 
          }

        }
        if (event.button == 2) {
          // alert('right button presssed');
          rightPersonScore = rightPersonScore + 1;
          document.getElementById("rightPersonScore").innerHTML = rightPersonScore;
               if(play3==false){
              play3=true;
          document.getElementById('goodSoundPlay1').play();
          }else{
               play3=false;
              document.getElementById('goodSoundPlay3').play(); 
          }
        }
        showGoodImages();
      }
    }

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
      var preBuffer = new Array()
      for (i = 0; i < p; i++) {
        preBuffer[i] = new Image()
        preBuffer[i].src = goodImages[i]
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
     //   document.getElementById("showImage").src = "GOOD\\" + goodImages[whichImage];

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
      
      
     // document.getElementById("showImage").src = "BAD\\" + badImages[whichImage];

    }












    const checkbox = document.getElementById("click-checkbox");
    const digitPlaceholder = document.querySelector(".digit-placeholder");
    const digit2Placeholder = document.querySelector(".digit2-placeholder");
    const digit3Placeholder = document.querySelector(".digit3-placeholder");
    const imagePlaceholder = document.querySelector(".image-placeholder");
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
    ];
    const displayedImages = [];
    let leftClickNumber = 0;
    let rightClickNumber = 0;
    let scrollClickCount = 0;
    let timerId;




    // Function to increment the number on left-click
    function leftClickHandler() {
      if (!checkbox.checked) {
        return;
      }
      digitPlaceholder.textContent = ++leftClickNumber;
      displayRandomImage();
    }

    // Function to display a random image from the "GOOD" folder
    function displayRandomImage() {
      const unusedImages = images.filter((image) => !displayedImages.includes(image));
      let imageName;
      if (unusedImages.length === 0) {
        displayedImages.length = 0;
        imageName = images[Math.floor(Math.random() * images.length)];
      } else {
        imageName = unusedImages[Math.floor(Math.random() * unusedImages.length)];
      }
      displayedImages.push(imageName);
      imagePlaceholder.innerHTML = `<img src="./GOOD/${imageName}" alt="${imageName}" style="height: 500px; width: 1370px;">`;
    }

    // Function to play the audio file on right-click
    function rightClickHandler(event) {
      if (!checkbox.checked) {
        return;
      }
      event.preventDefault();
      document.getElementById("correct-sound").play();
      displayRandomImage();
      digit2Placeholder.textContent = ++rightClickNumber;
    }






    // Function to update scroll click count
    function updateScrollClickCount() {
      if (!checkbox.checked) {
        return;
      }
      digit3Placeholder.textContent = ++scrollClickCount;
    }

    // Event listeners
    document.addEventListener("contextmenu", rightClickHandler);
    document.addEventListener("mousedown", (event) => {
      if (event.button === 0) {
        leftClickHandler();
      } else if (event.button === 2) {
        rightClickHandler(event);
      } else if (event.button === 1) {
        updateScrollClickCount(event);
      }
    });


    // CSS for the footer
    const footer = document.querySelector(".footer");
    footer.style.position = "fixed";
    footer.style.bottom = "0";
    footer.style.left = "0";
    footer.style.right = "0";
    footer.style.textAlign = "center";
    footer.style.backgroundColor = "#f5f5f5";
    footer.style.padding = "20px";
  </script>

  <script>
    // JavaScript code
    function display() {
      var firstName = document.getElementById("fname").value;
      var middleName = document.getElementById("mname").value;
      var lastName = document.getElementById("lname").value;
      var age = document.getElementById("age").value;

      document.getElementById("displayarea").innerHTML = firstName;
      document.getElementById("displayarea1").innerHTML = middleName;
      document.getElementById("displayarea2").innerHTML = lastName;
      document.getElementById("displayarea3").innerHTML = age;

      document.getElementById("fname").value = "";
      document.getElementById("mname").value = "";
      document.getElementById("lname").value = "";
      document.getElementById("age").value = "";
    }
  </script>

</body>

</html>