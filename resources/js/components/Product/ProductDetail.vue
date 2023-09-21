/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
<template>
    <div>
        <div class="container" v-if="item">
            <br>
            <div class="card">
                <div class="row">
                    <aside class="col-sm-5 border-right">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <div class="container"> <a href="#"><img
                                            src="https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png"></a>
                                </div>
                            </div> <!-- slider-product.// -->
                            <div class="img-small-wrap">
                                <div class="item-gallery" v-for="image in image_links">
                                    <img width="300" v-bind:src="image.link">
                                </div>
                            </div> <!-- slider-nav.// -->
                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <aside class="col-sm-7">
                        <article class="card-body p-5">
                            <h3 class="title mb-3">{{ item.name }}</h3>

                            <p class="price-detail-wrap">
                                <span class="price h3 text-success">
                                    <span class="currency">US $</span><span class="num">{{ item.base_price }}</span>
                                </span>
                            </p> <!-- price-detail-wrap .// -->
                            <dl class="item-property">
                                <dt>{{ item.description }}</dt>

                            </dl>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <dl class="param param-inline">
                                        <dt>Quantity: </dt>
                                        <dd>
                                            <select v-model="qty" class="form-control form-control-sm" v-on:click="calculate()"
                                                style="width:70px;">
                                                <option> 1 </option>
                                                <option> 2 </option>
                                                <option> 3 </option>
                                            </select>
                                        </dd>
                                    </dl> <!-- item-property .// -->
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                            <div class="row">
                                <div class="col-sm-7">
                                    <dl class="param param-inline" v-for="variation in item_variations">
                                        <dt>{{ variation.name }}: </dt>
                                        <dd>
                                            <label class="form-check form-check-inline" v-for="option in variation.options">
                                                <input class="form-check-input"
                                                    v-on:click="clickVariation(variation, option, $event)" type="radio"
                                                    v-bind:name="variation.id" v-bind:id="option.id"
                                                    v-bind:value="option.id">
                                                <span class="form-check-label">{{ option.name }}</span>
                                            </label>
                                        </dd>
                                    </dl> <!-- item-property .// -->
                                </div> <!-- col.// -->
                            </div>
                            <hr>
                            <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                            <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i
                                    class="fas fa-shopping-cart"></i> Add to cart </a>
                        </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
        </div>
    </div>
</template>

<script>
export default {
    name: "productDetail",
    data() {
        return {
            item: null,
            item_variations: [],
            selected_variation_option: [],
            image_links: [],
            price: 0,
            qty: 0,
        }
    },
    watch: {
        selected_variation_option: function (val) {
            this.calculate();
        },
    },
    methods: {
        async view(id) {
            this.processing = true

            await axios.get(`/api/items/${id}`).then(({ data }) => {
                this.item = data.item;
                this.price = data.item.base_price;
                this.image_links = data.image_links;
                this.item_variations = data.item_variations;
            }).catch(({ response: { data } }) => {

            }).finally(() => {
                this.processing = false
            })
        },
        clickVariation(variation, selected_option, event) {

            if (this.selected_variation_option.length == 0) {
                this.addVariation(variation.id, selected_option);
            }
            this.selected_variation_option.map((option, index) => {
                if (option.id == variation.id) {
                    this.selected_variation_option.splice(index, 1);
                }
                return option;
            });
            this.addVariation(variation.id, selected_option);
        },
        addVariation(id, value) {
            this.selected_variation_option.push({ id: id, option: value });
        },
        calculate() {
            this.item.base_price = this.price;
            this.selected_variation_option.forEach((variation, index) => {
                this.item.base_price += variation.option.price_adjustment;
            });
            this.item.base_price = this.qty * this.item.base_price;
        }
    },

    created() {
        this.view(this.$route.params.id);
    },
    mounted() {

    }
}
</script>