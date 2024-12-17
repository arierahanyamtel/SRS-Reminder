
                
                </div>
              </div>
            </div>
          
          </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Akuari 2024. All rights
              reserved.</span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= BASE_URL ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->


  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= BASE_URL ?>js/off-canvas.js"></script>
  <script src="<?= BASE_URL ?>js/hoverable-collapse.js"></script>
  <script src="<?= BASE_URL ?>js/template.js"></script>
  <script src="<?= BASE_URL ?>js/settings.js"></script>
  <script src="<?= BASE_URL ?>js/todolist.js"></script>
  <!-- endinject -->
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>
  <!-- Custom js for this page-->
  <script src="<?= BASE_URL ?>js/dashboard.js"></script>
  <script src="<?= BASE_URL ?>js/Chart.roundedBarCharts.js"></script>
  <script>
$(document).ready(function() {
    // Apply DataTables to the table
    $('#assetTable').DataTable({
        "ordering": true, // Enable sorting
        "paging": true,   // Enable pagination
        "searching": true // Enable search
    });
});
</script>
 
</body>

</html>