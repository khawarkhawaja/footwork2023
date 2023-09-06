<?php
include 'database.php';
$teamName = $_GET['clubName'];
$teamName = str_replace("'", "", $teamName);

$catigory = "";

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
$teamLogoName = "";

$sql = "select * from  user_reg where team_name ='$teamName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $catigory = $row['category_player'];

    $player1Name = $row['name_player1'];
    $player2Name = $row['name_player2'];
    $player3Name = $row['name_player3'];
    $player4Name = $row['name_player4'];
    $teamLogoName = $row['team_logo_name'];

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

    break;
  }
}



?>

<!DOCTYPE html>
<html>

<head>
  <title>Camera Live Feeds</title>
  <style>
    #container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      height: 600px;
    }

    .video-container {
      position: relative;
      width: fit-content;
      margin-bottom: 20px;
    }

    .video-container video {
      border-radius: 10px;
      border: 2px solid #000;
      width: 400px;
      height: 300px;
    }

    .cameraList1 {
      position: absolute;
      top: 330px;
      left: 50%;
      transform: translateX(-54%);
      font-size: 16px;
    }

    .cameraList2 {
      position: absolute;
      top: 330px;
      left: 50%;
      transform: translateX(-54%);
      font-size: 16px;
    }

    .submitScore {
      position: absolute;
      top: 320px;
      left: 50%;
      transform: translateX(-54%);
      font-size: 16px;
    }

    .progressBarCam1Div {
      position: absolute;
      top: 380px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
    }

    .progressBarCam2Div {
      position: absolute;
      top: 455px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
    }

    .playModel {
      position: absolute;
      top: 80px;
      left: 50%;
      transform: translateX(-60%);
      font-size: 16px;
    }

    .video-label {
      position: absolute;
      top: 310px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
    }

    #timer {
      font-size: 40px;
      text-align: center;
      margin-top: -60px;
    }


    .rectangle {
      width: 360px;
      height: 80px;
      border: 2px solid black;
      background-color: gray;
      margin-right: 5px;
      display: inline-block;
      text-align: center;
      vertical-align: middle;
    }

    .text {
      font-size: 20px;
      margin: 0 10px;
    }

    img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
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
  </style>
</head>

<body>
  <div id="container">
    <div class="video-container">
      <video id="video1" autoplay></video><br>
      <select class="cameraList1" id="cameraList1"></select>
      <div class="video-label">VIDEO 1</div>

    </div>

    <button style="width:100px;height:60px;background-color:green;color:white;" id="startPlay" name="startPlay"><b>Start Play</b></button>


    <div id="playModel" class="playModel">

      <!-- Modal content -->
      <div class="modal-content" style="width:80%;height:150px;background-color:black;">
        <br><br>
        <div class="row" style="color:yellow;text-align:center;font-size:25px;">Time</div>
        <br>

        <div class="row" style="color:#41ec0b;text-align:center;font-size:35px;"><label id="TimerPlay">30</label>
        </div>
      </div>

    </div>

    <div id="submitScore" class="submitScore" style="display:none;">
      <button style="width:100px;height:60px;background-color:green;color:white;" onclick="submitScore();" id="submitFormData">Submit </button>

    </div>
    <div id="progressBarCam1Div" class="progressBarCam1Div" style="display:none;">
      Video 1 Uploading Progress<br>
      <progress id="progressBarCam1" name="progressBarCam1" value="0" max="100" style="width:500px;height:70px;"> 0% </progress>
    </div>

    <div id="progressBarCam2Div" class="progressBarCam2Div" style="display:none;">
      Video 2 Uploading Progress <br>
      <progress id="progressBarCam2" name="progressBarCam2" value="0" max="100" style="width:500px;height:70px;"> 0% </progress>
    </div>
    <div class="video-container">

      <video id="video2" autoplay></video>
      <select class="cameraList2" id="cameraList2"></select>
      <div class="video-label">VIDEO 2</div>
    </div>
  </div>

  <div id="timer"></div>


  <div class="rectangle" style="margin-right: 71px;">
    <div class="text" style="font-size: 70px;"><?php echo  $catigory; ?></div>
  </div>
  <div class="rectangle" style="margin-right: 71px;">
    <div class="jump-scored-points-display" style="font-size: 85px; margin-top: -6px;" id="teamScoreView">0</div>
  </div>
  <div class="rectangle">
    <img src="team_logo/<?php echo  $teamLogoName; ?>" style="float: left; margin-left: 5px; margin-top: 10px;" alt="Thumbnail">
    <div class="text" style="margin-top: 25px; font-size: 20px;"> <?php echo  $teamName; ?></div>
  </div>

  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:20%;height:300px;background-color:black;">
      <br><br>
      <div class="row" style="color:yellow;text-align:center;font-size:25px;">Start In</div>
      <br>

      <div class="row" style="color:#41ec0b;text-align:center;font-size:35px;"><label id="Timer">8</label>
      </div>
    </div>

  </div>


  <audio controls preload="auto" id="playShutterFile" style="display:none;">
    <source src="shutter.wav" type="audio/ogg">
  </audio>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    const video1 = document.getElementById("video1");
    const video2 = document.getElementById("video2");
    const timerElement = document.getElementById("timer");
    var startToPlay = 'false';
    var playTimer = 30;
    let blobs_recorded1 = [];
    let blobs_recorded2 = [];
    let media_recorder1 = null;
    let media_recorder2 = null;
    let camera_stream1 = null;
    let camera_stream2 = null;

    var teamName = '<?php echo $teamName; ?>';

    let camera_button = document.getElementById("startPlay");


    camera_button.addEventListener('click', async function() {
      startPlay();

      try {
        var sel = document.getElementById("cameraList1");
        var cameraName = sel.options[sel.selectedIndex].text;
        let index = deviceName.indexOf(cameraName);
        camera_stream1 = await navigator.mediaDevices.getUserMedia({
          video: {
            deviceId: deviceID[index],
          },
          audio: true
        });
      } catch (error) {
        alert(error.message);

      }
      try {
        var sel = document.getElementById("cameraList2");
        var cameraName = sel.options[sel.selectedIndex].text;
        let index = deviceName.indexOf(cameraName);
        camera_stream2 = await navigator.mediaDevices.getUserMedia({
          video: {
            deviceId: deviceID[index],
          },
          audio: true
        });
      } catch (error) {
        alert(error.message);

      }

      video1.srcObject = camera_stream1;
      video2.srcObject = camera_stream2;

      media_recorder1 = new MediaRecorder(camera_stream1, {
        mimeType: 'video/webm'
      });
      media_recorder2 = new MediaRecorder(camera_stream2, {
        mimeType: 'video/webm'
      });


      media_recorder1.addEventListener('dataavailable', function(e) {

        if (startToPlay == 'true') {


          blobs_recorded1.push(e.data);
        }



      });
      media_recorder2.addEventListener('dataavailable', function(e) {

        if (startToPlay == 'true') {

          blobs_recorded2.push(e.data);
        }


      });
    });


    // function startVideoRecording() {
    //   media_recorder1.addEventListener('dataavailable', function(e) {


    //     blobs_recorded1.push(e.data);


    //   });
    //   media_recorder2.addEventListener('dataavailable', function(e) {

    //     blobs_recorded2.push(e.data);


    //   });
    // }

    function startPlay() {

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
      //startVideoRecording();
      startToPlay = 'true';
      media_recorder1.start(1000);
      media_recorder2.start(1000);
      var y = setInterval(function() {

        playTimer = playTimer - 1;

        document.getElementById("TimerPlay").innerHTML = playTimer;


        if (playTimer == 0) {
          startToPlay = 'false';
          document.getElementById('submitScore').style.display = "block";
          document.getElementById('progressBarCam1Div').style.display = "block";
          document.getElementById('progressBarCam2Div').style.display = "block";
          media_recorder1.stop();
          media_recorder2.stop();

          clearInterval(y);
        }

      }, 1000);
    }


    document.addEventListener("mousedown", playSound);

    function playSound() {
      if (startToPlay == 'true') {
        let audio = document.getElementById('playShutterFile');
        audio.play();
        takePicture1();
      }

    }


    function takePicture1() {

      let canvas = document.createElement('canvas');
      let video = document.getElementById('video1');

      canvas.width = 1920;
      canvas.height = 1080;

      let ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);


      var photo = canvas.toDataURL('image/jpeg');
      $.ajax({
        method: 'POST',
        url: 'saveCam1Image.php',

        data: {
          photo: photo,
          TeamName: teamName


        }
      });

      takePicture2();

    }

    function takePicture2() {

      let canvas = document.createElement('canvas');
      let video = document.getElementById('video2');

      canvas.width = 1920;
      canvas.height = 1080;

      let ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);


      var photo = canvas.toDataURL('image/jpeg');
      $.ajax({
        method: 'POST',
        url: 'saveCam2Image.php',

        data: {
          photo: photo,
          TeamName: teamName
        }
      });

    }







    function submitScore() {
      var TeamScore = document.getElementById('teamScoreView').innerHTML;
      document.getElementById('submitFormData').style.display='none';

      $.ajax({
        method: 'POST',
        url: 'saveScore.php',

        data: {
          score: TeamScore,
          TeamName: teamName


        },
        success: function (data, textStatus, XmlHttpRequest) {
        if (XmlHttpRequest.status === 200) {
          var obj = JSON.parse(data);
        //  alert(obj.totalRec);
          uploadVideoFilesToServer(obj.totalRec);
        }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
            reject(errorThrown);
    }
      });
      setTimeout(function() {
        // function code goes here
      }, 3);


    }





    var video1Uploaded = 'false';
    var video2Uploaded = 'false';

    function uploadVideoFilesToServer(totalRecCount) {

      uploadSecondCamVideo(totalRecCount);
      const mediaBlob = new Blob(blobs_recorded1, {
        type: 'video/webm'
      });

      const myFile = new File([mediaBlob], {
        type: 'video/webm'
      });

      var data = new FormData();
      data.append('file', myFile);
      data.append('teamName', teamName);
      data.append('totalRecCount',totalRecCount);

      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = (evt.loaded / evt.total) * 100;


              document.getElementById('progressBarCam1').value = percentComplete;
            }
          }, false);
          return xhr;
        },
        url: "uploadVideoCam1.php",
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,


        success: function(data) {
          document.getElementById('progressBarCam1').value = 0;
          video1Uploaded = 'true';
          if (video2Uploaded == 'true') {
            window.location.replace("index.php");
          }
          //   document.getElementById('cam1done').style.display='block';

        },
        error: function() {

        }
      });

    }


    function uploadSecondCamVideo(totalRecCount) {
      setTimeout(function() {

        const mediaBlob2 = new Blob(blobs_recorded2, {
          type: 'video/webm'
        });

        const myFile = new File([mediaBlob2], {
          type: 'video/webm'
        });

        var data = new FormData();
        data.append('file', myFile);
        data.append('teamName', teamName);
        data.append('totalRecCount',totalRecCount);


        $.ajax({
          xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;


                document.getElementById('progressBarCam2').value = percentComplete;
              }
            }, false);
            return xhr;
          },
          url: "uploadVideoCam2.php",
          type: 'POST',
          data: data,
          contentType: false,
          processData: false,
          enctype: 'multipart/form-data',

          success: function(data) {
            document.getElementById('progressBarCam2').value = 0;

            video2Uploaded = 'true';
            if (video1Uploaded == 'true') {
                 window.location.replace("index.php");
            }
          },
          error: function() {

          }
        });


      }, 500)
    }










    // Check browser support for getUserMedia
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      // Request access to camera devices
      navigator.mediaDevices
        .enumerateDevices()
        .then((devices) => {
          const videoDevices = devices.filter((device) => device.kind === "videoinput");
          if (videoDevices.length < 2) {
            console.error("Insufficient number of video devices.");
            return;
          }

          const constraints1 = {
            video: {
              deviceId: videoDevices[0].deviceId
            }
          };
          const constraints2 = {
            video: {
              deviceId: videoDevices[1].deviceId
            }
          };

          // Get access to the selected cameras
          Promise.all([
              navigator.mediaDevices.getUserMedia(constraints1),
              navigator.mediaDevices.getUserMedia(constraints2),
            ])
            .then(([stream1, stream2]) => {
              // Display video streams on video elements
              video1.srcObject = stream1;
              video2.srcObject = stream2;

              // Countdown timer
              let countdown = 30;
              let timer = setInterval(() => {
                timerElement.textContent = countdown + " seconds";
                countdown--;

                // Stop recording after 30 seconds
                if (countdown < 0) {
                  clearInterval(timer);
                  stopRecording();
                }
              }, 1000);
            })
            .catch((error) => {
              console.error("Error accessing media devices: ", error);
            });
        })
        .catch((error) => {
          console.error("Error enumerating devices: ", error);
        });
    } else {
      console.error("getUserMedia is not supported by this browser");
    }

    // Function to stop recording
    function stopRecording() {
      // Stop video streams
      const stream1 = video1.srcObject;
      const stream2 = video2.srcObject;

      const tracks1 = stream1.getTracks();
      const tracks2 = stream2.getTracks();

      tracks1.forEach((track) => track.stop());
      tracks2.forEach((track) => track.stop());

      // Close the page automatically after 5 seconds
      setTimeout(() => {
        window.close();
      }, 5000);
    }
  </script>




  <script>
    let score = 0;
    let addPoints = true;
    getMediaDeviceID();
    document.addEventListener('keydown', function(event) {
      if (event.code === 'KeyA' && addPoints) {
        if (startToPlay == 'true') {
          score += 0;
          updateScore();
        }
      } else if (event.code === 'KeyB' && !event.getModifierState('Shift') && addPoints) {
        if (startToPlay == 'true') {
          score += 5;
          updateScore();
        }
      } else if (event.code === 'KeyC' && !event.getModifierState('Shift') && !event.getModifierState('Control') && addPoints) {
        if (startToPlay == 'true') {
          score += 10;
          updateScore();
        }
      } else if (event.code === 'KeyD' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && addPoints) {
        if (startToPlay == 'true') {
          score += 15;
          updateScore();
        }
      } else if (event.code === 'KeyE' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && addPoints) {
        if (startToPlay == 'true') {
          score += 20;
          updateScore();
        }
      } else if (event.code === 'KeyF' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && addPoints) {
        if (startToPlay == 'true') {
          score += 25;
          updateScore();
        }
      } else if (event.code === 'KeyG' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 30;
          updateScore();
        }

      } else if (event.code === 'KeyH' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && addPoints) {
        if (startToPlay == 'true') {
          score += 35;
          updateScore();
        }
      } else if (event.code === 'KeyI' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 40;
          updateScore();
        }


      } else if (event.code === 'KeyJ' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && addPoints) {
        if (startToPlay == 'true') {
          score += 45;
          updateScore();
        }
      } else if (event.code === 'KeyK' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 50;
          updateScore();
        }

      } else if (event.code === 'KeyL' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 55;
          updateScore();
        }


      } else if (event.code === 'KeyM' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 60;
          updateScore();
        }

      } else if (event.code === 'KeyN' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 65;
          updateScore();
        }

      } else if (event.code === 'KeyO' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 70;
          updateScore();
        }
      } else if (event.code === 'KeyP' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 75;
          updateScore();
        }
      } else if (event.code === 'KeyQ' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 80;
          updateScore();
        }
      } else if (event.code === 'KeyR' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 85;
          updateScore();
        }
      } else if (event.code === 'KeyS' && !event.getModifierState('Shift') && !event.getModifierState('Control') && !event.getModifierState('Alt') && !event.getModifierState('Meta') && !event.getModifierState('AltGraph') && !event.getModifierState('CapsLock') && addPoints) {
        if (startToPlay == 'true') {
          score += 90;
          updateScore();
        }
      }




      // add more else if blocks for keys H, I, J, and K if needed

    });



    function updateScore() {
      const display = document.querySelector('.jump-scored-points-display');
      display.textContent = score;
    }



    function getMediaDeviceID() {
      navigator.mediaDevices.getUserMedia({
          audio: false,
          video: true
        })
        .then(function(stream) {
          var tracks = stream.getTracks();
          for (var i = 0; i < tracks.length; i++) {
            GetDevice(tracks[i].getSettings().deviceId);
          }
        })
        .catch(function(err) {
          /* handle the error */
        });
    }

    function GetDevice(id) {
      deviceName = [];
      deviceID = [];
      let counter = 0;
      navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
          devices.forEach(function(device) {

            // if(device.deviceId == id){

            var x = document.getElementById("cameraList1");
            var option = document.createElement("option");
            option.text = device.label;
            x.add(option);
            var x = document.getElementById("cameraList2");
            var option = document.createElement("option");
            option.text = device.label;
            x.add(option);
            console.log(device.deviceId);
            deviceName[counter] = device.label;
            deviceID[counter] = device.deviceId;



            // console.log(device.kind + ": " + device.label != undefined ? device.label : 'Default');
            // }
          });
        })
        .catch(function(err) {
          console.log(err.name + ": " + err.message);
        });
    }
  </script>
</body>

</html>