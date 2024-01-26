@php
$Konversi = new \App\Helpers\Konversi; //panggil no static function
$Tanggal = new \App\Helpers\Tanggal; //panggil no static function

@endphp
<table>
    <tbody>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">DATA PENGGUNA</td>
        </tr>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">Waktu Export : {{date('d-m-Y H:i')}}</td>
        </tr>
    </tbody>
</table>
<table>
    <thead>
    <tr>
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">No</th> <!-- kolom A -->
        {{-- <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Foto</th> <!-- kolom B --> --}}
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Nama</th> <!-- kolom C -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Email</th> <!-- kolom D -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Hak Akses</th> <!-- kolom E -->
      
    </thead>
    <tbody>
    {{-- Bagian ini menginisialisasi variabel $no dengan nilai 1 menggunakan PHP dalam sintaksis Blade. --}}
    @php $no=1; @endphp
    {{-- Ini adalah loop foreach yang mengiterasi setiap elemen dalam array $data, dan untuk setiap elemen, nilainya diberikan ke variabel $dt. --}}
    @if(count($data))
    @foreach($data as $dt)
    {{-- Dalam loop foreach, bagian ini menggunakan PHP dalam Blade untuk mengambil record pertama dari tabel 'users' menggunakan
    Query Builder Laravel (DB::table('users')). Ini memilih semua kolom (select('*')) dan hasilnya diberikan ke variabel $dbKategori. --}}
        @php 
        $dbKategori=DB::table('users')->select('*')->first();
        @endphp
        <tr>
            <td>{{$no++}}</td>
            <td>{{$dt->name??''}}</td>
            <td>{{$dt->email??''}}</td>
            <td>{{$dt->namerole??''}}</td>
            {{-- Sintaks ??'' adalah operator null coalescing, memberikan string kosong sebagai nilai default jika properti yang bersangkutan tidak ada. --}}
        </tr>
    @endforeach
    @endif
    </tbody>
</table>