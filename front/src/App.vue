<template>

  <div id="nav">
    <router-link to="/">Home</router-link> | 
    <router-link to="/seed">Create User</router-link> |
    <router-link to="/list">List of referral code</router-link>

	<div class="container py-3">
		<main>
			<router-view/>
		</main>
  </div>
  </div>
  
  
  
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
@media (min-width: 1400px) {
	.container, .container-lg, .container-md, .container-sm {
		max-width: 560px !important;
	}
}
#nav {
  padding-top: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
