const userId = $("#user-id").val();
const tabName = $("#tab-name").val();

getQuestions(userId, tabName);

function getQuestions(userId, tabName) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/checklist/get_questions.php",
    data: {
      userId: userId,
      tabName: tabName,
    },
    success: (response) => {
      $("#question-list").html(generateQuestionListHtml(response));
      setFirstTimeAlert(response);
    },
  });
}

function generateQuestionListHtml(response) {
  var buildedHtml = "";

  response.forEach((td) => {
    buildedHtml += "<tr class='question-row' id='" + td.questionId + "'>";

    buildedHtml +=
      `
      <td>
        ` +
      td.questionDescription +
      `
      </td>
        <select class="custom-select" id="">
          <option value="0">Não</option>
          <option value="1" selected>Sim</option>
          <option value="2">N/A</option>
        </select>
      <td>
    `;

    buildedHtml += "</tr>";
  });
}
