const Home = () => import('../pages/Home');
const Login = () => import('../pages/Login');

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
  }
];

export default routes;

