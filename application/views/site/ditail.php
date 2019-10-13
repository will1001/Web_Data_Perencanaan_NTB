<br>
<h2 class="center-align">Ditail Data</h2> <br>
<div class="row">
    <div class="col s8 offset-s2">
        <table class="table striped">
            <tr>
                <th>Kategori</th>
                <td v-if="items.kategori">{{items.kategori.nama}}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>
                    <div v-for="ket in items.keterangan">
                        {{ket.nama}}
                    </div>
                </td>
            </tr>
            <tr>
                <th>Nama Data</th>
                <td>{{items.nama_data}}</td>
            </tr>
            <tr>
                <th>Kode Provinsi</th>
                <td>{{items.id_prov}}</td>
            </tr>
            <tr>
                <th>Kode Kabupaten/Kota</th>
                <td v-if="items.id_kab_kota">{{items.id_kab_kota}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td v-if="items.kec">{{items.kec}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Urusan</th>
                <td v-if="items.urusan">{{items.urusan}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Id Table</th>
                <td v-if="items.id_table">{{items.id_table}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Elemen</th>
                <td v-if="items.elemen">{{items.elemen}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Id Sumber Data</th>
                <td v-if="items.id_sumber_data">{{items.id_sumber_data}}</td>
                <td v-else> 0 </td>
            </tr>
            <tr>
                <th>Nilai</th>
                <td v-if="items.nilai">{{items.nilai}}</td>
                <td v-else> 0 </td>
            </tr>
            <tr>
                <th>Satuan</th>
                <td v-if="items.satuan">{{items.satuan}}</td>
                <td v-else> - </td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>{{items.semester}}</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td>{{getTahun(items.tahun)}}</td>
            </tr>
        </table>
    </div>
</div>
<?php 
    $this->load->view('templates/footer');
?>
<script>
id = '<?= $id ?>';
main.loadData_byId(id);
// script vue js untuk halaman data ditail
</script>