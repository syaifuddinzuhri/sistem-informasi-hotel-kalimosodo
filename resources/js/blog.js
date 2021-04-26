import { blog } from "./module/blog_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/blog" || pathURL == "/admin/blog/") {
        blog.dataTable();
    }

});
