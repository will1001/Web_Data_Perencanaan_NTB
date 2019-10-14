<div class="row">

    <div class="center-align" v-if="uploadingFile">
        <b class="teal-text">Processing Data</b>
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <div class="file-field input-field col s12">
        <div class="btn">
            <span>.txt</span>
            <input type="file" accept=".txt" @change="loadtxt($event)" required>
        </div>
        <div class="file-path-wrapper"></div>
        <input class="file-path validate" type="text" placeholder="Upload files data">

        <p v-if="!fileUpload" class="red-text text-accent-3 pl-3">
            File tidak boleh kosong
        </p>
        <input type="text" name="id_kategori" :value="id_kategori = <?= $id_kategori ?>" hidden="">
    </div>

    <div class="input-field col s12">
        <select name="bulan" @change="getBulan(Bulanselected)" v-model="Bulanselected" required>
            <option value="" disabled selected>Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <label>Bulan</label>
        <p v-if="!Bulanselected" class="red-text text-accent-3 pl-3">
            Bulan tidak boleh kosong
        </p>
    </div>


    <div class="input-field col s12 m12">
        <p></p>
        <button class="btn waves-effect waves-light" @click="addDataFiles()">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>