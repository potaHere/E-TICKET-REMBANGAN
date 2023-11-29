$(document).ready(function(){
    $('#dropdownMenuButton').change(function(){
        if($(this).val() != ""){
            $(this).find("option[value='']").remove();
        }
    });
});

$.ajax({
    url: 'getPrice.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        console.log(data);  // Cetak data yang dikembalikan oleh getPrice.php
        console.log(typeof data.transport.truk_bus);  // Cetak tipe data harga truk dan bus
        var hargaDewasa = data.people.dewasa;
        var hargaAnak = data.people.anak;
        var hargaMotor = data.transport.motor;
        var hargaMobil = data.transport.mobil;
        var hargaTrukBus = data.transport.truk_bis;

        document.querySelector('input[name="dewasa"]').addEventListener('input', hitungTotalHarga);
        document.querySelector('input[name="anak"]').addEventListener('input', hitungTotalHarga);
        document.querySelector('select[name="kendaraan"]').addEventListener('change', hitungTotalHarga);
        document.querySelector('input[name="kendaraan_qty"]').addEventListener('input', hitungTotalHarga);

        function hitungTotalHarga() {
            var jumlahDewasa = parseInt(document.querySelector('input[name="dewasa"]').value) || 0;
            var jumlahAnak = parseInt(document.querySelector('input[name="anak"]').value) || 0;
            var jenisKendaraan = document.querySelector('select[name="kendaraan"]').value;
            var jumlahKendaraan = parseInt(document.querySelector('input[name="kendaraan_qty"]').value) || 0;

            var totalHarga = jumlahDewasa * hargaDewasa + jumlahAnak * hargaAnak;
            if (jenisKendaraan == 'motor') {
                totalHarga += jumlahKendaraan * hargaMotor;
            } else if (jenisKendaraan == 'mobil') {
                totalHarga += jumlahKendaraan * hargaMobil;
            } else if (jenisKendaraan == 'truk&bus') {
                totalHarga += jumlahKendaraan * hargaTrukBus;
            }

            var totalHargaFormatted = totalHarga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

            document.querySelector('input[name="total_harga"]').value = totalHargaFormatted;
            document.querySelector('input[name="total_harga_int"]').value = totalHarga; // Untuk dikirim ke server
        }
    }
});

$('#pemesananForm').submit(function(e) {
    var totalPrice = calculateTotalPrice();  // Ganti ini dengan fungsi Anda sendiri
    $('#totalPrice').val(totalPrice);
});

