<template>
  <v-container grid-list-xl>
    <post-card
      @select="post => { selectedPost = post; comments = false }"
      @comments="post => { selectedPost = post; comments = true }"
      :post="post"
      v-for="post in sortedPosts"
      :key="post.id"/>
    <post-drawer v-if="!smallDisplay" :post.sync="selectedPost" :comments="comments" />
    <post-sheet v-if="smallDisplay" :post.sync="selectedPost" :comments="comments" />
    <v-speed-dial v-model="fab" bottom right fixed transition="scale-transition">
      <v-tooltip slot="activator" left>
        <v-btn fab primary slot="activator">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
        <span>Add new post</span>
      </v-tooltip>
      <v-tooltip left>
        <v-btn fab small slot="activator" @click="newPostDialog = true">
          <v-icon>mdi-file-document-box</v-icon>
        </v-btn>
        <span>Add new meme</span>
      </v-tooltip>
      <v-tooltip left>
        <v-btn fab small slot="activator" @click="newPostDialog = true">
          <v-icon>mdi-video</v-icon>
        </v-btn>
        <span>Add new video</span>
      </v-tooltip>
      <v-tooltip left>
        <v-btn fab small slot="activator" @click="newPostDialog = true">
          <v-icon>mdi-image</v-icon>
        </v-btn>
        <span>Add new image</span>
      </v-tooltip>
    </v-speed-dial>
    <v-dialog persistent v-model="newPostDialog" max-width="600">
      <v-card>
        <v-card-text>
          <v-tabs centered fixed v-model="newPostTab">
            <v-tabs-bar>
              <v-tabs-slider></v-tabs-slider>
              <v-tabs-item href="#0">Image</v-tabs-item>
              <v-tabs-item href="#1">Video</v-tabs-item>
              <v-tabs-item href="#2">Meme</v-tabs-item>
            </v-tabs-bar>
            <v-tabs-items>
              <v-tabs-content id="0">
                <v-form ref="imageForm">
                  <v-text-field :rules="rules" v-model="postTitle" label="Title" required />
                  <v-text-field :rules="rules" v-model="postUrl" label="Image URL" required />
                  <v-text-field v-model="postSource" label="Source" />
                  <img class="preview" :src="postUrl">
                </v-form>
              </v-tabs-content>
              <v-tabs-content id="1">
                <v-form ref="videoForm">
                  <v-text-field :rules="rules" label="Title" required />
                  <v-text-field :rules="rules" label="Video URL" required />
                </v-form>
              </v-tabs-content>
              <v-tabs-content id="2">
                [not implemented yet]
              </v-tabs-content>
            </v-tabs-items>
          </v-tabs>
        </v-card-text>
        <v-card-actions>
          <v-btn flat color="red" @click="newPostDialog = false">Close</v-btn>
          <v-btn flat @click="$refs.imageForm.reset()">Reset</v-btn>
          <v-btn @click="addPost" color="primary">Add</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-snackbar top v-model="added" :timeout="3000">
      You added a new post!
    </v-snackbar>
  </v-container>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { Prop, Watch } from "vue-property-decorator";
import PostSheet from "./parts/PostSheet.vue";
import PostCard from "./parts/PostCard.vue";
import PostDrawer from "./parts/PostDrawer.vue";
@Component({
  components: { PostCard, PostDrawer, PostSheet }
})
export default class Posts extends Vue {
  @Prop() channel: number;
  @Prop() loading: boolean;
  get apiUrl() { return "http://api2.altar.timsmanter.net/" }
  get smallDisplay() { return this.$vuetify.breakpoint.smAndDown }
  posts = [];
  selectedPost = null;
  comments = false;
  fab = false;
  newPostDialog = false;
  newPostTab = "0";
  postTitle = null;
  postUrl = null;
  postSource = null;
  added = false;
  mounted() { this.updateChannel() }
  @Watch("channel")
  updateChannel() {
    this.$emit("update:loading", true);
    fetch(this.apiUrl + `channels/${this.channel}/posts`).then(async data => {
      this.posts = await data.json();
      this.$emit("update:loading", false);
      window.scroll(0, 0);
    })
  }
  get sortedPosts() {
    return this.sortedPostsByDate(true);
  }
  sortedPostsByDate(reverse: boolean) {
    if (this.posts) {
      return this.posts.sort((a: any, b: any) => {
        const dateA = new Date(a.createDate);
        const dateB = new Date(b.createDate);
        if (dateA < dateB) { return reverse ? 1 : -1; }
        if (dateA > dateB) { return reverse ? -1 : 1; }
        return 0;
      })
    }
  }
  addPost() {
    if (this.$refs.imageForm.validate()) {
      const data = {
        path: this.postUrl,
        title: this.postTitle,
        source: this.postSource,
        createDate: new Date(),
        publishDate: new Date(),
        isVisible: true,
        channels: [
          "/admin/channel/3"
        ],
        author: null,
        type: "/admin/post_types/1",
      }
      fetch(this.apiUrl + `admin/posts`, {
        method: "POST",
        headers: new Headers({ "Content-Type": "application/json" }),
        body: JSON.stringify(data)
      }).then(r => {
        if (r.ok) {
          this.newPostDialog = false;
          this.added = true;
        }
      });
    }
  }
  rules = [
    (f: string) => f && f.trim().length > 0 || "This field is required"
  ]
  $vuetify: any;
  $refs: any;
}
</script>

<style scoped lang="scss">
  .preview {
    width: 100%;
  }
</style>
