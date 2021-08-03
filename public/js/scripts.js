
//Full Calendar initialization
if(document.getElementById('calendar')){
document.addEventListener('DOMContentLoaded', function(){
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    })
    calendar.render();
});
}

// Admin Datatables initialization
if(document.getElementById('admin_table')){
$(document).ready(function(){
    $('#admin_table').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "paging":true, "searching":true, "dom":"Bfrtip", "ordering":false,
        "pageLength":10, 
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    });
});
}

// Teacher Datatables initialization
if(document.getElementById('teacher_table')){
    $(document).ready(function(){
        $('#teacher_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":false,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }

    // Student Datatables initialization- not in use
if(document.getElementById('student_table')){
    $(document).ready(function(){
        $('#student_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":false,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }

     // Classes Datatables initialization
if(document.getElementById('class_list_table')){
    $(document).ready(function(){
        $('#class_list_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":false,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }

// Sections Datatables initialization
if(document.getElementById('section_list_table')){
    $(document).ready(function(){
        $('#section_list_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":true,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }

    // Examinstions Datatables initialization
if(document.getElementById('exam_list_table')){
    $(document).ready(function(){
        $('#exam_list_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":true,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }

    // Classes Datatables initialization
if(document.getElementById('subject_list_table')){
    $(document).ready(function(){
        $('#subject_list_table').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "paging":true, "searching":true, "dom":"Bfrtip", "ordering":true,
            "pageLength":10, 
          "buttons": ["copy", "excel", "pdf", "print","colvis"]
        });
    });
    }