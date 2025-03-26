function toggleDropdown() {
    const dropdownMenu = document.getElementById('dropdown-menu');
    const menuToggle = document.querySelector('.menu-toggle');
    dropdownMenu.classList.toggle('show');
    menuToggle.classList.toggle('active');
}