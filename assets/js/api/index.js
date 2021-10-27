import axios from 'axios';
import Auth from './auth';

export default {
  auth: Auth(axios),
};