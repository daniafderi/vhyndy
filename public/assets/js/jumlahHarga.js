var harga_sparepart = document.getElementById('harga_sparepart'), harga_jual_sparepart = document.getElementById('harga_jual_sparepart'), harga_total = document.getElementById('harga_total'), harga_jasa = document.getElementById('harga_jasa'), jumlah_dibayar = document.getElementById('jumlah_sudah_dibayar'), jumlah_belum_dibayar = document.getElementById('jumlah_belum_dibayar'), total = 0, totalHarga = () => {
    total = parseInt(harga_jual_sparepart.value) + parseInt(harga_jasa.value)
    harga_total.value = total;
    jumlah_belum_dibayar.value = parseInt(total) - parseInt(jumlah_dibayar.value)
}