<template>
  <v-app>
    <v-navigation-drawer fixed :clipped="drawerClipped" app v-model="drawer">
      <v-toolbar flat>
        <v-list>
          <v-list-tile>
            <v-list-tile-title class="title">
              Channels
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-divider></v-divider>
      <v-list>
        <v-list-tile v-for="(channel, i) in channels" :key="channel.id" @click="channelId = channel.id; switchDrawer()">
          <v-list-tile-action>
            <v-icon>{{channelIcons[i]}}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{channel.name}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar fixed app clipped-left dark color="primary">
      <v-toolbar-side-icon v-if="$vuetify.breakpoint.mdAndDown" @click="switchDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-toolbar-side-icon>
      <v-toolbar-title class="white--text">
        Altar Gallery - {{channels ? channels[channelId-1].name : null}}
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon :loading="channelsLoading || pageLoading">
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content class="grey lighten-4">
      <router-view :channel="channelId" :loading.sync="pageLoading" />
    </v-content>
    <v-footer app></v-footer>
  </v-app>
</template>

<script lang="ts">
import Vue from "vue"
import Vuetify from "vuetify";
import Component from "vue-class-component"
import Posts from "./pages/Posts.vue";
@Component({
  components: {
    Posts
  }
})
export default class App extends Vue {
  drawer: boolean | null = null;
  channelsLoading: boolean | null = null;
  pageLoading: boolean | null = null;
  get drawerClipped() { return this.$vuetify.breakpoint.lgAndUp }
  get apiUrl() { return "http://api2.altar.timsmanter.net/" }
  get channelIcons() {
    return [ "mdi-star", "mdi-fire", "mdi-new-box" ]
  }
  channels = null;
  channelId = 1;
  mounted() {
    this.channelsLoading = true;
    fetch(this.apiUrl + "channels").then(async data => {
      this.channels = await data.json();
      this.channelsLoading = false;
    })
  }
  switchDrawer() { if (!this.drawerClipped) { this.drawer = !this.drawer} }
  $vuetify: any;
}
</script>

<style>

</style>
