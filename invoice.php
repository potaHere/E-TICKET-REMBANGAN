<!DOCTYPE html>
<html>
<head>
	<!-- <title>Simple Invoice Template Design</title> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/invoice.css"> -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Redressed&family=Ubuntu:wght@400;700&display=swap");

:root {
  --bg-clr: #000000;
  --white: #fff;
  --primary-clr: #2f2929;
  --secondary-clr: #5265a7;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Ubuntu", sans-serif;
}

body {
  background: var(--bg-clr);
  font-size: 12px;
  line-height: 20px;
  color: var(--primary-clr);
  padding: 0 20px;
}

.invoice {
  width: 600px;
  max-width: 100%;
  height: auto;
  background: var(--white);
  padding: 50px 60px;
  position: relative;
  margin: 20px auto;
}

.w_15 {
  width: 15%;
}

.w_50 {
  width: 50%;
}

.w_55 {
  width: 55%;
}

.p_title {
  font-weight: 700;
  font-size: 14px;
}

.i_row {
  display: flex;
}

.text_right {
  text-align: right;
}

.invoice .header .i_row {
  justify-content: space-between;
  margin-bottom: 30px;
}

.invoice .header .i_row:last-child {
  align-items: flex-end;
}

/* Pengaturan dasar */
.invoice .header .i_row .i_logo h2 {
  font-family: "Redressed", cursive;
  text-align: center;
  font-size: 35px; /* Ukuran font dasar */
  word-wrap: break-word; /* Menggunakan word-wrap untuk memecah kata saat overflow */
  max-width: 100%; /* Menetapkan lebar maksimal elemen agar tidak overflow */
  color: var(--secondary-clr);
}

/* Media Query untuk layar kecil */
@media screen and (max-width: 600px) {
  .invoice .header .i_row .i_logo h2 {
    font-size: 30px; /* Ukuran font untuk layar kecil */
    color: var(--secondary-clr);
  }
}


.invoice .header .i_row .i_logo p,
.invoice .header .i_row .i_title h2 {
  font-size: 32px;
  line-height: 0;
  color: var(--secondary-clr);
  display: flexbox;
}

.invoice .header .i_row .i_address .p_title span {
  font-weight: 400;
  font-size: 12px;
  margin-top: 30px;
}

.invoice .header .i_row .i_number p{
  white-space: pre;
}

.invoice .body .i_table .i_col p {
  font-weight: 700;
}

.invoice .body .i_table .i_row .i_col {
  padding: 12px 5px;
}

.invoice .body .i_table .i_table_head .i_row {
  border: 2px solid;
  border-color: var(--primary-clr) transparent var(--primary-clr) transparent;
}

.invoice .body .i_table .i_table_body .i_row:last-child {
  border-bottom: 2px solid var(--primary-clr);
}

.invoice .body .i_table .i_table_foot .grand_total_wrap {
  margin-top: 20px;
}

.invoice .body .i_table .i_table_foot .grand_total_wrap .grand_total {
  background: var(--secondary-clr);
  color: var(--white);
  padding: 10px 15px;
}

.invoice .body .i_table .i_table_foot .grand_total_wrap .grand_total p {
  display: flex;
  justify-content: space-between;
}

.invoice .footer {
  margin-top: 30px;
  display: flex; /* Make the footer a flex container */
  justify-content: space-between; /* Distribute the space evenly between the children */
}
/* ... Kode CSS sebelumnya ... */
.footer #qr{
  width: 200px;
  height: 200px;
  margin-top: 20px;
  right: 1rem;
  align-self: center;
}
/* ... Kode CSS setelahnya ... */

  </style>
</head>
<body>

<section>
  <div class="invoice">
    <div class="header">
      <div class="i_row">
        <div class="i_logo">
          <h2>Tiket Masuk Wisata Rembangan</h2>
        </div>
        <div class="i_title">
          <br>
          <br>
          <p class="p_title text_right">
            <?php echo date("d/m/Y"); ?> 
          </p>
        </div>
      </div>
      <div class="i_row">
        <div class="i_number">
          <p class="p_title">NAMA			        : <php? ?></p>
          <p class="p_title">E-MAIL			        : <php? ?></p>
          <p class="p_title">TANGGAL MASUK	:<php? ?></p>
        </div>
      </div>
    </div>
    <div class="body">
      <div class="i_table">
        <div class="i_table_head">
          <div class="i_row">
            <div class="i_col w_15">
              <p class="p_title">JUMLAH</p>
            </div>
            <div class="i_col w_55">
              <p class="p_title">DESKRIPSI</p>
            </div>
            <div class="i_col w_15">
              <p class="p_title">HARGA</p>
            </div>
            <div class="i_col w_15">
              <p class="p_title">TOTAL</p>
            </div>
          </div>
        </div>
        <div class="i_table_body">
          <div class="i_row">
            <div class="i_col w_15">
              <p>3</p>
            </div>
            <div class="i_col w_55">
              <p>Dewasa</p>
            </div>
            <div class="i_col w_15">
              <p>10.000</p>
            </div>
            <div class="i_col w_15">
              <p>30.000</p>
            </div>
          </div>
          <div class="i_row">
            <div class="i_col w_15">
              <p>2</p>
            </div>
            <div class="i_col w_55">
              <p>Anak-Anak</p>
            </div>
            <div class="i_col w_15">
              <p>7.000</p>
            </div>
            <div class="i_col w_15">
              <p>14.000</p>
            </div>
          </div>
          <div class="i_row">
            <p class="p_title">KENDARAAN</p>
          </div>
          <div class="i_row">
            <div class="i_col w_15">
              <p>5</p>
            </div>
            <div class="i_col w_55">
              <p>Roda 2</p>
            </div>
            <div class="i_col w_15">
              <p>2000</p>
            </div>
            <div class="i_col w_15">
              <p>10.000</p>
            </div>
          </div>
        </div>
        <div class="i_table_foot">
          <div class="i_row">
            <div class="i_col w_15">
              <p></p>
            </div>
            <div class="i_col w_55">
              <p></p>
            </div>
            <!-- <div class="i_col w_15">
              <p>Sub Total</p>
            </div>
            <div class="i_col w_15">
              <p>54.000</p>
            </div> -->
          </div>
          <div class="i_row grand_total_wrap">
            <div class="i_col w_50">
            </div>
            <div class="i_col w_50 grand_total">
              <p><span>GRAND TOTAL:</span>
                <span>54000</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="i_row">
        <div class="i_col w_50">
          <p class="p_title">Terima Kasih<br></p>
          <p>telah mengunjungi Wisata Rembangan,
          Kami tunggu untuk kunjungan berikutnya</p>
        </div>
      </div>
      <dv class="i_row" id="qr">
        <img class="" src="qrcodes/WR2111236728.png" alt="">
        <!-- <div class="corner-box">Box</div> -->
      </dv>
    </div>
    
  </div>
  </div>
</section>
</body>
</html>