 $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var username = button.data('username');
    var modal = $(this);
    $.ajax({
        type: "get",
         url: "http://localhost/admin/fetch",
        dataType: "json",
         data: {
            "u" : username
          },
        success: function(data) {
            if(data.status == true) {
                modal.find('.modal-title').text('Editing ' + data.result.username);
                modal.find('.modal-body #username').val(data.result.username);
                modal.find('.modal-body #oldusername').val(data.result.username);
                modal.find('.modal-body #email').val(data.result.email);
                modal.find('.modal-body #rank').val(data.result.rank);
                modal.find('.modal-body #activated').val(data.result.activated);
                console.log(data);
            }else{
                console.log(data);
                modal.find('.modal-title').text("User not found");
            }
        },
        error: function(xhr) {
            alert("ERORR:" + xhr.statusText);
        }
    })
});

 $('#deleteUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('.modal-body #id').val(id);
});