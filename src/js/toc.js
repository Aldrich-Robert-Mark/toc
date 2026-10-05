 let ordinanceArray = [ "All", "Baptism", "Confirmation", "Initiatory", "Endowment", "Sealing_to_Parents", "Sealing_to_Spouse"];

let ssPerson = "";
let ssPasscode = "";
let ssFname = "";
let ssLname = "";
let ssPhone = "";
let ssEmail = "";
let ssGender = "";
let ssHelp = 0;

let ssCardMap = new Map();
let ssWantMap = new Map();

ordinanceArray.forEach(stuffMaps);

function stuffMaps(ordinance) {
    if (ordinance != "All") {
        ssCardMap.set(ordinance,{male:0, female:0});
        ssWantMap.set(ordinance, {wants:"N"});
    }
}

function changePage(newPage) {
    saveVariables();
    document.location.assign(newPage.concat(".php"));
}

// This is to be replaced with a php routine
function checkIDs(personID, passcode) {
    if (personID == null) {personID = "bob";}
    if (["bob","rudy","mark","tammie","james"].includes(personID.toLowerCase())) { //&& passcode === "Tom") {
        return true;
    }
    return false;
}

function getVariables() {
    // alert("Getting variables for " + person, passcode);
    ssPerson = sessionStorage.getItem("personID");
    // alert("ssPerson="+ ssPerson);
    ssPasscode = sessionStorage.getItem("passcode");
    if (checkIDs(ssPerson, ssPasscode)) {
        ssFname = sessionStorage.getItem("firstname");
        ssLname = sessionStorage.getItem("lastname");
        ssPhone = sessionStorage.getItem("phone");
        ssEmail = sessionStorage.getItem("email");
        ssGender = sessionStorage.getItem("gender");
        ssHelp = sessionStorage.getItem("helpWith");
//        alert("Read: " + ssPerson + "-" + ssPasscode + "-" + ssFname + "-" + ssLname + "-" + ssPhone + "-" + ssEmail + "-" + ssGender + "-" + ssHelp);
        ssCardMap.clear();
        ssWantMap.clear();
        ordinanceArray.forEach(function(value) {
            let cards_M = cards_F = 0;
            let wantsCategory = "";
            if (value != "all") {
                cards_M = sessionStorage.getItem(value.concat("_cards_M"));
                if (cards_M == null) {cards_M = 0;}
                cards_F = sessionStorage.getItem(value.concat("_cards_F"));
                if (cards_F == null) {cards_F = 0;}
                ssCardMap.set(value,{male:cards_M, female:cards_F});
                wantsCategory = sessionStorage.getItem(value.concat("_wants"));
                if (wantsCategory == null) {wantsCategory = "N";}
                ssWantMap.set(value,{wants:wantsCategory});
            }
        });
        if (ssPerson == null) {ssPerson = "";}
        if (ssPasscode == null) {ssPasscode = "";}
        if (ssFname == null) {ssFname = "";}
        if (ssLname == null) {ssLname = "";}
        if (ssPhone == null) {ssPhone = "";}
        if (ssEmail == null) {ssEmail = "";}
        if (ssGender == null) {ssGender = "";}
        if (ssHelp == null) {ssHelp = 2**ordinanceArray.length - 1;}
    }
    console.log(ssWantMap);
}

function saveVariables() {
    sessionStorage.setItem("personID", ssPerson);
    sessionStorage.setItem("passcode", ssPasscode);
    sessionStorage.setItem("firstname", ssFname);
    sessionStorage.setItem("lastname", ssLname);
    sessionStorage.setItem("phone", ssPhone);
    sessionStorage.setItem("email", ssEmail);
    sessionStorage.setItem("gender", ssGender);
    sessionStorage.setItem("helpWith", ssHelp);
    ssCardMap.forEach(function(value,key) {
        if (value !== undefined) {
            sessionStorage.setItem(key.concat("_cards_M"), value.male);
            sessionStorage.setItem(key.concat("_cards_F"), value.female);
        }
    });
    ssWantMap.forEach(function(value,key) {
        if (value !== undefined) {
            sessionStorage.setItem(key.concat("_wants"), value.wants);
        }
    });
    console.log(ssWantMap);
}

function revealPassword(field) {
    field = document.getElementById(field);
    if (field.type == "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
