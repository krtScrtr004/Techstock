import { dialog } from '../render/dialog.js';

try {
    document.addEventListener('DOMContentLoaded', function () {
        const lazyBackgrounds = document.querySelectorAll('.lazy-bg');
        if (lazyBackgrounds) {
            // Create a new IntersectionObserver to watch when elements enter the viewport
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    // If the element is visible in the viewport
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        // Set the background image using the value from the data-bg attribute
                        const imageSource = `url(${el.dataset.bg})`
                        el.style.backgroundImage = imageSource.replaceAll('\\', '\\\\'); // Replace directory separator with two escaped backward slash

                        observer.unobserve(el);
                    }
                });
            });

            // Start observing each lazy background element
            lazyBackgrounds.forEach(el => observer.observe(el));
        }
    });
} catch (error) {
    dialog.errorOccurred(error.message)
}