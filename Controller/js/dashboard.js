const userId = $("#user-id").val();

getTotalAdherence(userId);
getArtifactsAdherence(userId, 1);
getArtifactsAdherence(userId, 2);

function getTotalAdherence(userId) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/adherence/get_total_adherence.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $("#total-adherence").html("Aderência total - " + response + " %");
      setHundredAlert(response);
    },
  });
}

function getArtifactsAdherence(userId, artifactId) {
  var artifact = $("#use-cases-adherence");
  if (artifactId == 2) var artifact = $("#requirements-adherence");

  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/adherence/get_artifacts_adherence.php",
    data: {
      userId: userId,
      artifactId: artifactId,
    },
    success: (response) => {
      artifact.html(response + " %");
      setHundredAlert(response);
    },
  });
}

function setHundredAlert(response) {
  alert = $("#hundred-alert");

  if (response == 100 && !alert.hasClass("show")) {
    alert.removeClass("d-none");
    alert.addClass("fade show");
  }
}
