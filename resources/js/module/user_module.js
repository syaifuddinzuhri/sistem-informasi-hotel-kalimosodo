import { handle } from "./handle_module";
class User{

    dataTable(){
        handle.setup()
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

}

export const user = new User();
