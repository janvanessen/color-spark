<template>

<section class="section">
  <div class="container">
    <h2 class="title">Color Spark</h2>
    <input v-model="input" placeholder="edit me" v-on:keyup.enter="getColors" />
    <button class="button" @click="getColors">
     getColors
    </button>
    <div>
    {{output}}
    </div>
  </div>
</section>

</template>

<script>
import axios from "axios";

export default {
  mounted() {
    console.log('Component mounted.')
  },
  data() {
    return {
      input: '',
      output: '',
    };
  },
  methods: {
    async getColors() {
      console.log('call colors');
      this.output = '';
      const { data } = await axios.get("/api/colors", 
        { 
          params: {
            text: this.input
          }
        }); 
      console.log(data);
      this.output = data.answer;
    }
  }
};
</script>

