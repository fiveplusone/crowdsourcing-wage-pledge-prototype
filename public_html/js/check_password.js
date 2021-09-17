function check_password() {
  var pw = document.getElementById("password").value;
  var info = document.getElementById("password_info");
  var infotext = document.getElementById("password_info_text");
  if (pw.length >= 12) {
    info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
    infotext.innerText = "";
  } else {
    info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
    infotext.innerText = "Please make sure your password is at least 12 characters long.";
  }
}
