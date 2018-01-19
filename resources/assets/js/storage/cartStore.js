const state = {
    cart: [],
};

const mutations = {
    SET_CART_ITEMS(state, item)
    {
        state.cart = item;
    }
};

const actions = {
    setCartItem: ({commit}, item) => {
        commit('SET_CART_ITEMS', item);
    }
};

export default {
    state,

    mutations,

    actions
}

