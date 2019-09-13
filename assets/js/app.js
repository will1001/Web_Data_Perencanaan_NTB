
var main = new Vue({
    el: '#main-app',
    data: {
        base_url: 'http://localhost/job/Web_Data_Perencanaan_NTB/',
        lokasi: '',
        items: [],
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
            tahun: '2019',
            id_sumber_data:'',
            created_at: '',
            updated_at: '',
        },
        sumber_data: [
            {
                id: 3656,
                nama_sumber: 'Badan Perencanaan Pembangunan Penelitian dan Pengembangan Daerah Provinsi Nusa Tenggara Barat',
            }
        ],
        kab_kota:[{id: '', nama: ''}],
        bagian: [],
        kategori: [],
        kategoriAll: [],
        provinsi: [],
    },
    created: function(){
        // this.loadData();
        // this.loadKategori();
        // this.loadSumberData();
        this.loadProvinsi();
        // this.loadKabKota();
        this.loadBagian();
    },
    updated: function(){
        this.loadBagian();
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
        
        var dropdowns = document.querySelectorAll('.dropdown-trigger')
        for (var i = 0; i < dropdowns.length; i++){
            M.Dropdown.init(dropdowns[i]);
        }
    },
    methods: {
        loadData: function(id){
            this.items = 'Loading';
            var vm = this;
            axios.get(this.base_url+'data/get/'+id)
            .then(function(response){
                vm.items = response.data;
            }).catch(function(error){
                vm.items = 'Error: '+ error;
            });
        },
        loadData_byId: function(id){
            this.items = 'Loading';
            var vm = this;
            axios.get(this.base_url+'data/get_byId/'+id)
            .then(function(response){
                vm.items = response.data;
            }).catch(function(error){
                vm.items = 'Error: '+ error;
            });
        },
        loadKategori: function(id){
            var vm = this;
            axios.get(this.base_url+'data/get_kategori/'+id)
            .then(function(response){
                vm.kategori = response.data;
            }).catch(function(error){
                vm.kategori = 'Error: '+ error;
            });
        },
        loadKategoriAll: function(id){
            var vm = this;
            axios.get(this.base_url+'data/get_kategoriAll/'+id)
            .then(function(response){
                vm.kategoriAll = response.data;
            }).catch(function(error){
                vm.kategoriAll = 'Error: '+ error;
            });
        },
        loadBagian: function(){
            var vm = this;
            axios.get(this.base_url+'data/get_bagian')
            .then(function(response){
                vm.bagian = response.data;
            }).catch(function(error){
                vm.bagian = 'Error: '+ error;
            });
        },
        loadSumberData: function(){
            this.sumber_data = 'Loading';
            var vm = this;
            axios.get(this.base_url+'data/get_sumber_data')
            .then(function(response){
                vm.sumber_data = response.data;
            }).catch(function(error){
                vm.sumber_data = 'Error: '+ error;
            });
        },
        loadProvinsi: function(){
            this.provinsi = 'Loading';
            var vm = this;
            axios.get(this.base_url+'data/get_provinsi')
            .then(function(response){
                vm.provinsi = response.data;
            }).catch(function(error){
                vm.provinsi = 'Error: '+ error;
            });
        },
        loadKabKota: function(){
            this.kab_kota = 'Loading';
            var vm = this;
            axios.get(this.base_url+'data/get_kab_kota')
            .then(function(response){
                vm.kab_kota = response.data;
            }).catch(function(error){
                vm.kab_kota = 'Error: '+ error;
            });
        },
        getTahun: function(timestamp){
            if(timestamp)
                return timestamp.substring(0, 4);
        },
        getSumberDataId: function(sumberData){
            if(!sumberData)
                return 0;
            else return sumberData;
        },
        addData: function(id_kategori){
            console.log('adding Data');
            var vm = this;
            vm.newItem.id_kategori = id_kategori;
            var formData = vm.toFormData(vm.newItem);
            // keterangan
            var keterangan = vm.newKeterangan;
            for(i in keterangan){
                formData.append('nama_keterangan['+i+']',keterangan[i].nama);
            }
            axios.post(this.base_url+'data/create', formData)
            .then(function(response){
                vm.loadData();
                // console.log(response.data);
                window.location=vm.lokasi;
            }).catch(error => {
                console.log(error.message);
              });
        },
        data_delete: function(data){
            console.log('deleting Data');
            // console.log(data);
            var vm = this;
            var formData = vm.toFormData(data);
            axios.post(this.base_url+'data/delete', formData)
            .then(function(response){
                vm.loadData(vm.kategori.id);
                // console.log(response.data);
            }).catch(error => {
                console.log(error.message);
              });
        },
        data_update: function(data){
            console.log('Updating Data');
        },
        data_view: function(data){
            vm.loadData();
            // console.log(response.data);
            window.location=vm.lokasi;
            console.log('Showing Data');
        },
        toFormData: function(obj){
            var fd = new FormData();
            for(var i in obj){
                fd.append(i,obj[i]);
                // console.log(obj[i]);
            }return fd;
        },
        formKeterangan_add: function(){
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length-1;
            if(i<5){
                no = keterangan[i].no + 1;
                keterangan.push({
                    no: no,
                    nama: ''
                });
                vm.newKeterangan = keterangan;
            }
        },
        formKeterangan_delete: function(){
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length;
            if(i>1){
                keterangan.pop();
            }
        },
        keterangan_reset: function(){
            var vm = this;
            keterangan = vm.newKeterangan;
            i = keterangan.length;
            if(vm.addKeterangan){
                while(i>0){
                    keterangan.pop();
                    i--;
                }
            }
            else{
                keterangan.push({
                    no: 1,
                    nama: ''
                });
                vm.newKeterangan = keterangan;
            }
        } 
    }
});