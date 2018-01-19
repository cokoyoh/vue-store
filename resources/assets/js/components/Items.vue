<template>
    <div class = "index" id = "index">
        <div class = "grid-x">
            <div class = "medium-9 large-9 cell"><h6>Available Items</h6></div>
            <div class = "medium-3 large-3 cell"
                 style="align-items: flex-start"
                 v-show="this.$auth.isAuthenticated()"
            >
                <button class="button primary medium">
                    Add New Item
                </button>
            </div>
        </div>

        <item-card :itemArray="arrayItems" ></item-card>

        <!--<div class="grid-x">-->
            <!--<div class="medium-4 large-4 cell"  v-for = "item in arrayItems">-->
                <!--<div class="card">-->
                    <!--<img :src = "'/images/items/' + item.image"-->
                         <!--style = "height: 255px; width: 255px;">-->
                    <!--&lt;!&ndash;<p class="my-description">{{item.description}}</p>&ndash;&gt;-->
                    <!--<span>KSh {{item.price}}</span>-->
                    <!--&lt;!&ndash;<p style = "text-align: center"><strong>KSh {{item.price}}</strong></p>&ndash;&gt;-->
                    <!--<hr>-->
                    <!--<div class="grid-x">-->
                        <!--<div class="medium-4 large-4 cell">-->
                            <!--<button class="button success tiny">Buy</button>-->
                        <!--</div>-->
                        <!--<div class="medium-4 large-4 cell">-->
                            <!--<button class="button primary tiny">Edit</button>-->
                        <!--</div>-->
                        <!--<div class="medium-4 large-4 cell">-->
                            <!--<button class="button alert tiny" @click="destroy(item.id)">Delete</button>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

    </div>
</template>
<script>
    import ItemCard from './ItemCard.vue';
    export default {
        data() {
            return {
                items: false,
                arrayItems: [],
            }
        },
        mounted() {
             this.fetchItems();
        },
        components: {
          'item-card' : ItemCard,
        },
        methods: {
            fetchItems()
            {
                axios.get('api/items')
                    .then(response => {
                        this.items = response.data;

                        this.arrayItems= this.items.data;
                    })
            },
        }
    }

</script>

<style type = "scss">
    .index {
        padding: 30px 30px;
        img {
            height: 225px;
            width: 225px;
        }
    }
</style>

