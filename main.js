if (!sessionStorage.tab())
{
    let min = 10000;
    let max = 99999;
    sessionStorage.tab() = Math.floor(Math.random() * (max - min + 1) + min);
}
window.addEventListener('beforeunload',function(){
    document.cookie = 'id' + sessionStorage.tab();
})