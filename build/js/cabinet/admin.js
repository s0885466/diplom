"use strict";$(document).ready(function(){$("#alert_ok").hide(),$("#alert_warning").hide(),$(document).on("click","#add_btn",function(){var e={name:$("#add_name").val(),title:$("#add_title").val(),mass:$("#add_mass").val(),note:$("#add_note").val()};$.ajax({url:"/private/add_one",type:"POST",cache:!1,data:e,success:function(e){if(console.log(e),1==e)$("#alert_warning").hide(),$("#alert_ok").show(500),setTimeout(function(){$("#alert_ok").hide(1500)},2e3),$("#table-bd").load(" #table-bd");else{var a=JSON.parse(e),t="";for(var n in a)t+='<div class = " p-2 alert-danger">'+a[n]+"</div>";$("#alert_warning").html(t),$("#alert_warning").hide(),$("#alert_ok").hide(),$("#alert_warning").show(700),a.add_name&&(setTimeout(function(){$("#add_name").addClass("shake")},100),setTimeout(function(){$("#add_name").removeClass("shake")},1e3)),a.add_title&&(setTimeout(function(){$("#add_title").addClass("shake")},100),setTimeout(function(){$("#add_title").removeClass("shake")},1e3)),a.add_mass&&(setTimeout(function(){$("#add_mass").addClass("shake")},100),setTimeout(function(){$("#add_mass").removeClass("shake")},1e3)),setTimeout(function(){$("#add_btn").addClass("shake")},100),setTimeout(function(){$("#add_btn").removeClass("shake")},1e3)}}})}),$(document).on("click",".remove_btn",function(){var e={id:$(this).attr("data-remove")};console.log(e),$.ajax({url:"/private/remove_one",type:"POST",cache:!1,data:e,success:function(e){if(console.log(e),1==e)$("#table-bd").load(" #table-bd");else{JSON.parse(e);console.log("Вообще то нехрен ломать мой сайт "+str)}}})}),$(document).on("click",".change_btn",function(e){var t=$(this).attr("data-change"),a={id:t,name:$(".change_name[data-change ="+t+"]").val(),weight:$(".change_weight[data-change ="+t+"]").val()};console.log(a),$.ajax({url:"/private/change_one",type:"POST",cache:!1,data:a,success:function(e){if(1==e)console.log("изменения прошли успешно"),setTimeout(function(){$(".change_btn[data-change ="+t+"]").val("✓готово")},100),setTimeout(function(){$(".change_btn[data-change ="+t+"]").val("изменить")},1e3);else{var a=JSON.parse(e);a.name&&(setTimeout(function(){$(".change_name[data-change ="+t+"]").addClass("shake")},100),setTimeout(function(){$(".change_name[data-change ="+t+"]").removeClass("shake")},1e3)),a.weight&&(setTimeout(function(){$(".change_weight[data-change ="+t+"]").addClass("shake")},100),setTimeout(function(){$(".change_weight[data-change ="+t+"]").removeClass("shake")},1e3)),console.log(t)}}})})});