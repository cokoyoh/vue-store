<template>
    <div class = "index" id = "index">
        <div class = "grid-x">
            <div class = "medium-9 large-9 cell"><h6>Available Items</h6></div>
            <div class = "medium-3 large-3 cell"
                 style="align-items: flex-start"
                 v-show="this.$auth.isAuthenticated()"
            >
                <button class="button primary medium"
                        data-open="createItem"
                        v-show="admin"
                >
                    Add New Item
                </button>
            </div>
        </div>

        <item-card :items="items" ></item-card>
        <add-item @itemAdded="add"></add-item>
    </div>
</template>
<script>
    import AddItem from './AddItem.vue'
    import ItemCard from './ItemCard';
    import {get_header} from "../global/config";
    import collection from '../mixins/Collection';

    export default {
        mixins: [collection],
        data() {
            return {
                items: [],
                isAdmin: false,
            }
        },
        mounted() {
             this.fetchItems();
        },

        components: {
          'item-card' : ItemCard,
            'add-item' : AddItem
        },
        computed: {
            admin()
            {
                let user = this.$auth.getAuthenticatedUser();

                console.log("Auth user - ", user);

                if(user.id === 1)
                {
                    this.isAdmin = true;

                    return this.isAdmin;
                }
            }
        },
        methods: {
            fetchItems()
            {
                axios.get('api/items', {headers:get_header()})
                    .then(response => {
                        this.items = response.data;
                    })
            },
            add(item)
            {
                this.items.push(item);

                this.$emit('added');
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

