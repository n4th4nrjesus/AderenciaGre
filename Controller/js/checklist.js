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
      adjustSelects(response);
    },
  });
}

function generateQuestionListHtml(response) {
  if (!Array.isArray(response))
    return (
      `
      <tr>
        <td colspan="9">
          <div class="alert alert-danger alert-dismissible fade show" id="hundred-alert" role="alert">
            ` +
      response +
      `
          </div>
        </td>
      </tr>
    `
    );

  var buildedHtml = "";
  var ref = 1;

  response.forEach((td) => {
    buildedHtml += "<tr class='question-row' id='" + td.questionId + "'>";

    buildedHtml +=
      `
      <td><b>` +
      ref +
      `</b></td>
      <td>
        ` +
      td.questionDescription +
      `
      </td>
      <td>
        <select class="custom-select accord">
          <option value="0">Não</option>
          <option value="1" selected>Sim</option>
          <option value="2">N/A</option>
        </select>
      </td>
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
      (td.deadline ?? "N/A") +
      `</td>
      <td class="w-25">
        <textarea class="form-control action-plan" pattern=".{0,500}">` +
      (td.actionPlan ?? "") +
      `</textarea>
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
    ref++;
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
  if (!Array.isArray(response)) return;

  var buildedHtml = "";

  response.forEach((option) => {
    buildedHtml +=
      "<option value='" + option.postId + "'>" + option.postName + "</option>";
  });

  $(".responsible").each(() => {
    $(this).append(buildedHtml);
  });

  return buildedHtml;
}

function adjustSelects(response) {
  if (!Array.isArray(response)) return;

  const questionRows = $(".question-row");

  for (let i = 0; i < questionRows.length; i++) {
    const row = questionRows[i];

    $(row).find("select.accord").val(response[i].accord);

    const urgencyValue = $(row)
      .find("select.urgency")
      .find(".urgency-" + response[i].urgency)
      .val();

    $(row).find("select.urgency").val(urgencyValue);

    const complexityValue = $(row)
      .find("select.complexity")
      .find(".complexity-" + response[i].complexity)
      .val();

    $(row).find("select.complexity").val(complexityValue);

    $(row).find("select.responsible").val(response[i].responsiblePost);
    $(row).find("select.echeloned").val(response[i].echeloned);
  }
}
