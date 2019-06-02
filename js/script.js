$(document).ready(() => {
  // Enable Button
  $("#amount").keyup(() => {
    $("#result").val("");
    $("#percentage").val("0");
    $("#calculate-button").prop("disabled", false);
  });

  $("#calculate-button").on("click", () => {
    let data = {
      date: $("#date").val(),
      amount: $("#amount").val(),
      percentage: $("#percentage").val()
    };

    $.post("calculation.php", data).done(data => {
      let result = JSON.parse(data);
      console.log(result);
      let last_item = result.history.length;
      let history = result.history[last_item - 1];
      $("#result-label").show();
      $("#result")
        .val(result.totalAmount.toLocaleString())
        .show();

      $("#history-table tbody").append(
        "<tr>" +
          "<td>" +
          last_item +
          "</td>" +
          "<td>" +
          history.date.toLocaleString() +
          "</td>" +
          "<td>" +
          history.ArbitraryAmount.toLocaleString() +
          "</td>" +
          "<td>" +
          history.Percentage.toLocaleString() +
          " %" +
          "</td>" +
          "<td>" +
          history.Fee.toLocaleString() +
          "</td>" +
          "<td>" +
          history.TotalAmount.toLocaleString() +
          "</td>" +
          "</tr>"
      );

      // Clear form
      $("#date").val("");
      $("#amount").val("");
      $("#percentage").val("");
    });
  });

  $("#clear-button").on("click", () => {
    let data = { clear_history: true };

    $.post("calculation.php", data).done(result => {
      console.log(result);
      $("#result").val("");
      $("#calculate-button").prop("disabled", true);
      $("#history-table tbody").empty();
    });
  });
});
