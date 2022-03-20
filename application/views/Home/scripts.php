


<!-- Plugins -->
<script src="<?php echo base_url('assets/js/plugins.js');?>"></script>

 <!-- Main JS -->
<script src="<?php echo base_url('assets/js/main.js');?>"></script>
<script >
  // ===== Scroll to Top ==== 
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function () {      // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0                       // Scroll to top of body
            }, 500);
        });
        
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>

$(document).ready(function () {
  AOS.init();
});
</script>


</body>

<!-- Mirrored from themebeer.com/html/trade/homepage-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Mar 2020 12:39:05 GMT -->
</html>