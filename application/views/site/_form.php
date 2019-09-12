            

            <h4 class="center-align">{{ kategori.nama_bagian }}</h4>
            <h3 class="center-align">Tambah Data Kategori {{ kategori.nama }}</h3>
            <h6 class="center-align">Provinsi {{ provinsi.nama }}</h6><br>
            <form action="#" method="post" v-on:submit.prevent="">
            <div class="row">
                <div class="input-field col s12 m6">
                <input value="" id="form_nama_data" type="text" class="validate" v-model="newItem.nama_data">
                <label class="active" for="form_nama_data">Nama data</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="" id="form_id_prov" v-model="newItem.id_prov">
                        <option value="52" selected>NUSA TENGGARA BARAT</option>
                    </select>
                <label>Provinsi</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="" id="form_id_kab_kota" v-model="newItem.id_kab_kota">
                        <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                        <option value="">KOSONG</option>
                        <option v-for="kabupaten_kota in kab_kota" :value="kabupaten_kota.id">{{kabupaten_kota.nama}}</option>
                    </select>
                <label>Kabupaten/Kota</label>
                </div>
                <div class="input-field col s12 m6">
                <input value="" id="form_kec" type="text" class="validate" v-model="newItem.kec">
                <label class="active" for="form_kec">Kecamatan</label>
                </div>
                <div class="input-field col s12 m4">
                <input value="" id="form_urusan" type="text" class="validate" v-model="newItem.urusan">
                <label class="active" for="form_urusan">Urusan</label>
                </div>
                <div class="input-field col s12 m4">
                <input value="" id="form_id_table" type="text" class="validate" v-model="newItem.id_table">
                <label class="active" for="form_id_table">ID Table</label>
                </div>
                <div class="input-field col s12 m4">
                <input value="" id="form_elemen" type="text" class="validate" v-model="newItem.elemen">
                <label class="active" for="form_elemen">Elemen</label>
                </div>
                <div class="input-field col s12 m4">
                <input value="" id="form_nilai" type="text" class="validate" v-model="newItem.nilai">
                <label class="active" for="form_nilai">Nilai</label>
                </div>
                <div class="input-field col s12 m4">
                <input value="" id="form_satuan" type="text" class="validate" v-model="newItem.satuan">
                <label class="active" for="form_satuan">Satuan</label>
                </div>
                <div class="input-field col s12 m4">
                <input id="form_tahun" type="number" min="2017" max="2099" step="1" v-model="newItem.tahun"/>
                <label class="active" for="form_tahun">Tahun</label>
                </div>
                
                <div class="input-field col s12 m12">
                <!-- <input value="" id="form_sumber_data" type="text" class="validate" v-model="newItem.sumber_data"> -->
                    <select name="" id="form_id_sumber_data" v-model="newItem.id_sumber_data">
                        <option value="" disabled selected>Pilih Sumber Data</option>
                        <option value="">KOSONG</option>
                        <option v-for="sumber in sumber_data" :value="sumber.id">{{sumber.nama_sumber}}</option>
                    </select>
                    <label>Sumber Data</label><br>
                </div>
                <div class="input-field col s12 m12">
                <br>
                    <label >
                        <input type="checkbox" class="filled-in" checked="checked" v-model="addKeterangan" @click="keterangan_reset()" />
                        <span>ISI KETERANGAN</span>
                    </label>
                </div>
                <template v-if="addKeterangan">   
                    <template v-for="(label, index) in newKeterangan" >
                        <div class="input-field col s10 m10">
                            <input value="" :id="'form_keterangan['+index+']'" type="text" class="validate" v-model="label.nama">
                            <label :for="'form_keterangan['+index+']'">Keterangan {{label.no}}</label>
                        </div>
                        <div class="input-field col s2 m2" v-if="index == (newKeterangan.length-1)">
                            <button class="btn waves-effect waves-dark" @click="formKeterangan_add()"><i class="material-icons">add</i></button>
                        </div>
                        <div class="input-field col s2 m2" v-if="index < (newKeterangan.length-1)">
                            <button class="btn waves-effect waves-dark" @click="formKeterangan_delete()"><i class="material-icons">delete</i></button>
                        </div>
                    </template>
                </template>
                <div class="input-field col s12 m12">
                    <p></p>
                <button @click="addData(kategori.id)" class="btn waves-effect waves-light">Submit
                    <i class="material-icons right">send</i>
                </button>
                </div>
            </div>
            </form>
            <br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>