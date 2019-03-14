let form = document.querySelectorAll('.submitConvertisseur');

form[0].addEventListener('click', function(e) {
    console.log(e.target.form);
    console.log(new FormData(e.target.form));
   // e.preventDefault();
    switch (e.target.name) {
        case ('aireForm'):

            break;
        case ('hypotenuseForm'):

            break;
    }
});

form[1].addEventListener('click', function(e) {
    console.log(e);
    e.preventDefault();
    switch (e.target.name) {
        case ('aireForm'):

            break;
        case ('hypotenuseForm'):

            break;
    }
});