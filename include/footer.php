<footer class="footer py-5 bg-black text-white">
    <div class="container py-4">
        <div class="row gy-5">
            <!-- Brand -->
            <div class="col-lg-4">
                <h5 class="mb-4" style="letter-spacing: 2px;">MY<span class="text-gold">CHAUFFEUR</span></h5>
                <p class="text-white-50" style="max-width: 280px; line-height: 1.6;">Precision transport assets for high-profile operations. Defining the standard of luxury and security since 2015.</p>
            </div>

            <!-- Links -->
            <div class="col-lg-4">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Governance</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Privacy Policy</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Terms of Fleet Usage</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Corporate Security</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-4">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Operation Center</h6>
                <p class="h4 text-white mb-2">+1 (555) 019-2834</p>
                <p class="text-white-50">support@mychauffeur.com</p>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-5 pt-4 border-top border-dark text-center">
            <p class="text-white-50 small" style="letter-spacing: 1px;">&copy; 2026 MyChauffeur Operations. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('navToggle').addEventListener('click', function() {
        this.classList.toggle('active');
        document.getElementById('mainListDiv').classList.toggle('active');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script
    src="https://code.jquery.com/jquery-4.0.0.slim.js"
    integrity="sha256-M+GjhMBfXikM1izMplICCTscIj5hzPCp6uDzaypxtgg="
    crossorigin="anonymous"></script>

<script type="text/javascript">
    $('.navTrigger').click(function() {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });
</script>


<script>
    document.getElementById('navToggle').addEventListener('click', function() {
        this.classList.toggle('active');
        document.getElementById('mainListDiv').classList.toggle('active');
    });
</script>
<!-- COUNTERS SCRIPT -->
<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.stat-number');
        const progressCircles = document.querySelectorAll('.progress-ring-fill');

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCounter();
            });

            // Animate progress circles
            progressCircles.forEach(circle => {
                const target = +circle.getAttribute('data-target');
                const maxTarget = 120;
                const percentage = target / maxTarget;
                const circumference = 339.292;
                const offset = circumference - (percentage * circumference);

                setTimeout(() => {
                    circle.style.strokeDashoffset = offset;
                }, 100);
            });
        };

        // Trigger animation when section is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>


<!-- FAQS SCRIPT -->
<script>
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;

            // Agar pehle se active hai toh close kar do, varna open
            if (faqItem.classList.contains('active-faq')) {
                faqItem.classList.remove('active-faq');
                console.log("0");
            } else {
                // console.log("1");
                // Baqi sab items se active class hata do (taake sirf ek khula rahe)
                document.querySelectorAll('.faq-item').forEach(item => item.classList.remove('active-faq'));
                faqItem.classList.add('active-faq');
            }
        });
    });
</script>
</body>

</html>