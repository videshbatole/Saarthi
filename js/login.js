const individual = document.getElementById("user1");
const ngo = document.getElementById("user2");

const form1 = document.getElementById("individual");
const form2 = document.getElementById("ngo");

individual.addEventListener("click", function () {
  individual.classList.add("selected");
  ngo.classList.remove("selected");
  form1.style.display = "block";
  form2.style.display = "none";
});

ngo.addEventListener("click", function () {
  ngo.classList.add("selected");
  individual.classList.remove("selected");
  form1.style.display = "none";
  form2.style.display = "block";
});

