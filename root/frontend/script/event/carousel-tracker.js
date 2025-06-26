const carouselWrapper = document.querySelectorAll('.carousel-wrapper')

carouselWrapper.forEach(wrapper => {
    const carousel = wrapper.querySelector('.carousel')
    const trackers = wrapper.querySelectorAll('.tracker')

    function hideTracker() {
        const left = Array.from(trackers).find(l => l.classList.contains('left'))
        const right = Array.from(trackers).find(r => r.classList.contains('right'))

        left.style.display = (carousel.scrollLeft <= 0) ? 'none' : 'flex'
        const maxScroll = carousel.scrollWidth - carousel.clientWidth
        right.style.display = (carousel.scrollLeft >= maxScroll) ? 'none' : 'flex'
    }
    hideTracker()

    carousel.addEventListener('scroll', hideTracker);
    trackers.forEach(tracker => {
        tracker.addEventListener('click', e => {
            e.stopPropagation()

            const carouselLength = carousel.clientWidth
            if (tracker.classList.contains('right')) {
                carousel.scrollBy({ left: carouselLength, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: (-carouselLength), behavior: 'smooth' });
            }
        })
    })    
})