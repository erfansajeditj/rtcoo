import './bootstrap';
import Alpine from 'alpinejs';
import AOS from 'aos';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    AOS.init({ duration: 600, once: true, offset: 60, easing: 'ease-out-cubic' });
});
