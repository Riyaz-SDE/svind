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