const userId = $("#user-id").val();

loadPostList(userId);

$("#frmCadastro").submit((e) => {
  e.preventDefault();

  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/cargos/create_post.php",
    data: {
      userId: userId,
      nomeCargo: $("#txtNome").val(),
    },
    success: (response) => {
      alert(response);
      loadPostList(userId);
    },
  });
});

function loadPostList(userId) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url:
      window.location.origin +
      "/AderenciaGre/Controller/php/cargos/get_posts.php",
    data: {
      userId: userId,
    },
    success: (response) => {
      $("#post-list").html(buildPostsHtml(response));
    },
  });
}

function buildPostsHtml(response) {
  if (!Array.isArray(response))
    return (
      `
      <tr>
        <td colspan="3">
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
    buildedHtml += "<tr>";

    buildedHtml +=
      `
        <td><b>` +
      ref +
      `</b></td>
        <td class="w-50">` +
      td.postName +
      `</td>
        <td>` +
      td.totalResponsabilities +
      `</td>
    `;

    buildedHtml += "</tr>";
    ref++;
  });

  return buildedHtml;
}
