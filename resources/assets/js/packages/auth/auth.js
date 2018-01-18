export default function (Vue) {
    Vue.auth = {

        setToken(token, expires_in){
            localStorage.setItem('token', token);

            localStorage.setItem('expiration', expires_in);
        },

        getToken() {
            let token = localStorage.getItem('token');

            let expiration = localStorage.getItem('expiration');

            if(! token || !expiration)
                return null;

            if(Date.now() > parseInt(expiration))
            {
                this.destroyToken();

                return null;
            }
            else return token;
        },

        isAuthenticated ()
        {
            if(this.getToken()) return true;

            else return false;
        },

        destroyToken(){
            localStorage.removeItem('token');

            localStorage.removeItem('expiration');
        }
    };
    Object.defineProperties(Vue.prototype, {
        $auth: {
            get(){
                return Vue.auth;
            }
        }
    });
}