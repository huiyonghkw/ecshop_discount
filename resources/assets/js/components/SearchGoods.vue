<template>
    <div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>商品检索...</h1></div>
                <div class="panel-body">
                    <div class="form-group">
                        <v-select multiple :on-change="consoleCallback"  :debounce="250" :options="options" :on-search="getOptions" placeholder="请输入商品名称加入购物车" ></v-select>    
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">加入购物车</button>
                    </div>
                    
                </div>
            </div>
            <div col-md-12>
                <div class="panel panel-default">
                <div class="panel-heading"><h3>请先注册登录后获取私人访问令牌 AccessToken后购买商品</h3></div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="goodses" v-model="goodses">    
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="5" v-model="accessToken"></textarea>    
                    </div>
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
            accessToken: null,
            goodses: null,
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
         * @param string search 
         * @param function loading
         * @return void       
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
        },

        /**
         * Submit the goodses
         * @param string val 
         * @return void
         */
        consoleCallback(val) {
            this.goodses = val;
        }
    }
}
</script>