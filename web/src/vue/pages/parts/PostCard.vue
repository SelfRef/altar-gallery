<template>
  <v-layout justify-center>
    <v-flex class="no-grow">
      <v-card v-if="post" class="post mb-3">
        <v-card-media contain @click.native="$emit('select', post)" >
          <img :src="post.path || null" alt="">
        </v-card-media>
        <v-card-title primary-title @click="$emit('select', post)">
          <div>
            <h3 class="headline mb-0">{{post.title}}</h3>
          </div>
        </v-card-title>
        <v-card-actions>
          <v-menu offset-y top>
            <v-badge slot="activator" color="accent" overlap>
              <v-btn flat primary>Share</v-btn>
              <span slot="badge">0</span>
            </v-badge>
            <v-card>
              <v-container>
                <v-layout>
                  <v-flex>
                    <v-btn block class="indigo white--text">
                      <v-icon left>mdi-facebook</v-icon>
                      Facebook
                    </v-btn>
                  </v-flex>
                </v-layout>
                <v-layout>
                  <v-flex>
                    <v-btn block class="light-blue white--text">
                      <v-icon left>mdi-twitter</v-icon>
                      Twitter
                    </v-btn>
                  </v-flex>
                </v-layout>
                <v-layout>
                  <v-flex>
                    <v-btn block class="red white--text">
                      <v-icon left>mdi-google-plus</v-icon>
                      Google+
                    </v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-menu>
          <v-menu offset-y top>
            <v-badge slot="activator" color="accent" overlap>
              <v-btn flat primary>Rate</v-btn>
              <span slot="badge">0</span>
            </v-badge>
            <v-card>
              <v-tooltip top v-for="i in 5" :key="i">
                <v-btn slot="activator" flat icon large @click="rate=true">
                  <v-icon x-large>mdi-star</v-icon>
                </v-btn>
                <span>{{i}}</span>
              </v-tooltip>
            </v-card>
          </v-menu>
          <v-badge v-if="details !== ''" slot="activator" color="accent" overlap>
              <v-btn flat primary @click="$emit('comments', post)">Comments</v-btn>
              <span slot="badge">{{post.comments.length}}</span>
            </v-badge>
        </v-card-actions>
      </v-card>
    </v-flex>
    <v-snackbar top v-model="rate" :timeout="3000">
      You rated this post!
    </v-snackbar>
  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";
import Vuetify from "vuetify";
import Component from "vue-class-component";
import { Prop } from "vue-property-decorator";
@Component
export default class PostCard extends Vue {
  @Prop({default: null}) post: any;
  @Prop({default: false}) details: boolean;
  rate = false;
}
</script>

<style lang="scss">
.post {
  width: 700px;
  max-width: 100%;
  .card__media__content {
    flex-direction: column;
    img {
      max-width: 100%;
    }
  }
}
.form-group {
  padding: 0 16px;
}
</style>

