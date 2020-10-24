function login() {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "./Controller/php/index/login.php",
    async: false,
    data: {
      email: $("#txtEmail").val(),
      senha: $("#txtSenha").val(),
    },
    success: (response) => {
      alert(response.msg);
    },
  });
}
