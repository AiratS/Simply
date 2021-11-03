import axios from 'axios';
import Auth from './auth';
import Profile from './profile';

export default {
  auth: Auth(axios),
  profile: Profile(axios),
};