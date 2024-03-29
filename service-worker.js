// service-worker.js

self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('bookmark-v1').then(function(cache) {
        return cache.addAll([
          '/',
          '/index.php',
          '/style.css',
          '/script.js',
          '/icon.png'
          // Add more URLs of static assets here
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request);
      })
    );
  });
  