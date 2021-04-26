import { handle } from "./handle_module";
class Room{

    dataTable(){
        handle.setup()
        $("#table_room").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/room",
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
                    data: "name",
                    name: "name",
                },
                {
                    data: "price",
                    name: "price",
                },
                {
                    data: "description",
                    name: "description",
                },
                {
                    data: "fasilitas",
                    name: "fasilitas",
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

export const room = new Room();
