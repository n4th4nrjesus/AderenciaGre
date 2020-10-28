currentMenu($(location).attr("pathname"));

$("#nav-brand").click(() => {
  $("#nav-dashboard").click();
});

$("#nav-dashboard").click(() => {
  setLocation("src/dashboard.php");
});

$("#nav-use-cases, #alert-use-cases").click(() => {
  setLocation("src/checklist/casos_de_uso.php");
});

$("#nav-requirements, #alert-requirements").click(() => {
  setLocation("src/checklist/especificacoes_requisitos.php");
});

$("#btnExit").click(() => {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: window.location.origin + "/AderenciaGre/Controller/php/login_exit.php",
    success: (response) => {
      if (response.status == 1)
        window.location.href = window.location.origin + "/AderenciaGre";
      else alert(response.msg);
    },
  });
});

function currentMenu(href) {
  if (href.includes("dashboard")) {
    $("#nav-dashboard").css("color", "#6f9bed");
    return;
  }
  if (href.includes("casos_de_uso")) {
    $("#nav-use-cases").css("color", "#6f9bed");
    return;
  }
  $("#nav-requirements").css("color", "#6f9bed");
}

function setLocation(path) {
  window.location.href = window.location.origin + "/AderenciaGre/View/" + path;
}
