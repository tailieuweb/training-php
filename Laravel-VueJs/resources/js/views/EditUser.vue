<template>
    <EditUser />
</template>
<script>
import EditUser from "../components/EditUser.vue";
export default {
    components: {
        EditUser,
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
};
</script>

<style scoped>

</style>
