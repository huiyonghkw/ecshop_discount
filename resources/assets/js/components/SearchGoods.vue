<template>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
            options: null
        }
    },
    methods: {
        getOptions(search, loading) {
            loading(true)
            this.$http.get('https://api.github.com/search/repositories', {
                q: search
            }).then(resp => {
                this.options = resp.data.items
                loading(false)
            })
        }
    }
  }
</script>