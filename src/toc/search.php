<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" contents="A coordination site for people with LDS temple namecards.">
      <link rel="stylesheet" href="css/style.css" type="text/css">

      <script src="js/toc.js"></script>
      <script>
        getVariables();
      </script>
  </head>
  
  <body>
    <?php echo file_get_contents("html/header.html"); ?>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <h2>Search</h2>
    <input type="button" onclick="changePage('full_registration');" value="My Registration">
    <input type="button" onclick="alert('TBD');" value="My Name Cards">
    <br>
    I am (we are) going to the temple on 
    <input type="date" id="templedate" size="10">
     and would like take name cards for:
    <table id="wanttable">
        <tr>
            <th>Ordinance</th>
            <th>Gender</th>
        </tr>
        <tr>
            <td>Baptism</td>
            <td>
                <input type="radio" id="baptism_want_M" name="baptism_want_G">
                <label for="baptism_want_M">Male</label>
                <input type="radio" id="baptism_want_F" name="baptism_want_G">
                <label for="baptism_want_F">Female</label>
                <input type="radio" id="baptism_want_E" name="baptism_want_G">
                <label for="baptism_want_E">Either</label>
            </td>
        </tr>
        <tr>
            <td>Confirmation</td>
            <td>
                <input type="radio" id="wantmaleconfirmation" name="wantgenderconfirmation">
                <label for="wantmaleconfirmation">Male</label>
                <input type="radio" id="wantfemaleconfirmation" name="wantgenderconfirmation">
                <label for="wantfemaleconfirmation">Female</label>
                <input type="radio" id="wanteitherconfirmation" name="wantgenderconfirmation">
                <label for="wanteitherconfirmation">Either</label>
            </td>
        </tr>
        <tr>
            <td>Initiatory</td>
            <td>
                <input type="radio" id="wantmaleinitiatory" name="wantgenderinitiatory">
                <label for="wantmaleinitiatory">Male</label>
                <input type="radio" id="wantfemaleinitiatory" name="wantgenderinitiatory">
                <label for="wantfemaleinitiatory">Female</label>
                <input type="radio" id="wanteitherinitiatory" name="wantgenderinitiatory">
                <label for="wanteitherinitiatory">Either</label>
            </td>
        </tr>
        <tr>
            <td>Endowment</td>
            <td>
                <input type="radio" id="wantmaleendowment" name="wantgenderendowment">
                <label for="wantmaleendowment">Male</label>
                <input type="radio" id="wantfemaleendowment" name="wantgenderendowment">
                <label for="wantfemaleendowment">Female</label>
                <input type="radio" id="wanteitherendowment" name="wantgenderendowment">
                <label for="wanteitherendowment">Either</label>
            </td>
        </tr>
        <tr>
            <td>Sealing to Parents</td>
            <td>
                <input type="radio" id="wantmalesealingtoparents" name="wantgendersealingtoparents">
                <label for="wantmalesealingtoparents">Male</label>
                <input type="radio" id="wantfemalesealingtoparents" name="wantgendersealingtoparents">
                <label for="wantfemalesealingtoparents">Female</label>
                <input type="radio" id="wanteithersealingtoparents" name="wantgendersealingtoparents">
                <label for="wanteithersealingtoparents">Either</label>
            </td>
        </tr>
        <tr>
            <td>Sealing to Spouse</td>
            <td>
                <input type="radio" id="wantmalesealingtospouse" name="wantgendersealingtospouse">
                <label for="wantmalesealingtospouse">Male</label>
                <input type="radio" id="wantfemalesealingtospouse" name="wantgendersealingtospouse">
                <label for="wantfemalesealingtospouse">Female</label>
                <input type="radio" id="wanteithersealingtospouse" name="wantgendersealingtospouse">
                <label for="wanteithersealingtospouse">Either</label>
            </td>
        </tr>
    </table>
    <input type="button" onclick="showresults()" value="Search">
    <input type="button" onclick="changePage('index')" value="Cancel">
    <br>
    <br>
    <div id="resultspage" style="display:none">
    <hr>
    <br>
    <table id="resultstable" style="" width="100%"">
        <caption><b>Search Results</b></caption>
        <tr>
            <th>Ordinance</th>
            <th colspan="4">Available</th>
            <th colspan="4">I/we would like</th>
            <th>Owner</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>Baptism</td>
            <td id="resultsmalebaptism">9999</td>
            <td>M</td>
            <td id="resultsfemailbaptism">9999</td>
            <td>F</td>
            <td><input id="resultsbaptism_want_M" type="number" maxlength="4"  min=0 max=9999 value=0></td>
            <td>Male</td>
            <td><input id="resultsbaptism_want_F" type="number" size="4"  min="0" max="9999" value="0"></td>
            <td>Female</td>
            <td id="resultsname">John Doe</td>
            <td id="resultsphonne">555-555-5555 </td>
            <td id="reultsemail">Bob@me.me</td>
            <td><input type="button" value="Send E-Mail"></td>
            <td><input type="button" value="Make Call"></td>
        </tr>
         <tr>
            <td>Initiatory</td>
            <td colspan="2" id="resultsmaleinitiatory">9999</td>
            <td colspan="2" >M</td>
<!--            <td id="resultsfemailbaptism">9999</td>
            <td>F</td> -->
            <td colspan="2"><input id="resultsbaptism_want_M" type="number" size="4"  min="0" max="9999" value="0"></td>
            <td colspan="2">Male</td>
<!--            <td><input id="resultsbaptism_want_F" type="number" size="4"  min="0" max="9999" value="0"></td>
            <td>Female</td> -->
            <td id="resultsname">John Doe</td>
            <td id="resultsphonne">555-555-5555 </td>
            <td id="reultsemail">Bob@me.me</td>
            <td><button type="button">Send E-Mail</button></td>
            <td><button type="button">Make Call</button></td>
        </tr>
    </table>
    <input type="button" onclick="changePage('index');" value="Finished">
    </div>
    <script>
        function showresults() {document.getElementById("resultspage").style.display = "inline";}
    </script>
</body>
</html>