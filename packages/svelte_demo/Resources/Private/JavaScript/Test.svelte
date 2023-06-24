<script>
  // props
  export let title = "";

  let name = "World";
</script>

<div class="svelte-demo-block">
  <h3>Title (set as prop): {title}</h3>
  <p>
    <strong>Super Svelte Demo App!!</strong>
  </p>

  <label>
    Dein Name:
    <input bind:value={name} />
  </label>

  <p>Hello {name}!</p>
</div>

<style>
  .svelte-demo-block {
    min-height: 200px;
    border: 4px dotted green;
    padding: 10px;
  }
</style>
