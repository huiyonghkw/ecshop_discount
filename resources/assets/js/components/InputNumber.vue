<template>
  <div>
    <el-input-number v-model="num1" @change="handleChange" :min="1" :debounce="300"></el-input-number>
    <input type="hidden" name="quantity[]" v-model="quantity">
  </div>
</template>
<script>
export default {
    data() {
      return {
        num1: 1,
        quantity: []
      };
    },
    methods: {
      handleChange(value) {
        this.quantity = value;
      }
    }
  };
</script>