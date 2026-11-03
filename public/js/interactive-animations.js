/**
 * INTERACTIVE ANIMATIONS ENGINE - KABUPATEN JENEPONTO
 * Lightweight, zero-dependency, smooth 60fps animations
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        initScrollProgressBar();
        initBackToTopButton();
        initScrollRevealEngine();
        initNumberCounter();
        initButtonRipples();
    });

    /**
     * 1. Top Scroll Reading Progress Bar
     */
    function initScrollProgressBar() {
        let bar = document.getElementById('scroll-progress-bar');
        if (!bar) {
            bar = document.createElement('div');
            bar.id = 'scroll-progress-bar';
            document.body.appendChild(bar);
        }

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            bar.style.width = Math.min(scrollPercent, 100) + '%';
        }, { passive: true });
    }

    /**
     * 2. Floating Back To Top Button
     */
    function initBackToTopButton() {
        let btn = document.getElementById('back-to-top-btn');
        if (!btn) {
            btn = document.createElement('button');
            btn.id = 'back-to-top-btn';
            btn.setAttribute('aria-label', 'Kembali ke atas');
            btn.setAttribute('title', 'Kembali ke atas');
            btn.innerHTML = '<i class="fas fa-chevron-up"></i>';
            document.body.appendChild(btn);
        }

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 350) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        }, { passive: true });

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * 3. Universal Scroll Reveal Observer
     */
    function initScrollRevealEngine() {
        // Auto-assign reveal to common content cards if not already set
        const autoTargets = document.querySelectorAll(
            'main section article, ' +
            'main .grid > div, ' +
            'section .grid > a, ' +
            'section .grid > div, ' +
            '.reveal, .reveal-card, [data-reveal]'
        );

        autoTargets.forEach((el, index) => {
            // Jangan terapkan pada elemen tersembunyi atau elemen yang terlalu kecil/spesifik
            if (el.closest('nav') || el.closest('footer') || el.closest('header') || el.classList.contains('swiper-slide')) {
                return;
            }

            if (!el.classList.contains('reveal') && !el.classList.contains('reveal-card')) {
                el.classList.add('reveal');
            }

            // Stagger sibling cards in a grid
            const parent = el.parentElement;
            if (parent && (parent.classList.contains('grid') || parent.classList.contains('space-y-10') || parent.classList.contains('space-y-6'))) {
                const siblingIndex = Array.prototype.indexOf.call(parent.children, el);
                const delay = ((siblingIndex % 6) + 1) * 80; // 80ms, 160ms, 240ms...
                el.style.transitionDelay = delay + 'ms';
            }
        });

        // IntersectionObserver for reveal animation
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -40px 0px',
            threshold: 0.08
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    entry.target.classList.add('active');
                    obs.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal, .reveal-card, [data-reveal]').forEach(el => {
            // Jika elemen sudah berada dalam viewport sejak awal, beri sedikit delay lalu tampilkan
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                setTimeout(() => {
                    el.classList.add('revealed');
                    el.classList.add('active');
                }, 50);
            } else {
                observer.observe(el);
            }
        });
    }

    /**
     * 4. Interactive Animated Number Counters
     */
    function initNumberCounter() {
        const counterElements = document.querySelectorAll(
            '[data-counter], #total, #today, #week, #month, #year'
        );

        if (!counterElements.length) return;

        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateValue(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        counterElements.forEach(el => counterObserver.observe(el));

        function animateValue(obj) {
            const text = obj.innerText.replace(/[^0-9]/g, '');
            const target = parseInt(text, 10);
            if (isNaN(target) || target <= 0) return;

            let start = 0;
            const duration = Math.min(1800, Math.max(800, target * 2));
            const startTime = performance.now();

            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out expo
                const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                const currentVal = Math.floor(easeProgress * target);

                obj.innerText = currentVal.toLocaleString('id-ID');

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    obj.innerText = target.toLocaleString('id-ID');
                }
            }

            requestAnimationFrame(updateCounter);
        }
    }

    /**
     * 5. Interactive Ripple Feedback on Action Buttons
     */
    function initButtonRipples() {
        const buttons = document.querySelectorAll('button, a.btn, a[class*="bg-teal"], a[class*="bg-blue"], a[class*="bg-red"]');
        buttons.forEach(btn => {
            btn.addEventListener('mousedown', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.35)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'rippleEffect 0.6s linear';
                ripple.style.pointerEvents = 'none';

                const computedPos = window.getComputedStyle(this).position;
                if (computedPos === 'static') {
                    this.style.position = 'relative';
                }
                this.style.overflow = 'hidden';

                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple keyframe if not exists
        if (!document.getElementById('ripple-style')) {
            const style = document.createElement('style');
            style.id = 'ripple-style';
            style.textContent = `@keyframes rippleEffect { to { transform: scale(4); opacity: 0; } }`;
            document.head.appendChild(style);
        }
    }
})();
