<template>
  <v-navigation-drawer ref="drawerEl" temporary fixed right width="700" v-model="postData">
    <post-card :post="post" details />
    <post-comments :post="post" />
  </v-navigation-drawer>
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
export default class PostDrawer extends Vue {
  @Prop() post: any;
  @Prop() comments: boolean;
  get postData() { return this.post; }
  set postData(val) { if (!val) { this.$emit("update:post", val); } }
  $refs: {
    drawerEl: Vue
  }
  @Watch("post")
  scrollToComments() {
    if (!this.comments) { return; }
    setTimeout(() => {
      const commentsEl = this.$refs.drawerEl.$el.querySelector(".comments");
      const commentsTop = (commentsEl as HTMLElement).offsetTop;
      this.$refs.drawerEl.$el.scroll({
        top: commentsTop,
        behavior: "smooth"
      });
    }, 500);
  }
}
</script>