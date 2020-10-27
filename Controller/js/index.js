$("#frmLogin").submit((e) => {
  e.preventDefault();

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "./Controller/php/index/login.php",
    data: {
      email: $("#txtEmail").val(),
      senha: $("#txtSenha").val(),
    },
    success: (response) => {
      if (response.status == 1)
        window.location.pathname = "AderenciaGre/View/src/dashboard.php";
      else alert(response.msg);
    },
  });
});
