var dateRegex = /^(?=\d{2}([-.,\/])\d{2}\1\d{4}$)(?:0[1-9]|1\d|[2][0-8]|29(?!.02.(?!(?!(?:[02468][1-35-79]|[13579][0-13-57-9])00)\d{2}(?:[02468][048]|[13579][26])))|30(?!.02)|31(?=.(?:0[13578]|10|12))).(?:0[1-9]|1[012]).\d{4}/;
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
// Simplified version of Hoverable Button
$(".propel-hover").addClass("hoverable-btn");
$(".propel-hover").hover(function () {
$(this).toggleClass("hoverable-btn");
});

// Simplified version of needValidation For Track a Input
$("input").addClass("needValidation");
$("select").addClass("needValidation");
$("input[type=hidden], input[readonly]").removeClass("needValidation");

if ($("form .needValidation").length > 0) { 
  
$("form button[type=submit]").addClass("disable");

inputV = $("form .needValidation");
$(".needValidation").attr("validate", "notValidate");
}
$(".propel-key-press-input-mendatory[validate=notValidate]").attr("validate", "validateRequired");
 
$("form").on("reset", function() {
    $(this).find("button[type=submit]").addClass("disable");
    $(this).find(".propel-input-error").remove();
    
    if ($(this).attr("data-edit-form") == "true") {
      $(this).find(".propel-key-press-input-mendatory").filter(function() {
        return $(this).val() == "";
      }).attr("validate", "validateRequired");
    } else {
      $(this).find(".propel-key-press-input-mendatory").attr("validate", "validateRequired");
    }
  });
  

  
$("form .disable").click(function () {
    let disableForm=$(this).closest("form");
    let formIndex = $("form").index(disableForm); 
    let formSelector = "form:eq(" + formIndex + ")";

    disableForm.find(".propel-key-press-input-mendatory.needValidation[validate=notValidate]").attr('validate','failure');  
    disableForm.find(".propel-key-press-input-mendatory.needValidation[validate=validateRequired]").attr('validate','failure'); 
    
    for (let i = 0; i < inputV.length; i++) {
        let inputForm=$(inputV[i]).closest("form");
        if (inputForm.is(disableForm)) {
            let inputAttr = inputV[i].getAttribute('validate');
            if (inputAttr != "failure" && inputAttr != "validateRequired") {
                // validation passed
            } else {
                // validation failed
                $(this).blur();
                return false;   
            }
        }
    }
});

$('.ddReset').on('click', function(e) {
    var ele = $("form .select2-selection__rendered");
    //var ele = $("form select.search-need");
    ele.empty(), ele.removeAttr("title");
});

    //Validation When input Change
            /*
                   In this type of validation, we validate fields where the user cannot enter a value using the keyboard.
                        -> Select 
                        -> Radio
                        -> Check box
                        -> Files
                        -> Extra
            */

inputV.change(function () {
    
    if(agreeValid($(this),false));
    else if(dateValid($(this),false));
   formValid();
});
inputV.focus(function () {
   emptyValid($(this),false);
}); 
inputV.blur(function () {
    if (emptyValid($(this),true)) {} 
    else if (mobileNumValid($(this),false)) {}
    else if (emailValid($(this),false)) {} 
    else if (dateValid($(this),false)) {} 
    else if(checkValid($(this),false)){}
    
    formValid();
});

// Keyup  Validation

inputV.on('input', function() {
    //******* Empty Input Validation ***********

    if (emptyValid($(this))) {
    } else {
        $(this).parent().find(".empty-field").remove();
        if (mobileNumValid($(this),true)){}
        else if (emailValid($(this),true)){} 
        else if (dateValid($(this),true)){} 
        else if(checkValid($(this),true)){}
      
    }

    formValid();
});


function emptyValid(input , isblur) {
    var attrValue = isblur ? "failure" : "validateRequired";
    if (input.val() == "") {
        input.attr("validate", input.hasClass("propel-key-press-input-mendatory") ? attrValue : "notValidate");
        isblur && input.hasClass("propel-key-press-input-mendatory") ? errorShow(input, "This Field is Mandatory") : null;
        return true;
    }
    else{
        attrValue = isblur ? "success" : "success";
        input.attr("validate", input.hasClass("propel-key-press-input-mendatory") ? attrValue : "notValidate");
        errorRemove(input)
        return false;
    }
}

function agreeValid(input) {
    if (input.attr("agree") === "yes" ) {
        input.attr("validate", input.prop("checked") ? "success" : "failure");
          return true;
    }
    else{
        errorRemove(input)
        return false;
    }
}

function dateValid(input,isOninput) {

    if (input.attr("validationAttr") === "date") {
        input.attr("validate", dateRegex.test(input.val()) ? "success" : "failure");
     
        return true;
    }
    else{
        errorRemove(input)
        return false;
    }
}
function mobileNumValid(input , isOninput) {
    if (input.attr("validateAttr") == "mobile-num") {
        var mobileNum = input.val().replace(/\D/g, "");
          input.val(mobileNum);
        var validateMobNum = /^(?:(?:\+|0{0,2})91[\s-])?[56789]\d{9}|(\d[ -]?){10}\d$/;
      if (validateMobNum.test(mobileNum) && mobileNum.length == 10) {
        input.attr("validate", "success").parent().find(".propel-input-error").remove();
      } else {
        input.attr("validate", "failure");
        if (mobileNum.length != 10) {
            if (!isOninput) {
                errorShow(input, "Mobile Number is Required 10 Digit");
    
            }
        } else if (!validateMobNum.test(mobileNum)) {
            if (!isOninput) {
                errorShow(input, "Mobile Number is Invalid");
            }
        }
      }
      return true;
    }
    else{
        errorRemove(input)
        return false;
    }
  }
function emailValid(input , isOninput){
    if(input.attr("type") == "email"){
    if (!emailReg.test(input.val())) {
        input.attr("validate", "failure");
        if (!isOninput) {
            errorShow(input, "This is not a valid Email");
 
        }
    } else {
        input.attr("validate", "success");
    }
    return true;
}
else{
    errorRemove(input)
    return false;
}

}
function checkValid(input , isOninput) {
    if (input.attr("validationAttr") == "check") {
        var ValueA = input.val();
        var checkId = input.attr("checkId");
        var ValueB = $("#" + checkId).val();
        if (ValueA == ValueB) {
            input.attr("validate", "success");
        } else {
            input.attr("validate", "failure");
            if (!isOninput) {
                errorShow(input, "Password is not Match")

            }
        }
    }
    else{
        errorRemove(input)
        return false
    }
}
function formValid() {
    let errorForm=[];
    for (let i = 0; i < inputV.length; i++) {
        var inputAttr = inputV[i].getAttribute("validate");
        let subbtn=$(inputV[i]).closest("form");
        let formIndex = $("form").index(subbtn); 
        let formSelector = "form:eq(" + formIndex + ")";

if (inputAttr != "failure" && inputAttr != "validateRequired") {
            
    if (!errorForm.includes(formSelector)) {
         if ($(subbtn).find(".disable").length != 0) {
            $(subbtn).find(".disable").removeClass("disable");
        }
    }
        } else {
    
            if (!errorForm.includes(formSelector)) {
             
                if ($(subbtn).find(".disable").length == 0) {
                    $(subbtn).find("button[type=submit]").addClass("disable");
                }
                errorForm.push(formSelector);
            }
        }
    }
      
}

function errorShow(input , message) {
   input.parent().find(".propel-input-error").remove();
   input.parent().append("<span class='propel-input-error '>&nbsp;&nbsp;"+message+"</span>" ); 
}
function errorRemove(input){
    input.parent().find(".propel-input-error").remove();
}


var editForm = $("form[data-edit-form='true']");

if ($(editForm)) {

    $.each( inputV, function (index, input) { 
        if ($(input).closest(editForm).length > 0) {
        if (emptyValid($(input),true)) {} 
        else if (mobileNumValid($(input),false)) {}
        else if (emailValid($(input),false)) {} 
        else if (dateValid($(input),false)) {} 
        else if(checkValid($(input),false)){}
        } 
    });
    
    formValid();
    
}

