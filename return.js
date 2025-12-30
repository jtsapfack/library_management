window.onload = function () {
  const returnDateInput = document.getElementById("returnDate");

  if (returnDateInput) {
    const today = new Date();
    returnDateInput.valueAsDate = today;
  }
};
