<template>
  <v-card class="comments">
    <v-toolbar >
      <v-toolbar-title>Comments</v-toolbar-title>
      <v-spacer />
      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-sort</v-icon>
      </v-btn>
    </v-toolbar>
    <v-container>
      <v-layout>
        <v-flex>
          <v-text-field v-model="commentText"
          :disabled="newCommentLoading"
          label="Your comment"></v-text-field>
        </v-flex>
        <v-flex class="no-grow">
          <v-btn icon
            @click="addComment"
            :loading="newCommentLoading"
            :disabled="newCommentLoading">
            <v-icon>mdi-send</v-icon>
          </v-btn>
        </v-flex>
      </v-layout>
      <v-list two-line>
        <template v-for="comment in sortedComments">
          <v-list-tile :key="comment.id" avatar transition="slide-x-reverse-transition">
            <v-list-tile-avatar>
            <v-icon class="indigo" color="white">mdi-account</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-sub-title v-html="'Anonymous - ' + new Date(comment.createDate).toLocaleDateString()"></v-list-tile-sub-title>
              <v-list-tile-title v-html="comment.content"></v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn icon>
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
            </v-list-tile-action>
            <v-list-tile-action>
              <v-btn icon @click="deleteComment(comment.id)">
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </template>
      </v-list>
    </v-container>
  </v-card>
</template>

<script lang="ts">
import Vue from "vue";
import Vuetify from "vuetify";
import Component from "vue-class-component";
import { Prop, Watch } from "vue-property-decorator";
import PostCard from "./PostCard.vue";
@Component({
  components: { PostCard }
})
export default class PostComments extends Vue {
  @Prop() post: any;
  get apiUrl() {
    return "http://api2.altar.timsmanter.net/";
  }
  commentText = "";
  comments: any[] | null = null;
  commentsSort = "date-reverse"
  newCommentLoading = false;
  get sortedComments() {
    switch(this.commentsSort) {
      case "date":
        return this.sortedCommentsByDate(false);
      case "date-reverse":
        return this.sortedCommentsByDate(true);
    }
  }
  sortedCommentsByDate(reverse: boolean) {
    if (this.comments) {
      return this.comments.sort((a, b) => {
        const dateA = new Date(a.createDate);
        const dateB = new Date(b.createDate);
        if (dateA < dateB) { return reverse ? 1 : -1; }
        if (dateA > dateB) { return reverse ? -1 : 1; }
        return 0;
      })
    }
  }
  mounted() { this.updateComments(); }
  @Watch("post")
  updateComments() {
    fetch(this.apiUrl + `posts/${this.post.id}/comments`).then(async data => {
      this.comments = await data.json();
    });
  }
  deleteComment(id: number) {
    fetch(this.apiUrl + `admin/comments/${id}`, { method: "DELETE" }).then(r => {
      if (r.ok) { this.updateComments(); }
    });
  }
  addComment() {
    const text = this.commentText.trim()
    if (text === "") { return; }
    this.newCommentLoading = true;
    fetch(this.apiUrl + `admin/comments`, {
        method: "POST",
        headers: new Headers({ "Content-Type": "application/json" }),
        body: JSON.stringify({
          content: text,
          createDate: new Date(),
          isVisible: true,
          post: "/posts/" + this.post.id
        })
      }).then(r => {
      if (r.ok) {
        this.updateComments();
        this.commentText = "";
        this.newCommentLoading = false;
      }
    });
  }
}
</script>

