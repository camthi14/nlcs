<footer class="main-footer text-center">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">CamThi.io</a>.</strong>
</footer>

</div>



<script src="<?php echo _PUBLIC . '/admin/plugins/jquery/jquery.min.js' ?>"></script>
<script src="<?php echo _PUBLIC . '/admin/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo _PUBLIC . '/admin/dist/js/pages/dashboard.js' ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo _PUBLIC . '/client/assets/js/validator.js' ?>"></script>

<?php if (isset($data['js'])) : ?>
    <?php foreach ($data['js'] as $js) : ?>
        <script src="<?= $this->getJs($js, 'admin') ?>"></script>
    <?php endforeach ?>
<?php endif ?>

<script>
    setTimeout(function() {
        document.getElementById("toast-success")?.classList.add("hidden");
    }, 1500);
</script>
</body>

</html>