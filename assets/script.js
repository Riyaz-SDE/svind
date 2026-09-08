// SIVIND — front-end behaviour
(function () {
  'use strict';

  // Sticky header state
  var header = document.getElementById('siteHeader');
  var onScroll = function () {
    if (!header) return;
    header.classList.toggle('scrolled', window.scrollY > 24);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Mobile nav
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () { nav.classList.toggle('open'); });
    nav.addEventListener('click', function (ev) {
      if (ev.target.tagName === 'A') nav.classList.remove('open');
    });
  }

  // Scroll reveal
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
  }

  // Client-side enquiry validation (server re-validates everything)
  var form = document.getElementById('enquiryForm');
  if (!form) return;

  var rules = {
    name:        { min: 2,  max: 100,  label: 'Name' },
    email:       { min: 5,  max: 255,  label: 'Email' },
    contact:     { min: 7,  max: 20,   label: 'Contact number' },
    description: { min: 10, max: 1000, label: 'Description' }
  };

  function setError(field, message) {
    var wrap = field.closest('.field');
    var slot = wrap.querySelector('.err');
    wrap.classList.toggle('invalid', !!message);
    if (slot) slot.textContent = message || '';
    return !message;
  }

  function validateField(field) {
    var rule = rules[field.name];
    if (!rule) return true;
    var value = field.value.trim();
    if (!value) return setError(field, rule.label + ' is required.');
    if (value.length < rule.min) return setError(field, rule.label + ' must be at least ' + rule.min + ' characters.');
    if (value.length > rule.max) return setError(field, rule.label + ' must be under ' + rule.max + ' characters.');
    if (field.name === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value)) {
      return setError(field, 'Enter a valid email address.');
    }
    if (field.name === 'contact' && !/^[0-9+()\-\s]{7,20}$/.test(value)) {
      return setError(field, 'Enter a valid phone number.');
    }
    return setError(field, '');
  }

  Object.keys(rules).forEach(function (name) {
    var field = form.elements[name];
    if (!field) return;
    field.addEventListener('blur', function () { validateField(field); });
    field.addEventListener('input', function () {
      if (field.closest('.field').classList.contains('invalid')) validateField(field);
    });
  });

  form.addEventListener('submit', function (ev) {
    var ok = true;
    Object.keys(rules).forEach(function (name) {
      var field = form.elements[name];
      if (field && !validateField(field)) ok = false;
    });
    if (!ok) {
      ev.preventDefault();
      var firstBad = form.querySelector('.field.invalid input, .field.invalid textarea');
      if (firstBad) firstBad.focus();
    }
  });
})();

// (function () {
//   var slides = document.querySelectorAll('.carousel-slide');
//   var dots = document.querySelectorAll('.carousel-dots .dot');
//   var prevBtn = document.querySelector('.carousel-prev');
//   var nextBtn = document.querySelector('.carousel-next');
//   if (!slides.length) return;

//   var currentIndex = 0;
//   function showSlide(index) {
//     slides.forEach(function (slide, i) {
//       var video = slide.querySelector('video');
//       if (i === index) {
//         slide.classList.add('active');
//         if (video) video.play();
//       } else {
//         slide.classList.remove('active');
//         if (video) video.pause();
//       }
//     });
//     dots.forEach(function (dot, i) { dot.classList.toggle('active', i === index); });
//     currentIndex = index;
//   }

//   if (nextBtn) nextBtn.addEventListener('click', function () { showSlide((currentIndex + 1) % slides.length); });
//   if (prevBtn) prevBtn.addEventListener('click', function () { showSlide((currentIndex - 1 + slides.length) % slides.length); });
//   dots.forEach(function (dot, i) { dot.addEventListener('click', function () { showSlide(i); }); });
// })();

// 


// 
// document.addEventListener('DOMContentLoaded', function() {
//   const slides = document.querySelectorAll('.carousel-slide');
//   const dots = document.querySelectorAll('.dot');
//   const prevBtn = document.querySelector('.carousel-prev');
//   const nextBtn = document.querySelector('.carousel-next');
//   let currentIndex = 0;

//   if (slides.length === 0) return;

//   function goToSlide(index) {
//     slides.forEach((slide, i) => {
//       const video = slide.querySelector('video');
//       if (i === index) {
//         slide.classList.add('active');
//         if (video) video.play();
//       } else {
//         slide.classList.remove('active');
//         if (video) {
//           video.pause();
//           video.currentTime = 0; // Reset video to start
//         }
//       }
//     });

//     dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
//     currentIndex = index;
//   }

//   if (nextBtn) {
//     nextBtn.addEventListener('click', () => goToSlide((currentIndex + 1) % slides.length));
//   }
  
//   if (prevBtn) {
//     prevBtn.addEventListener('click', () => goToSlide((currentIndex - 1 + slides.length) % slides.length));
//   }

//   dots.forEach((dot, i) => {
//     dot.addEventListener('click', () => goToSlide(i));
//   });
// });

// v2

// document.addEventListener('DOMContentLoaded', function() {
//   const track = document.getElementById('carouselTrack');
//   if (!track) return;

//   const slides = Array.from(track.querySelectorAll('.carousel-slide'));
//   const dots = document.querySelectorAll('.carousel-dots .dot');
//   const prevBtn = document.querySelector('.carousel-prev');
//   const nextBtn = document.querySelector('.carousel-next');
  
//   let currentIndex = 0;
//   let isDragging = false;
//   let startX = 0;
//   let currentTranslateX = 0;

//   // Function to lock in the slide position and manage video state
//   function updateSlidePosition() {
//     // Snap track to the exact percentage of the current index
//     track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
//     track.style.transform = `translateX(-${currentIndex * 100}%)`;
    
//     // Play active video, pause and reset hidden videos
//     slides.forEach((slide, i) => {
//       const video = slide.querySelector('video');
//       if (video) {
//         if (i === currentIndex) {
//           video.play().catch(()=>{});
//         } else {
//           video.pause();
//           video.currentTime = 0;
//         }
//       }
//     });

//     // Update dot highlights
//     dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
//   }

//   function goToSlide(index) {
//     if (index < 0) index = slides.length - 1;
//     if (index >= slides.length) index = 0;
//     currentIndex = index;
//     updateSlidePosition();
//   }

//   // --- Click Listeners for Buttons & Dots ---
//   if (nextBtn) nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
//   if (prevBtn) prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
//   dots.forEach((dot, i) => dot.addEventListener('click', () => goToSlide(i)));

//   // --- Touch & Drag Listeners for the Track ---
//   function getPositionX(e) {
//     return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
//   }

//   function touchStart(e) {
//     isDragging = true;
//     startX = getPositionX(e);
//     // Remove transition speed so it sticks 1:1 to the finger during drag
//     track.style.transition = 'none'; 
//   }

//   function touchMove(e) {
//     if (!isDragging) return;
//     const currentPosition = getPositionX(e);
//     currentTranslateX = currentPosition - startX;
    
//     // Calculate base percentage + pixel drag offset
//     const basePercentage = currentIndex * -100;
//     track.style.transform = `translateX(calc(${basePercentage}% + ${currentTranslateX}px))`;
//   }

//   function touchEnd() {
//     if (!isDragging) return;
//     isDragging = false;

//     // Threshold for snapping to a new slide (75 pixels)
//     if (currentTranslateX < -75 && currentIndex < slides.length - 1) {
//       currentIndex++; // Swiped left
//     } else if (currentTranslateX > 75 && currentIndex > 0) {
//       currentIndex--; // Swiped right
//     }

//     currentTranslateX = 0;
//     updateSlidePosition(); // Re-apply transition and snap to final position
//   }

//   // Bind Touch Events (Mobile)
//   track.addEventListener('touchstart', touchStart, { passive: true });
//   track.addEventListener('touchmove', touchMove, { passive: true });
//   track.addEventListener('touchend', touchEnd);

//   // Bind Mouse Events (Desktop)
//   track.addEventListener('mousedown', touchStart);
//   track.addEventListener('mousemove', touchMove);
//   track.addEventListener('mouseup', touchEnd);
//   track.addEventListener('mouseleave', () => { if (isDragging) touchEnd(); });

//   // Initialize first view
//   updateSlidePosition();
// });
// window.addEventListener('load', function() {
//   const track = document.getElementById('carouselTrack');
//   if (!track) return;

//   const slides = Array.from(track.querySelectorAll('.carousel-slide'));
//   const dots = document.querySelectorAll('.carousel-dots .dot');
//   const prevBtn = document.querySelector('.carousel-prev');
//   const nextBtn = document.querySelector('.carousel-next');
  
//   let currentIndex = 0;
//   let isDragging = false;
//   let startX = 0;
//   let currentTranslateX = 0;

//   function updateSlidePosition() {
//     track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
//     track.style.transform = `translateX(-${currentIndex * 100}%)`;
    
//     slides.forEach((slide, i) => {
//       const video = slide.querySelector('video');
//       if (video) {
//         if (i === currentIndex) {
//           // Force load and play safely
//           video.currentTime = 0;
//           var playPromise = video.play();
//           if (playPromise !== undefined) {
//             playPromise.catch(function(error) {
//               console.log("Autoplay prevented:", error);
//             });
//           }
//         } else {
//           video.pause();
//           video.currentTime = 0;
//         }
//       }
//     });

//     dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
//   }

//   function goToSlide(index) {
//     if (index < 0) index = slides.length - 1;
//     if (index >= slides.length) index = 0;
//     currentIndex = index;
//     updateSlidePosition();
//   }

//   // --- Click Listeners ---
//   if (nextBtn) nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
//   if (prevBtn) prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
//   dots.forEach((dot, i) => dot.addEventListener('click', () => goToSlide(i)));

//   // --- Touch & Drag Listeners ---
//   function getPositionX(e) {
//     return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
//   }

//   function touchStart(e) {
//     isDragging = true;
//     startX = getPositionX(e);
//     track.style.transition = 'none'; 
//   }

//   function touchMove(e) {
//     if (!isDragging) return;
//     const currentPosition = getPositionX(e);
//     currentTranslateX = currentPosition - startX;
//     const basePercentage = currentIndex * -100;
//     track.style.transform = `translateX(calc(${basePercentage}% + ${currentTranslateX}px))`;
//   }

//   function touchEnd() {
//     if (!isDragging) return;
//     isDragging = false;

//     if (currentTranslateX < -75 && currentIndex < slides.length - 1) {
//       currentIndex++;
//     } else if (currentTranslateX > 75 && currentIndex > 0) {
//       currentIndex--;
//     }

//     currentTranslateX = 0;
//     updateSlidePosition();
//   }

//   track.addEventListener('touchstart', touchStart, { passive: true });
//   track.addEventListener('touchmove', touchMove, { passive: true });
//   track.addEventListener('touchend', touchEnd);

//   track.addEventListener('mousedown', touchStart);
//   track.addEventListener('mousemove', touchMove);
//   track.addEventListener('mouseup', touchEnd);
//   track.addEventListener('mouseleave', () => { if (isDragging) touchEnd(); });

//   // Initialize view and trigger autoplay immediately on load
//   updateSlidePosition();
// });
// window.addEventListener('load', function () {

//     const track = document.getElementById('carouselTrack');

//     if (!track) return;

//     const slides = Array.from(
//         track.querySelectorAll('.carousel-slide')
//     );

//     const dots = document.querySelectorAll(
//         '.carousel-dots .dot'
//     );

//     const prevBtn = document.querySelector('.carousel-prev');
//     const nextBtn = document.querySelector('.carousel-next');

//     let currentIndex = 0;


//     // function showSlide(index) {

//     //     // Loop around
//     //     if (index < 0) {
//     //         index = slides.length - 1;
//     //     }

//     //     if (index >= slides.length) {
//     //         index = 0;
//     //     }

//     //     currentIndex = index;


//     //     // Move track
//     //     track.style.transform =
//     //         `translateX(-${currentIndex * 100}%)`;


//     //     // Update dots
//     //     dots.forEach(function (dot, i) {

//     //         dot.classList.toggle(
//     //             'active',
//     //             i === currentIndex
//     //         );

//     //     });

//     // }
// function showSlide(index) {

//     // Loop around
//     if (index < 0) {
//         index = slides.length - 1;
//     }

//     if (index >= slides.length) {
//         index = 0;
//     }

//     currentIndex = index;


//     // Play active video, pause others
//     slides.forEach(function (slide, i) {

//         const video = slide.querySelector('video');

//         if (video) {

//             if (i === currentIndex) {

//                 video.currentTime = 0;
//                 video.muted = true;
//                 video.playsInline = true;

//                 video.play().catch(function (error) {
//                     console.log("Video could not play:", error);
//                 });

//             } else {

//                 video.pause();
//                 video.currentTime = 0;

//             }

//         }

//     });


//     // Move track
//     track.style.transform =
//         `translateX(-${currentIndex * 100}%)`;


//     // Update dots
//     dots.forEach(function (dot, i) {

//         dot.classList.toggle(
//             'active',
//             i === currentIndex
//         );

//     });

// }

//     // NEXT
//     if (nextBtn) {

//         nextBtn.addEventListener('click', function () {

//             showSlide(currentIndex + 1);

//         });

//     }


//     // PREVIOUS
//     if (prevBtn) {

//         prevBtn.addEventListener('click', function () {

//             showSlide(currentIndex - 1);

//         });

//     }


//     // DOTS
//     dots.forEach(function (dot, index) {

//         dot.addEventListener('click', function () {

//             showSlide(index);

//         });

//     });


//     // Initial slide
//     const firstVideo = slides[0].querySelector('video');

   

// // showSlide(0);
//     showSlide(0);

// });

document.addEventListener('DOMContentLoaded', function () {

    const track = document.getElementById('carouselTrack');

    if (!track) {
        console.log('Carousel track not found');
        return;
    }

    const slides = Array.from(
        track.querySelectorAll('.carousel-slide')
    );

    const dots = document.querySelectorAll('.carousel-dots .dot');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');

    let currentIndex = 0;

    function showSlide(index) {

        if (index < 0) {
            index = slides.length - 1;
        }

        if (index >= slides.length) {
            index = 0;
        }

        currentIndex = index;

        slides.forEach(function (slide, i) {

            const video = slide.querySelector('video');

            if (!video) return;

            if (i === currentIndex) {

                video.muted = true;
                video.playsInline = true;

                video.play()
                    .then(function () {
                        console.log('Playing video:', i);
                    })
                    .catch(function (error) {
                        console.log('Play failed:', error);
                    });

            } else {

                video.pause();
            }
        });

        track.style.transform =
            'translateX(-' + (currentIndex * 100) + '%)';

        dots.forEach(function (dot, i) {
            dot.classList.toggle(
                'active',
                i === currentIndex
            );
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            showSlide(currentIndex + 1);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            showSlide(currentIndex - 1);
        });
    }

    dots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showSlide(index);
        });
    });

    // Start first slide
    showSlide(0);

});