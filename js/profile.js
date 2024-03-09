const profile = document.querySelector(".profile");
const ifoto = document.querySelector(".ifoto");
const Uploadimage = document.querySelector(".Uploadimage");
const file = document.querySelector(".file");

profile.addEventListener("mouseenter", function () {
  Uploadimage.style.display = "block";
});
profile.addEventListener("mouseleave", function () {
  Uploadimage.style.display = "none";
});

file.addEventListener("change", function () {
  const newimage = this.files[0];
  if (newimage) {
    const uplod = new uplod.FileReader();
    uplod.addEventListener("load", function () {
      ifoto.setAttribute("src", uplod.result);
    });
    uplod.readAsDataURL(newimage);
  }
});
