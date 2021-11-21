// create file header
<template>
    <header >
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <img
                style="width: 70px; height: 70px"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9iRz0GPSTPBc9ZeGpO-BLWwcAmUy2Xv1XyQ&usqp=CAU"
            />
            <h1>Nhóm D</h1>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-success">
                        <a @click.prevent="logout" >Logout</a>
                    </button>
                </li>
            </ul>
        </nav>
    </header>
</template>
<script>
export default {
    name : 'Header.vue',
    methods: {
        //đăng xuất - xóa token và quay về login
        logout(){
            localStorage.removeItem('user');
            var user = localStorage.getItem('user');
            if(user == null){
                window.location.href ='/login';
            }
        }
    },

};
</script>
<style>
    li{
        display: flex;
    }
    h1{
        color: transparent;
        font-size: 50px;
        background-image: linear-gradient(
            to right bottom,
            black,
            red,
            pink,
            orange,
            #00aefd,
            green
        );
        background-clip: text;
        -webkit-background-clip: text;
        display: inline-block;
        font-weight: bold;
    }
</style>
