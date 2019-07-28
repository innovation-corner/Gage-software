// axiosconfig.js
import axios from "axios";

// configure base url
const instance = axios.create({
    baseURL: `${window.GAGE_APP_BASE_URL}/`
});

// intercept requests and add token
instance.interceptors.request.use(config => {
    const {token} = window.GAGE_APP_BASE_URL;

    if (token) {
        return {
            ...config,
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
    } else {
        return config;
    }
});

// intercept response and handle 401 errors
instance.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        // Do something with response data

        if (401 === error.response.status) {
            // redirect
        }
        return Promise.reject(error);
    }
);
export default instance;
