import { room } from "./module/room_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/room" || pathURL == "/admin/room/") {
        room.dataTable();
        // room.getRoomType();
        // room.storeRoom();
    }
});
