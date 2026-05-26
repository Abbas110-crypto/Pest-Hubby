(function () {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.primary-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.reveal').forEach(function (element) {
      observer.observe(element);
    });
  } else {
    document.querySelectorAll('.reveal').forEach(function (element) {
      element.classList.add('visible');
    });
  }

  document.querySelectorAll('[data-phone]').forEach(function (input) {
    input.addEventListener('input', function () {
      const digits = input.value.replace(/\D/g, '').slice(0, 10);
      const first = digits.slice(0, 3);
      const second = digits.slice(3, 6);
      const third = digits.slice(6, 10);
      input.value = third ? `(${first}) ${second}-${third}` : second ? `(${first}) ${second}` : first;
    });
  });

  document.querySelectorAll('.quote-form').forEach(function (form) {
    const steps = Array.from(form.querySelectorAll('.form-step'));
    const showStep = function (index) {
      steps.forEach(function (step, stepIndex) {
        step.classList.toggle('is-active', stepIndex === index);
      });
    };

    form.querySelectorAll('.next-step').forEach(function (button) {
      button.addEventListener('click', function () {
        const current = steps.findIndex(function (step) { return step.classList.contains('is-active'); });
        const fields = Array.from(steps[current].querySelectorAll('input, select, textarea'));
        const valid = fields.every(function (field) { return field.reportValidity(); });
        if (valid) {
          showStep(Math.min(current + 1, steps.length - 1));
        }
      });
    });

    form.querySelectorAll('.prev-step').forEach(function (button) {
      button.addEventListener('click', function () {
        const current = steps.findIndex(function (step) { return step.classList.contains('is-active'); });
        showStep(Math.max(current - 1, 0));
      });
    });
  });
})();
