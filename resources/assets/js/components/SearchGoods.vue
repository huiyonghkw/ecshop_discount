<template>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">商品检索...</div>
                <div class="panel-body">
                        <v-select
                            :debounce="250"
                            :on-search="getOptions"
                            :options="options"
                            placeholder="Search GitHub Repositories..."
                            label="full_name"
                        >
                        </v-select>
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
            options: null,
            tokens: [],
            accessToken: null
        }
    },
    /**
     * Prepare the component (Vue 2.x).
     */
    mounted() {
        this.prepareComponent();
    },

    methods: {
        getOptions(search, loading) {
            var instance = axios.create({
              headers: {'Authorization': 'Bearer ' + this.accessToken}
            });
            loading(true)
            instance.get('/api/goodses', {
                search: search
            }).then(resp => {
                this.options = resp.data.items
                loading(false)
            })
        },

         /**
         * Prepare the component (Vue 2.x).
         */
        prepareComponent() {
            // this.getTokens();
            this.createAccessToken();
        },

        /**
         * Get all of the personal access tokens for the user.
         */
        // getTokens() {
        //     axios.get('/oauth/personal-access-tokens')
        //             .then(response => {
        //                 this.tokens = response.data;
        //             });
        // },

        createAccessToken() {
            const data = {
                name: 'ecshop_discount',
                scopes: []
            };

            axios.post('/oauth/personal-access-tokens', data)
                .then(response => {
                    this.accessToken = response.data.accessToken;
                    console.log(response.data.accessToken);
                })
                .catch (error => {
                    if (typeof error.response.data === 'object') {
                        this.form.errors = _.flatten(_.toArray(error.response.data));
                    } else {
                        this.form.errors = ['Something went wrong. Please try again.'];
                    }
                });
        }
    }
}
</script>