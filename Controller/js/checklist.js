const userId = $("#user-id").val();
const tabName = $("#tab-name").val();

getQuestions(userId, tabName);

Date.prototype.addDays = (days) => {
  var date = new Date(this.valueOf());
  date.setDate(date.getDate() + days);
  return date;
};

$("#btnSave").click(() => {
  saveChanges(userId);
});

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
      $("#first-time-alert").alert("close");
    },
  });
}

function generateQuestionListHtml(response) {
  if (!Array.isArray(response))
    return (
      `
      <tr>
        <td colspan="9">
          <div class="alert alert-danger alert-dismissible fade show" id="first-time-alert" role="alert">
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
    var deadline = null;

    if (td.deadline) {
      deadline = td.deadline.split(" ")[0];
      deadline = deadline.split("-");
      deadline = deadline[2] + "/" + deadline[1] + "/" + deadline[0];
    }

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
          <option value="" selected disabled hidden>-</option>
          <option class="urgency-1" value="3">Baixa</option>
          <option class="urgency-2" value="2">Média</option>
          <option class="urgency-3" value="1">Alta</option>
          <option class="urgency-4" value="0">Urgente</option>
        </select>
      </td>
      <td>
        <select class="custom-select complexity">
          <option value="" selected disabled hidden>-</option>
          <option class="complexity-1" value="1">Baixa</option>
          <option class="complexity-2" value="2">Média</option>
          <option class="complexity-3" value="3">Alta</option>
        </select>
      </td>
      <td class="deadline">` +
      (deadline ?? "N/A") +
      `</td>
      <td class="w-25">
        <textarea placeholder="` +
      (td.actionPlan ?? "Insira seu plano de ação para esse item  ") +
      `" class="form-control action-plan" pattern=".{0,500}">` +
      (td.actionPlan ?? "") +
      `</textarea>
      </td>
      <td>
        <select class="custom-select responsible">
          <option value="" selected disabled hidden>-</option>
        </select>
      </td>
      <td>
        <select class="custom-select echeloned">
          <option value="" selected disabled hidden>-</option>
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
    $("#old-urgency").val(urgencyValue);

    const complexityValue = $(row)
      .find("select.complexity")
      .find(".complexity-" + response[i].complexity)
      .val();

    $(row).find("select.complexity").val(complexityValue);
    $("#old-complexity").val(complexityValue);

    $(row).find("select.responsible").val(response[i].responsiblePost);
    $(row).find("select.echeloned").val(response[i].echeloned);
  }
}

function saveChanges(userId) {
  const checklistData = getChecklistData();

  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/checklist/save_checklist.php",
    data: {
      userId: userId,
      checklistData: checklistData,
    },
    success: (response) => {
      alert(response);
      window.location.reload();
    },
  });
}

function getChecklistData() {
  const questionRows = $(".question-row");
  const dataArray = [];

  for (let i = 0; i < questionRows.length; i++) {
    const row = questionRows[i];

    const urgencyValue = parseInt($(row).find(".urgency").val());
    const complexity = parseInt($(row).find(".complexity").val());

    var urgencyId = "NaN";

    if (urgencyValue) {
      urgencyId = parseInt(
        $(row)
          .find(".urgency")
          .find("[value='" + urgencyValue + "']")
          .attr("class")
          .split("-")[1]
      );
    }

    var deadline = new Date();
    deadline.addDays(urgencyValue + complexity);
    deadline =
      deadline.getFullYear() +
      "-" +
      (deadline.getMonth() + 1) +
      "-" +
      deadline.getDate() +
      " 00:00:00";

    if (!($(row).find(".deadline").html() == "N/A")) {
      var dateField = $(row).find(".deadline").html();
      dateField = dateField.split("/");

      deadline =
        dateField[2] + "-" + dateField[1] + "-" + dateField[0] + " 00:00:00";
    }

    dataArray[i] = {
      id: $(row).attr("id"),
      accord: $(row).find(".accord").val(),
      urgency: urgencyId,
      complexity: complexity,
      deadline: deadline,
      actionPlan: $(row).find(".action-plan").val(),
      responsible: $(row).find("select.responsible").val(),
      echenoled: $(row).find("select.echeloned").val(),
    };
  }

  return dataArray;
}
