const REGLAS = [
  {
    id: "text",
    min: 3,
    text(){
      let next = `#nav_${REGLAS[REGLAS.indexOf(this)+1].id}_tab`;
      console.log(next);
    },
  },
  {
    id: "tel",
    min: 12,
    tel: function (input) {
      if (
        ($(input).val().length == 3 || $(input).val().length == 7) &&
        e.inputType != "deleteContentBackward"
      ) {
        $(input).val($(input).val() + "-");
      } else if (
        ($(input).val().length == 3 || $(input).val().length == 7) &&
        e.inputType == "deleteContentBackward"
      ) {
        $(input).val($(input).val() + "-");
      }
      if ($(input).val().length == 12) {
        $(input).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(input).removeClass("is-valid").addClass("is-invalid");
      }
    },
  },
  {
    id: "email",
    email: function (input) {
      var mailformat =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if ($(input).val().match(mailformat)) {
        return true;
      } else {
        return false;
      }
    },
  },
  {
    id: "date",
    date: function (input) {
      return !isNaN(new Date($(input).val()).getTime());
    },
  },
];

const date = REGLAS.find((regla) => regla.id === "text")



