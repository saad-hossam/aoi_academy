 <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
 <script>
            document.addEventListener('DOMContentLoaded', function () {
                // لما تضغط على أي dropdown-toggle
                var dropdownToggles = document.querySelectorAll('.navbar .dropdown-toggle');

                dropdownToggles.forEach(function(toggle) {
                    toggle.addEventListener('click', function(e) {
                        var parent = this.parentElement;

                        if (parent.classList.contains('dropdown-submenu') || parent.classList.contains('dropdown')) {
                            e.preventDefault(); // امنع التنقل لو فيه submenu

                            parent.classList.toggle('show');

                            // هات السب منيو اللي تحته وافتحه
                            var submenu = parent.querySelector('.dropdown-menu');
                            if (submenu) {
                                submenu.classList.toggle('show');
                            }
                        }
                    });
                });

                // لو ضغطت برا، اقفل أي منيو مفتوح
                document.addEventListener('click', function (e) {
                    if (!e.target.closest('.navbar')) {
                        document.querySelectorAll('.navbar .show').forEach(function (openDropdown) {
                            openDropdown.classList.remove('show');
                        });
                    }
                });
            });
            </script>



        <script>
            window.addEventListener('scroll', function() {
                var navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            </script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const typewriterElements = document.querySelectorAll('.typewriter');

    typewriterElements.forEach((element) => {
        const text = element.getAttribute('data-text');
        element.innerHTML = ''; // Clear initial content
        let index = 0;

        function type() {
            if (index < text.length) {
                element.innerHTML += text.charAt(index);
                index++;
                setTimeout(type, 100); // Adjust typing speed (100ms per character)
            }
        }

        type();
    });
});

</script>

@if (app()->getLocale() == 'ar')
    <script src="{{asset('js/rtl.js')}}"></script>

    @else
    <script src="{{asset('js/main.js')}}"></script>

    @endif
