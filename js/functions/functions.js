//!Function to validate an RFC
// ?source: https://es.stackoverflow.com/a/31714
// Returns the RFC without spaces or hyphens if correct
// Returns false if invalid
// (must be in capital letters, hyphens and optional spaces in between)
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
//!event listener input for RFC
// -Capitalise the RFC to validate it.
// -Eliminate any gaps that may occur before or after
function validarRfc(input) {
  var rfcCorrecto = rfcValido($(input).val().trim().toUpperCase()); // ⬅️ Acá se comprueba
  return rfcCorrecto;
}

// *validation rules
const REGLAS = [
  {
    id: "text",
    min: 3,
    text: function (input, e) {
      if (input.id.includes("Rfc")) {
        return validarRfc(input);
      } else if (input.id.includes("N_Local")) {
        return $(input).val().length >= 1 ? true : false;
      } else {
        return $(input).val().length >= this.min ? true : false;
      }
    },
  },
  {
    id: "tel",
    min: 12,
    tel: function (input, e) {
      if (input.id.includes("Oficina")) {
        return $(input).val().length == 4 ? true : false;
      } else {
        if (
          ($(input).val().length == 3 || $(input).val().length == 7) &&
          e.inputType != "deleteContentBackward"
        ) {
          $(input).val($(input).val() + "-");
        }
        return $(input).val().length == this.min ? true : false;
      }
    },
  },
  {
    id: "email",
    email: function (input, e) {
      var mailformat =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      return $(input).val().match(mailformat) ? true : false;
    },
  },
  {
    id: "date",
    date: function (input, e) {
      return !isNaN(new Date($(input).val()).getTime());
    },
  },
  {
    id: "file",
    tamano: 3000000,
    file: function (input, e) {
      let name = input.files[0].name;
      let size = input.files[0].size;
      if (size > this.tamano) {
        $("#invalid_feedback_Comprobante_Domicilio").html("Tamaño no válido");
        return false;
      } else {
        let ext = name.split(".").pop().toLowerCase();
        if (ext == "pdf") {
          return true;
        } else {
          $("#invalid_feedback_Comprobante_Domicilio").html(
            "Formato no válido"
          );
          return false;
        }
      }
    },
  },
];

// !Tabs Boostrap instances
var tabFormPersona = document.querySelector("#nav_form_persona_tab");
var showTabPersona = new bootstrap.Tab(tabFormPersona);

var tabFormEmpresa = document.querySelector("#nav_form_empresa_tab");
var showTabEmpresa = new bootstrap.Tab(tabFormEmpresa);

var tabFormDocumentos = document.querySelector("#nav_form_documentos_tab");
var showTabDocumentos = new bootstrap.Tab(tabFormDocumentos);

var tabFormModalidad = document.querySelector("#nav_form_modalidad_tab");
var showTabModalidad = new bootstrap.Tab(tabFormModalidad);

// !Tabs methods
const TABS = [
  {
    form: "form_Persona",
    own() {
      showTabPersona.show();
    },
    next() {
      if (TABS.indexOf(this) + 1 < TABS.length) {
        TABS[TABS.indexOf(this) + 1].own();
        $(`#nav_${TABS[TABS.indexOf(this) + 1].form}_tab`).removeClass(
          "disabled"
        );
      }
    },
    before() {
      if (TABS.indexOf(this) - 1 >= 0) {
        TABS[TABS.indexOf(this) - 1].own();
      }
    },
  },
  {
    form: "form_Empresa",
    own() {
      showTabEmpresa.show();
    },
    next() {
      if (TABS.indexOf(this) + 1 < TABS.length) {
        TABS[TABS.indexOf(this) + 1].own();
        $(`#nav_${TABS[TABS.indexOf(this) + 1].form}_tab`).removeClass(
          "disabled"
        );
      }
    },
    before() {
      if (TABS.indexOf(this) - 1 >= 0) {
        TABS[TABS.indexOf(this) - 1].own();
      }
    },
  },
  {
    form: "form_Documentos",
    own() {
      showTabDocumentos.show();
    },
    next() {
      if (TABS.indexOf(this) + 1 < TABS.length) {
        TABS[TABS.indexOf(this) + 1].own();
        $(`#nav_${TABS[TABS.indexOf(this) + 1].form}_tab`).removeClass(
          "disabled"
        );
      }
    },
    before() {
      if (TABS.indexOf(this) - 1 >= 0) {
        TABS[TABS.indexOf(this) - 1].own();
      }
    },
  },
  {
    form: "form_Modalidad",
    own() {
      showTabModalidad.show();
    },
    next() {
      if (TABS.indexOf(this) + 1 < TABS.length) {
        TABS[TABS.indexOf(this) + 1].own();
        $(`#nav_${TABS[TABS.indexOf(this) + 1].form}_tab`).removeClass(
          "disabled"
        );
      }
    },
    before() {
      if (TABS.indexOf(this) - 1 >= 0) {
        TABS[TABS.indexOf(this) - 1].own();
      }
    },
  },
];

// !Validate inputs before switching tabs
function postRevision(form) {
  let valid = true;
  form.querySelectorAll("input").forEach((input) => {
    if (
      !input.className.includes("is-invalid") &&
      !input.className.includes("is-valid")
    ) {
      $(`#${input.id}`).addClass("is-invalid");
      return (valid = false);
    } else if (input.className.includes("is-invalid")) {
      return (valid = false);
    }
  });
  return valid;
}

// !input verifier
export function inputQualifier(form) {
  form.querySelectorAll("input").forEach((input) => {
    input.addEventListener("input", function (e) {
      const type = REGLAS.find((regla) => regla.id === `${this.type}`);
      type[`${this.type}`](this, e)
        ? $(this).removeClass("is-invalid").addClass("is-valid")
        : $(this).removeClass("is-valid").addClass("is-invalid");
    });
  });
}

// !Form navigation
// !navigation handler
function nextTab(id) {
  $(`#nav_${id.toLowerCase()}_tab`).addClass("valid");
  let tab = TABS.find((tab) => tab.form === id);
  tab.next();
}

function previousTab(id) {
  let tab = TABS.find((tab) => tab.form === id);
  tab.before();
}

// !navigation listener
export function navigationTab(form) {
  form.querySelectorAll('button[role="navigation"]').forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      if (btn.id.includes("next") && postRevision(form)) {
        nextTab(form.id);
      }
      if (btn.id.includes("previus")) {
        previousTab(form.id);
      }
    });
  });
}

export function getOptions() {
  $.ajax({
    type: "POST",
    url: "./controller/controller.php",
    data: "opciones=1",
    success: function (response) {
      console.log(response);
      return response;
    },
  });
}
