function check_username() {
  var username = document.getElementById("username").value;
  var info = document.getElementById("username_info");
  var infotext = document.getElementById("username_info_text");
  if (username.length == 0) {
    info.innerHTML = "";
    infotext.innerText = "";
  } else if (username.length < 8) {
    info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
    infotext.innerText = "Please make sure your username is at least 8 characters long.";
  } else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        var response = xhttp.responseText;
        if (response == "OK") {
          info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
          infotext.innerText = "";
        } else {
          info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
          infotext.innerText = "Sorry, that username is already taken.";
        }
      }
    };
    xhttp.open("GET", "util/check_username.php?username=" + username, true);
    xhttp.send();
  }
}
