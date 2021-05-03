import { handle } from "./handle_module";
class User {
    dataTable() {
        handle.setup();
        $("#table_user").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/users",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "email",
                    name: "email",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "address",
                    name: "address",
                },
                {
                    data: "action",
                    name: "action",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    }

    deleteUser() {
        handle.setup();
        var id = "";
        $("#table_user").on("click", ".btn-delete-user", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteUser").on("submit", function (e) {
            var url = APP_URL + "/admin/user/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteUserModal .btn-loading").show();
                    $("#deleteUserModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteUserModal .btn-loading").hide();
                    $("#deleteUserModal .btn-submit").show();
                    if (res) {
                        $("#table_user").DataTable().ajax.reload();
                        $("#deleteUserModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteUserModal .btn-loading").hide();
                    $("#deleteUserModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const user = new User();
