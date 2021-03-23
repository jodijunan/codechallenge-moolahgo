<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <!--  -->
    </v-navigation-drawer>

    <v-app-bar app color="primary" dark>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <MainForm />
    </v-main>
  </v-app>
</template>
<script>
import MainForm from "./components/MainForm";

export default {
  name: "App",

  components: {
    MainForm,
  },

  data: () => ({ drawer: false }),
};
</script>
