import './bootstrap';
import './register-sw';
// import './pwa';
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

document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.split-decimal');
    elements.forEach(element => {
        let content = element.textContent; // Get the current content of the element
        let [integer, decimal] = content.split('.'); // Split into integer and decimal parts
        if (decimal) { // Check if there is a decimal part
            element.innerHTML = `${integer}.<span class="decimal">${decimal}</span>`; // Reformat with smaller decimal part
        }
    });
});


