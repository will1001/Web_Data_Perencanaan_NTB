
<h4 class="center-align">{{ kategori.nama_bagian }}</h4>
<h2 class="center-align">Data Kategori {{ kategori.nama }}</h2>
<h6 class="center-align">Provinsi {{ provinsi.nama }}</h6><br>
<br><br>
<p class="center-align">
    <a href="<?= base_url().'site/create/'.$id_kategori?>" class="btn waves-effect waves-light">Tambah Data
        <i class="material-icons right">touch_app</i>
    </a>
</p>
<table class="table">
    <thead>
        <tr>
        	<th>No</th>
            <!-- <th>id</th> -->
            <!-- <th>Provnsi</th> -->
            <th>Kabupaten/Kota</th>
            <!-- <th>Kecamatan</th>
            <th>Urusan</th>
            <th>id_table</th>
            <th>elemen</th> -->
            <th>Keterangan</th>
            <!-- <th>Nama Data</th> -->
            <th>Nilai</th>
            <th>Satuan</th>
            <th>Tahun</th>
            <th>Sumber Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, no) in items">
            <td>{{ ++no }}</td>
            <!-- <td>{{ item.id }}</td> -->
            <!-- <td>{{ item.id_prov }}</td> -->
            <td>{{ item.id_kab_kota }}</td>
            <!-- <td>{{ item.kec }}</td>
            <td>{{ item.urusan }}</td>
            <td>{{ item.id_table }}</td>
            <td>{{ item.elemen }}</td> -->
            <td>
                    <div v-for="ket in item.keterangan">{{ket.nama}}</div>
                    <div><b>{{item.nama_data}}</b></div>
                    <div v-if="item.kab_kota"><b>{{item.kab_kota.nama}}</b></div>
            </td>
            <!-- <td>{{ item.nama_data }}</td> -->
            <td>{{ item.nilai }}</td>
            <td>{{ item.satuan }}</td>
            <td>{{ getTahun(item.tahun) }}</td>
            <td>{{ getSumberDataId(item.id_sumber_data) }}</td>
            <td>  
                <a class="btn waves-effect waves-dark" :href="lokasi+item.id" title="Show Data"><i class="material-icons">visibility</i></a>
                <button class="btn waves-effect waves-dark" @click="data_update(item)" title="Update Data"><i class="material-icons">edit</i></button>
                <button class="btn waves-effect waves-dark" @click="data_delete(item)" title="Delete Data"><i class="material-icons">delete</i></button>
            </td>
        </tr>
    </tbody>
</table>
<br><br><br><br><br>

