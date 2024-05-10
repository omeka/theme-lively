const browseScripts = () => {

    const resources = document.getElementsByClassName('resources');
    let msnry;

    imagesLoaded(document.querySelector('body'), function() {
        // init Masonry after all images have loaded.
        for(let i = 0; i < resources.length; i++) {

            const initMasonryGrid = () => {
                if (resources[i].classList.contains('resource-grid')) {
                    msnry = new Masonry(resources[i], {
                        itemSelector: '.resource',
                        columnWidth: '.grid-sizer',
                        gutter: '.gutter-sizer',
                        percentPosition: true,
                    });

                    resources[i].style.opacity = 1;
                }
            }

            initMasonryGrid();

            const layoutToggles = resources[i].parentElement.querySelectorAll('.layout-toggle button');

            layoutToggles.forEach((layoutToggle) => {
                layoutToggle.addEventListener('click', (e) => {
                    const layoutToggleDisabled = e.currentTarget.parentElement.querySelector('.layout-toggle button:disabled');
                    layoutToggleDisabled.removeAttribute('disabled');
                    e.currentTarget.setAttribute('disabled', true);
                    resources[i].classList.toggle('resource-list');
                    resources[i].classList.toggle('resource-grid');

                    for(let i = 0; i < resources.length; i++) {
                        resources[i].classList.toggle('media-object');
                        const thumbnailWithDecoration = resources[i].querySelector('.resource__thumbnail.decoration');
                        if (thumbnailWithDecoration) {
                            thumbnailWithDecoration.classList.toggle('decoration--thumbnail');
                        }

                        const resourceMeta = resources[i].querySelector('.resource-meta');
                        if (resourceMeta) {
                            resourceMeta.classList.toggle('media-object-section');
                        }

                        const resourceImage = resources[i].querySelector('.resource-image');
                        if (resourceImage) {
                            resourceImage.classList.toggle('media-object-section');
                        }
                    }

                    initMasonryGrid();
                });
            });
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', browseScripts);
} else {
    browseScripts();
}
