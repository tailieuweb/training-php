document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
      type: 'loop',
      perPage: 1,
      height: '100vh',
      cover: true,
      autoplay: true,
      interval: 3000,
      pagination: false
    }).mount();
  });
