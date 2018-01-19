<template>
    <div class = "reveal" id = "createItem" data-reveal>
            <div class = "medium-12 large-12 column">
                <h4>Add Item</h4>
                <div class="row">
                    <form @submit.prevent="add">
                        <div class="large-12 medium-12">
                            <label>Item Name
                                <input type = "text"
                                       name="name"
                                       v-model="item.name"
                                       placeholder = "Descriptive name of the item">
                            </label>
                        </div>
                        <div class="large-12 medium-12">
                            <label>Item Description
                                <textarea type = "text"
                                          name="description"
                                          v-model="item.description"
                                          placeholder = "Descriptive name of the item"
                                          cols="10" rows="3">
                                </textarea>
                            </label>
                        </div>
                        <div class="large-12 medium-12">
                            <label>Total Number
                                <input type = "number"
                                       placeholder = "How many?"
                                       v-model="item.number"
                                       data-vv-as="number">
                            </label>
                        </div>
                        <div class="large-12 medium-12">
                            <label>Price Per Item
                                <input type = "number"
                                       placeholder = "KSh 102"
                                       v-model="item.price">
                            </label>
                        </div>
                        <div class="large-12 medium-12">
                            <label>Item Image
                                <input type = "file"
                                       @change="imageChanged"
                                       name="image" id="image">
                            </label>
                        </div>
                        <div class="large-12 medium-12">
                            <button class="button primary" value="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>
<script>
    import {get_header} from "../global/config";

    export default {
        data() {
            return {
                item: {
                    name: '', description: '', number: '', price: '', image: ''
                }
            }
        },
        methods: {
            add()
            {
                let post_data = this.item;

                axios.post('api/items-store', post_data, {headers:get_header()})
                    .then(response => {
                        swal('Adding Item', response.data.message, 'success');

                        this.item = {};
                    })
                    .catch(response => {
                        console.log(response);
                    })
            },
            imageChanged(e){
                console.log(e.target.files[0]);
                let fileReader = new FileReader();
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.item.image = e.target.result
                };
                console.log(this.item)
            },
        }
    }
</script>

<style type = "scss">
    .create{
        padding: 30px 30px;
    }
</style>