<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" contents="A coordination site for people with LDS temple namecards.">
      <link rel="stylesheet" href="css/style.css" type="text/css">

      <script src="js/toc.js"></script>
      <script>
        getVariables();
        
         function cancelRegistration() {
            saveActiveVariables();
            changePage("index");
        }

        function saveActiveVariables() {
            ssPerson = document.getElementById("personID").value;
            ssPasscode = document.getElementById("passcode").value;
        }

        function nextAction() {
            ssPerson = document.getElementById("personID").value;
            ssPasscode = document.getElementById("passcode").value;
            if (checkIDs(ssPerson, ssPasscode)) {
                changePage("full_registration");
            } else {
                document.getElementById("userMessage").style = "display:true;"
                document.getElementById("userMessageVerbage").innerHTML = "Information is invalid. Please try again.";
            }
        }

    </script>
</head>

<body>
    <?php echo file_get_contents("html/header.html"); ?>
    
    <h2>Registration</h2>
    <form id="idFields">
        <table>
            <tr id="PersonIdField">
                <th><label for="personID">Personal Identification</label></th>
                <td>
                    <input type="text" id="personID" size="30" maxlength="60">
                    <script>
                        if (ssPerson != null) {
                            document.getElementById("personID").value = ssPerson;
                        }
                    </script>
                    <input type="button" id="checkPersonIDButton" onclick="alert('TBD')" value="Check Usage">
                </td>
            </tr>

            <tr id="passcodeField"">
                <th><label for="passcode" id="passcodeLabel">Desired passcode</label></th>
                <td>
                    <input type="password" id="passcode" size="30" maxlength="60">
                    <script>
                        if (ssPasscode != null) {
                            document.getElementById("passcode").value = ssPasscode;
                        }
                    </script>
                    <input type="button" id="viewPasscodeButton" onclick="revealPassword('passcode')" value="View">
                    <input type="button" value="Random" onclick="alert('TBD')">
                    <input type="button" id="checkPasscodeButton" onclick="alert('TBD')" value="Check Format Validity">
                </td>
            </tr>
            <tr id="userMessage" style="display:none;">
                <td colspan="99"><p id="userMessageVerbage"></p></td>
            </tr>
        </table>
    </form>
    <input type="button" value="Save" id="saveButton" onclick="nextAction(); saveVariables();">
    <input type="button" id="cancelButton" onclick="cancelRegistration();" value="Cancel">
 
    <?php echo file_get_contents("html/footer.html"); ?>
  </body>
</html>