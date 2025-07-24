
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').then(registration => {
            console.log('ServiceWorker Registered : ', registration)
        }).catch(error => {
            console.log('ServiceWorker RegistrationFailed : ', error)
        })
    })
}
