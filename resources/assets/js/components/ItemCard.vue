<template>
    <div class="grid-x">
        <div class="medium-4 large-4 cell"  v-for = "item in items">
            <div class="card">
               <div @click="show(item)">
                   <img :src = "'/images/items/' + item.image"
                        style = "height: 255px; width: 255px;" >
                   <!--<p class="my-description">{{item.name}} </p>-->
                   <p class="my-description"><strong>KSh {{item.price}}</strong></p>
               </div>
                <div class="grid-x">
                    <div class="medium-4 large-4 cell">
                        <button class="button success tiny" @click="addToCart(item)">Buy</button>
                    </div>
                    <div class="medium-4 large-4 cell">
                        <button class="button primary tiny"  v-show="admin">Edit</button>
                    </div>
                    <div class="medium-4 large-4 cell">
                        <button class="button alert tiny"
                                @click="destroy(item.id)"
                                v-show="admin"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {mapState} from 'vuex';
    import {get_header} from "../global/config";

    export default {
        props: ['items'],
        data() {
            return {
                cart: [],
                isAdmin: false,
            }
        },

        computed: {
            ...mapState({
                cartStore:state => state.cartStore
            }),

            admin()
            {
                let user = this.$auth.getAuthenticatedUser();

                if(user.id === 1)
                {
                    this.isAdmin = true;

                    return this.isAdmin;
                }
            }
        },

        methods: {
            destroy(id)
            {
                axios.delete('api/items/destroy/'+ id, {headers:get_header()})
                    .then(response => {
                        console.log(response);

                         swal('Success','Item has been deleted!', 'success');

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