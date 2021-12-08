// !Imports
import {
  inputQualifier,
  navigationTab,
  presetDay,
} from "./functions/functions";

// !Post loading of the DOM
$(document).ready(function () {
  presetDay();
});

// !creating event listeners for each form
document.querySelectorAll('form[class = "form"]').forEach((form) => {
  navigationTab(form);
  inputQualifier(form);
});