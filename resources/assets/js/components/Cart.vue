<template>
    <div class = "reveal" id = "cart" data-reveal>
        <table>
            <thead>
            <tr>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in cartStore.cart">
                <td>{{item.name}}</td>
                <td><strong>Price Ksh </strong>{{item.price}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import {mapState} from 'vuex';
    export default {
        data() {
            return{
            }
        },
        computed: {
            ...mapState({
                cartStore:state => state.cartStore
            }),
        },

    }

</script>
