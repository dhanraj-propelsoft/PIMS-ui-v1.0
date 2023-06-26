var audio = new Audio(
    'http://127.0.0.1:8001/assets/sound/sound1.mp3');
//full screen mode
var fullscreen = document.documentElement;

if (window.innerHeight == screen.height) {
    $('.propel-window-fullscreen').html("<i class='simple-icon-size-actual'></i> ");
}
else {
    $('.propel-window-fullscreen').html("<i class='simple-icon-size-fullscreen'></i> ");
}
$('.propel-window-fullscreen').click(function () {
 
    if (window.innerHeight == screen.height) {
        $('.propel-window-fullscreen').html("<i class='simple-icon-size-fullscreen'></i> ");
        closeFullscreen();
    }
    else {
        $('.propel-window-fullscreen').html("<i class='simple-icon-size-actual'></i> ");
        openFullscreen();
    }

});


function openFullscreen() {

    if (fullscreen.requestFullscreen) {
        fullscreen.requestFullscreen();
      } else if (fullscreen.mozRequestFullScreen) {
        fullscreen.mozRequestFullScreen();
      } else if (fullscreen.webkitRequestFullscreen) {
        fullscreen.webkitRequestFullscreen();
      } else if (fullscreen.msRequestFullscreen) {
        fullscreen.msRequestFullscreen();
      }

}

function closeFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }

}
//workspace fullscreen 
$('.workspace-fullscreen').click(function () {
    // alert($('.propel-workspace-container').css('position'));
    if ($('.propel-workspace-container').css('position') == 'relative') {
        $('.propel-workspace-container').css({ "position": "absolute", "left": "4px", "top": "4px", "height": "calc( 100vh - 8px)", "width": "calc( 100vw - 8px)" });
        localStorage.setItem("wfscreen", "yes");
    }
    else {
       
        $('.propel-workspace-container').removeAttr('style');
        localStorage.removeItem("wfscreen");
        if ($('.propel-workspace-container table').length) {
            $('.propel-workspace-container').css('overflow', 'hidden');
        
        }
       
      

    }
});

if (localStorage.getItem("wfscreen")) {
    $('.propel-workspace-container').css({ "position": "absolute", "left": "4px", "top": "4px", "height": "calc( 100vh - 8px)", "width": "calc( 100vw - 8px)" });
}



var count = 0;
var windowWidth = $(window).width();
if (localStorage.getItem("count") == 1) {
    if (windowWidth < 700) {
        count = 0;
    }
    else {
        $(".propel-menu-line1").css('width', '15px');
        $(".propel-menu-line2").css('width', '20px');
        $(".propel-menu-bar").css('width', '50px');
        $('.propel-menu-bar-text').addClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown-text').addClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown i').addClass('propel-menu-bar-icon-hover');
        // $('.propel-menu-bar-title').css('display', 'none');
        count = 1;
        if (windowWidth > 700 && windowWidth < 1200) {
            count = 2;
            $(".propel-right-arrow").css('pointer-events', 'auto');
            $(".propel-right-arrow svg").css('fill', 'black');
        }
    }
}
if (windowWidth < 700) {
    count = 7;
}
/*

   -> Active Menu 
        Some dummy class present in Every Pages we take that to active 
   -> Breadcrumbs 
       Some dummy class present in Every Pages we take that to uses Breadcrumbs  
*/
if ($(".for-active").length) {
    var classList = $('.for-active').attr('class').split(/\s+/);
    $('.propel-active-module-bar').removeClass('propel-active-module-bar');
    var activeMainMenu = classList[0].replace(/\d+/g, '');
    $('.' + activeMainMenu).addClass('propel-active-module-bar');
    var activesideMenu = classList[1].replace(/\d+/g, '');
    $('.' + activesideMenu).addClass('propel-active-menu-bar');
    $('.propel-menu-bar-list-container').css('display', 'none');
    $('.' + activeMainMenu + '-menu-bar').css('display', 'block');
    var breadcrumbs;
    var breadcrumbsValue;
    for (let index = 0; index < classList.length - 1; index++) {
        breadcrumbs = $('.' + classList[index].replace(/\d+/g, ''));
        breadcrumbsValue = breadcrumbs.children('span').html();
        var navigateLink = "";
        if (breadcrumbs.parent().prop('tagName').toLowerCase() == 'a') {
            navigateLink = breadcrumbs.parent().attr('href');
        }
        $('.propel-breadcrumbs-list').append("<a class='ml-1' href=" + navigateLink + ">" + breadcrumbsValue + "</a> ");

    }
} 

$('.propel-module-bar li').click(function (event) {
    event.stopPropagation();
    if ($(".propel-menu-bar").css('width') == "0px") {
        $('.propel-menu-bar-text').removeClass('propel-menu-bar-icon-hover');
    }
    $('.propel-active-module-bar').removeClass('propel-active-module-bar');
    $(this).addClass('propel-active-module-bar');
    var classListMainMenu = $(this).attr('class').split(/\s+/);
    $('.propel-menu-bar-list-container').css('display', 'none');
    $('.' + classListMainMenu[1] + '-menu-bar').css('display', 'block');
    if ($('.propel-menu-bar').css('width') == '0px') {
        if (windowWidth < 700) {
            $(".propel-menu-line1").css('width', '25px');
            $(".propel-menu-line2").css('width', '25px');
            $(".propel-menu-line3").css('width', '25px');
            $(".propel-menu-bar").css('width', '180px');

        }
        else {
            $(".propel-menu-line1").css('width', '25px');
            $(".propel-menu-line2").css('width', '25px');
            $(".propel-menu-line3").css('width', '25px');
            $(".propel-menu-bar").removeAttr('style');
            count = 0;
        }
    }
});

$('.propel-menu-bar li').click(function (event) {
    event.stopPropagation();
    $('.propel-active-menu-bar').removeClass('propel-active-menu-bar');
    $(this).addClass('propel-active-menu-bar');

});


$('.propel-hamburger-menu').click(function (event) {
    event.stopPropagation();
    count++;
    propelMenubar();
});
$('.propel-left-arrow').click(function (event) {
    event.stopPropagation();
    count++;

    propelMenubar();
});
$('.propel-right-arrow').click(function (event) {
    event.stopPropagation();
    if (count == 1) {
        count = 7;
    }
    else if (count == 3) {
        count = 6;
    }
    else if (count == 4) {
        count = 5;
    }
    propelMenubar();
});
function propelMenubar() {
    if (count == 1) {
        $(".propel-menu-line1").css('width', '15px');
        $(".propel-menu-line2").css('width', '20px');
        $(".propel-menu-bar").css('width', '50px');
        $('.propel-menu-bar-text').addClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown-text').addClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown i').addClass('propel-menu-bar-icon-hover');
        // $('.propel-menu-bar-title').css('display', 'none');
        
        localStorage.setItem("count", "1");
        if (windowWidth > 700 && windowWidth < 1200) {
            count = 2;
            $(".propel-right-arrow").css('pointer-events', 'auto');
            $(".propel-right-arrow svg").css('fill', 'black');
        }

    }

    else if (count == 2) {
        $(".propel-menu-line1").css('width', '25px');
        $(".propel-menu-line2").css('width', '25px');
        $(".propel-menu-line3").css('width', '25px');
        $('.propel-menu-bar-text').removeClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown-text').removeClass('propel-menu-bar-icon-hover');
        $('.propel-dropdown i').removeClass('propel-menu-bar-icon-hover');
        $(".propel-menu-bar").removeAttr('style');
        // $('.propel-menu-bar-title').removeAttr('style');
        $(".propel-right-arrow").removeAttr('style');
        $(".propel-right-arrow svg").css('fill', 'grey');
        localStorage.setItem("count", "0");
        count = 0;
    }
    else if (count == 3) {
        $(".propel-menu-bar").css('width', '0px');
        $(".propel-menu-bar").css('margin', '0px');
        localStorage.setItem("count", "0");
    }
    else if (count == 4) {
        $(".propel-left-arrow svg").css('fill', 'grey');
        $(".propel-left-arrow").css('pointer-events', 'none');
        $(".propel-left-side").css('width', '0');
        $(".propel-left-side").css('margin-right', '0');
        $(".propel-left-side").css('padding', '0');
    }
    else if (count == 5) {
        $(".propel-left-arrow svg").removeAttr('style')
        $(".propel-left-arrow").removeAttr('style');
        $(".propel-left-side").removeAttr('style');
        count = 3;
    }
    else if (count == 6) {
        $(".propel-menu-bar").css('width', '50px');
        $(".propel-menu-bar").css('margin-right', '8px');

        count = 2;
    }
    else if (count == 7) {
        $(".propel-menu-bar").css('width', '180px');
        $('.propel-menu-bar-text').removeClass('propel-menu-bar-icon-hover');
        // $('.propel-menu-bar-title').removeAttr('style');
        $(".propel-right-arrow svg").css('fill', 'grey');
        count = 0;
    }
    else if (count == 8) {
        $(".propel-menu-line1").css('width', '25px');
        $(".propel-menu-line2").css('width', '25px');
        $(".propel-menu-line3").css('width', '25px');
        $(".propel-left-side").css('width', '60px');
        $(".propel-menu-bar").css('width', '180px');
        $('.propel-workspace-container').css('filter', 'blur(5px)');
    }

    else if (count == 9) {
        $(".propel-menu-line1").css('width', '10px');
        $(".propel-menu-line2").css('width', '15px');
        $(".propel-menu-line3").css('width', '20px');
        $(".propel-left-side").removeAttr('style');
        $(".propel-workspace-container").removeAttr('style');
        $(".propel-left-side").removeAttr('style');
        $(".propel-menu-bar").removeAttr('style');
        count = 7;
    }
}
$('.propel-menu-bar-list-container li').mouseover(function () {
    $('propel-menu-bar-icon-hover').css('display', 'block');
});
$(document).on("click", function (event) {

    if (windowWidth < 700) {
        $(".propel-left-side").removeAttr('style');
        $(".propel-menu-bar").removeAttr('style');
        $(".propel-menu-line1").css('width', '10px');
        $(".propel-menu-line2").css('width', '15px');
        $(".propel-menu-line3").css('width', '20px');
        $(".propel-workspace-container").removeAttr('style');
        count = 7;
    }
});

// propel Extra Bar Icon
var toggle = 0;
$('.propel-extra-bar-icon').click(function () {
    toggle++;
    if (toggle == 1) {
        $('.propel-extra-bar-icon').css('right', '70px');
        $('.propel-extra-bar').css('right', '0');
    }
    else {
        $('.propel-extra-bar-icon').css('right', '0');
        $('.propel-extra-bar').css('right', '-70px');
        toggle = 0;
    }
});

//if Table is present in workspace , the workspace shuldn't scrollable

if ($('.data-table').length) {
    $('.propel-workspace-container').css('overflow', 'hidden');
}
// dropdown menu in menu bar
var subMenuClass = null;
var activeSubMenuClass = sessionStorage.getItem("subMenuClass");

$('.propel-menu-bar-list-container li').click(function () {
    var subMenuClass = $(this).parent().parent().prev().attr('class').split(" ");
    subMenuClass = subMenuClass[1];
    sessionStorage.setItem("subMenuClass", subMenuClass);
});
if (activeSubMenuClass != null) {
    $('.' + activeSubMenuClass).next().css('height', '120px');
    $('.' + activeSubMenuClass).children('i').css('rotate', '90deg');
}
$('.propel-dropdown').click(function () {

    subMenuClass = $(this).attr('class').split(" ");
    subMenuClass = subMenuClass[1];
    if ($(this).next().css('height') == "0px") {
        $(this).next().css('height', '120px');
        $(this).children('i').css('rotate', '90deg');
        sessionStorage.setItem("subMenuClass", subMenuClass);

    }
    else {
        $(this).next().removeAttr('style');
        $(this).children().removeAttr('style');
        sessionStorage.setItem("subMenuClass", null);
    }
});



//to do 

$('.ToDo').click(function () {
    let todoInput = $(this).prev().children('label');

   if(todoInput.length == 0){
    let todoPackRequired=$(this).prev().children().find(".todoRequired");
       for (let y = 0; y < todoPackRequired.length; y++) {
       var todoPackRequiredValue = todoPackRequired[y].value;
    //   alert(todoPackRequiredValue);
       if (todoPackRequiredValue == "") {
         todoInputValue = 6;
        todoPackRequired[y].style.borderColor="rgb(255, 198, 198)";
        // $(this).prev().children().find(".todoRequired").css('border-color','red');
    } 
    else{
        todoPackRequired[y].removeAttribute("style");
    }
       }
    // alert(todoPackInput)
        // // let todoPackInputLabel = $(""+todoPackInput+" input")
        // console.log(todoPackSelect);
       
        
 
   }

    for (let i = 0; i < todoInput.length; i++) {
        var todoInputValue = $(todoInput[i]).children('input').val();
        var todoInputAttr = $(todoInput[i]).children('input').attr("validateAttr");
        var todoInputType = $(todoInput[i]).children('input').attr('type');
        var todoSelectValue = $(todoInput[i]).children('select').val();
   
        // alert(todoSelectValue);
        if (todoInputValue == "") {
            todoInputValue = 0;
            break;
        }
        else {

            if (todoInputType == "email") {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(todoInputValue)) {
                    todoInputValue = 1;
                }
                else {
                    todoInputValue = 2;
                    break;
                }
            }
            else if (todoInputType == "url") {
                if (/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/.test(todoInputValue)) {
                    todoInputValue = 1;

                }
                else {
                    todoInputValue = 3;
                    break;
                }
            }
           else if (todoInputAttr == "mobile-num") {
                var validateMobNum = /^\d*(?:\.\d{1,2})?$/;
               
                if (validateMobNum.test(todoInputValue) && todoInputValue.length == 10) {
                    todoInputValue = 1;
                }
                else {
                    todoInputValue = 4;
                    break;
                }
            }
            else if (todoSelectValue == null) {
                todoInputValue = 5;
                    break;
            }
            else {
                todoInputValue = 1;
            }
            
        
    }
}
    if (todoInputValue == 0) {
        DefaultPropelAlert('input is Empty');
    }
    else if (todoInputValue == 2) {
        DefaultPropelAlert('Invalid Email Id');
    }
    else if (todoInputValue == 3) {
        DefaultPropelAlert('Invalid Web Link');
    }
    else if (todoInputValue == 4) {
        DefaultPropelAlert('Invalid Mobile Number');
    }
    else if (todoInputValue == 5) {
        DefaultPropelAlert('Choose Previous Option');
    }
    else if (todoInputValue == 6) {
        DefaultPropelAlert('You fill out the required field first.');
    }
    else {
        $(this).prev().find("select.search-need").select2('destroy');
        let todoValue = $(this).prev().html();
        let todoParentClass = $(this).prev().attr('class');
        todoParentClass = todoParentClass.toLowerCase();
        $(this).before("<div class='" + todoParentClass + "'>" + todoValue + "</div>");
        let todoInputs=$(this).prev().find("input , select");
         $(todoInputs).val("");
         $("select.search-need").select2({
  
            templateSelection: function (data) {
              return data.text;
            }
          });
        
       
    }
});
//Default Popup
$('.default-alert-container').hide();
function DefaultPropelAlert(info, form) {
    
    audio.play();
    if (form == undefined) {
        $('.propel-alert-info').html("" + info + "");
        $('.default-alert-container').show();
    }

    else {
        $('.propel-alert-info').html("" + info + "");
        $('.default-alert-btns').html("<button class='propelbtn propelsubmit propel-hover hoverable-btn  w-30 ' id='" + form + "-submit' onclick='submitform(this)'>Yes</button> <button  class=' propelbtn propelsubmit propel-hover hoverable-btn   w-30' onclick='closeSuperGrandpa(this)'>Cancel</button>");
        $('.default-alert-container').show();
    }
}
function submitform(event) {
    let submitNameCommon = $(event).attr('id');
    let submitName = submitNameCommon.split("-");
    $("#" + submitName[0]).submit();
}

function closeSuperGrandpa(event) {
    $(event).parent().parent().parent().hide('slow');
}
$(document).on('click', '.close-parent', function(){
    $(this).parent().fadeOut(300);
});


 $("select.AlterInput").next('.AlterInputLabel').css("visibility","hidden");

$("select").change(function(){
    $(this).next('.AlterInputLabel').css("visibility","visible");
 
});
$('select.search-need').select2({
  
    templateSelection: function (data) {
    
      return data.text;
    }
  });

//vh function
$("[vh]").each(function() {
    var vhValue = parseInt($(this).attr("vh"));
    if (!isNaN(vhValue)) {
      var height = "calc(100vh - " + vhValue + "px)";
      $(this).css("height", height).css("overflow","auto");
    }
  });
  


  function propelStatus(type, message) {
 
    var containerClass = '';
    
    switch(type) {
      case 'success':
        containerClass = 'success-message';
        break;
      case 'warning':
        containerClass = 'warning-message';
        break;
      case 'danger':
        containerClass = 'danger-message';
        break;
      case 'info':
        containerClass = 'info-message';
        break;
      default:
        return;
    }
  
    var html = '<div class="message-container-alert ' + containerClass + '">';
    html += '<span class="message">' + message + '</span>';
    html += '<span class="close-parent message-close"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect> <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect> </svg></span>';
    html += '</div>';
  
    $('body').append(html);
  $("button").blur();
    setTimeout(function() {
      $('.message-container-alert').remove();
    }, 3000);
}


$(document).ready(function() {
 
    $(".spinner-container").fadeOut();
  });
  