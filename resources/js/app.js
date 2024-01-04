import './bootstrap';
import './register-sw';
import './pwa';
import '../../modules/panel/src/resources/js/adminLte';
import './dashboard';

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

Livewire.on('themeChanged', function (newTheme) {
    console.log('Theme changed to ' + newTheme);
    document.body.setAttribute('data-theme', newTheme);
});

document.addEventListener('DOMContentLoaded', (event) => {
    const copyButton = document.getElementById('copyButton');
    if (copyButton) {
        copyButton.addEventListener('click', function() {
            const gstinText = document.getElementById('gstinText').innerText;
            navigator.clipboard.writeText(gstinText).then(() => {
                alert('Copied to clipboard');
            }).catch((err) => {
                alert('Could not copy text: ', err);
            });
        });
    }
});
