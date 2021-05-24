import { reservation } from "./module/reservation_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/reservation" || pathURL == "/admin/reservation/") {
        reservation.dataTable();
        reservation.editStatus();
        reservation.showReservation();
    }

    function parseDate(str) {
        var mdy = str.split('-');
        return new Date(mdy[0], mdy[1] - 1, mdy[2]);
    }

    function datediff(first, second) {
        return Math.round((second - first) / (1000 * 60 * 60 * 24));
    }

    if (splitURL.pop() == "create") {


        var price = '';
        var day = '';
        var cinValue = '';
        var coutValue = '';
        var guest = '';

        function cout(cout2) {
            return coutValue = cout2;
        }

        function cin(cin2) {
            return cinValue = cin2;
        }

        function getDays(cin, cout) {
            return datediff(parseDate(cin), parseDate(cout));
        }

        $('#room_type_id').on('change', function () {
            var id = this.value;
            $('#room_id').children('option:not(:first)').remove();
            $.get(`${APP_URL}/api/room-by-type/${id}`, function (res) {
                res.data.forEach(el => {
                    $('#room_id').append(`<option value=${el.id}>${el.name}</option>`)
                });
            })
            $('#set-price').val(0)
        });

        $('#check_in').on('change', function () {
            cin(this.value)
            day = getDays(cinValue, coutValue)
            $('#set-price').val(setPrice(day, $('#price2').val(), guest))
        });
        $('#check_out').on('change', function () {
            cout(this.value)
            day = getDays(cinValue, coutValue)
            $('#set-price').val(setPrice(day, $('#price2').val(), guest))
        });

        $('#room_id').on('change', function () {
            var idr = this.value;
            $.get(`${APP_URL}/api/get-price-room/${idr}`, function (res) {
                $('#price2').val(res.data[0])
                $('#set-price').val(setPrice(day, $('#price2').val(), guest))
            })
        })

        $('#guest').on('change', function () {
            guest = this.value;
            $('#set-price').val(setPrice(day, $('#price2').val(), guest))
        })

        function setPrice(days, price, guest) {
            return days * price * guest;
        }
    }





});
