function check_password_confirmation() {
  var pw = document.getElementById("password").value;
  var cpw = document.getElementById("confirm_password").value;
  var info = document.getElementById("confirm_password_info");
  var infotext = document.getElementById("confirm_password_info_text");
  if (pw.length < 12) {
    info.innerHTML = "";
    infotext.innerText = "";
  } else {
    if (pw == cpw) {
      info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
      infotext.innerText = "";
    } else {
      info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
      infotext.innerText = "Please make sure you have entered the same password in both fields.";
     }
  }
}

