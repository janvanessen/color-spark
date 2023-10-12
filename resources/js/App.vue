<template>

<section class="section">
  <div class="container">
    <h2 class="title">Hello Counter</h2>
    <div class="level">
      <div class="level-item">
      <h1>
        <button class="button" @click="incrementCounter">
        +
        </button>
        <span>{{counter}}</span>
        <button class="button" @click="decrementCounter">
        -
        </button>
        </h1>
      </div>

    </div>
    <button class="button" @click="getColors">
     getColors
    </button>
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
      title: "Counter",
      counter: 0
    };
  },
  methods: {
    incrementCounter() {
      this.counter++;
    },
    decrementCounter() {
      this.counter--;
    },
    async getColors() {
      console.log('call colors');
      const { data } = await axios.get("/api/colors", 
        { 
          params: {
            text: "PHP is"
          }
        });
      console.log(data);
    }
  }
};
</script>

