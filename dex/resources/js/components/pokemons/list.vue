<template>
  <div class="row">
    <spinner v-show="loading"></spinner>
    <div class="col-sm" v-for="pokemon in pokemons">
      <div class="card text-center" style="width: 18rem; margin-top:40px;">
        <img
          class="card-img-top rounded-circle mx-auto d-block"
          v-bind:src="pokemon.picture"
          style="width: 200px; height: 200px; background-color: #EFEFEF; margin: 20px;"
        >
        <div class="card-body">
          <h4 class="card-title">{{pokemon.name}}</h4>
          <p
            class="card-text"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis laborum incidunt sit voluptates quibusdam ab iusto cum vel molestiae quam rerum quidem nam iste cupiditate harum illum, quaerat impedit. Voluptatibus!</p>
          <a class="btn btn-primary" href="/trainers/" role="button">Ver más</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from "../../event-bus";
export default {
  data() {
    return {
      pokemons: [],
      loading: true
    };
  },
  created() {
    EventBus.$on('pokemon-added', data => {
        this.pokemons.push(data)
    })
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/pokemons").then(res => {
      this.pokemons = res.data;
      this.loading = false;
    });
  }
};
</script>


