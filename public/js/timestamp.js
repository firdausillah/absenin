    // Function ini dijalankan ketika Halaman ini dibuka pada browser
        $(function() {
        setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
        });

        // Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
        function timestamp() {
        $.ajax({
            url: 'http://127.0.0.1:8000/timestamp_ajax.php',
            success: function (data) {
                $('#timestamp').html(data);
            },
        });
        }