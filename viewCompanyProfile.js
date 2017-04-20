function save(id) {
  console.log("entered function");
  var box = document.getElementById(id);
  var changedText = "";
  var text = document.getElementById("about-text");
  var f = "";
  var ads=[]; var size="";

  switch(id) {
    case 'about-text':
      f = 'about-company';
      changedText = box.innerHTML;
      break;
    case 'quick-facts-table':
      f ='quick-facts-company';
      changedText = [];
      var location = document.getElementById('loc');
      var founder = document.getElementById('found');
      var focus = document.getElementById('focus');
      changedText = [location.innerHTML,founder.innerHTML,focus.innerHTML];
      console.log(changedText);
      break;
    case 'skills-text':
      f ='skills-company';
      changedText = box.innerHTML;
      console.log(changedText);
      break;
    case 'contact-box':
      f ='contact-company';
      var tel = document.getElementById('tel');
      changedText = [tel.innerHTML];
      console.log(changedText);
      break;

    case 'profile-pic':
      f ='change-company-pic';
      var url = document.getElementById('profile-pic');
      changedText = [];
      changedText.push(url.src);
    break;
    case 'volunteers-box':
    	f = 'editAd';
    	params = []; changedText=[];
 		var theLink = document.getElementsByClassName("pickStatus");
    	var adID = document.getElementsByClassName("adID"); 
 		var adStatus = document.getElementsByClassName("adStatus");
 		
    	for (var i=0; i<adStatus.length; i++) {
    		status = theLink[i].options[theLink[i].selectedIndex].text;
    		id = adID[i].innerHTML;
    		ads.push(id);
    		changedText.push(status);
    	}
    	size = adStatus.length; 
    	break;
    default :
      break;
  }

  $.ajax ({
    type: "POST",
    url: "ajax.php",
    data: {companyFunc: f, textUpdateCompany: changedText, adId: ads, s:size},
    dataType: "html",
    success: function(data) {
      console.log("success");

    },
    error: function(e) {
      console.log(e);
    }
  });


}

function removeAdvert(adID, compID) {
	f="removeAds";
	changedText=[adID, compID]; console.log(changedText);
	$.ajax ({
	    type: "POST",
	    url: "ajax.php",
	    data: {companyFunc: f, textUpdateCompany: changedText},
	    dataType: "html",
	    success: function(data) {
	      console.log("success");
	      location.reload();
	    },
	    error: function(e) {
	      console.log(e);
	    }
	  });
}


function editAbout(button) {
  var text = document.getElementById("about-text");
  var box = document.getElementById("about-box");
  var save = document.getElementById('save-about-text');
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="#e8e9ea";
      box.style.border = "none";
      $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
      save.style.display ="none";

  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="block";
  }
}


function editFacts(button) {
  var text = document.getElementById("facts-text");
  var box = document.getElementById("quick-facts-box");
  var location = document.getElementById("loc");
  var founder = document.getElementById("found");
  var focus = document.getElementById("focus");
  var save = document.getElementById('save-quick-facts-text');

  if ( text.contentEditable == "true") {
       text.contentEditable = "false";
       box.style.backgroundColor="#e8e9ea";
       box.style.border = "none";
       $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
       location.contentEditable=false;
       founder.contentEditable=false;
       focus.contentEditable=false;
       save.style.display ="none";
  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      location.contentEditable=true;
      founder.contentEditable=true;
      focus.contentEditable=true;
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="block";
  }
}

function editSkills(button) {
  var text = document.getElementById("skills-text");
  var box = document.getElementById("skills-box");
  var save = document.getElementById('save-skills-text');
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="#e8e9ea";
      box.style.border = "none";
      $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
      save.style.display ="none";
  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="block";
  }
}


function editContact(button) {
  var text = document.getElementById("projects-text");
  var box = document.getElementById("projects-box");
  var email = document.getElementById("email");
  var tel = document.getElementById("tel");
  var save = document.getElementById('save-contact-us-text');
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="#e8e9ea";
       box.style.border = "none";
       $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
       tel.contentEditable= false;
       save.style.display ="none";
  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      tel.contentEditable=true;
      save.style.display ="block";
  }
}
