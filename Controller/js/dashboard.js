const userId = $("#user-id").val();

getTotalAdherence(userId);
getNonComplianceNumber(userId);

getArtifactsAdherence(userId, 1);
getArtifactsAdherence(userId, 2);

getNonComplianceNumberByArtifact(userId, 1);
getNonComplianceNumberByArtifact(userId, 2);

getUrgencyOrComplexityMedium(userId, "U");
getUrgencyOrComplexityMedium(userId, "C");

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
      setFirstTimeAlert(response);
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
      setFirstTimeAlert(response);
    },
  });
}

function getNonComplianceNumber(userId) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/non_compliance/get_non_compliance_number.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $("#non-compliance-number").html(
        "Total de não conformidades - " + response
      );
      setFirstTimeAlert(response);
    },
  });
}

function getNonComplianceNumberByArtifact(userId, artifactId) {
  var artifact = $("#use-cases-non-compliance");
  if (artifactId == 2) var artifact = $("#requirements-non-compliance");

  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/non_compliance/get_non_compliance_number_by_artifact.php",
    data: {
      userId: userId,
      artifactId: artifactId,
    },
    success: (response) => {
      artifact.html(response);
      setFirstTimeAlert(response);
    },
  });
}

function getUrgencyOrComplexityMedium(userId, option) {
  var infoBox = $("#medium-urgency");
  var controller = "get_urgency_medium";

  if (option == "C") {
    var infoBox = $("#medium-complexity");
    controller = "get_complexity_medium";
  }

  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/urgency_and_complexity/" +
      controller +
      ".php",
    data: {
      userId: userId,
    },
    success: (response) => {
      infoBox.html(response);
      setFirstTimeAlert(response);
    },
  });
}

function setFirstTimeAlert(response) {
  const alert = $("#first-time-alert");

  if (response == "N/A" && !alert.hasClass("show")) {
    alert.removeClass("d-none");
    alert.addClass("fade show");
  }
}
