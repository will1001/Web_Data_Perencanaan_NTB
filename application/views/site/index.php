<h4 class="center-align">{{ kategori.nama_bagian }}</h4>
<h2 class="center-align">Data Kategori {{ kategori.nama }}</h2>
<h6 class="center-align">Provinsi {{ provinsi.nama }}</h6><br>
<br><br>

<div class="modal white" id="modal_hapus">

    <div class="center-align"> <br>
        <div class="pink-text text-darken-1">
            <h5><b>Are you sure, you want to delete this data?</b></h5>
        </div>
        <div>Data no ke-{{newItem.no}} {{newItem.nama_data}}</div> <br>
        <div class="divider"></div> <br>
        <div class="card-action center-align">
            <a @click="data_delete(newItem)" class="red btn-small modal-close">DELETE</a>
            <a class="green btn-small modal-close">CANCEL</a>
        </div> <br>
    </div>
</div>

<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <a href="<?= base_url() . 'site/create/' . $id_kategori ?>" class="btn waves-effect waves-light">Tambah Data
                    <i class="material-icons right">touch_app</i>
                </a>
                <a href="<?= base_url() . 'site/uploadfiles/' . $id_kategori ?>" class="btn waves-effect waves-light">Upload File Data
                    <i class="material-icons right">touch_app</i>
                </a>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input v-model="search" id="search" type="text" class="validate">
                <label for="search">Cari Data</label>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <select v-model="filtertahun">
                    <option value="" disabled selected>Tahun</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>
                <label>Tahun</label>
            </div>
            <div class="input-field col s6">
                <div class="input-field col s3">
                    <label>
                        <input name="group1" type="radio" value="Ganjil" v-model="filtersemester" />
                        <span>Ganjil</span>
                    </label>
                </div>
                <div class="input-field col s3">
                    <label>
                        <input name="group1" type="radio" value="Genap" v-model="filtersemester" />
                        <span>Genap</span>
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kabupaten/Kota</th>
            <th>Keterangan</th>
            <th>Nilai</th>
            <th>Satuan</th>
            <th>Semester</th>
            <th>Tahun</th>
            <th>Sumber Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, no) in search!=''?searchedList:(filtertahun!='' && filtersemester!=''?filtertahunList:items.slice(0,limit))">
            <td>{{ ++no }}</td>
            <td>{{ item.id_kab_kota }}</td>

            <td>
                <div v-for="ket in item.keterangan">{{ket.nama}}</div>
                <div><b>{{item.nama_data}}</b></div>
            </td>
            <td>{{ item.nilai }}</td>
            <td>{{ item.satuan }}</td>
            <td>{{ item.semester }}</td>
            <td>{{ getTahun(item.tahun) }}</td>
            <td>{{ getSumberDataId(item.id_sumber_data) }}</td>
            <td>
                <a class="btn waves-effect waves-dark" :href="lokasi+item.id" title="Show Data"><i class="material-icons">visibility</i></a>
                <a class="btn waves-effect waves-dark" :href="base_url+'site/update/'+item.id" title="Update Data"><i class="material-icons">edit</i></a>
                <a @click="getData(item,no)" href="#modal_hapus" class="btn waves-effect waves-dark modal-trigger" title="Delete Data"><i class="material-icons">delete</i></a>
            </td>
        </tr>
    </tbody>
</table>
<br>
<div class="center-align">
<a class="waves-effect waves-light btn" @click="loadmore()"><i class="material-icons left">arrow_drop_down
</i>Load more</a>

</div>
<br><br><br><br><br>