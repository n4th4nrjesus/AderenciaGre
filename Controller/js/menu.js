$("#btnExit").click(() => {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "../../Controller/php/login_exit.php",
    success: (response) => {
      if (response.status == 1) window.location.href = "../../";
      else alert(response.msg);
    },
  });
});
