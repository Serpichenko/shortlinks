<template>
  <div>
    <LinkCreatorComponent
      v-if="page === 'main' && JSON.stringify(result) === `{}`"
      @submit-form="showResult"
    />
    <LinkResultComponent
      v-if="page === 'main' && JSON.stringify(result) !== `{}`"
      :result="result"
      @new-link="newLink"
    />
    <AllLinksComponent v-if="page === 'all'" />
    <LinkDetailComponent v-if="page === 'detail'" />
    <a
      v-if="page !== 'all'"
      class="flex justify-center mt-5 border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
      href="/all"
    >
      Посмотреть все ссылки
    </a>
  </div>
</template>

<script>
import LinkCreatorComponent from "./LinkCreatorComponent";
import LinkResultComponent from "./LinkResultComponent";
import AllLinksComponent from "./AllLinksComponent";
import LinkDetailComponent from "./LinkDetailComponent";

export default {
  components: {
    LinkCreatorComponent,
    LinkResultComponent,
    AllLinksComponent,
    LinkDetailComponent,
  },
  props: {
    page: {
      type: String,
    },
    id: { type: Number },
  },
  provide() {
    return {
      id: this.id,
    };
  },
  data() {
    return {
      result: {},
    };
  },
  methods: {
    showResult(result) {
      this.result = result;
    },
    newLink() {
      this.result = {};
    },
  },
};
</script>
