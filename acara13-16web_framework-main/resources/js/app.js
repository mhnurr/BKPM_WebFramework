import 'bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.toggle-sidebar-btn')?.addEventListener('click', function() {
        document.body.classList.toggle('toggle-sidebar');
    });
});
