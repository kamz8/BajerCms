export default function auth (router) {
  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // Here we check JWT for undefined or 'undefined'
      var token = localStorage.getItem('token')
      if (token) {
        next({
          path: '/login'
        })
      } else {
        next()
      }
    } else {
      next() // make sure to always call next()!
    }
    if(to.path === 'login') {
      next({
        path: from.path
      })
    }
  })
}