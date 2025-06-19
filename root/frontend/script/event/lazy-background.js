document.addEventListener('DOMContentLoaded', function () {
    const lazyBackgrounds = document.querySelectorAll('.lazy-bg');
    if (!lazyBackgrounds){
        return
    }

    // Create a new IntersectionObserver to watch when elements enter the viewport
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            // If the element is visible in the viewport
            if (entry.isIntersecting) {
                const el = entry.target;
                // Set the background image using the value from the data-bg attribute
                el.style.backgroundImage = `url(${el.dataset.bg})`;
                // Stop observing this element since its background has been loaded
                observer.unobserve(el);
            }
        });
    });

    // Start observing each lazy background element
    lazyBackgrounds.forEach(el => observer.observe(el));
});
