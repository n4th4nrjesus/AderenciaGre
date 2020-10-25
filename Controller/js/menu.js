$("#btnExit").click(() => {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "../../Controller/php/login_exit.php",
    success: (response) => {
      if (response.status == 1) window.location.href = "../../index.php";
      else alert(response.msg);
    },
  });
});
