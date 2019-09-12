<h1 class="center-align">Data Urusan Pilihan</h1>
<h5 class="center-align">Provinsi {{provinsi.nama}}</h5>
<br><br>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(kat,no) in kategoriAll">
            <td>{{ ++no }}</td>
            <td>{{ kat.nama}}</td>
            <td><a :href="lokasi+kat.id" class="btn flat indigo darken-3"> Show</a></td>
        </tr>
    </tbody>
</table>
<br><br><br><br><br>

