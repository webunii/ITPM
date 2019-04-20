function validate(){
  var valid = checkEmpty($("#c_credits"));
  valid = valid && checkEmpty($("#c_name"));
  valid = valid && checkEmpty($("#c_lec"));
  valid = valid && code($("#c_code"));

  $("#add_course").attr("disabled",true);
  if(valid) {
    $("#add_course").attr("disabled",false);
  }
}

function checkEmpty(obj) {
  var c_credits = $(obj).attr("c_credits");
  $("."+c_credits+"-validation").html("");
  $(obj).css("border","");
  if($(obj).val() == "") {
    $(obj).css("border","#FF0000 1px solid");
    $("."+c_credits+"-validation").html("Required");
    return false;
  }

  return true;
}

function code(obj) {
  var result = true;

  var c_credits = $(obj).attr("c_credits");
  $("."+c_credits+"-validation").html("");
  $(obj).css("border","");

  result = checkEmpty(obj);

  if(!result) {
    $(obj).css("border","#FF0000 1px solid");
    $("."+c_credits+"-validation").html("Required");
    return false;
  }

  var codex = /^[IiTt]{2}[0-9]{4}$/;
  result = codex.test($(obj).val());

  if(!result) {
    $(obj).css("border","#FF0000 1px solid");
    $("."+c_credits+"-validation").html("Invalid");
    return false;
  }

  return result;
}
