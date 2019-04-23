import axios from 'axios'

export function post(url, data) {
    return axios({
        method: 'POST',
        url: url,
        data: data
    })
}

export function put(url, data) {
    return axios({
        method: 'PUT',
        url: url,
        data: data
    })
}

export function get(url) {
    return axios({
        method: 'GET',
        url: url
    })
}

export function del(url, data) {
    return axios({
        method: 'DELETE',
        url: url,
        data : data
    })
}