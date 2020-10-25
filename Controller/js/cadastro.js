$("#frmCadastro").submit((e) => {
  e.preventDefault();

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "./Controller/php/cadastro/cadastrar.php",
    data: {
      nome: $("#txtNome").val(),
      email: $("#txtEmail").val(),
      senha: $("#txtSenha").val(),
    },
    success: (response) => {
      if (response.status == 1) window.location.href = "./index.php";
      else alert(response.msg);
    },
  });
});
