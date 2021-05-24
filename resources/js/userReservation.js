import { userReservation } from "./module/userReservation_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/user/reservation" || pathURL == "/user/reservation/") {
        userReservation.dataTable();
        userReservation.showReservation();
        $('#reload').on("click", function () {
            $("#table_reservation").DataTable().ajax.reload();
        })
    }
});
