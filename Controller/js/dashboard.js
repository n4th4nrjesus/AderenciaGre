const userId = $("#user-id").val();

$(document).ready(() => {
  getTotalAdherence(userId);
  getUseCasesAdherence(userId);
  getRequirementsAdherence(userId);
});

function getTotalAdherence(userId) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/dashboard/get_total_adherence.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $("#total-adherence").html("Aderência total - " + response);
    },
  });
}

function getUseCasesAdherence(userId) {}

function getRequirementsAdherence(userId) {}
