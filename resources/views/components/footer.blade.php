<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      {{$motto}}
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2021 <a href="/">SMS </a>.</strong> All rights reserved.
</footer>
 
@livewireScripts
<!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!--Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- AdminLTE -->
  <script src="/dist/js/adminlte.min.js"></script>
  <script src="/js/scripts.js"></script> 


  {{$slot}} 


  
        </div>
        

    </body>

</html>