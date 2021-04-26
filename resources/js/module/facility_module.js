import { handle } from "./handle_module";
class Facility{

    dataTable(){
        handle.setup()
        $("#table_facility").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/data-facility",
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
                    data: "description",
                    name: "description",
                },
                {
                    data: "is_active",
                    render: function (data) {
                        if (data == 1) {
                            return "<span class='badge bg-light-success'>Active</span>"
                        } else {
                            return "<span class='badge bg-light-danger'>Non Active</span>";
                        }
                    },
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

    storeFacility() {
        handle.setup();
        var isActive = 0;
        $("#is_active").on('change', function() {
            if ($(this).is(':checked')) {
                isActive = 1;
            }
        });
        $("#formFacility").validate({
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Nama fasilitas tidak boleh kosong",
                },
                description: {
                    required: "Deskripsi tidak boleh kosong",
                },
            },
            errorElement: "span",
            errorPlacement: (error, element) => {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass("is-invalid");
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function () {
                var data = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    is_active: isActive
                };
                $.ajax({
                    type: "POST",
                    url: APP_URL + "/admin/facility",
                    data: data,
                    beforeSend: function () {
                        $(
                            "#formFacility .btn-loading"
                        ).show();
                        $(
                            "#formFacility .btn-submit"
                        ).hide();
                    },
                    success: function (res) {
                        $(
                            "#formFacility .btn-loading"
                        ).hide();
                        $(
                            "#formFacility .btn-submit"
                        ).show();
                        $("#table_facility").DataTable().ajax.reload();
                        $("#formFacility")[0].reset();
                        $("#facilityModal").modal("hide")
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    },
                    error: (e, x, settings, exception) => {
                        $(
                            "#formFacility .btn-loading"
                        ).hide();
                        $(
                            "#formFacility .btn-submit"
                        ).show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    editFacility() {
        handle.setup();

        var id = "";
        $("#table_facility").on("click", ".btn-edit-facility", function () {
            $('#modal-title-facility').html("Edit Facility")
            id = $(this).attr('data-id');
            $.get(`${APP_URL}/admin/facility/${id}/edit`, function(res){
                $("#name").val(res.data.name);
                $("#description").val(res.data.description);
                res.data.is_active == 1 ? $("#is_active").attr("checked", true) : $("#is_active").attr("checked", false);
            })
        });

        var isActive = 0;
        $("#is_active").on('change', function() {
            if ($(this).is(':checked')) {
                isActive = 1;
            }
        });

        $("#formFacility").validate({
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Nama fasilitas tidak boleh kosong",
                },
                description: {
                    required: "Deskripsi tidak boleh kosong",
                },
            },
            errorElement: "span",
            errorPlacement: (error, element) => {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass("is-invalid");
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function () {
                var data = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    is_active: isActive
                };
                $.ajax({
                    type: "PUT",
                    url: APP_URL + "/admin/facility/" + id,
                    data: data,
                    beforeSend: function () {
                        $(
                            "#formFacility .btn-loading"
                        ).show();
                        $(
                            "#formFacility .btn-submit"
                        ).hide();
                    },
                    success: function (res) {
                        $(
                            "#formFacility .btn-loading"
                        ).hide();
                        $(
                            "#formFacility .btn-submit"
                        ).show();
                        $("#table_facility").DataTable().ajax.reload();
                        $("#formFacility")[0].reset();
                        $("#facilityModal").modal("hide")
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    },
                    error: (e, x, settings, exception) => {
                        $(
                            "#formFacility .btn-loading"
                        ).hide();
                        $(
                            "#formFacility .btn-submit"
                        ).show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    deleteFacility() {
        handle.setup();
        var id = "";
        $("#table_facility").on("click", ".btn-delete-facility", function () {
            id = $(this).attr('data-id');
        });
        $("#formDeleteFacility").on("submit", function (e) {
            var url = APP_URL + "/admin/facility/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteFacilityModal .btn-loading").show();
                    $("#deleteFacilityModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteFacilityModal .btn-loading").hide();
                    $("#deleteFacilityModal .btn-submit").show();
                    if (res) {
                        $("#table_facility").DataTable().ajax.reload();
                        $("#deleteFacilityModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteFacilityModal .btn-loading").hide();
                    $("#deleteFacilityModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }

}

export const facility = new Facility();
