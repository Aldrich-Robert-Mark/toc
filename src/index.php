 <!--<!DOCTYPE html>-->
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" contents="A coordination site for people with LDS temple namecards.">
      <script>
        function revealPassword(field) {
            field = document.getElementById(field);
            if (field.type == "password") {
                field.type = "text";
                document.getElementById("viewPasscodeButton").value = "Hide"
            } else {
                field.type = "password";
                document.getElementById("viewPasscodeButton").value = "View"
            }
        }
      </script>
  </head>
  
  <body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <table>
      <tr>
        <th><label for="personID">Personal Identification</label></th>
        <td>
          <input type="text" name="personID" id="personID" size="30" maxlength="60" value="<?php echo $_POST["personID"];?>">
        </td>
      </tr>
      <tr>
        <th><label for="passcode" id="passcodelabel">Passcode</label></th>
        <td>
          <input type="password" name="passcode" id="passcode" size="30" maxlength="60" value="<?php echo $_POST["passcode"];?>">
          <input type="button" id="viewPasscodeButton" onclick="revealPassword('passcode')" value="View">
        </td>
      </tr>
    </table>
    <input type="submit" value="Next" class="nextButton" style="display;">
  </form>
    
  <?php
    echo "SQL";
    // Database credentials
    $servername = "localhost";
    $username = "2n89j5tyhf";
    $password = "@zc4tm8o6W6!DGWVkWk#";
    $dbname = "w3s-dynamic-storage/database.db";

    // 1. Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 2. Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully.<br><br>";
  ?>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $passCoded = crypt($_POST["passcode"],"$5$TempleOrdinanceCoordination$");
      $intext = $_POST["personID"] . " & " . $passCoded . "(" . strlen($passCoded) . ")";
      echo "<p>Check validity of $intext</p><br>";
      echo "<style> .regButton {display;} </style>";
      echo "<style> .nextButton {display:none;} </style>";
    }
  ?>
  </body>
</html>