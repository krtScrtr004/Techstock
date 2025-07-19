const Loader = () => {
    let parent;

    return {
        create: function (parentElem) {
            if (!parentElem) {
                throw new Error('No parent element')
            }

            const loaderElem = '<div class="loader-wrapper center-child full-body-content"><span class="loader"></span></div>'
            parentElem.insertAdjacentHTML('afterbegin', loaderElem)

            this.parent = parentElem
        },

        delete: function () {
            const createdLoader = this.parent.querySelector('.loader-wrapper')
            if (createdLoader) {
                createdLoader.remove();
            }
        }
    }
}
export const loader = Loader()