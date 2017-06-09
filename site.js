if ('serviceWorker' in navigator && 'PushManager' in window) {
  console.log('Service Worker and Push is supported');

  navigator.serviceWorker.register('sw.js')
  .then(function(swReg) {
    console.log('Service Worker is registered', swReg);

    swRegistration = swReg;
  })
  .catch(function(error) {
    console.error('Service Worker Error', error);
  });
} else {
  console.warn('Push messaging is not supported');
  pushButton.textContent = 'Push Not Supported';
}

const applicationServerPublicKey = '<BE6_r68f31eQEKb-ClHxy-QgEl7Lo-TqqgF8pte_Y-3hibSm_4UKF04pnzEKI6fzrt8_aMOGfBOmckXRlsM0iZg>';
