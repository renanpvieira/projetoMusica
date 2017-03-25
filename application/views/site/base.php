<!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Local</h3>
                        <p>Avenida borges de medeiros
                            <br>Rio de Janeiro, RJ 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociais</h3>
                        <ul class="list-inline">
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a></li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a></li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a></li>
                            <li><a href="https://blackrockdigital.github.io/startbootstrap-freelancer/#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Sobre o Toca pra mim</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com/">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright © www.tocapramim.com.br 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="https://blackrockdigital.github.io/startbootstrap-freelancer/#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
  

    <!-- jQuery -->
    <script src="<?php echo base_url('content/js/layout/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('content/js/layout/bootstrap.min.js'); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('content/js/layout/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?php echo base_url('content/js/layout/contact_me.js'); ?>"></script>


    <!-- Theme JavaScript -->
    <script src="<?php echo base_url('content/js/layout/freelancer.js'); ?>"></script>
    <script  src="<?php echo base_url('content/js/script.js'); ?>"  ></script>
    
    <script>
        function GeraSecurityForm(form){
             form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
             return form;
         }

         function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }
    </script>
    
    
    <?php
        if(isset($scriptsJs))
        {
           foreach($scriptsJs as $js)
           {
               echo '<script type="text/javascript" src="' . base_url('content/js/' . $js)  . '"></script>';
           }
        }
    ?>
</body>
</html>