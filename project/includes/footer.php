</div>
        <footer class="text-center" id="footer">
            &copy; Copyright 2017
        </footer>
        <!-- M O D A L -->



        <script>
            jQuery(window).scroll(function(){
                var vscroll = jQuery(this).scrollTop();
                jQuery('#logotext').css({
                    "transform": "translate(0px, "+vscroll/2+"px)"
                });
            });

            function detailsmodal(id) {
              var data = {"id" : id};
              jQuery.ajax({
                url: '/project/includes/detailsmodal.php',
                method: "post",
                data: data,
                success: function (data) {
                  jQuery('body').append(data);
                  jQuery('#details-modal').modal('toggle');
                },
                error: function () {
                  alert("error");
                }
              });
            }
        </script>
    </body>
</html>
