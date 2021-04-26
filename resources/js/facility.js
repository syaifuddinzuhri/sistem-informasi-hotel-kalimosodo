import { facility } from "./module/facility_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/facility" || pathURL == "/admin/facility/") {

        $("#btn-add-facility").on("click", function(){
            $('#modal-title-facility').html("Add New Facility")
            $("#formFacility")[0].reset();
        })

        facility.dataTable();
        facility.storeFacility();
        facility.editFacility();
        facility.deleteFacility();
        // $("#sync-facility").on("click", function () {
        //     $("#tablefacility").DataTable().ajax.reload();
        // });
    }

});
