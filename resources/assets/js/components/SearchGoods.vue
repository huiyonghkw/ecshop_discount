<template>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">商品检索...</div>
                <div class="panel-body">
                    <v-select multiple :debounce="250" :options="options" :on-search="getOptions" placeholder="请输入商品名称加入购物车"></v-select>
                </div>
            </div>

            <div col-md-12>
                <div class="panel panel-default">
                <div class="panel-heading">私人访问令牌 AccessToken</div>
                <div class="panel-body">
                    <textarea class="form-control" rows="10" v-model="accessToken"></textarea>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import vSelect from "vue-select"
  export default {
    components: {vSelect},

    data() {
        return {
            options: [],
            accessToken: null
        }
    },

    /**
     * Prepare the component (Vue 2.x).
     */
    mounted() {
        this.prepareComponent();
    },

    /**
     * Functions
     * @type {Object}
     */
    methods: {

        /**
         * Search goodses
         * @param  {[type]} search  [description]
         * @param  {[type]} loading [description]
         * @return {[type]}         [description]
         */
        getOptions(search, loading) {
            loading(true)
            axios.create({
                headers: {'Authorization': 'Bearer ' + this.accessToken} 
            }).get('/api/goodses', {
                params: {
                    search: search    
                }
            }).then(resp => {
                var opts = [];
                var objects = resp.data;
                for (var i = 0; i < objects.length; i++) {
                    opts.push(objects[i]);
                }
                this.options = opts;
                loading(false)
            })
        },

         /**
         * Prepare the component (Vue 2.x).
         */
        prepareComponent() {
            this.createAccessToken();
            // this.loadingGoodses();
        },

        /**
         * Create access token
         * @return void
         */
        createAccessToken() {
            const data = {
                name: 'ecshop_discount',
                scopes: []
            };

            axios.post('/oauth/personal-access-tokens', data)
                .then(response => {
                    this.accessToken = response.data.accessToken;
                })
                .catch (error => {
                    if (typeof error.response.data === 'object') {
                        this.form.errors = _.flatten(_.toArray(error.response.data));
                    } else {
                        this.form.errors = ['Something went wrong. Please try again.'];
                    }
                });
            }
        },

        loadingGoodses() {
            axios.create({
                headers: {'Authorization': 'Bearer ' + this.accessToken} 
            })
            .get('/api/goodses')
            .then(resp => {
                var opts = [];
                var objects = resp.data;
                for (var i = 0; i < objects.length; i++) {
                    opts.push(objects[i]);
                }
                this.options = opts;
            })
        }
  }
</script>