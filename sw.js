
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open('v1').then((cache) => {
            return cache.addAll([
                // '/assets/css/color/color-1.css',
                // '/assets/css/style.css',
                // '/assets/revolution/css/layers.css',
                // '/assets/revolution/css/settings.css',
                // '/assets/css/responsive.css',
                // '/assets/owlcarousel/assets/owl.theme.default.min.css',
                // '/assets/animation/animate.css',
                // '/assets/needpopup/needpopup.min.css',
                // '/assets/javascript/jquery.min.js',
                // '/assets/javascript/bootstrap.min.js',
                // '/assets/javascript/jquery.easing.js',
                // '/assets/javascript/jquery-countTo.js',
                // '/assets/javascript/jquery-validate.js',
                // '/assets/javascript/rev-slider.js',
                // '/assets/revolution/js/jquery.themepunch.revolution.min.js',
                // '/assets/revolution/js/jquery.themepunch.tools.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.actions.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.carousel.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.kenburn.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.migration.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.navigation.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.parallax.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.slideanims.min.js',
                // '/assets/revolution/js/extensions/revolution.extension.video.min.js',
                // '/assets/animation/wow.min.js',
                // '/assets/javascript/animation.js',
                // '/assets/owlcarousel/owl.carousel.min.js',
                // '/assets/owlcarousel/carousel.js',
                // '/assets/javascript/main.js'
            ])
        })
    )
})

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request)
        })
    )
})
