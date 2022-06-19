/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

let seeMore = document.getElementById("seeMore");
let seeLess = document.getElementById("seeLess");
let moreSearchTerms = document.getElementById("moreSearchTerms");

// 1. Faire apparaitre le moreSearchTermsulaire
seeMore.addEventListener('click', function (e) {
    e.preventDefault();
    moreSearchTerms.style.display = "block";
    moreSearchTerms.classList.add('fade');
    moreSearchTerms.offsetHeight; // instruction juste pour faire une pause et effectuer la transition
    moreSearchTerms.classList.add('in');
    seeMore.style.display = "none";
    seeLess.style.display = "block";
});

// Bouton Retour pour faire disparaitre le moreSearchTermsulaire
seeLess.addEventListener('click', function (e) {
    e.preventDefault();
    seeLess.style.display = "none";
    moreSearchTerms.classList.add('fade');
    moreSearchTerms.classList.remove('in');
    moreSearchTerms.style.display = "none";
    seeMore.style.display = "block";
});