import auth from './auth'
import Interceptors from './interceptors'
export default function middleware (router) {
  auth(router)
  Interceptors (router)
}