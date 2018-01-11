
  (function(exports) {


  
  function PasswordStrengthValidator() {
    function createReturnValue(
      text,
      strength,
      isLongEnough,
      hasSpecialCharacter
    ) {
      return {
        text: text,
        strength: strength,
        requirements: [
          {
            text: "Use at least 8 characters",
            isMet: isLongEnough
          },
          {
            text: "Use at least 1 number and 1 capital",
            isMet: hasSpecialCharacter
          }
        ]
      };
    }

    this.validate = function(input) {
      var validityRegexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/,
        //specialCharacterRegexp = /(\d|[A-Z])/;
        specialCharacterRegexp = (/^(?=.*\d)(?=.*[A-Z])/);

      var isEmpty = !input || input.length === 0,
        hasSpecialCharacter = specialCharacterRegexp.test(input),
        isValid = validityRegexp.test(input);

      if (isEmpty) {
        return createReturnValue("", 0, false, false);
      }

      if (isValid) {
        if (input.length > 12) {
          return createReturnValue("very strong", 4, true, hasSpecialCharacter);
        } else if (input.length > 9) {
          return createReturnValue("strong", 3, true, hasSpecialCharacter);
        } else {
          return createReturnValue("ok", 2, true, hasSpecialCharacter);
        }
      } else {
        if (input.length < 8) {
          return createReturnValue("too short", 1, false, hasSpecialCharacter);
        } else {
          return createReturnValue("invalid", 1, true, hasSpecialCharacter);
        }
      }
    };
  }

  exports.PasswordStrengthValidator = PasswordStrengthValidator;
})(window);

(function(exports) {
  function getCheckmarkSvg() {
    return '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="13" height="10" viewBox="0 0 13 10" style="enable-background:new 0 0 13 10;" xml:space="preserve"><path d="M12.942,1.187l-0.391-0.411V0.775l-0.267-0.281l-0.412-0.433c-0.077-0.081-0.202-0.081-0.279,0l-0.434,0.456L4.802,7.201L1.453,3.68c-0.077-0.081-0.202-0.081-0.279,0L0.058,4.853c-0.077,0.081-0.077,0.213,0,0.293l4.558,4.793c0.077,0.081,0.202,0.081,0.279,0l7.634-8.026h0.002l0.412-0.433C13.019,1.399,13.019,1.267,12.942,1.187z"/></svg>';
  }

  function getBox() {
    return $("<div />").addClass("password-indicator__box");
  }

  function PasswordStrengthPopover(options) {
    this.options = options;

    this.render = function(validity) {
      var passwordIndicator = $("<div />")
        .addClass("password-indicator")
        .addClass("password-indicator--strength-" + validity.strength);

      var header = $("<div />")
        .addClass("password-indicator__header")
        .text("Password strength: ");

      var headerSuffix = $("<span />")
        .addClass("password-indicator__header-suffix")
        .text(validity.text);

      header.append(headerSuffix);

      var boxes = $("<div />")
        .addClass("password-indicator__boxes")
        .append(getBox)
        .append(getBox)
        .append(getBox)
        .append(getBox);

      var requirements = $("<div />").addClass(
        "password-indicator__requirements"
      );

      $(validity.requirements).each(function() {
        var requirement = $("<div />")
          .addClass("password-indicator__requirement")
          .toggleClass("password-indicator__requirement--valid", this.isMet)
          .append(getCheckmarkSvg())
          .append($("<span>").text(this.text));

        requirements.append(requirement);
      });

      passwordIndicator
        .append(header)
        .append(boxes)
        .append(requirements);

      $(options.mount)
        .empty()
        .append(passwordIndicator);
    };
  }

  exports.PasswordStrengthPopover = PasswordStrengthPopover;
})(window);

var validator = new PasswordStrengthValidator();
var popover = new PasswordStrengthPopover({ mount: ".popover-content" });

function render(password) {
  popover.render(validator.validate(password));
}

render();
$("#password").keyup(function(e) {
  render(e.target.value);
});
// password retype verification
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
	 $('#confirm_password').css('border', '1px solid #5cb85c');

    specialCharacterRegexp = (/^(?=.*\d)(?=.*[A-Z])/);
    hasSpecialCharacter = specialCharacterRegexp.test(document.getElementById('password').value);
	//alert(hasSpecialCharacter);
    //isValid = validityRegexp.test(input);
if ( ($('#confirm_password').val().length > 7) )	{

if (hasSpecialCharacter )
{
///////document.getElementById('next3').disabled=false;

}
}
  } else {
    $('#message').html('Not Matching').css('color', '#FA5858');
 $('#confirm_password').css('border', '1px solid #FA5858');

 /////document.getElementById('confirm_password').style.border='1px solid red';
}
// document.getElementById('next3').disabled=true;

	
});
