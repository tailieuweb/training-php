<template>
<!-- use header -->
    <Header/> 
    <div class="container">
        <main>
            <!-- list view users !-->
            <h1 class="title">LIst View Users</h1>
            <table class="table table-striped table-dark fixed">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <Users v-bind:users="this.users"
                        :stt="0"  :currentPage="this.users.current_page" :pageSize="this.users.per_page"
                        :total="this.users.total" :lastPage="this.users.last_page" />
                </tbody>
            </table>
        </main>
    </div>
    <!-- use footer -->
    <Footer/>
</template>

<script>
import Header from './Header';
import Footer from './Footer';
import Users from './Users/Users';


export default {
    name : 'Home.vue',
    components : {
        Header,
        Footer,
        Users
    },
    props : {

    },
    data() {
        return{
            users: [],
        }
    },
    async created(){
        this.users = await this.getAllUser();
    },
    methods : {
        async getAllUser(){
            const url = '/api/all-user';
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    }
}


</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
    /* @import url('https://fonts.googleapis.com/css2?family=Ephesis&display=swap'); */
    .title{
        margin: 30px 0;
        text-align: center;
        font-weight: 500;
        text-transform: uppercase;
        color: #2b5e90;
        font-family: 'Poppins', sans-serif;
    }

    table{
        box-shadow: 3px 3px 10px rgb(0 0 0);
    }

    .table.fixed {
        table-layout: fixed;
    }

</style>
