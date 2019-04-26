document.addEventListener("DOMContentLoaded", function() {
  //initialize sidenavbar
  let sidenavElement = document.querySelectorAll(".sidenav");
  M.Sidenav.init(sidenavElement, {});

  // Initialize select
  let elems = document.querySelectorAll("select");
  M.FormSelect.init(elems, {});

  // initialize datepicker
  let dateElems = document.querySelectorAll(".datepicker");
  M.Datepicker.init(dateElems, {
    format: "yyyy-mm-dd",
    autoClose: true
  });
});
