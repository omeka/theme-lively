const livelyScripts = () => {

    const body = document.body;
    const mainHeader = document.querySelector('.main-header');
    const mainHeaderTopBar = document.querySelector('.main-header__top-bar');
    const mainHeaderMainBar = document.querySelector('.main-header__main-bar');
    const mainBanner = document.querySelector('.main-banner');
    const mainBannerImgWrapper = document.querySelector('.main-banner__image-wrapper');
    const mainBannerImgShape = document.querySelector('.main-banner__image-shape');
    const userBar = document.getElementById('admin-bar');
    const menuDrawer = document.getElementById('menu-drawer');
    const menuToggle = document.querySelector( '.main-navigation__toggle' );
    let mainHeaderSearch = null;

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
    const delay = 150;

    onResize();

    function onResize() {
        getUserBarHeight();
        refreshBodyPaddingTop();
        onScroll(lastKnownScrollPosition);
        setBannerImagePosition();

        if (window.innerWidth >= 1200 && mmToggli.getAttribute('aria-expanded') === 'true') {
            menuToggle.click();
        }
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
        if (e.target.classList.contains('main-search-button')) {
            const nextSibling = e.target.nextElementSibling;
            if (nextSibling && nextSibling.classList.contains('main-header-search')) {
                mainHeaderSearch = nextSibling;
                mainHeaderSearch.classList.toggle('visible');
                if (mainHeaderSearch.classList.contains('visible')) {
                    const mainSearchInput = mainHeaderSearch.querySelector('#query');
                    mainSearchInput.focus();
                    document.addEventListener('focusin', onFocusInOutside, true);
                } else {
                    document.removeEventListener('focusin', onFocusInOutside, true);
                }
            }
        } else if (mainHeaderSearch && !mainHeaderSearch.contains(e.target)) {
            mainHeaderSearch.classList.remove('visible');
            document.removeEventListener('focusin', onFocusInOutside, true);
        }
    }

    function onFocusInOutside(e) {
        if (mainHeaderSearch && !mainHeaderSearch.contains(e.target)) {
            mainHeaderSearch.classList.remove('visible');
            document.removeEventListener('focusin', onFocusInOutside, true);
        }
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', livelyScripts);
} else {
    livelyScripts();
}
