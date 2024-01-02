$(document).ready(function() {
    $("#datatable").DataTable(), $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf", "colvis"],
    }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm")
});

$(document).ready(function() {
    $("#datatable1").DataTable(), $("#datatable-buttons1").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf", "colvis"],
    }).buttons().container().appendTo("#datatable-buttons_wrapper1 .col-md-6:eq(0)"), $(".dataTables_length1 select1").addClass("form-select1 form-select-sm1")
});