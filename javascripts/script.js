const livelyScripts = () => {

    const body = document.body;
    const mainHeader = document.querySelector('.main-header');
    const mainHeaderTopBar = document.querySelector('.main-header__top-bar');
    const mainHeaderMainBar = document.querySelector('.main-header__main-bar');
    const mainNavigation = document.querySelector('.main-navigation');
    const mainSearchButton = document.querySelector('.main-search-button');
    const mainHeaderSearch = document.querySelector('.main-header-search');
    const mainSearchInput = mainHeaderSearch.querySelector('#query');
    const mainBanner = document.querySelector('.main-banner');
    const mainBannerImgWrapper = document.querySelector('.main-banner__image-wrapper');
    const mainBannerImgShape = document.querySelector('.main-banner__image-shape');
    const userBar = document.getElementById('admin-bar');
    const menuDrawer = document.getElementById('menu-drawer');

    // Scrolling Events

    let lastKnownScrollPosition = 0;
    let ticking = false;
    let scrollDirection = 'up';

    function onScroll(scrollPos) {
        if(scrollPos > 60 && scrollDirection == 'down') {
            mainHeader.style.top = - (userBarHeight + mainHeaderTopBar.offsetHeight) + 'px';
            menuDrawer.style.top = mainHeaderMainBar.offsetHeight + 'px';
            menuDrawer.style.height = 'calc(100% - ' + mainHeaderMainBar.offsetHeight + 'px)';
        } else {
            mainHeader.style.top = 0;
            menuDrawer.style.top = mainHeader.offsetHeight + 'px';
            menuDrawer.style.height = 'calc(100% - ' + mainHeader.offsetHeight + 'px)';
        }
    }

    document.addEventListener('scroll', (event) => {
        scrollDirection = Math.max(lastKnownScrollPosition, window.scrollY) == lastKnownScrollPosition ? 'up': 'down';
        lastKnownScrollPosition = window.scrollY;

        if (!ticking) {
            window.requestAnimationFrame(() => {
                onScroll(lastKnownScrollPosition);
                ticking = false;
            });

            ticking = true;
        }
    });

    // Resize Events

    let userBarHeight = 0;
    let timeout = false;
    const delay = 250;

    onResize();

    function onResize() {
        getUserBarHeight();
        refreshBodyPaddingTop();
        onScroll(lastKnownScrollPosition);
        setSearchButtonPosition();
        setBannerImagePosition();
    }

    window.addEventListener('resize', function() {
        clearTimeout(timeout);
        timeout = setTimeout(onResize, delay);
    });

    function refreshBodyPaddingTop() {
        body.style.paddingTop = mainHeader.offsetHeight + 'px';
        document.documentElement.style.scrollPaddingTop = (mainHeaderMainBar.offsetHeight + 20) + 'px';
    }

    function getUserBarHeight() {
        if (userBar) {
            userBarHeight = userBar.offsetHeight;
        }
    }

    function setSearchButtonPosition() {
        if (window.innerWidth < 1200) {
            mainHeaderMainBar.insertBefore(mainSearchButton, mainNavigation);
        } else {
            mainHeaderMainBar.insertBefore(mainSearchButton, mainHeaderSearch);
        }
    }

    function setBannerImagePosition() {
        if (mainBanner === null || mainBannerImgWrapper === null) {
            return;
        }

        if ((mainBanner.offsetHeight + 35) > (mainBannerImgWrapper.offsetHeight / 2)) {
            mainBannerImgWrapper.style.transform = 'translateY(-50%)';
            mainBannerImgWrapper.style.bottom = 'auto';
            if (mainBannerImgShape !== null) {
                mainBannerImgShape.style.top = 0;
                mainBannerImgShape.style.bottom = 'auto';
            }

        } else {
            mainBannerImgWrapper.style.transform = 'none';
            mainBannerImgWrapper.style.bottom = '-35px';
            if (mainBannerImgShape !== null) {
                mainBannerImgShape.style.top = 'auto';
                mainBannerImgShape.style.bottom = '-28px';
            }
        }
    }

    // Main Header Search
    document.addEventListener('click', onDocumentClick, true);

    function onDocumentClick(e) {
        if (e.target == mainSearchButton){
            mainHeaderSearch.classList.toggle('visible');
            if (mainHeaderSearch.classList.contains('visible')) {
                mainSearchInput.focus();
            }
        } else if (!mainHeaderSearch.contains(e.target)){
            mainHeaderSearch.classList.remove('visible');
        }
    }

    mainHeaderSearch.addEventListener('focusout', (e) => {
        setTimeout(() => {
            if (!mainHeaderSearch.contains(document.activeElement)) {
                mainHeaderSearch.classList.remove('visible');
            }
        }, 0);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', livelyScripts);
} else {
    livelyScripts();
}
