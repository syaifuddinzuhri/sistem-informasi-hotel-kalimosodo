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
                    name: "image",
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
                    data: "status",
                    name: "status",
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

}

export const blog = new Blog();
