<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 50px;
}
</style>
</head>
<body>

<h2>laporan tahun {{ $tahun }}</h2>
<p>bulan {{ $bulan }}</p>
@foreach ($datar as $item)

<table>
  <tr>
    <th>kode peminjaman</th>
    <th>nama peminjam</th>
    <th>level</th>
    <th>nama barang</th>
    <th>jumlah</th>
    
    <th>persetujuan</th>
    <th>pengembalian</th>
  </tr>
      
  
  <tr>
    <td>{{ $item->kode_peminjaman }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->level }}</td>
    <td>{{ $item->nama_barang }}</td>
    <td>{{ $item->jumlah_pinjam }}</td>
    <td>{{ $item->nama_operator_menyetujui }}</td>
    <td>{{ $item->nama_operator_mengembalikan }}</td>
  </tr>
  <tr>
      <td colspan="7">
          <table border="0"> 
              <tr>
                  <td>pinjam</td>
                  <td>kembali</td>
                  <td>dikembalikan</td>
              </tr>
              <tr><td >{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->tanggal_dikembalikan }}</td></tr>
          </table>
      </td>
        
  </tr>
  <tr>
      <td colspan="7" style="background-color:blue;height:3px"></td>
  </tr>
</table>
@endforeach

</body>
</html>
