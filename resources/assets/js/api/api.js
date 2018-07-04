import axios from 'axios';

let base = 'http://homestead.app/api';

export const requestLogin = params => { return axios.post(`${base}/admin/login`, params).then(res => res.data); };

export const getUserList = params => { return axios.get(`${base}/user/list`, { params: params }); };

export const getUserListPage = params => { return axios.get(`${base}/admin/user`, { params: params }); };

export const removeUser = params => { return axios.delete(`${base}/admin/destroy/${params}`); };

export const batchRemoveUser = params => { return axios.get(`${base}/admin/batchremove`, { params: params }); };

export const editUser = params => { return axios.get(`${base}/user/edit`, { params: params }); };

export const addUser = params => { return axios.post(`${base}/admin/register`,params).then(res => res.data); };
