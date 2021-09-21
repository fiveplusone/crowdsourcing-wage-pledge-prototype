// ==UserScript==
// @name           Crowdsourcing Wage Pledge - Prototype User Script
// @version        2021.09.21.2214
// @description    Highlight MTurk requesters who signed the Wage Pledge
// @author         Six Silberman
// @homepage       https://wagepledge.org
// @include        http://*.mturk.com/*
// @include        https://*.mturk.com/*
// ==/UserScript==

// Based on the 2021 Turkopticon user script
// https://greasyfork.org/en/scripts/431111-turkopticon-net/code

function getRequesterAnchorsAndIds(a) {
  var rai = {};
  var requesterRegex = new RegExp(/requesterId=([0-9A-Z]+)|\/requesters\/([0-9A-Z]+)\/projects/);
  var rf = new RegExp(/contact/);
  var isContactLink = new RegExp(/Contact/);
  var isImgButton = new RegExp(/img/);
  var requestersHere = false;

  for (var i = 0; i < a.length; i++) {
    var href = a[i].getAttribute('href');
    var requesterIdMatch = requesterRegex.exec(href);
    if ((requesterIdMatch) /*&& !rf.test(href)*/) {
      var innards = a[i].innerHTML;
      if (!isContactLink.test(innards) && !isImgButton.test(innards)) {
        var id = requesterIdMatch[1] || requesterIdMatch[2];
        if (!rai.hasOwnProperty(id)) {
          rai[id] = [];
        }
        rai[id].push(a[i]);
        requestersHere = true;
      }
    }
  }

  rai = (requestersHere) ? rai : null;
  return rai;
}

function insertStars(rai, reqIds) {
	for(var rid in rai) {
		if (rai.hasOwnProperty(rid)) {
			for(var i = 0; i < rai[rid].length; i++) {
        var td = rai[rid][i].parentNode;
				if (td.parentNode.parentNode.childNodes.length > 5) {
          if (td.parentNode.parentNode.childNodes[5].childNodes[0].childNodes[0])
            var check = td.parentNode.parentNode.childNodes[5].childNodes[0].childNodes[0].getAttribute("href");
					if (check != null) {
						var hitid = td.parentNode.parentNode.childNodes[5].childNodes[0].childNodes[0].getAttribute("href").match(/\/([A-Z0-9]+)\//)[1];
					} else { 
						var hitid = "";
					}
				} else {
					var hitid = "";
        }
        if (td.parentNode.parentNode.childNodes[1]) {
          var hitname = td.parentNode.parentNode.childNodes[1].getAttribute("title");
        }
        var tooltip = "This requester has an active Crowdsourcing Wage pledge";
        var wp_url = "https://wagepledge.org/pledges.php";
        if (reqIds.includes(rid)) {
          var extra_html = "<div style='color: #ffd700; display: inline-block' title='" + tooltip + "'><a href='" + wp_url + "' target='_blank'>&#9733;</a></div>&nbsp;";
        } else {
          var extra_html = "<div style='color: #000; display: inline-block' title='No active Wage Pledge for this requester'>&#9734;</div>&nbsp;";
        }
        td.innerHTML = extra_html + td.innerHTML;
      }
    }
  }
}

function getActivePledgeReqIds(api_url) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', api_url, false);
  xhr.send(null);
  var reqIds = JSON.parse(xhr.response);
  return reqIds;
}

var a = document.getElementsByTagName('a');
var reqAnchors = getRequesterAnchorsAndIds(a);
if (reqAnchors) {
  const API_REQ_IDS = "https://wagepledge.org/api/requester_ids.php";
  var reqIds = getActivePledgeReqIds(API_REQ_IDS);
  insertStars(reqAnchors, reqIds);
}
