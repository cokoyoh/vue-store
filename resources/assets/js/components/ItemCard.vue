<template>
    <div class="grid-x">
        <div class="medium-4 large-4 cell"  v-for = "item in items">
            <div class="card">
               <div @click="show(item)">
                   <img :src = "'/images/items/' + item.image"
                        style = "height: 255px; width: 255px;" >
                   <!--<p class="my-description">{{item.name}} </p>-->
                   <p><strong>KSh {{item.price}}</strong></p>
               </div>
                <div class="grid-x">
                    <div class="medium-4 large-4 cell">
                        <button class="button success tiny" @click="addToCart(item)">Buy</button>
                    </div>
                    <div class="medium-4 large-4 cell">
                        <button class="button primary tiny">Edit</button>
                    </div>
                    <div class="medium-4 large-4 cell">
                        <button class="button alert tiny" @click="destroy(item.id)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {mapState} from 'vuex';

    export default {
        props: ['items'],
        data() {
            return {
                cart: []
            }
        },

        computed: {
            ...mapState({
                cartStore:state => state.cartStore
            })
        },

        methods: {
            destroy(id)
            {
                axios.delete('api/items/destroy/'+ id)
                    .then(response => {
                        console.log(response);

                        console.log('Item has been deleted!');

                        this.$emit('deleted', id);
                    })
            },
            show(item){
                console.log(item);
                swal({
                    title: 'Price Ksh ' + item.price,
                    text: item.description,
                    imageUrl: '/images/items/'+ item.image,
                    imageWidth: 215,
                    imageHeight: 215,
                    imageAlt: 'Custom image',
                    animation: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Close'
                })
            },

            addToCart(item)
            {
                this.cart.push(item);

                this.$store.dispatch('setCartItem',this.cart);

                let message = 'You have added ' + this.cart.length + ' item(s) to the cart';

                    swal('Success', message, 'success');
            }

        },
        mounted()
        {
            console.log(this.itemArray);
        },
    }

</script>