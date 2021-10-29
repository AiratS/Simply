const Home = () => import('../pages/Home');
const Login = () => import('../pages/Login');
const Profile = () => import('../pages/Profile');

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
  },
  {
    path: '/profile',
    name: 'profile',
    component: Profile,
  },
];

export default routes;

