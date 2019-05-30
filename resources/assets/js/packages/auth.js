export default function (Vue){
    
    let authUser = {}
    
    Vue.auth={
        setToken(token,expiration){
            localStorage.setItem('token',token)
            
            localStorage.setItem('expiration',expiration+Date.now())
           
           
        },
        getToken(){
            var token = localStorage.getItem('token')
            var expire = localStorage.getItem('expiration')
            if(!token || !expire ) return null;
            if (Date.now() > parseInt(expire)){
                this.destroyToken();
                return null
            }
            else{
                
                return token
            }
        },
        destroyToken(){
            localStorage.removeItem('token')
            localStorage.removeItem('expiration')
            localStorage.removeItem('user')
            return true;
        },
        isAuth(){
            if(this.getToken())
                return true;
            else
                return false;    
        },
        setAuth(authUser){
            
            this.authUser = authUser;
        },
        getAuth(){
            if(!localStorage.getItem('user')){
                return null
            }else{
                console.time(' Vue.CryptoJS.AES.decrypt');
                var user  = Vue.CryptoJS.AES.decrypt(localStorage.getItem('user').toString(), 'ME90oFeFG1Cm4cDVFYKExcwY6ZMes+rVDAcaUotDNBk=').toString(Vue.CryptoJS.enc.Utf8);
                console.timeEnd(' Vue.CryptoJS.AES.decrypt');
                return JSON.parse(user);
            }
        },
        logout() {
            // $('#logout').prop('disabled', true)
            // console.log(this)
            if (Vue.auth.destroyToken()) {
                // $('#logout').prop('disabled', false)
                Vue.isAuth = Vue.auth.isAuth()
                Vue.http.post('/logout',{},{
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(response=>{

                    window.location = "/";
                })
                
            }

        },
       
        
    }
    Object.defineProperties(Vue.prototype,{
        $auth:{
            get(){
                return Vue.auth;
            }
        }
    })
}