"use strict";$(document).ready(function(){var a=$("div.hidden").data("catid"),t=$("div.hidden").data("id");$("#alert_ok").hide(),$("#alert_warning").hide(),$("#btn_send").on("click",function(){var e={id:t,catId:a,amount:$("#amount").val(),length:$("#length").val(),width:$("#width").val(),height:$("#height").val()};$.ajax({url:"/cat/ajax_sheet",type:"POST",cache:!1,data:e,success:function(e){if(console.log(e),1==e)$("#alert_warning").hide(),$("#alert_ok").show(500),setTimeout(function(){$("#alert_ok").hide(1500)},2e3),$("#specification").load("/ #specification"),$("#specification").show(1e3);else{setTimeout(function(){$("#btn_send").addClass("shake")},100),setTimeout(function(){$("#btn_send").removeClass("shake")},1e3);var a=JSON.parse(e),t="";a.forEach(function(e){t+='<div class = " pl-2 alert-danger">'+e+"</div><hr>"}),$("#alert_warning").html(t),$("#alert_warning").hide(),$("#alert_ok").hide(),$("#alert_warning").show(700)}}})})});