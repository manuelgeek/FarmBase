var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
        '/',
        'index.php',
        'about.php',
        'manifest.json',
        'farmer_images',
        'img/icon-192.png',
        'site.js',
        'css/style.css',
        'css/bootstrap.min.css',
        'font/css/font-awesome.css',
        'js/jquery2.js',
        'js/bootstrap.min.js'
];

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Cache ready');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', function(event) {
   if (event.request.url == 'https://farmbase.venturezhub.com/') {
    console.info('responding to farmbase fetch with Service Worker! 🤓');
    event.respondWith(fetch(event.request).catch(function(e) {
      let out = {Gold: 1, Size: -1, Actions: []};
      return new Response(JSON.stringify(out));
    }));
    return;
  }

  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});

self.addEventListener('activate', function(event) {

  var cacheWhitelist = [CACHE_NAME];

  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          // We remove all the cache except the ones in cacheWhitelist array
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});