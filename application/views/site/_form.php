
            <div class="row">
                <div class="input-field col s12 m6">
                <input name="nama_data" id="form_nama_data" type="text" class="validate" v-model="newItem.nama_data" required>
                <label class="active" for="form_nama_data">Nama data</label>
                <input name="id_kategori" :value="kategori.id" type="number" hidden>
                </div>
                <div class="input-field col s12 m6">
                    <select name="id_prov" id="form_id_prov" v-model="newItem.id_prov">
                        <option value="52" selected>NUSA TENGGARA BARAT</option>
                    </select>
                <label>Provinsi</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="id_kab_kota" id="form_id_kab_kota" v-model="newItem.id_kab_kota">
                        <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                        <option value="">-</option>
                        <option v-for="kabupaten_kota in kab_kota" :value="kabupaten_kota.id">{{kabupaten_kota.nama}}</option>
                    </select>
                <label>Kabupaten/Kota</label>
                </div>
                <div class="input-field col s12 m6">
                <input name="kec" value="" id="form_kec" type="text" class="validate" v-model="newItem.kec">
                <label class="active" for="form_kec">Kecamatan</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="urusan" value="" id="form_urusan" type="text" class="validate" v-model="newItem.urusan">
                <label class="active" for="form_urusan">Urusan</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="id_table" value="" id="form_id_table" type="text" class="validate" v-model="newItem.id_table">
                <label class="active" for="form_id_table">ID Table</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="elemen" value="" id="form_elemen" type="text" class="validate" v-model="newItem.elemen">
                <label class="active" for="form_elemen">Elemen</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="nilai" value="" id="form_nilai" type="number" class="validate" v-model="newItem.nilai" required>
                <label class="active" for="form_nilai">Nilai</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="satuan" value="" id="form_satuan" type="text" class="validate" v-model="newItem.satuan">
                <label class="active" for="form_satuan">Satuan</label>
                </div>
                <div class="input-field col s12 m4">
                <input name="tahun" id="form_tahun" type="number" min="2017" max="2099" step="1" :value="getTahun(newItem.tahun)" required>
                <label class="active" for="form_tahun">Tahun</label>
                </div>
                
                <div class="input-field col s12 m12">
                <!-- <input value="" id="form_sumber_data" type="text" class="validate" v-model="newItem.sumber_data"> -->
                    <select name="id_sumber_data" id="form_id_sumber_data" v-model="newItem.id_sumber_data">
                        <option value="" disabled selected>Pilih Sumber Data</option>
                        <option value="">-</option>
                        <option v-for="sumber in sumber_data" :value="sumber.id">{{sumber.nama_sumber}}</option>
                    </select>
                    <label>Sumber Data</label><br>
                </div>
                <div class="input-field col s12 m12">
                <br>
                    <label>
                        <input type="checkbox" class="filled-in" checked="checked" v-model="addKeterangan" @click="keterangan_reset()" />
                        <span>ISI KETERANGAN</span>
                    </label>
                </div>
                <template v-if="addKeterangan">   
                    <template v-for="(label, index) in newKeterangan" >
                        <div class="input-field col s10 m10">
                            <input :name="'nama_keterangan['+index+']'" value="" :id="'form_keterangan['+index+']'" type="text" class="validate" v-model="label.nama">
                            <label :for="'form_keterangan['+index+']'">Keterangan {{label.no}}</label>
                            <input :name="'id_keterangan['+index+']'" type="number" :value="label.id" hidden>
                        </div>
                        <div class="input-field col s2 m2" v-if="index == (newKeterangan.length-1)">
                            <button type="button" class="btn waves-effect waves-dark" @click="formKeterangan_add()"><i class="material-icons">add</i></button>
                        </div>
                        <div class="input-field col s2 m2" v-if="index < (newKeterangan.length-1)">
                            <button type="button" class="btn waves-effect waves-dark" @click="formKeterangan_delete()"><i class="material-icons">delete</i></button>
                        </div>
                    </template>
                </template>
                <div class="input-field col s12 m12">
                    <p></p>
                <button class="btn waves-effect waves-light">Submit
                    <i class="material-icons right">send</i>
                </button>
                </div>
            </div>
            </form>