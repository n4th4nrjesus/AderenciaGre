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
      loadResponsibles();
    },
  });
}

function generateQuestionListHtml(response) {
  var buildedHtml = "";

  if (!Array.isArray(response))
    return (
      `
    <tr>
        <td colspan="8">
          <div class="alert alert-danger alert-dismissible fade show" id="hundred-alert" role="alert">
            ` +
      response +
      `
          </div>
        </td>
      </tr>
    `
    );

  response.forEach((td) => {
    buildedHtml += "<tr class='question-row' id='" + td.questionId + "'>";

    buildedHtml +=
      `
      <td>
        ` +
      td.questionDescription +
      `
      </td>
        <select class="custom-select accord">
          <option value="0">Não</option>
          <option value="1" selected>Sim</option>
          <option value="2">N/A</option>
        </select>
      <td>
      <td>
        <select class="custom-select urgency">
          <option selected disabled hidden>-</option>
          <option class="urgency-1" value="3">Baixa</option>
          <option class="urgency-2" value="2">Média</option>
          <option class="urgency-3" value="1">Alta</option>
          <option class="urgency-4" value="0">Urgente</option>
        </select>
      </td>
      <td>
        <select class="custom-select complexity">
          <option selected disabled hidden>-</option>
          <option class="complexity-1" value="1">Baixa</option>
          <option class="complexity-2" value="2">Média</option>
          <option class="complexity-3" value="3">Alta</option>
        </select>
      </td>
      <td class="deadline">` +
      td.deadline +
      `</td>
      <td class="w-25">
        <textarea class="form-control action-plan" pattern=".{0,500}"></textarea>
      </td>
      <td>
        <select class="custom-select responsible">
          <option selected disabled hidden>-</option>
        </select>
      </td>
      <td>
        <select class="custom-select echeloned">
          <option selected disabled hidden>-</option>
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
      </td>
    `;

    buildedHtml += "</tr>";
  });

  return buildedHtml;
}

function loadResponsibles() {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/checklist/get_responsibles.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $(".responsible").append(generateSelectOptionsForResponsible(response));
    },
  });
}

function generateSelectOptionsForResponsible(response) {
  var buildedHtml = "";

  response.forEach((option) => {
    buildedHtml +=
      "<option value='" + option.postId + "'>" + option.postName + "</option>";
  });

  return buildedHtml;
}
