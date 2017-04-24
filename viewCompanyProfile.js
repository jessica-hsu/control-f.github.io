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
      var focusMenu = document.getElementById('ourFocus');
	  var selectedFocus = focusMenu.options[focusMenu.selectedIndex].text;
      changedText = [location.innerHTML,founder.innerHTML,selectedFocus];
      console.log(changedText);
      break;
    case 'proud-text':
      f ='proud-company';
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
      
      changedText = url.src;
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
      $('#successModal').modal('show');

    },
    error: function(e) {
      console.log(e);
      $('#failModal').modal('show');
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
  var save = document.getElementById('save-about-text').parentElement;
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="white";
      box.style.border = "none";
      $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
      save.style.display ="none";

  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="inline";
  }
}


function editFacts(button) {
  var text = document.getElementById("facts-text");
  var box = document.getElementById("quick-facts-box");
  var location = document.getElementById("loc");
  var founder = document.getElementById("found");
  var focus = document.getElementById("focus");
  var save = document.getElementById('save-quick-facts-text').parentElement;

  if ( text.contentEditable == "true") {
	  focusMenu = document.getElementById('ourFocus');
	  selectedFocus = focusMenu.options[focusMenu.selectedIndex].text;
	  focus.innerHTML = selectedFocus;
       text.contentEditable = "false";
       box.style.backgroundColor="white";
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
      tempFocus = focus.innerHTML;
      focus.innerHTML="<select id='ourFocus'></select>";
      $("#ourFocus").append("\
		<option class='foci' value='1'>Advocacy & Human Rights</option>\
		<option class='foci' value='2'>Animals</option>\
		<option class='foci' value='3'>Arts & Culture</option>\
		<option class='foci' value='4'>Board Development</option>\
		<option class='foci' value='5'>Children & Youth</option>\
		<option class='foci' value='6'>Community</option>\
		<option class='foci' value='7'>Computers & Technology</option>\
		<option class='foci' value='8'>Crisis Support</option>\
		<option class='foci' value='9'>Disaster Relief</option>\
		<option class='foci' value='10'>Education & Literacy</option>\
		<option class='foci' value='11'>Emergency & Safety</option>\
		<option class='foci' value='12'>Employment</option>\
		<option class='foci' value='13'>Environment</option>\
		<option class='foci' value='14'>Faith-based</option>\
		<option class='foci' value='15'>Health & Medicine</option>\
		<option class='foci' value='16'>Homeless & Housing</option>\
		<option class='foci' value='17'>Hunger</option>\
		<option class='foci' value='18'>Immigrants & Refugees</option>\
		<option class='foci' value='19'>International</option>\
		<option class='foci' value='20'>Justice & Legal</option>\
		<option class='foci' value='21'>LGBT</option>\
		<option class='foci' value='22'>Media & Broadcasting</option>\
		<option class='foci' value='23'>People with Disabilities</option>\
		<option class='foci' value='24'>Politics</option>\
		<option class='foci' value='25'>Race & Ethnicity</option>\
		<option class='foci' value='26'>Seniors</option>\
		<option class='foci' value='27'>Sports & Recreation</option>\
		<option class='foci' value='28'>Veterans & Military Families</option>\
		<option class='foci' value='29'>Women</option>\
		<option class='foci' value='30'>Other</option>"); 
      console.log(tempFocus);
      opts = document.getElementsByTagName('option');
      for (var i =0;i< opts.length; i++) {
    	  if (opts[i].innerHTML == tempFocus) {
    		  opts[i].selected = "selected";
    	  }
      }
    		 
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="inline";
  }
}

function editProud(button) {
  var text = document.getElementById("proud-text");
  var box = document.getElementById("proud");
  var save = document.getElementById('save-proud-text').parentElement;
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="white";
      box.style.border = "none";
      $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
      save.style.display ="none";
  } else {
      text.contentEditable = "true";
      box.style.backgroundColor ="#f2f2f2";
      box.style.border = "2px dashed #cecece";
      $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
      save.style.display ="inline";
  }
}


function editContact(button) {
  var text = document.getElementById("contact-text");
  var box = document.getElementById("contact-us");
  var email = document.getElementById("email");
  var tel = document.getElementById("tel");
  var save = document.getElementById('save-contact-us-text').parentElement;
  if (text.contentEditable == "true") {
      text.contentEditable = "false";
      box.style.backgroundColor="white";
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
      save.style.display ="inline";
  }
}
function logout() {
	console.log("logging out ... ");
	f="logout";
	network = document.getElementById('network').innerHTML;
	console.log(network);
	profileType = document.getElementById('profileType').innerHTML;
	console.log(profileType);
	hello( network ).logout({force:true},function(e){
		console.log("force logout of " + network);
	});
	
	$.ajax({
        url: 'ajax.php',
        data: {func: f},
       	type: 'post',
        success: function(result) {
            console.log("action performed successfully");
            if (profileType == "dev") {
            	window.location.href = "loginDev.php";
            } else {
               	window.location.href = "loginComp.php";
            }
        }, 
        error: function(result) {
        	console.log(result);
        }
    });
	
}
