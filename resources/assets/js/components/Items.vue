<template>
    <div class = "index" id = "index">
        <div class = "grid-x">
            <div class = "medium-9 large-9 cell"><h6>Available Items</h6></div>
            <div class = "medium-3 large-3 cell"
                 style="align-items: flex-start"
                 v-show="this.$auth.isAuthenticated()"
            >
                <button class="button primary medium" data-open="createItem"
                >
                    Add New Item
                </button>
            </div>
        </div>

        <item-card :itemArray="arrayItems" ></item-card>
        <add-item></add-item>
    </div>
</template>
<script>
    import AddItem from './AddItem.vue'
    import ItemCard from './ItemCard';
    import {get_header} from "../global/config";
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
            'add-item' : AddItem
        },
        methods: {
            fetchItems()
            {
                axios.get('api/items', {headers:get_header()})
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

