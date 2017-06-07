// If service worker is supported by the browser
if ('serviceWorker' in navigator) {
  // We register our sw.js script
  navigator.serviceWorker.register('sw.js').then(function() {
    return navigator.serviceWorker.ready;
  }).then(function(serviceWorkerRegistration) {
    reg = serviceWorkerRegistration;
    subscribe();
    console.log('SW registration success.');
  }).catch(function(error) {
    console.log('Error during SW registration', error);
  });
}