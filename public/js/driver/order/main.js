$(function () {
    setTokens();
    getOrders();
    
})
function setTokens(){
    var token = $('meta[name="csrf-token"]');

    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.attr('content');
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
}
function getOrders(){
    window.axios.get('/driver/dashboard/getorders')
        .then(function(response){
            $('#mohamed').html(response.data[0].id)
            console.log(response)
        })
}
