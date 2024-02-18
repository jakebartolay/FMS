  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js" type="text/javascript"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js" type="text/javascript"></script>
  <script src="../assets/vendor/echarts/echarts.min.js" type="text/javascript"></script>
  <script src="../assets/vendor/quill/quill.min.js" type="text/javascript"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js" type="text/javascript"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js" type="text/javascript"></script>
  <script src="../assets/vendor/php-email-form/validate.js" type="text/javascript"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js" type="text/javascript"></script>
  {{-- <script src="../assets/js/index.js" type="text/javascript"></script> --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js" type="text/javascript"></script>

  <script>
      new DataTable('#example', {
          layout: {
              topStart: {
                  buttons: [{
                          extend: 'copy',
                          extend: 'csv',
                          extend: 'pdf',
                          extend: 'print',
                          exportOptions: {
                              columns: ':visible'
                          }
                      },
                      'colvis'
                  ]
              }
          },
      });
  </script>
