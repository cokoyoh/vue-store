<template>
    <div class="grid-x">
        <div class="medium-4 large-4 cell"  v-for = "item in itemArray">
            <div class="card">
                <img :src = "'/images/items/' + item.image"
                     style = "height: 255px; width: 255px;" @click="show(item)">
                <p>KSh {{item.price}}</p>
                <hr>
                <div class="grid-x">
                    <div class="medium-4 large-4 cell">
                        <button class="button success tiny">Buy</button>
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
    export default {
        props: ['itemArray'],
        data() {
            return {
                items: []
            }
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
            }

        },
        mounted()
        {
            console.log(this.itemArray);
        }
    }

</script>