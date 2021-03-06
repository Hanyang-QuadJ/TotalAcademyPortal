<script src="{{ asset('js/app.js') }}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(".selection").click(function (e) {
        var selected = this.innerText;
        $("#selected").html(selected);
    });
</script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/maximize-select2-height.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#student-table').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#teacher-table').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#course-table').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#semester-table').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#school-table').DataTable();
    } );
</script>
<script>
    $(document).ready(function () {
      var currentURL = (window.location.href).split('/');
      console.log(currentURL);
      $(".sidebar-nav li a").each(function() {
        if (this.href == "http://localhost:8000/" + currentURL[3]) {
            $(this).addClass("selected-nav");
        }
      });
    })
</script>
