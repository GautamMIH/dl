// screening page modal popup on page load 
document.addEventListener('DOMContentLoaded', function() {
  const modalEl = document.getElementById('exampleModal');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
});




const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))


// welcome page video
const videoWrapper = document.querySelector('.welcome__videoWrapper');
const video = document.querySelector('.welcome__videoWrapper__iframe');
const videoCurtain=document.querySelector('.welcome__videoWrapper__curtain');
const videoPlayIcon=document.querySelector('.welcome__videoWrapper__playBtn');
if(videoWrapper){
  videoWrapper.addEventListener('click', () => {
    video.src += "?autoplay=1";
    videoCurtain.style.display="none";
    videoPlayIcon.style.display="none";
  });
}


//regstration page multistep form
const fieldsets = document.querySelectorAll("fieldset");
const progressBarItems = document.querySelectorAll("#progressbar li");
let currentActive = 0;
fieldsets[currentActive].style.opacity = 1;
document.querySelectorAll(".next, .previous").forEach(button => {
  button.addEventListener("click", () => {
    fieldsets[currentActive].style.opacity = 0;
    setTimeout(() => {
      fieldsets[currentActive].style.display = "none";
      currentActive += button.classList.contains("next") ? 1 : -1;
      progressBarItems.forEach((item, index) =>
        item.classList.toggle("active", index <= currentActive)
      );
      fieldsets[currentActive].style.display = "block";
      fieldsets[currentActive].style.opacity = 1;
    }, 300);
  });
});


// // form custom selct options checkbox
const selectCheck = document.querySelector('.form-group__selectCheck');
const options = document.querySelector('.form-group__options');
const chevronIcon = selectCheck.querySelector('iconify-icon');

selectCheck.addEventListener('click', () => {
  options.classList.toggle('form-group__options--open');
  chevronIcon.style.transform = `rotate(${options.classList.contains('form-group__options--open') ? 180 : 0}deg)`;
});


// custom input of type file 
var fileInput = document.getElementById('file-upload');
var fileLabel = document.querySelector('.cBtn.custom-file-upload .cBtn__move');
var fileNameSpan = document.getElementById('file-name');
var fileUploadIcon=document.querySelector(".candidate__form__content__candidateHistory__item__icon");
var candidateHistoryItem=document.querySelector(".candidate__form__content__candidateHistory__item");
fileInput.addEventListener('change', function() {
  var fileName = this.value.split('\\').pop();
  fileLabel.textContent=fileName?"Uploaded":"Upload File";
  fileUploadIcon.src=fileName?"./iconImages/uploadedIcon.png":"./iconImages/document-download.png";
  fileNameSpan.textContent = fileName? fileName: "Attach Resume";
  fileName?  candidateHistoryItem.classList.add("added"):candidateHistoryItem.classList.remove("added");
});




