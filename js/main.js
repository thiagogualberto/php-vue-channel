new Vue({
    el: '#app',
    data:{
        cars : [],
        car : {name:'', tel:''}
    },
    created(){
        this.getContacts();
    },
    methods:{
        getContacts(){
            axios.get('http://localhost/php-vue-channel/get_contacts.php')
                .then(response => {
                    this.cars = response.data
                })
                .catch(err => console.log(err));

        },
        addContact(){
            axios.post('http://localhost/php-vue-channel/add_contact.php',{
                name: this.name,
                tel: this.tel
            })
                .then(response =>{
                    this.cars.push(response.data);
                    this.car = {name:'', tel:''};
                    $('#addContacts').modal('hide');
                    Swal.fire({
                        type:'success',
                        title:'Added !',
                        text:'Contact added'
                    })
                })
                .catch(err => console.log(err));
        }
    }
})