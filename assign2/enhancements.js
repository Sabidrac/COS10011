
"use strict"

$(document).ready(function () {
// <a href=https://www.w3schools.com/jquery/event_focusin.asp>The idea of the code of focus event is taken from here</a>
  $("#Date").focusin(function () {
    $(this).css("background-color", "#ffffab");
  });

  $("#Date").focusout(function () {     // <a href=https://www.w3schools.com/jquery/event_focusout.asp>The idea of the code of focus event is taken from here</a>
    $(this).css("background-color", "#FFFFFF");
    var From_date = new Date($("#Date").val());
    var To_date = new Date();
    var diff_date = To_date - From_date;

    var years = Math.floor(diff_date / 31536000000);

    if (years < 15 || years > 80) {
      $("#datevalid").css("display", "inline");
      $("#datevalid").css("color", "red");
      $("#Date").val("");
    } else {
      $("#datevalid").css("display", "none");
    }
  });




  $("#otherskills").click(function () {   
    if ($("#otherskills")[0].checked) {


//  <a href=https://www.codegrepper.com/code-examples/javascript/jquery+.prop%28%27required%27%2Cfalse%29%3B+multiple>The code of required is taken from here</a>
      $("#otherSkillsText").prop("required", true);

//  <a href=https://www.w3schools.com/jquery/event_focusin.asp>The idea of the code of focus event is taken from here</a>

      $("#otherSkillsText").focusin(function () {
        $(this).css("background-color", "#ffffcc");
      });
      $("#otherSkillsText").focusout(function () {
        $(this).css("background-color", "#FFFFFF");
      });
// <a href=https://www.w3schools.com/jquery/event_focusout.asp>The idea of the code of focus event is taken from here</a>
    } else {
      $("#otherSkillsText").prop("required", false);
//  <a href=https://www.codegrepper.com/code-examples/javascript/jquery+.prop%28%27required%27%2Cfalse%29%3B+multiple>The code of required is taken from here</a>
    }

  });




// <a href=https://stackoverflow.com/questions/40298052/jquery-display-alert-message-on-form-submit>The idea of the below code is taken from here</a>
  var $form = $("#form");
  $form.submit(function () {
    var date = $("#Date").val();
    if (date == "") {
      alert("Please fill up the Date of Birth field of the form.");
      return false;
    }
// <a href=https://stackoverflow.com/questions/40298052/jquery-display-alert-message-on-form-submit>The idea of the below code is taken from here</a>

  });
});
