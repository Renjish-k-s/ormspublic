
// Ensure the DOM is fully loaded before adding event listeners
document.addEventListener("DOMContentLoaded", function () {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.querySelector('.wrapper');

    signUpButton.addEventListener('click', function(){
        container.classList.add('signUp-active');
    });

    signInButton.addEventListener('click', function(){
        container.classList.remove('signUp-active');
    });
});
