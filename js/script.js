let calculateButton = document.getElementById("calculate-button");
let resultInput = document.getElementById("result");
let resultLabel = document.getElementById("result-label");

let date = document.getElementById("date");
let amount = document.getElementById("amount");
let percentage = document.getElementById("percentage");

document.addEventListener("DOMContentLoaded", function() {
  calculateButton.addEventListener("click", () => {
    resultInput.style.display = "block";
    resultLabel.style.display = "block";

    let request = new XMLHttpRequest();

    let requestParams =
      "amount=" +
      amount.value +
      "&percentage=" +
      percentage.value +
      "&date=" +
      date.value;

    request.open("POST", "calculation.php", true);

    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );

    request.send(requestParams);

    request.onreadystatechange = () => {
      if (request.status === 200) {
        let response = JSON.parse(request.responseText);
        resultInput.value = response.totalAmount.toLocaleString();
        clearForm();
      }
    };
  });
});

// This function is called onkeyup used in amount field
function displayButton() {
  calculateButton.disabled = false;
}

function clearForm() {
  date.value = "";
  amount.value = "";
  percentage.selectedIndex = null; // to reset select
}
