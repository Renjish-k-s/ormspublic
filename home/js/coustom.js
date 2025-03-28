function get_login_form()
{
    alert("login working");
}
 
 // Smooth scrolling for navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Navbar background change on scroll
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.querySelector('.navbar').style.background = 'rgba(44, 62, 80, 0.98)';
    } else {
        document.querySelector('.navbar').style.background = 'rgba(44, 62, 80, 0.95)';
    }
});


