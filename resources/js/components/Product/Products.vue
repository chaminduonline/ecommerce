/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4" v-for="item in items">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" v-bind:src="item.thumbnail_url">
                    <div class="card-block">
                        <figure class="profile profile-inline">
                            <img src="https://picsum.photos/200/150/?random" class="profile-avatar" alt="">
                        </figure>
                        <h4 class="card-title">{{ item.name }}</h4>
                        <div class="card-text">
                          <h3>$ {{ item.base_price }}</h3>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Add</button>
                        <router-link class="btn btn-info" :to="{ name: 'ProductDetail', params: { id: item.id }}">More</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Products",
    data() {
        return {
            items: []
        }
    },
    watch: {
      
    },
    methods: {
        async findAllItems(){
            await axios.get(`/api/items`).then(({ data }) => {
                this.items = data.items;
            }).catch(({ response: { data } }) => {

            }).finally(() => {
                
            })
        }
    },
    created() {
        this.findAllItems();
    },
    mounted() {

    }
}
</script>