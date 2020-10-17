$(document).ready(function(){
    'use strict';
    var fade_hide = $(".fade_hide");
    fade_hide.animate({right: '100px'}, "slow");
    fade_hide.animate({right: '0'}, "slow");
    fade_hide.animate({right: '100px'}, "slow");
    fade_hide.animate({right: '0'}, "slow");
    fade_hide.slideUp(2000);
});
