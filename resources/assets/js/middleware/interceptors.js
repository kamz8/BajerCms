import HTTP from '../http-comon';

export default function Interceptors(router) {
  HTTP.interceptors.request.use((request) => {
    if (localStorage.getItem('token')) {
      request.headers.Authorization = `Bearer ${localStorage.getItem('token')}`;
    }
    return request;
  });

  HTTP.interceptors.response.use((response) => response,
  // localStorage.setItem('token', response.headers['authorization'])
  // if(localStorage.getItem('token') && store.getters.logged) {
  //   store.dispatch('refresh')
  // }

    (error) => {
    // Redirect user to log in on 401 error
      if (error.response.status === 401 || error.response.status === 402 || error.response.status === 403) {
        router.push('/login');
      }
      return Promise.reject(error);
    });
}
