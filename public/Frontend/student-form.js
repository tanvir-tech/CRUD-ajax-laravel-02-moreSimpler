



function addData() {


    var name = $('#name').val();

    $.ajax({
        datatype: 'json',
        data: { name: name },
        url: '/student/add',
        type: 'post',
        success: function (response) {
            console.log("Data stored :" + name);
            alldata();
            // Swal.fire(
            //     'Good job!',
            //     'New teacher added!',
            //     'success'
            // )
        },
        error: function (error) {
            $('#nameError').text(error.responseJSON.errors.name);
        }
    });




}


function alldata() {
    $.ajax({
        type: "GET",
        datatype: 'json',
        url: '/student/all',
        success: function (response) {
            // console.log(response);
            var data = "";
            $.each(response, function (key, value) {
                data = data + "<tr>";
                data = data + "<td>" + value.id + "</td>";
                data = data + "<td>" + value.Name + "</td>";
                data = data + "<td>" + "<button class='btn btn-danger' onclick='deleteStudent(" + value.id + ")'>Delete</button>"
                    + "<button class='btn btn-info' onclick='getvaluesToEdit(" + value.id + ")'>Edit</button>"
                    + "</td>";

                data = data + "<tr>";
            })
            $('tbody').html(data);
        }
    })
}

function deleteStudent(id) {
    $.ajax(
        {
            url: "student/delete/" + id,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE'
            },
            success: function () {
                alldata();
                console.log("deleted");
            }
        });
    console.log("failed to delete");
};

function getvaluesToEdit(id) {
    $.ajax({
        type: "GET",
        datatype: 'json',
        url: '/student/getvaluesToEdit/' + id,
        success: function (response) {
            $('#addHead').hide();
            $('#updateHead').show();
            $('#addButton').hide();
            $('#updateButton').show();
            $('#id').val(response.id);
            $('#name').val(response.Name);
        }
    })
}
function editData() {
    var id = $('#id').val();
    var name = $('#name').val();

    console.log(id +" = "+ name);

    $.ajax({
        type: "post",
        datatype: 'json',
        data: { name: name },
        url: '/student/update/' + id,
        success: function (response) {
            console.log('edit success'+response);
            // clearData();
            // alldata();
        },
        error: function (error) {
            console.log('edit failed');
            $('#nameError').text(error.responseJSON.errors.name);
        }
    })
}
