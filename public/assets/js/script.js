var vue = new Vue({
    el: '#container',
    data() {
        return {
            products: {},
            categorys: {},
            min: 0,
            max: 0,
            start: 0,
            end: 0,
            selected: [],
        }
    },
    methods: {
        loadProduct() {
            axios.get("api/products").then(({data}) => (this.products = data));
        },

        minPrice() {
            axios.get("api/getminpriceproduct").then(({data}) => (this.min = data));
        },

        maxPrice() {
            axios.get("api/getmaxpriceproduct").then(({data}) => (this.max = data));
        },

        loadCategorys() {
            axios.get("api/categorys").then(({data}) => (this.categorys = data));
        },

        filterProduct(){
            axios.post(`api/products/filter`, {
                start: this.start,
                end: this.end,
                selected: this.selected
            })
            .then(({data}) => (this.products = data))
            .catch(e => {
                this.errors.push(e)
            })
        },

           },
    created() {
        this.loadProduct();
        this.minPrice();
        this.maxPrice();
        this.loadCategorys();
    },

})

