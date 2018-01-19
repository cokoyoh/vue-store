import Auth from '../packages/auth/auth'

import Vue from 'vue';

Vue.use(Auth);

const state = {
    authUser: {},
};

const mutations = {
    SET_AUTH_USER(state, userObject)
    {
        state.authUser = userObject;
    }
};

const actions = {
    setUserObject: ({commit}, userObject) => {
          commit('SET_AUTH_USER', userObject);
    }
};

export default {
    state,

    mutations,

    actions
}

