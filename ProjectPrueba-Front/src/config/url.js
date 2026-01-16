
    const BASE_URL = 'http://127.0.0.1:8000';

    function url_user() {
        return `${BASE_URL}/api/user`;
        
    }
    function url_api() {
        return `${BASE_URL}/api`;
    }
    function url_empresa() {
        return `${BASE_URL}/api/empresa`;
    }
    function url_userempresa() {
        return `${BASE_URL}/api/userempresa`;
    }
    function url_design() {
        return `${BASE_URL}/api/design`;
    }

    export { url_user, url_empresa, url_userempresa, url_design, url_api };