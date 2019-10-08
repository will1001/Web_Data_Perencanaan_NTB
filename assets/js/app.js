
var main = new Vue({
    el: '#main-app',
    data: {
        kotak_sumber_data: false,
        uploadingFile: false,
        deletingData: false,
        hapusPertahun: true,
        base_url: 'http://localhost/job/Web_Data_Perencanaan_NTB/',
        lokasi: '',
        Bulanselected: '',
        fileUpload: false,
        items: [],
        limit: 50,
        search: '',
        filtertahun: '',
        filtersemester: '',
        Data: [],
        kategorifiles: [],
        addKeterangan: true,
        newKeterangan: [
            {
                no: 1,
                nama: '',
            },
        ],
        newItem: {
            nama_data: '',
            id_kategori: '',
            id_prov: 52,
            id_kab_kota: '',
            kec: '',
            urusan: '',
            id_table: '',
            elemen: '',
            keterangan: '',
            nilai: '',
            satuan: '',
            tahun: '',
            id_sumber_data: '',
            created_at: '',
            updated_at: '',
            sumber_data: '',
        },
        sumber_data: [
            {
                id: 3656,
                nama_sumber: 'Badan Perencanaan Pembangunan Penelitian dan Pengembangan Daerah Provinsi Nusa Tenggara Barat',
            }
        ],
        kab_kota: [{ id: '', nama: '' }],
        bagian: [],
        kategori: [],
        kategoriAll: [],
        provinsi: [],
        update: false,
    },
    created: function () {
        // this.loadData();
        // this.loadKategori();
        // this.loadSumberData();
        this.loadProvinsi();
        // this.loadKabKota();
        this.loadBagian();
    },
    updated: function () {
        this.loadBagian();
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);

        var dropdowns = document.querySelectorAll('.dropdown-trigger')
        for (var i = 0; i < dropdowns.length; i++) {
            M.Dropdown.init(dropdowns[i]);
        }
        if (this.update) {
            //update form materialize 
            M.updateTextFields();
        }
    },
    computed: {
        searchedList: function () {
            return this.items.filter(post => {
                return post.nama_data.toLowerCase().includes(this.search.toLowerCase())
            })
        },
        filtertahunList: function () {
            return this.items.filter(post => {
                return post.tahun.substring(0, 4).toLowerCase().includes(this.filtertahun.toLowerCase())
            }).filter(post => {
                return post.semester.toLowerCase().includes(this.filtersemester.toLowerCase())
            })
        },
        filter_sumber_data: function () {
            return this.sumber_data.filter((data) => {
                return data.nama_sumber.toString().toLowerCase().match(this.newItem.sumber_data.toLowerCase())
            })
        }
    },
    methods: {
        loadmore: function () {
            this.limit += 50;
        },
        loadData: function (id) {
            this.items = 'Loading';
            var vm = this;
            axios.get(this.base_url + 'data/get/' + id)
                .then(function (response) {
                    vm.items = response.data;
                }).catch(function (error) {
                    vm.items = 'Error: ' + error;
                });
        },
        loadData_byId: function (id) {
            this.items = 'Loading';
            var vm = this;
            axios.get(this.base_url + 'data/get_byId/' + id)
                .then(function (response) {
                    vm.items = response.data;
                    vm.newItem = vm.items;
                    //ubah tahun jadi date
                    vm.newItem.tahun = vm.newItem.tahun.substring(0, 10);
                    // isi keterangan
                    vm.newKeterangan = vm.newItem.keterangan;
                    vm.loadKategori(vm.newItem.id_kategori);
                    //update form materialize 
                    vm.update = true;
                }).catch(function (error) {
                    vm.items = 'Error: ' + error;
                });
        },
        loadKategori: function (id) {
            var vm = this;
            axios.get(this.base_url + 'data/get_kategori/' + id)
                .then(function (response) {
                    vm.kategori = response.data;
                }).catch(function (error) {
                    vm.kategori = 'Error: ' + error;
                });
        },
        loadKategoriAll: function (id) {
            var vm = this;
            axios.get(this.base_url + 'data/get_kategoriAll/' + id)
                .then(function (response) {
                    vm.kategoriAll = response.data;
                }).catch(function (error) {
                    vm.kategoriAll = 'Error: ' + error;
                });
        },
        loadBagian: function () {
            var vm = this;
            axios.get(this.base_url + 'data/get_bagian')
                .then(function (response) {
                    vm.bagian = response.data;
                }).catch(function (error) {
                    vm.bagian = 'Error: ' + error;
                });
        },
        loadSumberData: function () {
            this.sumber_data = 'Loading';
            var vm = this;
            axios.get(this.base_url + 'data/get_sumber_data')
                .then(function (response) {
                    vm.sumber_data = response.data;
                }).catch(function (error) {
                    vm.sumber_data = 'Error: ' + error;
                });
        },
        loadProvinsi: function () {
            this.provinsi = 'Loading';
            var vm = this;
            axios.get(this.base_url + 'data/get_provinsi')
                .then(function (response) {
                    vm.provinsi = response.data;
                }).catch(function (error) {
                    vm.provinsi = 'Error: ' + error;
                });
        },
        loadKabKota: function () {
            this.kab_kota = 'Loading';
            var vm = this;
            axios.get(this.base_url + 'data/get_kab_kota')
                .then(function (response) {
                    vm.kab_kota = response.data;
                }).catch(function (error) {
                    vm.kab_kota = 'Error: ' + error;
                });
        },
        getTahun: function (timestamp) {
            if (timestamp)
                return timestamp.substring(0, 4);
        },
        getDate: function (timestamp) {
            if (timestamp) {
                //simpan nilai tahun
                this.newItem.tahun = timestamp;
                return timestamp.substring(0, 10);
            }
        },
        getSumberDataId: function (sumberData) {
            if (!sumberData)
                return 0;
            else return sumberData;
        },
        addData: function (id_kategori) {
            console.log('adding Data');
            var vm = this;
            vm.newItem.id_kategori = id_kategori;
            var formData = vm.toFormData(vm.newItem);
            // keterangan
            var keterangan = vm.newKeterangan;
            for (i in keterangan) {
                formData.append('nama_keterangan[' + i + ']', keterangan[i].nama);
            }
            axios.post(this.base_url + 'data/create', formData)
                .then(function (response) {
                    vm.loadData();
                    // console.log(response.data);
                    window.location = vm.lokasi;
                }).catch(error => {
                    console.log(error.message);
                });
        },
        data_delete: function (data) {
            console.log('deleting Data');
            // console.log(data);
            var vm = this;
            var formData = vm.toFormData(data);
            axios.post(this.base_url + 'data/delete', formData)
                .then(function (response) {
                    vm.loadData(vm.kategori.id);
                    // console.log(response.data);
                }).catch(error => {
                    console.log(error.message);
                });
        },
        data_delete_pertahun: function (tahun) {
            console.log('deleting Data tahun ' + tahun);
            var vm = this;
            if (!tahun) { vm.hapusPertahun = false; return; }
            else { vm.hapusPertahun = tahun; }
            vm.deletingData = true;
            var data = {
                tahun: tahun,
                id_kategori: vm.kategori.id,
            };
            // console.log(vm.kategori.id);
            console.log(data);
            var formData = vm.toFormData(data);
            axios.post(this.base_url + 'data/delete_pertahun', formData)
                .then(function (response) {
                    vm.deletingData = false;
                    vm.loadData(vm.kategori.id);
                    console.log(response.data);
                }).catch(error => {
                    vm.deletingData = false;
                    console.log(error.message);
                });
        },
        data_update: function (data) {
            console.log('Updating Data');
        },
        data_view: function (data) {
            vm.loadData();
            // console.log(response.data);
            window.location = vm.lokasi;
            console.log('Showing Data');
        },
        toFormData: function (obj) {
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
                // console.log(obj[i]);
            } return fd;
        },
        formKeterangan_add: function () {
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length - 1;
            if (i < 5) {
                no = keterangan[i].no + 1;
                keterangan.push({
                    no: no,
                    nama: ''
                });
                vm.newKeterangan = keterangan;
            }
            vm.update = false;
        },
        formKeterangan_delete: function () {
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length;
            if (i > 1) {
                keterangan.pop();
            }
            vm.update = false;
        },
        keterangan_reset: function () {
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length;
            if (vm.addKeterangan) {
                while (i > 0) {
                    keterangan.pop();
                    i--;
                }
            }
            else {
                keterangan.push({
                    no: 1,
                    nama: ''
                });
                vm.newKeterangan = keterangan;
            }
            vm.update = false;
        },
        txtJSON: function (txt) {
            var vm = this
            var result = []
            var headermodif = []
            var lines = txt.split("\n")
            var headers = lines[6].split('\t')
            var headerssplit = lines[6].split('\t').splice(1, (headers.length - 5))
            var kategorifiles = lines[0].trim();
            var tmp = [];
            tmp['kategori'] = kategorifiles;
            console.log(tmp);
            vm.getKategori(kategorifiles);

            var sub_ket1 = ""
            var sub_ket2 = ""
            var sub_ket3 = ""
            var sub_ket4 = ""
            var sub_ket5 = ""
            var sub_ket6 = ""

            lines.map(function (line, indexLine) {
                if (indexLine < 7) return // Jump header line

                var currentline = line.split('\t').splice(1, (headers.length - 5))

                if (currentline[6] != "") {
                    if (currentline[6] == null) return
                    sub_ket1 = currentline[6];
                }
                if (currentline[7] != "") {
                    if (currentline[7] == null) return
                    sub_ket2 = currentline[7];
                }
                if (currentline[8] != "") {
                    if (currentline[8] == null) return
                    sub_ket3 = currentline[8];
                }
                if (currentline[9] != "") {
                    if (currentline[9] == null) return
                    sub_ket4 = currentline[9];
                }
                if (currentline[10] != "") {
                    if (currentline[10] == null) return
                    sub_ket5 = currentline[10];
                }
                if (currentline[11] != "") {
                    if (currentline[11] == null) return
                    sub_ket6 = currentline[11];
                }


                if (currentline[12] != "") {
                    var obj = {}

                    if (currentline[6] != "") {
                        if (currentline[6] == null) return
                        obj['sub_ket1'] = "";
                        obj['sub_ket2'] = "";
                        obj['sub_ket3'] = "";
                        obj['sub_ket4'] = "";
                        obj['sub_ket5'] = "";
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[6];
                    }
                    if (currentline[7] != "") {
                        if (currentline[7] == null) return
                        obj['sub_ket1'] = sub_ket1;
                        obj['sub_ket2'] = "";
                        obj['sub_ket3'] = "";
                        obj['sub_ket4'] = "";
                        obj['sub_ket5'] = "";
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[7];
                    }
                    if (currentline[8] != "") {
                        if (currentline[8] == null) return
                        obj['sub_ket1'] = sub_ket1;
                        obj['sub_ket2'] = sub_ket2;
                        obj['sub_ket3'] = "";
                        obj['sub_ket4'] = "";
                        obj['sub_ket5'] = "";
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[8];
                    }
                    if (currentline[9] != "") {
                        if (currentline[9] == null) return
                        obj['sub_ket1'] = sub_ket1;
                        obj['sub_ket2'] = sub_ket2;
                        obj['sub_ket3'] = sub_ket3;
                        obj['sub_ket4'] = "";
                        obj['sub_ket5'] = "";
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[9];
                    }
                    if (currentline[10] != "") {
                        if (currentline[10] == null) return
                        obj['sub_ket1'] = sub_ket1;
                        obj['sub_ket2'] = sub_ket2;
                        obj['sub_ket3'] = sub_ket3;
                        obj['sub_ket4'] = sub_ket4;
                        obj['sub_ket5'] = "";
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[10];
                    }
                    if (currentline[11] != "") {
                        if (currentline[11] == null) return
                        obj['sub_ket1'] = sub_ket1;
                        obj['sub_ket2'] = sub_ket2;
                        obj['sub_ket3'] = sub_ket3;
                        obj['sub_ket4'] = sub_ket4;
                        obj['sub_ket5'] = sub_ket5;
                        obj['sub_ket6'] = "";
                        obj['nama_data'] = currentline[11];
                    }

                    obj['id_prov'] = currentline[0];
                    obj['kab_kota'] = currentline[1];
                    obj['kec'] = currentline[2];
                    obj['urusan'] = currentline[3];
                    obj['id_table'] = currentline[4];
                    obj['elemen'] = currentline[5];
                    obj['nilai'] = currentline[12];
                    obj['satuan'] = currentline[13];
                    obj['tahun'] = currentline[14];
                    obj['sumber_data'] = currentline[15];
                    result.push(obj)


                } else {
                    return null
                }




            })
            console.log(result);

            vm.Data = result;

            return result // JavaScript object
        },
        loadtxt: function (e) {
            var vm = this
            if (window.FileReader) {
                var reader = new FileReader();
                reader.readAsText(e.target.files[0]);
                // Handle errors load
                reader.onload = function (event) {
                    var txt = event.target.result;
                    vm.parse_txt = vm.txtJSON(txt)
                    vm.fileUpload = true;
                };
                reader.onerror = function (evt) {
                    if (evt.target.error.name == "NotReadableError") {
                        alert("Canno't read file !");
                    }
                };
            } else {
                alert('FileReader are not supported in this browser.');
            }
        },
        getKategori: function (nama) {
            console.log(nama);
            var vm = this;
            axios.get(vm.base_url + 'data/get_kategori_by_name/' + nama)
                .then(function (response) {
                    vm.kategorifiles = response.data;
                    console.log(vm.kategorifiles);
                }).catch(function (error) {
                    vm.kategorifiles = 'Error: ' + error;
                });
        },
        getBulan: function (e) {
            console.log(e);
            // var vm = this;
            // axios.get('http://localhost/job/Web_Data_Perencanaan_NTB/data/get_kategori_by_name/'+nama)
            // .then(function(response){
            //     vm.kategorifiles = response.data;
            //     console.log(vm.kategorifiles);
            // }).catch(function(error){
            //     vm.kategorifiles = 'Error: '+ error;
            // });
        },
        //input file to database
        addDataFiles: function () {
            var vm = this;
            // kondisi awal = -1, digunakan agar pesan error input tidak langsung muncul
            if (vm.fileUpload == -1) vm.fileUpload = false;
            if (vm.Bulanselected == -1) vm.Bulanselected = false;
            if (vm.fileUpload && vm.Bulanselected) {
                vm.uploadingFile = true;
                console.log('adding data');
                console.log('menunggu')
                var data = JSON.stringify(vm.Data);
                // console.log(data);
                var url = vm.base_url + 'data/import';
                fd = new FormData();
                fd.append('data1', data);
                fd.append('bulan', vm.Bulanselected);
                fd.append('id_kategori', vm.kategorifiles.id);
                axios.post(url, fd).then(function (response) {
                    //code here 
                    console.log(response.data);
                    // redirect
                    window.location = vm.lokasi;
                    console.log(vm.lokasi);
                });
            }
        },
        getData: function (data, no) {
            var vm = this;
            vm.newItem = data;
            vm.newItem.no = no;
            console.log(data);
        },
        pilihSumberData: function (data) {
            document.getElementById("form_sumber_data").blur();
        },
        cekSumberData: function (nama_sumber) {
            var vm = this;
            var ada = false;
            for (var i = 0; i < vm.sumber_data.length; i++) {
                if (vm.sumber_data[i].nama_sumber.toLowerCase().match(nama_sumber.toLowerCase())) {
                    vm.newItem.sumber_data = vm.sumber_data[i].nama_sumber;
                    vm.newItem.id_sumber_data = vm.sumber_data[i].id;
                    ada = true;
                    break;
                }
            }
            if (!ada) {
                vm.newItem.sumber_data = '';
            }
            vm.kotak_sumber_data = false;
        }

    }
});