
function validateForm() {
    if (document.forms["myForm"]["fname"].value == "") {
      alert("Entrer le nom de matériel");
      return false;
    }
    if (document.forms["myForm"]["fprix"].value <= 0) {
      alert("Le prix doit etre positif");
      return false;
    }
    if (document.forms["myForm"]["pets"].value == "") {
      alert("sélectionner un client");
      return false;
    }
    return true;
  }
  