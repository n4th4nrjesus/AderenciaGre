const userId = $("#user-id").val();

getTotalAdherence(userId);
getNonComplianceNumber(userId);

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

function getNonComplianceNumber(userId) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/get_non_compliance_number.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $("#non_compliance_number").html(response);
      setHundredAlert(response);
    },
  });
}

function setHundredAlert(response) {
  const alert = $("#hundred-alert");

  if ([100, "N/A"].includes(response) && !alert.hasClass("show")) {
    alert.removeClass("d-none");
    alert.addClass("fade show");
  }
}
