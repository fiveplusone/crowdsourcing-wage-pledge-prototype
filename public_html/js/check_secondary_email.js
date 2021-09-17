// regex from http://www.regular-expressions.info/email.html

function check_secondary_email() {
  var address = document.getElementById("secondary_email").value;
  var info = document.getElementById("secondary_email_info");
  var infotext = document.getElementById("secondary_email_info_text");
  var regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
  if (address.length == 0) {
    info.innerHTML = "";
    infotext.innerText = "";
  } else if (regex.test(address)) {
    info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
    infotext.innerText = "";
  } else {
    info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
    infotext.innerText = "That doesn't look like an email address.";
  }
}

