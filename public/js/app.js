$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).off('change', '#schedule-user-select').on('change', '#schedule-user-select', function (e) {
        e.preventDefault();
        var subjectOpt = '';
        var grade = $('#schedule-add-form input[name="grade_id"]').val();
        var section = $('#schedule-add-form input[name="section_id"]').val();
        var user = $('#schedule-add-form select[name="user_id"]').val();

        // Close other selection
        $('#schedule-subject-select-container').prop('style', 'display:none');
        $('#schedule-time-select-container').prop('style', 'display:none');
        $('#schedule-day-select-container').prop('style', 'display:none');
        $('#add-schedule-form-submit').prop('style', 'display:none');

        data = {
            grade_id : grade,
            section_id : section,
            user_id : user,
        }

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url:'/get-available-subject',
            success:function(data){
                if (data.success) {
                    console.log(data.subject);
                    subjectOpt = '<option label="&nbsp;">&nbsp;</option>';
                    $.each(data.subject, function (index, value) {
                        subjectOpt += '<option value="'+value.id+'">'+value.name+'</option>'
                        console.log('Index : ' + index)
                        console.log('Value : ' + value.name)
                    })
                    $('#schedule-add-form select[name="subject_id"]').html(subjectOpt);
                
                    $('#schedule-subject-select-container').prop('style', 'display:block');
                }
            }
        });
    })

    $(document).off('change', '#schedule-subject-select').on('change', '#schedule-subject-select', function (e) {
        e.preventDefault();
        var timeOpt = '';
        var grade = $('#schedule-add-form input[name="grade_id"]').val();
        var section = $('#schedule-add-form input[name="section_id"]').val();
        var user = $('#schedule-add-form select[name="user_id"]').val();
        var subject = $('#schedule-add-form select[name="subject_id"]').val();

        // Close other selection
        $('#schedule-time-select-container').prop('style', 'display:none');
        $('#schedule-day-select-container').prop('style', 'display:none');
        $('#add-schedule-form-submit').prop('style', 'display:none');


        data = {
            grade_id : grade,
            section_id : section,
            user_id : user,
            subject_id : subject,
        }

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url:'/get-available-time',
            success:function(data){
                if (data.success) {
                    console.log(data.time);
                    timeOpt = '<option label="&nbsp;">&nbsp;</option>';
                    $.each(data.time, function (index, value) {
                        timeOpt += '<option value="'+index+'">'+value+'</option>'
                    })
                    $('#schedule-add-form select[name="time_id"]').html(timeOpt);

                    $('#schedule-time-select-container').prop('style', 'display:block');
                }
            }
        });
    })

    $(document).off('change', '#schedule-time-select').on('change', '#schedule-time-select', function (e) {
        e.preventDefault();
        var dayOpt = '';
        var grade = $('#schedule-add-form input[name="grade_id"]').val();
        var section = $('#schedule-add-form input[name="section_id"]').val();
        var user = $('#schedule-add-form select[name="user_id"]').val();
        var subject = $('#schedule-add-form select[name="subject_id"]').val();
        var time = $('#schedule-add-form select[name="time_id"]').val();

        // Close other selection
        $('#schedule-day-select-container').prop('style', 'display:none');
        $('#add-schedule-form-submit').prop('style', 'display:none');


        data = {
            grade_id : grade,
            section_id : section,
            user_id : user,
            subject_id : subject,
            time_id : time,
        }

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url:'/get-available-day',
            success:function(data){
                if (data.success) {
                    console.log(data.day);
                    dayOpt = '<option label="&nbsp;">&nbsp;</option>';
                    $.each(data.day, function (index, value) {
                        dayOpt += '<option value="'+index+'">'+value+'</option>'
                    })
                    $('#schedule-add-form select[name="day_id[]"]').html(dayOpt);

                    $('#schedule-day-select-container').prop('style', 'display:block');
                }
            }
        });
    })

    $(document).off('change', '#schedule-day-select').on('change', '#schedule-day-select', function (e) {
        e.preventDefault();
        var day = $(this).val();

        if (day !== '') {
            $('#add-schedule-form-submit').prop('style', 'display:block');
        }
    })

    $(document).on('submit', '#student-add-form', function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url:'/student',
            success:function(data){
                if (data.success) {
                    console.log(data.success);
                    $('#student-add-form-error').prop('style', 'display:none');
                    $('#student-add-form-success').html(data.message);
                    $('#student-add-form').trigger('reset');
                }else{
                    console.log(data.errors);
                    var formErrors = '';
                    $.each(data.errors, function (index, value) {
                        formErrors += value + '</br>';
                    })

                    $('#student-add-form-error').html(formErrors);
                    $('#student-add-form-error').prop('style', 'display:block');
                }
            }
        });

    })

    $(document).on('submit', '#student-edit-form', function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url : $(this).attr('action'),
            success:function(data){
                if (data.success) {
                    console.log(data.success);
                    window.location.reload();
                    $('#student-edit-form-error').prop('style', 'display:none');
                    alert(data.message);
                    // $('#student-edit-form-success').html(data.message);
                    // $('#student-edit-form-success').prop('style', 'display:block');
                    // $('#student-edit-form').trigger('reset');
                }else{
                    console.log(data.errors);
                    var formErrors = '';
                    $.each(data.errors, function (index, value) {
                        formErrors += value + '</br>';
                    })

                    $('#student-edit-form-error').html(formErrors);
                    $('#student-edit-form-error').prop('style', 'display:block');
                }
            }
        });

    })


    $(document).on('submit', '#schedule-add-form', function (e) {
        e.preventDefault();
        $('#schedule-add-form-success', '#schedule-add-form-error').prop('style', 'display:none');

        var data = $(this).serialize();

        $.ajax({
            type:'POST',
            data : data,
            dataType: 'JSON',
            url:'/schedule',
            success:function(data){
                if (data.success) {
                    //window.reload();
                    $('#schedule-add-form-success').html('Schedule added!');
                    $('#schedule-add-form-success').prop('style', 'display:block');
                    $('#schedule-add-form-error').prop('style', 'display:none');
                    $('#schedule-subject-select-container').prop('style', 'display:none');
                    $('#schedule-time-select-container').prop('style', 'display:none');
                    $('#schedule-day-select-container').prop('style', 'display:none');
                    $('#add-schedule-form-submit').prop('style', 'display:none');
                    $('#schedule-add-form').trigger('reset');
                }else{
                    console.log(data.errors);
                    var formErrors = '';
                    $.each(data.errors, function (index, value) {
                        formErrors += value;
                    })

                    $('#schedule-add-form-error').html(formErrors);
                    $('#schedule-add-form-error').prop('style', 'display:block');
                }
            }
        });

    })

    $('#gradeSelected').change(function (e) {
        e.preventDefault();

        var sectionField = '';

        data = {
            id : $(this).val()
        }

        $.ajax({
            type:'GET',
            data : data,
            url:'get-section',
            success:function(data){
                if (data.success) {
                    $.each(data.section, function (index, value) {
                        sectionField += '<option value="'+value.id+'">'+value.section+'</option>'
                    })
                    $('#sectionSelected').append(sectionField);
                }
            }
        });
    })

    $('#schedule-filter-submit').click(function (e) {
        var grade = $('#gradeSelected').val();
        var section = $('#sectionSelected').val();

        if (grade == '' || section == '') {
            alert('Please complete the filter fields');
            return;
        }

        window.location.href = '/schedule?grade='+grade+'&section='+section;
    })

    $('#students-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'students-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'lrn', name: 'lrn' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'users-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#subjects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'subjects-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'grade', name: 'grade' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#section-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'sections-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'section', name: 'section' },
            { data: 'grade', name: 'grade' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#schoolyear-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'schoolyears-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'year', name: 'year' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#grades-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'grades-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' }
        ]
    });

    $('#users-groups-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'users-groups-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'action', name: 'action' }
        ]
    });

    $(document).on('blur', '#name', function(e) {
        e.preventDefault();
        var slug = $('#slug').val();
        var name = $(this).val();
        if (slug == '') {
            slug = name.replace(/\s+/g, '-').toLowerCase();
        }
    
        $('#slug').val(slug);
    })

    $('button').click(function() {
        if($(this).data('url')){
            console.log($(this).data('url'));
            window.location.href = $(this).data('url');
        }
    })

    $('#delete-btn').click(function() {
        var r = confirm("Are you sure you want to delete this data?");
        if (r == true) {
            $('#delete-data-form').submit();
        }
    })

    $('.btn-container').hide();
    $('#image-upload').on('change', function (e) {
        e.preventDefault();
        var r = confirm("Are you sure you want to upload this photo?");

        //alert($(this).val());
        if($(this).val() == ''){
            alert('No image file selected');
        }else{
            if (r == true) {
                $('#image-upload-form').submit();
            }
        }
    })

});

// function getCurrentSection() {
//     var url_string = window.location.href; //window.location.href
//     var url = new URL(url_string);
//     var c = url.searchParams.get("section");
//     console.log('section : '+c);
// }