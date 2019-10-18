$('#add_category').submit(function(){
    data = $('#name').val();
    url = $('#add_category').attr('action');
    $.post(url,{'name':data},function(response){
        
        if(response.match("true")){
            alert("Category Added Successfully");
            setTimeout(function(){
                location.reload();
                $("#categoryAddModal").modal("hide");
            },2000);
        }else{
            alert(response);
        }
    });
    return false;
});

$('#update_category').submit(function(){
    var name =  $("#name").val();
    var status = document.querySelector('input[name="status"]:checked').value;
    var data = {name : name, status : status};
    var url = $('#update_category').attr('action');
    $.post(url,data,function(response){
        if(response.match('1')){
            alert('Category Updated Successfully.');
            setTimeout(function(){
                window.location.href = BASE_URL+"school_ctrl/category";
                // console.log(window.location.href);
            },2000);
        }else{
            alert('Category Update Failed!!!');
        }
    });
    return false;
});


$('#add_class').submit(function(){
    var name = $('#name').val();
    var category_id = $("#category_id").val();
    var data = {name : name, category_id : category_id};
    url = $('#add_class').attr('action');
    $.post(url,data,function(response){
        console.log(response);
        if(response.match("true")){
            alert("Class Added Successfully");
            setTimeout(function(){
                location.reload();
                $("#classAddModal").modal("hide");
            },2000);
        }else{
            alert(response);
        }
    });
    return false;
});

$("#update_class").submit(function(){
    var name = $('#name').val();
    var status = document.querySelector('input[name="status"]:checked').value;
    var category_id = $('#category_id').val();
    var url = $("#update_class").attr('action');
    var data = {name:name,status:status,category_id:category_id};
    $.post(url,data,function(response){
        if(response.match('1')){
            alert("Class Updated Successfully");
            setTimeout(function(){
                window.location.href = BASE_URL+"school_ctrl/class";
            },2000);
        }else{
            alert("Class Update Failed!!!");
        }
    });
    return false;
});

$("#add_course").submit(function(){
    var name = $("#name").val();
    var duration = $("#duration").val();
    var fees = $("#fees").val();
    var start_at = $("#start_at").val();
    var url = $("#add_course").attr('action');
    var data = {name:name,duration:duration,fees:fees,start_at:start_at};
    $.post(url,data,function(response){
        if(response.match('true')){
            alert('Course added successfully');
            setTimeout(function(){
                location.reload();
            },2000);
        }else{
            alert("Course Add Failed!!!");
        }
    });
    return false;
});



$("#update_course").submit(function(){
    var name = $('#name').val();
    var status = document.querySelector('input[name="status"]:checked').value;
    var duration = $('#duration').val();
    var fees = $('#fees').val();
    var start_at = $('#start_at').val();
    var url = $("#update_course").attr('action');
    var data = {name:name,status:status,duration:duration,fees:fees,start_at:start_at};
    $.post(url,data,function(response){
        if(response.match('1')){
            alert("Class Updated Successfully");
            setTimeout(function(){
                window.location.href = BASE_URL+"school_ctrl/course";
            },2000);
        }else{
            alert("Class Update Failed!!!");
        }
    });
    return false;
});


$("#add_student").submit(function(){
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var category_id = $("#category_id").val();
    var class_id = $("#class_id").val();
    var dob = $("#dob").val();
    var join_date = $("#join_date").val();
    var url = $("#add_student").attr('action');
    var data = {name:name,email:email,phone:phone,category_id:category_id,class_id:class_id,dob:dob,join_date:join_date};
    $.post(url,data,function(response){
        if(response.match('true')){
            alert('Student Registered successfully');
            setTimeout(function(){
                location.reload();
            },2000);
        }else{
            alert("Student Registration Failed!!!");
        }
    });
    return false;
});


$("#update_student").submit(function(){
    
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var category_id = $("#category_id").val();
    var class_id = $("#class_id").val();
    var dob = $("#dob").val();
    var join_date = $("#join_date").val();
    var status = document.querySelector('input[name="status"]:checked').value;
    var url = $("#update_student").attr('action');
    var data = {name:name,email:email,phone:phone,category_id:category_id,class_id:class_id,dob:dob,join_date:join_date,status:status};
    $.post(url,data,function(response){
        if(response.match('1')){
            alert('Student Updated successfully');
            setTimeout(function(){
                window.location.href = BASE_URL+"student_ctrl/student";
            },2000);
        }else{
            alert("Student Registration Failed!!!");
        }
    });
    return false;
});



$("#add_staff").submit(function(){
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var dob = $("#dob").val();
    var experience = $("#experience").val();
    var payment = $("#payment").val();
    var details = $("#details").val();
    var join_date = $("#join_date").val();
    var url = $("#add_staff").attr('action');
    var data = {name:name,email:email,phone:phone,dob:dob,experience:experience,payment:payment,details:details,join_date:join_date};
    $.post(url,data,function(response){
        console.log(response);
        if(response.match('true')){
            alert('Staff Registered successfully');
            setTimeout(function(){
                location.reload();
            },2000);
        }else{
            alert("Staff Registration Failed!!!");
        }
    });
    return false;
});



$("#update_staff").submit(function(){
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var dob = $("#dob").val();
    var experience = $("#experience").val();
    var payment = $("#payment").val();
    var details = $("#details").val();
    var join_date = $("#join_date").val();
    var url = $("#add_staff").attr('action');
    var status = document.querySelector('input[name="status"]:checked').value;
    var url = $("#update_staff").attr('action');
    var data = {name:name,email:email,phone:phone,dob:dob,experience:experience,payment:payment,details:details,join_date:join_date,status:status};
    $.post(url,data,function(response){
        if(response.match('1')){
            alert('Staff Updated successfully');
            setTimeout(function(){
                window.location.href = BASE_URL+"staff_ctrl/staff";
            },2000);
        }else{
            alert("Staff Registration Failed!!!");
        }
    });
    return false;
});


$("#take_attendence").submit(function(){
   
        var status = $("#status").val();
        var date = $("#date").val();
        var remark = $("#remark").val();
        var student_id = $('#student_id').val();
        var url = $("#take_attendence").attr('action');
        var data = {status:status,date:date,remark:remark,student_id:student_id};
        $.post(url,data,function(response){
            if(response.match('true')){
                alert('Attdendence Taken successfully');
                setTimeout(function(){
                    location.reload();
                },2000);
            }else{
                alert("Attendence Failed!!!");
            }
        });
        return false;
  
});



$("#update_attendence").submit(function(){
    var student_id = $("#student_id").val();
    var date = $("#date").val();
    var status =  document.querySelector('input[name="status"]:checked').value;
    var remark = $("#remark").val();
    var url = $("#update_attendence").attr('action');
    var data = {date:date,status:status,remark:remark};
    $.post(url,data,function(response){
        console.log(response);
        if(response.match('1')){
            alert('Attendence Updated successfully');
            setTimeout(function(){
                window.location.href = BASE_URL+"attendence_ctrl/show_student/"+student_id;
            },2000);
        }else{
            alert("Attendence Update Failed!!!");
        }
    });
    return false;
});



$("#add_exam").submit(function(){
    var name = $("#name").val();
    var start_date = $("#start_date").val();
    var category_id = $("#category_id").val();
    var class_id = $("#class_id").val();
    var url = $("#add_exam").attr('action');
    var data = {name:name,start_date:start_date,category_id:category_id,class_id:class_id};
    console.log(data);
    $.post(url,data,function(response){
        console.log(response);
        if(response.match('true')){
            alert('Staff Registered successfully');
            setTimeout(function(){
                location.reload();
            },2000);
        }else{
            alert("Staff Registration Failed!!!");
        }
    });
    return false;
});


$("#update_exam").submit(function(){
    var name = $("#name").val();
    var start_date = $("#start_date").val();
    var category_id = $("#category_id").val();
    var class_id = $("#class_id").val();
    var url = $("#update_exam").attr('action');
    var data = {name:name,start_date:start_date,category_id:category_id,class_id:class_id};
    $.post(url,data,function(response){
        console.log(response);
        if(response.match('1')){
            alert('Exam Updated successfully');
            setTimeout(function(){
                window.location.href = BASE_URL+"exam_ctrl/exam/";
            },2000);
        }else{
            alert("Attendence Update Failed!!!");
        }
    });
    return false;
});


    $("#add_time_table").submit(function(){
        url = $('#add_time_table').attr('action');
    exam_id = $("#exam_id").val();
    $time_table_file = new FormData(this);
    data = {exam_id:exam_id,time_table_file:time_table_file};
    $.post(url,data,function(response){
       
            alert('Time Table Uploaded successfully');
            
    });
        return false;
    });


    $("#update_time_table").submit(function(){
        url = $('#update_time_table').attr('action');
    exam_id = $("#exam_id").val();
    $tt_file = $("#time_table_file").val();
    $time_table_file = new FormData(this);
    if($tt_file){
        data = {exam_id:exam_id,time_table_file:time_table_file};
    }else{
        data = {exam_id:exam_id};
    }
    
    $.post(url,data,function(response){
            console.log(response);
            if(response.match('test')){
                window.location.href=BASE_URL+"exam_ctrl/time_table";
            alert('Time Table Uploaded successfully');
            }
            
            
    });
        return false;
    });

    function get_student(id){
        if(id){
        var url = BASE_URL+"result_ctrl/get_students/"+id;
            $.ajax({
                type : 'post',
                url : url,
                dataType : 'json',
                success : function(response){
                    console.log(response);
                   var student_count = response['students'].length;
                   var exam_count = response['exams'].length;
                   var return_data = `<option value="" disabled selected>Select Student</option>`;
                   for(var i = 0; i < student_count; i++){
                        return_data += `
                            
                            <option value = "${response['students'][i].id}">${response['students'][i].name}</option>
                        `;
                   }
                   var data = return_data;
                   $("#student_id").html(data);

                   var html = `<option value="" disabled selected>Select Exam</option>`;
                   for(var i = 0; i < exam_count; i++){
                    html += `
                            
                            <option value = "${response['exams'][i].id}">${response['exams'][i].name}</option>
                        `;
                   }
                   var test = html;
                   $("#exam_id").html(test);
                }
            });
        }
    }

// add result 
    $("#add_result").submit(function(){
        var student_id = $("#student_id").val();
        var grade = $("#grade").val();
        var exam_id = $("#exam_id").val();
        var url = $("#add_result").attr('action');
        var data = {student_id:student_id,grade:grade,exam_id:exam_id};
        console.log(data);
        $.post(url,data,function(response){
            console.log(response);
            if(response.match('true')){
                alert('Result Created successfully');
                setTimeout(function(){
                    location.reload();
                },2000);
            }else{
                alert("Result Create Failed!!!");
            }
        });
        return false;
    });

// update result 
$("#update_result").submit(function(){
    var student_id = $("#student_id").val();
    var exam_id = $("#exam_id").val();
    var grade = $("#grade").val();
    var status =  document.querySelector('input[name="status"]:checked').value;
    var url = $("#update_result").attr('action');
    var data = {student_id:student_id,exam_id:exam_id,grade:grade,status:status};
    $.post(url,data,function(response){
        console.log(response);
        if(response.match('1')){
            alert('Result Updated successfully');
            setTimeout(function(){
                window.location.href = BASE_URL+"result_ctrl/result/";
            },2000);
        }else{
            alert("Result Update Failed!!!");
        }
    });
    return false;
});

  






