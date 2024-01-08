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

$(function () {
    $("#invoiceDetailsTable").DataTable({
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
    }).buttons().container().appendTo('#invoiceDetailsTable_wrapper .col-md-6:eq(0)');
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
function fnDelete(id, route) {
   $('#myModal').modal('show');
   $('#openModal #myModal .modal-header').addClass('bg-danger');
   $('#openModal #myModal .modal-title').html('<i class="fa-solid fa-triangle-exclamation"></i>&nbsp; Предупреждение');
   $('#openModal #myModal .modal-body').html('\
      <blockquote style="border-color: #dc3545;">\
         <p style="color: #dc3545;">Вы уверены?<br>Хотите удалить данный элемент?</p>\
         <small>Примечание: <cite>Если вы нажмете «Да», этот элемент исчезнет из таблицы или базы данных.</cite></small>\
      </blockquote>\
   ');
   $('#openModal #myModal .modal-footer').html('\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>\
      <a href=" '+ route+'/' + id + '" class="btn btn-danger">Да,удалить</a>\
   ')
}

