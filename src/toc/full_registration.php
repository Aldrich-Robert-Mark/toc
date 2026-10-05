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
      document.getElementById("personID").value = "";
      document.getElementById("passcode").value = "";
      saveActiveVariables();
      changePage("index");
    }

     
    function fillCardTable() {
      let maleCards = 0;
      let femaleCards = 0;
      ssCardMap.forEach(function(cardQuantity,key) {
        maleCards = cardQuantity.male;
        femaleCards = cardQuantity.female;
        switch(key) {
          case "baptism":
            replaceRow = true;
            break;
          case "confirmation":
            replaceRow = true;
            break;
          case "initiatory":
            replaceRow = true;
            break;
          case "endowment":
            replaceRow = true;
            break;
          case "sealingtoparents":
            replaceRow = true;
            break;
          case "sealingtospouse":
            replaceRow = true;
            break;
          default:
            replaceRow = false;
            break;
        }
        if (replaceRow) {
          let fieldName = key + '_card_M';
          document.getElementById(fieldName).value = maleCards;
          fieldName = key + '_card_F';
          document.getElementById(fieldName).value = femaleCards;
        }
      })
    }

    function setAllCheckBox() {
      let collection = document.getElementsByClassName("helpCheckBoxes");
      let masterCheckbox = true;
      for (let i = 0; i < collection.length; i++) {
        masterCheckbox = collection[i].checked && masterCheckbox;
      }
      document.getElementById("All").checked=masterCheckbox;
    }
    
    function setAllCheckBoxes() {
      let masterCheckbox = document.getElementById("All").checked;
      let collection = document.getElementsByClassName("helpCheckBoxes");
      for (let i = 0; i < collection.length; i++) {
        collection[i].checked = masterCheckbox;
      }
    }

    function writeHelp() {
      let ssHelp = 0
      for (let i = 0; i < ordinanceArray.length; i++) {
        if (document.getElementById(ordinanceArray[i]).checked) {
          ssHelp += 2**i;
        }
      }
      return ssHelp;
    }

    function showRemainder() {
      if (checkIDs(ssPerson, ssPasscode)) {
        document.getElementById("personID").disabled = true;
        document.getElementById("passcode").disabled = true;
      }
    }
    function saveActiveVariables() {
      ssPerson = document.getElementById("personID").value;
      ssPasscode = document.getElementById("passcode").value;
      ssFname = document.getElementById("fName").value;
      ssLname = document.getElementById("lName").value;
      ssPhone = document.getElementById("phone").value;
      ssEmail = document.getElementById("email").value;
      if (document.getElementById("male").checked) {
        ssGender = "M";
      } else if (document.getElementById("female").checked) {
        ssGender = "F";
      } else {
        ssGender = "";
      };
      ssHelp = writeHelp();
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
          <input type="text" id="personID" size="30" maxlength="60" disabled>
          <script>
            if (ssPerson != null) {
              document.getElementById("personID").value = ssPerson;
            }
          </script>
        </td>
      </tr>

      <tr id="passcodeField"">
        <th><label for="passcode" id="passcodeLabel">Desired passcode</label></th>
        <td>
          <input type="password" id="passcode" size="30" maxlength="60" disabled>
          <script>
            if (ssPasscode != null) {
              document.getElementById("passcode").value = ssPasscode;
            }
          </script>
          <input type="button" id="viewPasscodeButton" onclick="revealPassword('passcode')" value="View">
        </td>
      </tr>
      <tr id="fNameRow">
        <th><label for="fName">First Name</label></th>
        <td><input type="text" id="fName" size="30" maxlength="60"></td>
        <script>
          if (ssFname != null) {
            document.getElementById("fName").value = ssFname;
          }
        </script>
      </tr>
      <tr id="lNameRow">
        <th><label for="lName">Last Name</label></th>
        <td><input type="text" id="lName" size="30" maxlength="60"></td>
        <script>
          if (ssLname != null) {
            document.getElementById("lName").value = ssLname;
          }
        </script>
      </tr>

      <tr id="phoneRow">
        <th><label for="phone">Phone Number</label></th>
        <td><input type="tel" id="phone" size="30" maxlength="60"></td>
        <script>
          if (ssPhone != null) {
            document.getElementById("phone").value = ssPhone;
          }
        </script>
      </tr>

      <tr id="emailRow">
        <th><label for="email">Email Adress:</label></th>
        <td><input type="email" id="email" name="email" size="30" maxlength="60"></td>
        <script>
          if (ssEmail != null) {
            document.getElementById("email").value = ssEmail;
          }
        </script>
      </tr>

      <tr id="genderRow">
        <th>Your Gender:</th>
        <td>
          <input type="radio" id="male" name="gender" value="Male" onclick="ssGender = 'M'">
          <script>
            if (ssGender == "M") {
              document.getElementById("male").checked = true;
            }
          </script>
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="Female" onclick="ssGender = 'F'">
          <script>
            if (ssGender == "F") {
              document.getElementById("female").checked = true;
            }
          </script>
          <label for="female">Female</label>
        </td>
      </tr>
      <tr>
        <th>I can usually help with:</th>
        <td>
          <input type="checkbox" id="All", name="All", value="All" onclick="setAllCheckBoxes()" checked>
          <label for="All"> All</label><br>

          <input type="checkbox" id="baptism", class="helpCheckBoxes", name="baptism", value="baptism" checked
          onclick="setAllCheckBox()">
          <label for="baptism"> Baptism</label><br>
          <input type="checkbox" id="confirmation", class="helpCheckBoxes", name="confirmation" value="confirmation" checked
          onclick="setAllCheckBox()">
          <label for="confirmation"> Confirmation</label><br>
          <input type="checkbox" id="initiatory", class="helpCheckBoxes", name="initiatory" value="initiatory" checked
          onclick="setAllCheckBox()">
          <label for="initiatory"> Initiatory</label><br>
          <input type="checkbox" id="endowment", class="helpCheckBoxes", name="endowment" value="endowment" checked
          onclick="setAllCheckBox()">
          <label for="endowment"> Endowment</label><br>
          <input type="checkbox" id="sealingtoparents", class="helpCheckBoxes", name="sealingtoparents" value="sealingtoparents" checked
          onclick="setAllCheckBox()">
          <label for="sealingtoparents"> Sealing to Parents</label><br>
          <input type="checkbox" id="sealingtospouse", class="helpCheckBoxes", name="sealingtospouse" value="sealingtospouse" checked
          onclick="setAllCheckBox()">
          <label for="sealingtospouse"> Sealing to Spouse</label><br>
        </td>
        <script>
          if (ssHelp != null) {
            for (let i = 0; i < ordinanceArray.length; i++) {
              document.getElementById(ordinanceArray[i]).checked = 2**i & ssHelp;
            }
          }
        </script>
      </tr>
    </table>
  </form>
  <input type="button" value="Save" id="saveButton" onclick="saveActiveVariables(); saveVariables(); showRemainder();">
  <input type="button" value="My Name Cards" onclick="alert('TBD');">
  <input type="button" value="Search" onclick="changePage('search');">
  <input type="button" id="startOverButton" onclick="changePage('index');" value="Start Over">
  <input type="button" value="Change Identification/Passcode" id="changePasscodeButton" onclick="alert("TBD");">
</body>
</html>
 