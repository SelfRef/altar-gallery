<template>
    <v-dialog v-model="postData" fullscreen transition="dialog-bottom-transition" :overlay="false" content-class="post-sheet-content">
      <v-card v-if="post">
        <v-toolbar dark color="primary">
          <v-btn icon @click="postData = null" dark>
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Post Details</v-toolbar-title>
        </v-toolbar>
        <v-container fluid class="grey">
          <post-card :post="post" details />
          <post-comments :post="post" />
        </v-container>
      </v-card>
    </v-dialog>
  </v-flex>
</template>

<script lang="ts">
import Vue from "vue";
import Vuetify from "vuetify";
import Component from "vue-class-component";
import { Prop, Watch } from "vue-property-decorator";
import PostCard from "./PostCard.vue";
import PostComments from "./PostComments.vue";
@Component({
  components: { PostCard, PostComments }
})
export default class PostSheet extends Vue {
  @Prop() post: any;
  @Prop() comments: boolean;
  get postData() { return this.post; }
  set postData(val) { if (!val) { this.$emit("update:post", val); } }
  mounted() { this.scrollToComments(); }
  @Watch("post")
  scrollToComments() {
    if (!this.comments) { return; }
    setTimeout(() => {
      const dialogContent = document.querySelector(".post-sheet-content");
      if (!dialogContent) { return; }
      const commentsEl = dialogContent.querySelector(".comments");
      const commentsTop = (commentsEl as HTMLElement).offsetTop;
      dialogContent.scroll({
        top: commentsTop,
        behavior: "smooth"
      });
    }, 500);
  }
}
</script>

<style scoped lang="scss">
.flex {
  width: 700px;
  max-width: 100%;
  flex: unset;
}
img {
  max-width: 100%;
}
.form-group {
  padding: 0 16px;
}
</style>

