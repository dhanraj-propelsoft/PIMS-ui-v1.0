$(document).ready(function () {
if (!sessionStorage.getItem('splash')) {
    sessionStorage.setItem('splash','yes');

    var splashContainer = '<section class="propel-splash-container ">' +
                        '<div class="propel-splash">' +
                        '<img src="assets/images/logo.svg" alt="propel soft" class="propel-logo">' +
                        '<div class="propel-splash-content">' +
                        '</div>' +
                        '</div>' +
                        '</section>';
  $('body').append(splashContainer);

    $(".propel-logo").on("animationend", function(event) {


        if (event.originalEvent.animationName === "scale-in-center") {
     
           
       
            $(this).next().append("<span class='propel-logo-head'> Propel Soft </span>");
            let propelHeadWidth=$(".propel-logo-head").width();
            $(this).next().find(".propel-logo-head").remove();
            $(this).next().append("<span class='propel-logo-head propel-typing' style='width:"+propelHeadWidth+"px'> Propel Soft </span>");
            $(".propel-typing").on("animationend", function(event) {
 
              if (event.originalEvent.animationName === "typing") {
                  $(this).after(" <span class='propel-logo-text'> Accelerating Business Ahead </span>");
                  let propelTextWidth=$(".propel-logo-text").width();
                  $(this).next().remove();
                  $(this).after(" <span class='propel-logo-text propel-text-typing' style='width:calc( "+propelTextWidth+"px + 5px )'>Accelerating Business Ahead</span>");
                 
              }
          });

        }
    });
    

    setTimeout(function(){
      $(".propel-splash-container").addClass("puff-out-center");
     }, 8000);
     setTimeout(function(){
       $(".propel-splash-container").remove();
      }, 8800);
     }
});
