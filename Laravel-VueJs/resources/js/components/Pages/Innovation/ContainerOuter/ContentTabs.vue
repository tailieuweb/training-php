<template>
  <MDBTabPane :tabId="tabId">
    <div class="container-outer">
      <ul class="brandhub-thumb-list gap-1">
        <li
          class="branhub-thumb-item"
          v-for="sectionItem in sectionArticlePost"
          :key="sectionItem.id"
        >
          <div class="inside-brandhub-thumb-item">
            <div class="image-brandhub-item">
              <a href="">
                <img :src="sectionItem.image_article" alt="" />
              </a>
            </div>
            <div class="title-subtitle-brandhub">
              <h4 class="title">
                {{ sectionItem.title_article }}
              </h4>
              <p class="subtitle">
                {{ sectionItem.subtitle_article }}
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </MDBTabPane>
</template>

<script>
import { MDBTabPane } from "mdb-vue-ui-kit";
export default {
  components: {
    MDBTabPane,
  },
  data() {
    return {
      textImagePath: "~Image/",
    };
  },
  props: {
    sectionArticlePost: Object,
    tabId: String,
  },
  methods: {},
};
</script>

<style scoped>
ul {
  padding-left: 0;
}
.brandhub-thumb-list {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
.brandhub-thumb-item {
  list-style: none;
}
.image-brandhub-item a {
  display: block;
  width: 100%;
}
.image-brandhub-item img {
  max-width: 100%;
}

.inside-brandhub-thumb-item {
  position: relative;
}

.title-subtitle-brandhub .subtitle {
  transition: opacity 0.5s;
  opacity: 1;
}
.title {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.title-subtitle-brandhub {
  background: rgba(0, 0, 0, 0.35);
  position: absolute;
  bottom: 0;
  height: 50px;
  overflow: hidden;
  padding: 13px 31px 13px 31px;
  transition: height 0.5s, background 1.5s;
  width: 100%;
  z-index: 15;
}
.brandhub-thumb-list .branhub-thumb-item:hover .title-subtitle-brandhub {
  height: 200px;
  background: rgba(0, 0, 0, 0.7);
}

.brandhub-thumb-list
  .branhub-thumb-item:hover.title-subtitle-brandhub
  .subtitle {
  opacity: 1;
}
.brandhub-thumb-list .branhub-thumb-item:hover .title-subtitle-brandhub .title {
  overflow: initial;
  text-overflow: unset;
  white-space: unset;
}

.title-subtitle-brandhub h4 {
  color: #fff;
}
.title-subtitle-brandhub p {
  color: #fff;
}
/**setting width of computer screen */
@media only screen and (min-width: 1480px) and (max-width: 1600px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 1359px) and (max-width: 1479px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 1233px) and (max-width: 1358px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 1112px) and (max-width: 1232px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 1112px) and (max-width: 1232px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

/** ipad */
@media only screen and (min-width: 991px) and (max-width: 1111px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 865px) and (max-width: 990px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media only screen and (min-width: 739px) and (max-width: 864px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr;
  }
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title-subtitle-brandhub)
    :hover
    .title-subtitle-brandhub {
    height: 50px;
    background: rgba(0, 0, 0, 0.7);
  }
  /** Trạng thái thực hiện khi hủy hover */
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title)
    :hover
    .title-subtitle-brandhub
    .title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
@media only screen and (min-width: 608px) and (max-width: 738px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr 1fr;
  }
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title-subtitle-brandhub)
    :hover
    .title-subtitle-brandhub {
    height: 50px;
    background: rgba(0, 0, 0, 0.7);
  }
  /** Trạng thái thực hiện khi hủy hover */
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title)
    :hover
    .title-subtitle-brandhub
    .title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
@media only screen and (min-width: 483px) and (max-width: 607px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr;
  }
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title-subtitle-brandhub)
    :hover
    .title-subtitle-brandhub {
    height: 50px;
    background: rgba(0, 0, 0, 0.7);
  }
  /** Trạng thái thực hiện khi hủy hover */
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title)
    :hover
    .title-subtitle-brandhub
    .title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
@media only screen and (min-width: 357px) and (max-width: 482px) {
  .brandhub-thumb-list {
    grid-template-columns: 1fr;
  }
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title-subtitle-brandhub)
    :hover
    .title-subtitle-brandhub {
    height: 50px;
    background: rgba(0, 0, 0, 0.7);
  }
  /** Trạng thái thực hiện khi hủy hover */
  .brandhub-thumb-list
    .branhub-thumb-item:not(.title)
    :hover
    .title-subtitle-brandhub
    .title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
}
/**end css setting width of computer screen */

/**setting width for li */
.width100 {
  width: 100%;
}
.width70 {
  width: 70%;
}
.width60 {
  width: 60%;
}
.width50 {
  width: 50%;
}
.width40 {
  width: 40%;
}
.width30 {
  width: 30%;
}
</style>
