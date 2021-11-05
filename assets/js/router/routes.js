const Home = () => import('../pages/Home');
const Login = () => import('../pages/Login');
const Profile = () => import('../pages/Profile');
const Search = () => import('../pages/Search');
const Messages = () => import('../pages/Messages');

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
    path: '/profile/:id?',
    name: 'profile',
    component: Profile,
  },
  {
    path: '/search',
    name: 'search',
    component: Search,
  },
  {
    path: '/messages',
    name: 'messages',
    component: Messages,
  },
];

export default routes;

