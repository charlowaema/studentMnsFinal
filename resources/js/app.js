

import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';

import * as bootstrap from 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.bootstrap = bootstrap;

Alpine.start();


// Mobile sidebar
document.addEventListener('DOMContentLoaded', () => {

    const sidebar = document.getElementById('sidebar');
    const closeButton = document.getElementById('sidebarClose');

    if (sidebar && closeButton) {

        closeButton.addEventListener('click', () => {

            const sidebarInstance =
                bootstrap.Offcanvas.getOrCreateInstance(sidebar);

            sidebarInstance.hide();

        });

    }

});