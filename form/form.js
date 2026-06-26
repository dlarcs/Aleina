class ClassForm {
  constructor() {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    name.value = "laura";
    email.value = "laura@gmail.com";
    password.value = "Laura@1"
    confirmPassword.value = "Laura@1";

    const boton_register = document.getElementById("boton_register");

    boton_register.addEventListener("click", () => {
      this.register();
    });
  }

  async register() {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");


    const fieldsAreCorrect = this.checkFields(
      name,
      email,
      password
    );

    if (!fieldsAreCorrect) {
      return;
    }
    const emailIsCorrect = this.checkEmail(email);

    if (!emailIsCorrect) {
      return;
    }

    const passwordIsCorrect = this.checkPassword(password, confirmPassword);

    if (!passwordIsCorrect) {
      return;
    }


    const url = "controller/register.php";

    const data = {
      action: "register",
      name : name.value,
      email : email.value,
      password : password.value,
      confirmPassword : confirmPassword.value
    };

    const response = await this.makeRecuest(url,data);

    if (!response) return;
    alert(response.message);

}


  async makeRecuest(url, data) {
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      });

      if (!response.ok) {
        throw new Error("Network error.");
      }

      return await response.json();

    } catch (error) {
      console.error("Error:", error);
      return null;
    }
  }
  checkFields(name, email, password) {
    if (name.value.trim() === "") {
      alert("El nombre está vacío");
      return false;
    }

    if (email.value.trim() === "") {
      alert("El email está vacío");
      return false;
    }

    if (password.value.trim() === "") {
      alert("La contraseña está vacía");
      return false;
    }

    return true;
  }

  checkPassword(password, confirmPassword) {
    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirmPassword.value.trim();

    if (passwordValue.length < 5) {
      alert("La contraseña debe tener mínimo 5 caracteres");
      return false;
    }

    if (!/[a-zA-Z]/.test(passwordValue)) {
      alert("La contraseña debe tener al menos una letra");
      return false;
    }

    if (!/[0-9]/.test(passwordValue)) {
      alert("La contraseña debe tener al menos un número");
      return false;
    }

    if (!/[!@#$%^&*(),.?":{}|<>]/.test(passwordValue)) {
      alert("La contraseña debe tener al menos un carácter especial");
      return false;
    }

    if (password.value.trim() !== confirmPassword.value.trim()) {
      alert("Las contraseñas no coinciden");
      return false;
    }

      return true;
    }

  checkEmail(email) {
  const emailValue = email.value.trim();

  if (!emailValue.includes("@")) {
    alert("El email debe tener @");
    return false;
  }

  if (!emailValue.includes(".")) {
    alert("El email debe tener un punto");
    return false;
  }

  return true;
}
}

const classForm = new ClassForm();
