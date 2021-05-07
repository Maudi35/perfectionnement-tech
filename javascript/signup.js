const form = document.querySelector(".signup form"),
  continueBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  //éviter au formulaire d'être soumis
  e.preventDefault();
};

continueBtn.onclick = () => {
  //Ajax
  //Créer un objet XML
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        //Réponse de l'url
        let data = xhr.response;
        if (data === "success") {
          location.href = "users.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  };
  //Envoyer les données du formulaire grâce à ajax au fichier php
  //créer un nouvel objet de données formulaire
  let formData = new FormData(form);
  xhr.send(formData);
};
