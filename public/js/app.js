//Data Table
$(function () {
   $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [
         {
            extend: 'copyHtml5',
            exportOptions: {
               columns: [0, ':visible']
            }
         },
         'csv',
         {
            extend: 'excelHtml5',
            exportOptions: {
               columns: ':visible'
            }
         },
         {
            extend: 'pdfHtml5',
            exportOptions: {
               columns: [0, 1, 2, 5]
            }
         },
         'print',
         'colvis'
      ]
   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
   });
});


function fnShow(id, title, date) {
   $('#myModal').modal('show');
   $('#openModal #myModal .modal-title').text(date);
   $('#openModal #myModal .modal-body').html(title);
   $('#openModal #myModal .modal-footer').html('\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\
      <a href="/admin/edit/' + id + '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a>\
   ');
}
function fnDelete(id) {
   $('#myModal').modal('show');
   $('#openModal #myModal .modal-header').addClass('bg-danger');
   $('#openModal #myModal .modal-title').html('<i class="fa-solid fa-triangle-exclamation"></i>&nbsp; Warning');
   $('#openModal #myModal .modal-body').html('\
      <blockquote style="border-color: #dc3545;">\
         <p style="color: #dc3545;">Are you sure?<br>Do you want to delete this item?</p>\
         <small>Note: <cite>if you click yes, this item will disappear from the table or database.</cite></small>\
      </blockquote>\
   ');
   $('#openModal #myModal .modal-footer').html('\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>\
      <a href="/admin/destroy/' + id + '" class="btn btn-danger">Yes, Delete</a>\
   ')
}

