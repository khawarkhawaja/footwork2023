<?php
$reg_successfully=false;
if(isset($_GET['message'])){
    $reg_successfully=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Registration</title>
    <style>
        /* Add your CSS styles here */
        /* For simplicity, inline styles are used in this example */
        /* You can move these styles to an external CSS file */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="file"],
        select {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
       <div>
        <a href="index.php"><b>Home Page</b></a>
       </div>

        <?php 
        if($reg_successfully==true){

            ?>
        <div id="messageShow" style="color:green;text-align:center;background-color: #CFE7C9;height:50px;">
        <br>
            <b>Registered Successfully</b>

        </div>
            <?php
        }
        ?>


        <h1>Team Registration</h1>
        <form  method="POST" action="action_reg_user.php" enctype="multipart/form-data">
            <label for="teamName">Team Name:</label>
            <input type="text" id="teamName" name="teamName" required>

            <label for="teamLogo">Team Logo:</label>
            <input type="file" id="teamLogo" name="teamLogo" accept="image/*" required>

            <h2>Team Members</h2>
            <div class="team-member">
                <label for="name1">Name:</label>
                <input type="text" id="name1" name="name1" required>

                <label for="age1">Age:</label>
                <input type="text" id="age1" name="age1" required>

                <label for="location1">Location:</label>
                <input type="text" id="location1" name="location1" required>

                <label for="picture1">Picture:</label>
                <input type="file" id="picture1" name="picture1" accept="image/*" required>

                <div class="team-member">
                    <label for="name1">Name:</label>
                    <input type="text" id="name2" name="name2" required>
    
                    <label for="age1">Age:</label>
                    <input type="text" id="age2" name="age2" required>
    
                    <label for="location1">Location:</label>
                    <input type="text" id="location2" name="location2" required>
    
                    <label for="picture1">Picture:</label>
                    <input type="file" id="picture2" name="picture2" accept="image/*" required>

                    <label for="name1">Name:</label>
                    <input type="text" id="name3" name="name3" required>
    
                    <label for="age1">Age:</label>
                    <input type="text" id="age3" name="age3" required>
    
                    <label for="location1">Location:</label>
                    <input type="text" id="location3" name="location3" required>
    
                    <label for="picture1">Picture:</label>
                    <input type="file" id="picture3" name="picture3" accept="image/*" required>
    
                    <div class="team-member">
                        <label for="name1">Name:</label>
                        <input type="text" id="name4" name="name4" required>
        
                        <label for="age1">Age:</label>
                        <input type="text" id="age4" name="age4" required>
        
                        <label for="location1">Location:</label>
                        <input type="text" id="location4" name="location4" required>
        
                        <label for="picture1">Picture:</label>
                        <input type="file" id="picture4" name="picture4" accept="image/*" required>
            </div>

            <!-- Add three more team-member divs here -->

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="BMX">BMX</option>
                <option value="skateboard">Skateboard</option>
                <option value="pushScooter">Push Scooter</option>
                <option value="rollerSkate">Roller Skate</option>
            </select>
<br>
            <input type="checkbox" id="acceptTerms" name="acceptTerms" required>I accept the terms and conditions.
       <br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        // JavaScript code to handle form submission goes here
        // document.getElementById("registrationForm").addEventListener("submit", function (event) {
        //     event.preventDefault();

        //     // Fetch form data
        //     const formData = new FormData(event.target);

        //     // Process the form data here (you can use Ajax to submit the form data to the server)
        //     // For simplicity, this example just logs the data to the console
        //     for (let [name, value] of formData) {
        //         console.log(name + ": " + value);
        //     }

        //     // Reset the form after submission (optional)
        //     event.target.reset();
        // });
    </script>
</body>
</html>
