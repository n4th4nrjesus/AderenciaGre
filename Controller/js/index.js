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
      if (response.status == 1) window.location.href = "./View/src/test.php";
      else alert(response.msg);
    },
  });
});
