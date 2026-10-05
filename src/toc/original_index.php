<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" contents="A coordination site for people with LDS temple namecards.">
      <link rel="stylesheet" href="css/style.css" type="text/css">

      <script src="js/toc.js"></script>
      <script>
        getVariables();
        
        function displayButtons(showNext) {
          // This function toggles between a NEXT button and two buttons called GOTO & REDO. See the function NEXTACTION for the effects of the NEXT button.
          let nextButton = document.getElementById("nextButton");
          let gotoButton = document.getElementById("gotoButton");
          let redoButton = document.getElementById("redoButton");

          if (showNext) {
            nextButton.style = "display:true;";
            gotoButton.style = "display:none;";
            redoButton.style = "display:none;";
            document.getElementById("personID").disabled = false;
            document.getElementById("passcode").disabled = false;
            document.getElementById("userMessage").style = "display:none;"
          } else {
            nextButton.style = "display:none;";
            gotoButton.style = "display:true;";
            redoButton.style = "display:true;";
            document.getElementById("personID").disabled = true;
            document.getElementById("passcode").disabled = true;
          }
        }
        
        function nextAction() {
          ssPerson = document.getElementById("personID").value;
          ssPasscode = document.getElementById("passcode").value;
          if (checkIDs(ssPerson, ssPasscode)) {
            changePage("search");
          } else {
            document.getElementById("userMessage").style = "display:true;"
            document.getElementById("userMessageVerbage").innerHTML = "Information is unrecognized.";
            displayButtons(false);
          }
        }
      </script>

  </head>
  
  <body>
    <?php echo file_get_contents("html/header.html"); ?>
    <?php echo file_get_contents("html/body.html"); ?>
    <?php echo file_get_contents("html/footer.html"); ?>
  </body>
</html>