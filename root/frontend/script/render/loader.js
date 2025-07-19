const Loader = () => {
    let parent;

    function render(parentElem, loaderHtml, position) {
        if (!parentElem) {
            throw new Error('No parent element');
        }
        parentElem.style.position = 'relative';
        parentElem.insertAdjacentHTML(position, loaderHtml);
        parent = parentElem;
    }

    return {
        full: function (parentElem) {
            const parentHeight = parentElem.offsetHeight;
            const loaderElem = `
                <div 
                    class="loader-wrapper center-child absolute white-bg" 
                    style="height:${parentHeight}; top:0; left:0; right:0; bottom:0;">
                        <span class="loader"></span>
                </div>`;
            render(parentElem, loaderElem, 'afterbegin');
        },

        trail: function (parentElem) {
            const loaderElem = `
                <div 
                    class="loader-wrapper center-child white-bg absolute" 
                    style="height:fit-content; bottom:0;">
                        <span class="loader"></span>
                </div>`;
            render(parentElem, loaderElem, 'beforeend');
        },

        delete: function () {
            const createdLoader = parent?.querySelector('.loader-wrapper');
            if (createdLoader) {
                createdLoader.remove();
            }
        }
    }
}
export const loader = Loader();
