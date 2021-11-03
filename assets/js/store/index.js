import Vue from 'vue';
import Vuex from 'vuex';
import { PROFILE, PROFILE_POSTS } from "./mutation-types";
import api from '../api';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    headerData: null,
    profile: {
      fullName: null,
      about: null,
      friendsCount: 0,
      avatar: '',
    },
    profilePosts: []
  },

  mutations: {
    [PROFILE] (state, payload) {
      state.profile = payload;
    },
    [PROFILE_POSTS] (state, payload) {
      state.profilePosts = payload;
    },
  },

  actions: {
    dispatchProfile({ commit }, userId) {
      api.profile.getProfile(userId).then((response) => {
        commit(PROFILE, response.data);
      });
    },
    dispatchProfilePosts({ commit }, userId) {
      api.profile.getProfilePosts(userId).then((response) => {
        commit(PROFILE_POSTS, response.data);
      });
    }
  }
});