const pswrdField = document.querySelector(".form input[type='password']"),
  toggleIcon = document.querySelector(".form .field i");

// Si on clique sur le bouton show/hide mdp alors il dévoilera le texte
toggleIcon.onclick = () => {
  if (pswrdField.type === "password") {
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
    //Sinon il le laissera caché
  } else {
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
};
