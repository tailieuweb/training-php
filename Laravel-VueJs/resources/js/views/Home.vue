<template>
    <Home v-if="load" />
</template>
<script>
import Home from '../components/Home';

export default {
    name : 'Home-views',
    data() {
        return {
            load : true
        }
    },
    components : {
        Home
    },
    mounted() {
        //Check expire token of user
        var user = JSON.parse(localStorage.getItem('user'));
        if(user == null){
            this.load = false;
            window.location.href = '/login';
        }
        if (Date.now() > user.data.time) {
            //check time now and expire time of localStorage
            localStorage.removeItem("user");
            alert('Phiên đăng nhập đã hết hạn, vui lòng đăng nhập lại.')
            window.location.href = '/login';
        }
    },
}
</script>

<style scoped>

</style>
