// Check if the app is already installed
if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
    hideInstallPrompt();
}

// Deferred Prompt for Add to Home Screen
let deferredPrompt;

// Event Listener for beforeinstallprompt
window.addEventListener('beforeinstallprompt', (e) => {
    console.log('beforeinstallprompt event fired');
    e.preventDefault();
    deferredPrompt = e;
    // Update UI to show the install PWA button
    showInstallPrompt();
});

// Show install Prompt modal
function showInstallPrompt() {
    // check if the modal is already shown from localstorage
    let installPromptShown = localStorage.getItem('pwaInstallPrompt');
    if (installPromptShown) {
        hideInstallPrompt();
    } else {
        let installModal = document.getElementById('installModal');
        if (installModal) {
            installModal.style.display = 'block';
        }
    }
}

function hideInstallPrompt() {
    let installModal = document.getElementById('installModal');
    if (installModal) {
        installModal.style.display = 'none';
        localStorage.setItem('pwaInstallPrompt', '1');
    }
}

// Event Listener for Install Button
document.getElementById('installBtn').addEventListener('click', async () => {
    hideInstallPrompt();
    deferredPrompt.prompt(); // Show the install prompt
    const { outcome } = await deferredPrompt.userChoice; // Wait for the user to respond
    console.log(`User response to the install prompt: ${outcome}`);
    deferredPrompt = null;
});

// Event Listener for Closing the Install Modal
document.querySelector('.close').addEventListener('click', hideInstallPrompt);
