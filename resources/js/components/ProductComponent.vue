<template>

    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{product.name}}
                    </div>

                    <div class="card-body">
                        &euro;{{product.price}},00 <br>
                        Quantita: {{click}}
                    </div>
                    <div class="card-body">
                        <button @click="increase">+</button>
                        <button @click="decrease">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            product: Object
        },
        data: function () {
            return {
                click: 0,
            }
        },
        mounted() {
            console.log(this.product)
        },
        methods: {
            increase: function(){
                this.click++;
            },
            decrease: function(){
                this.click--;
            }

        }
    }
</script>
