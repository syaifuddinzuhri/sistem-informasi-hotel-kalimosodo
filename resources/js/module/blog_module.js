import { handle } from "./handle_module";
class Blog{

    dataTable(){
        handle.setup()
        $("#table_blog").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/blog",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
                },
                {
                    data: "image",
                    render: function (data) {
                        if (data != null) {
                            var img = `${APP_URL}/room/${data}`;
                            return (
                                '<img src="' +
                                img +
                                '" class="img-responsive" style="width: 100px"/>'
                            );
                        } else {
                            return "";
                        }
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "content",
                    name: "content",
                },
                {
                    data: "is_active",
                    name: "is_active",
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

    storeBlog() {
        handle.setup();
        let isActive = 0;
        $("#is_active").on("change", function () {
            $(this).is(":checked") ? (isActive = 1) : (isActive = 0);
        });
        $("#formAddBlog").validate({
            rules: {
                title: { required: true },
                content: { required: true },
                image: { required: true, extension: "jpg|jpeg|png" },
            },
            messages: {
                title: { required: "Judul blog tidak boleh kosong" },
                content: { required: "Konten blog tidak boleh kosong" },
                image: {
                    required: "Gambar tidak boleh kosong",
                    extension: "Format gambar harus berupa JPG|JPEG|PNG",
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
            submitHandler: function (e) {
                var image = $("#image")[0].files;
                if (image.length > 0) {
                    var fileExtension = ["jpeg", "jpg", "png"];
                    var getExtension = image[0]["name"]
                        .split(".")
                        .pop()
                        .toLowerCase();
                    var getSize = image[0]["size"];
                    if ($.inArray(getExtension, fileExtension) == -1) {
                        Swal.fire({
                            icon: "error",
                            title:
                                "Format gambar harus berupa " +
                                fileExtension.join(", "),
                        });
                    } else if (getSize > 5000000) {
                        Swal.fire({
                            icon: "error",
                            title: "Ukuran gambar maksimum 5MB",
                        });
                    } else {
                        var data = {
                            title: $("#title").val(),
                            content: $("#content").val(),
                            image: image,
                            is_active: isActive,
                        };
                        $.ajax({
                            type: "POST",
                            url: APP_URL + "/admin/blog",
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: data,
                            beforeSend: function () {
                                $("#formAddBlog .btn-loading").show();
                                $("#formAddBlog .btn-submit").hide();
                            },
                            success: function (res) {
                                console.log(res);
                                $("#formAddBlog .btn-loading").hide();
                                $("#formAddBlog .btn-submit").show();
                                $("#table_blog").DataTable().ajax.reload();
                                $("#formAddBlog")[0].reset();
                                $("#addBlogModal").modal("hide");
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                });
                            },
                            error: (e, x, settings, exception) => {
                                $("#formAddBlog .btn-loading").hide();
                                $("#formAddBlog .btn-submit").show();
                                handle.errorhandle(e, x, settings, exception);
                            },
                        });
                    }
                }
            },
        });
    }

}

export const blog = new Blog();
