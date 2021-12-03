// !Importaciones
import { getOptions, REGLAS, TABS} from "./functions/functions";

// !Carga del DOM
$(document).ready(function () {
  //Predeterminados en Form_Persona
  // !Fecha predeterminada
  // ?source: https://jsfiddle.net/7LXPq/93/
  var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear() + "-" + month + "-" + day;
  $("#form_Persona_Fecha").val(today);
});


// !Tab changer
function nextTab(id) {
  $(`#nav_${id.toLowerCase()}_tab`).addClass("valid");
  let tab = TABS.find((tab) => tab.form === id);
  tab.next();
}
function previousTab(id) {
  let tab = TABS.find((tab) => tab.form === id);
  tab.before();
}

// !Validación de todos los campos al submit
function postRevision(form) {
  let valid = true;
  form.querySelectorAll("input").forEach((input) => {
    if (
      !input.className.includes("is-valid") &&
      !input.className.includes("is-invalid")
    ) {
      valid = false;
      $(`#${input.id}`).addClass("is-invalid");
    }
  });
  return valid;
}

// !Validación del form_persona
document.querySelectorAll('form[class = "form"]').forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (postRevision(form)) {
      nextTab(form.id);
    }
  });
  form.querySelectorAll("input").forEach((input) => {
    input.addEventListener("focus", function () {
      this.addEventListener("input", function (e) {
        const type = REGLAS.find((regla) => regla.id === `${this.type}`);
        type[`${this.type}`](this, e)
          ? $(this).removeClass("is-invalid").addClass("is-valid")
          : $(this).removeClass("is-valid").addClass("is-invalid");
      });
    });
  });
});

// Ajax query
$("#formulario_persona").submit(function (event) {
  event.preventDefault();
  enviarApersona();
});

$("#formulario_empresa").submit(function (event) {
  event.preventDefault();
  enviarAempresa();
});

$("#formulario_archivos").submit(function (event) {
  event.preventDefault();
  var f = $(this);
  var formData = new FormData(document.getElementById("formulario_archivos"));
  console.log(formData);
  enviarAarchivos(formData);
});

$("#formulario_modalidad").submit(function (event) {
  event.preventDefault();
  enviarAmodalidad();
});

function enviarApersona() {
  console.log("ejecutado");
  let datos = $("#formulario_persona").serialize(); // almacena los datos name y los lleva a un arreglo
  // console.log(datos);
  $.ajax({
    type: "post",
    url: "formulario_persona.php",
    data: datos,
    success: function (texto) {
      if (texto.trim() === "exito") {
        correctoPersona();
      } else {
        phperror(texto);
      }
    },
  });
}

function enviarAempresa() {
  console.log("Empresa");
  let datos = $("#formulario_empresa").serialize();
  $.ajax({
    type: "post",
    url: "formulario_empresa.php",
    data: datos,
    success: function (texto) {
      if (texto.trim() === "exito") {
        correctoEmpresa();
      } else {
        phperrorEmpresa(texto);
      }
    },
  });
}

function enviarAarchivos(formData) {
  console.log("Arcivos");
  $.ajax({
    type: "post",
    url: "formulario_archivos.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (texto) {
      if (texto.trim() === "exito") {
        correctoArchivos();
      } else {
        phperrorArchivos(texto);
      }
    },
  });
}

function enviarAmodalidad() {
  console.log("Modalidad");
  let datos = $("#formulario_modalidad").serialize();
  $.ajax({
    type: "post",
    url: "formulario_modalidad.php",
    data: datos,
    success: function (texto) {
      if (texto.trim() === "exito") {
        correctoModalidad();
      } else {
        phperrorModalidad(texto);
      }
    },
  });
}

//TODO: mensaje de envio correcto

//TODO: mensajes de errores
