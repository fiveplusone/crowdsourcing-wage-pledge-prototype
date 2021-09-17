// regex from http://www.regular-expressions.info/email.html

function check_email() {
  var address = document.getElementById("email").value;
  var info = document.getElementById("email_info");
  var infotext = document.getElementById("email_info_text");
  var regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
  if (address.length == 0) {
    info.innerHTML = "";
    infotext.innerText = "";
  } else if (regex.test(address)) {
    var non_institutional_domains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'web.de', 'outlook.com', 'protonmail.com'];
    var domain = address.split("@")[1];
    if (non_institutional_domains.includes(domain)) {
      info.innerHTML = "<span class='reg_field_warn'>&#9888;</span>";
      infotext.innerText = "That doesn't look like an institutional email address. You can use it if you really want to, though.";
    } else {
      info.innerHTML = "<span class='reg_field_ok'>&#x2713;</span>";
      infotext.innerText = "";
    }
  } else {
    info.innerHTML = "<span class='reg_field_error'>&#x2718;</span>";
    infotext.innerText = "That doesn't look like an email address.";
  }
}

