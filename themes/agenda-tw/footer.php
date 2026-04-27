            </div>
        </main>
    </div>

    <script src="<?= asset('theme/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= asset('theme/assets/vendor/libs/popper/popper.js') ?>"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset('theme/assets/js/datatables/datatables.min.js') ?>"></script>
    <script src="<?= asset('theme/assets/js/datatables/datatables.bootstrap5.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="<?= asset('theme/assets/js/datatables-pagingtype/full_numbers_no_ellipses.js') ?>"></script>

    <script>
        // Simple script for mobile sidebar toggle using custom classes
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }
    </script>
    <?php foot_script() ?>
</body>
</html>