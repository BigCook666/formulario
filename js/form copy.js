$(document).ready(function () {
  //Predeterminados en Form_Persona
  // !Fecha predeterminada
  // ?source: https://jsfiddle.net/7LXPq/93/
  var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear() + "-" + month + "-" + day;
  $("#form_Persona_Fecha").val(today);
  // !Fecha predeterminada
});

// !Tabs instances
var tabFormPersona = document.querySelector("#nav_form_persona_tab");
var showTabPersona = new bootstrap.Tab(tabFormPersona);

var tabFormEmpresa = document.querySelector("#nav_form_empresa_tab");
var showTabEmpresa = new bootstrap.Tab(tabFormEmpresa);

var tabFormDocumentos = document.querySelector("#nav_form_documentos_tab");
var showTabDocumentos = new bootstrap.Tab(tabFormDocumentos);

var tabFormModalidad = document.querySelector("#nav_form_modalidad_tab");
var showTabModalidad = new bootstrap.Tab(tabFormModalidad);

// !Tab handler
const TABS = [
  {
    form: "form_Persona",
    next() {
      $("#nav_form_empresa_tab").removeClass("disabled");
      showTabEmpresa.show();
    },
  },
  {
    form: "form_Empresa",
    next() {
      showTabDocumentos.show();
    },
  },
  {
    form: "form_Documentos",
    next() {
      showTabModalidad.show();
    },
  },
  {
    form: "form_Modalidad",
    next() {
      showTabModalidad.show();
    },
  },
];
// !Next tab changer
function nextTab(id) {
  $(`#nav_${id.toLowerCase()}_tab`).addClass("valid");
  let nextTab = TABS.find((tab) => tab.form === id);
  nextTab.next();
}

// !Prevent default
document.querySelectorAll('form[class= "form"]').forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (postRevision(form)) {
      nextTab(form.id);
    }
  });
  form.addEventListener("change", (e) => {
    liveRevision();
  });
});

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

// !Validación de campos live
function liveRevision(form) {
  let valid = true;
  form.querySelectorAll("input").forEach((input) => {
    if (input.className.includes("is-invalid")) {
      $(`#nav_${form.id.toLowerCase()}_tab`).removeClass("valid");
      valid = false;
    }
  });
  if (valid) {
    $(`#nav_${form.id.toLowerCase()}_tab`).addClass("valid");
  }
}

// !Validación del form_persona
// fecha de solicitud input
document
  .getElementById("form_Persona_Fecha")
  .addEventListener("focus", function () {
    this.addEventListener("change", function () {
      if (!isNaN(new Date($(this).val()).getTime())) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });
// Asunto input
document
  .getElementById("form_Persona_Asunto")
  .addEventListener("focus", function () {
    this.addEventListener("input", function () {
      if ($(this).val().length >= 3) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });
// Nombre Solicitante input
document
  .getElementById("form_Persona_Nombre_S")
  .addEventListener("focus", function () {
    this.addEventListener("input", function () {
      if ($(this).val().length >= 3) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });
// Apellido Paterno input
document
  .getElementById("form_Persona_Apellido_P")
  .addEventListener("focus", function () {
    this.addEventListener("input", function () {
      if ($(this).val().length >= 3) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });
// Apellido Materno input
document
  .getElementById("form_Persona_Apellido_M")
  .addEventListener("focus", function () {
    this.addEventListener("input", function () {
      if ($(this).val().length >= 3) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });
// Correo input
document
  .getElementById("form_Persona_Correo")
  .addEventListener("focus", function () {
    this.addEventListener("input", function () {
      var mailformat =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if ($(this).val().match(mailformat)) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });
  });

//!Función para validar un RFC
// ?source: https://es.stackoverflow.com/a/31714
// Devuelve el RFC sin espacios ni guiones si es correcto
// Devuelve false si es inválido
// (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
function rfcValido(rfc, aceptarGenerico = true) {
  const re =
    /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
  var validado = rfc.match(re);

  if (!validado)
    //Coincide con el formato general del regex?
    return false;

  //Separar el dígito verificador del resto del RFC
  const digitoVerificador = validado.pop(),
    rfcSinDigito = validado.slice(1).join(""),
    len = rfcSinDigito.length,
    //Obtener el digito esperado
    diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
    indice = len + 1;
  var suma, digitoEsperado;

  if (len == 12) suma = 0;
  else suma = 481; //Ajuste para persona moral

  for (var i = 0; i < len; i++)
    suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
  digitoEsperado = 11 - (suma % 11);
  if (digitoEsperado == 11) digitoEsperado = 0;
  else if (digitoEsperado == 10) digitoEsperado = "A";

  //El dígito verificador coincide con el esperado?
  // o es un RFC Genérico (ventas a público general)?
  if (
    digitoVerificador != digitoEsperado &&
    (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000")
  )
    return false;
  else if (
    !aceptarGenerico &&
    rfcSinDigito + digitoVerificador == "XEXX010101000"
  )
    return false;
  return rfcSinDigito + digitoVerificador;
}

//!Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarRfc(input) {
  var rfc = input.value.trim().toUpperCase(),
    valido;
  var rfcCorrecto = rfcValido(rfc); // ⬅️ Acá se comprueba

  if (rfcCorrecto) {
    valido = "Válido";
    $("#form_Persona_Rfc").removeClass("is-invalid").addClass("is-valid");
  } else {
    valido = "No válido";
    $("#form_Persona_Rfc").removeClass("is-valid").addClass("is-invalid");
  }
}

(() => {
  const denuncia_tab = document.getElementById("denuncia-tab");
  const persona_content = document.getElementById("persona_content");
  const persona = document.getElementById("denuncia");

  const empresa_tab = document.getElementById("empresa-tab");
  const empresa_content = document.getElementById("empresa_content");
  const empresa = document.getElementById("empresa");

  const documentos = document.getElementById("denunciante");
  const documentos_content = document.getElementById("contenedor1");
  const documentos_tab = document.getElementById("denunciante-tab");

  const modalidad = document.getElementById("modalidad");
  const modalidad_content = document.getElementById("modalidades");
  const modalidad_tab = document.getElementById("modalidad-tab");

  // eventos
  //window.onload = function () {
  //console.log("se ejecuto");
  //denuncia_tab.classList.add("active");
  //persona.classList.add("show", "active");
  //persona_content.classList.add("block");
  //};

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

  function correctoPersona() {
    $("#correctoMsg").removeClass("d-none");
    $("#errorMsg").addClass("d-none");

    // empresa_tab.classList.add('active');
    empresa_content.classList.add("block");
    empresa_content.classList.remove("hidden");
    // empresa.classList.add('show', 'active');

    // persona.classList.remove('show');
    // persona.classList.remove('active');
    // denuncia_tab.classList.remove('active');
    persona_content.classList.add("hidden");
    persona_content.classList.remove("block");
  }

  function correctoEmpresa() {
    $("#correctoMsg2").removeClass("d-none");
    $("#errorMsg2").addClass("d-none");

    // documentos_tab.classList.add('active');
    documentos_content.classList.add("block");
    documentos_content.classList.remove("hidden");
    // documentos.classList.add('show', 'active');

    // empresa.classList.remove('show');
    // empresa.classList.remove('active');
    // empresa_tab.classList.remove('active');
    empresa_content.classList.add("hidden");
    empresa_content.classList.remove("block");
  }

  function correctoArchivos() {
    $("#correctoMsg3").removeClass("d-none");
    $("#errorMsg3").addClass("d-none");

    modalidad_content.classList.add("block");

    documentos_content.classList.add("hidden");
    documentos_content.classList.remove("block");
  }

  function correctoModalidad() {
    $("#correctoMsg4").removeClass("d-none");
    $("#errorMsg4").addClass("d-none");
    $("#correctoBtn").removeClass("d-none");

    modalidad_content.classList.add("hidden");
    modalidad_content.classList.remove("block");
  }

  // mensages de errores
  function phperror(texto) {
    $("#errorMsg").removeClass("d-none");
    $("#errorMsg").html(texto);
  }

  function phperrorEmpresa(texto) {
    $("#errorMsg2").removeClass("d-none");
    $("#errorMsg2").html(texto);
  }

  function phperrorArchivos(texto) {
    $("#errorMsg2").removeClass("d-none");
    $("#errorMsg2").html(texto);
  }

  function phperrorEmpresa(texto) {
    $("#errorMsg2").removeClass("d-none");
    $("#errorMsg2").html(texto);
  }

  function phperrorModalidad(texto) {
    $("#errorMsg4").removeClass("d-none");
    $("#errorMsg4").html(texto);
  }
})();
