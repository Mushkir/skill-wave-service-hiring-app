if (
  document.location.href ===
  "http://localhost/skillWaveWebApp/signup.php?spSignUp"
) {
  const validator = new window.JustValidate("#serviceProvidersSignUpForm");

  // Name
  validator.addField(
    "#sp-fullname",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 20,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Email
  validator.addField(
    "#sp-email",
    [
      {
        rule: "required",
      },
      {
        rule: "email",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Contact No.
  validator.addField(
    "#sp-contact-no",
    [
      {
        rule: "required",
      },
      {
        rule: "number",
      },
      {
        rule: "minLength",
        value: 12,
      },
      {
        rule: "maxLength",
        value: 13,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Username
  validator.addField(
    "#sp-username",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 15,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Password
  validator.addField(
    "#sp-password",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 8,
      },
      {
        rule: "maxLength",
        value: 15,
      },
      {
        rule: "strongPassword",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Confirm Password
  validator.addField(
    "#sp-confirm-password",
    [
      {
        rule: "required",
      },
      {
        validator: (value, fields) => {
          if (fields["#sp-password"] && fields["#sp-password"].elem) {
            const repeatPasswordValue = fields["#sp-password"].elem.value;

            return value === repeatPasswordValue;
          }

          return true;
        },
        errorMessage: "Passwords should be the same",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Gender
  validator.addField(
    "#sp-gender",
    [
      {
        rule: "required",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Address line
  validator.addField(
    "#sp-addresp-line",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // District
  validator.addField(
    "#sp-district",
    [
      {
        rule: "required",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Town
  validator.addField(
    "#sp-town",
    [
      {
        rule: "required",
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Qualification
  validator.addField(
    "#sp-qualification",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 20,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Skills
  validator.addField(
    "#sp-skills",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 50,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // File
  validator.addField(
    "#file-input",
    [
      {
        rule: "minFilesCount",
        value: 1,
      },
      {
        rule: "files",
        value: {
          files: {
            extensions: ["jpeg", "jpg", "png"],
            types: ["image/jpeg", "image/jpg", "image/png"],
          },
        },
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Description
  validator.addField(
    "#sp-desc",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 500,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Keywords
  validator.addField(
    "#sp-keywords",
    [
      {
        rule: "required",
      },
      {
        rule: "minLength",
        value: 3,
      },
      {
        rule: "maxLength",
        value: 500,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  // Starting Price
  validator.addField(
    "#sp-starting-price",
    [
      {
        rule: "required",
      },
      {
        rule: "number",
      },
      {
        rule: "minLength",
        value: 1,
      },
    ],
    {
      errorLabelCssClass: ["errorMsg"],
    }
  );

  validator.onSuccess(() => {
    console.log("Submitted.");
  });
}
