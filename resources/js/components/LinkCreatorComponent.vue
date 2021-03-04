<template>
  <form @submit.prevent="submitForm">
    <h1 class="flex"></h1>
    <div class="flex">Для сокращения ссылки введите ее в поле ниже:</div>
    <div class="flex mt-3">
      <input
        v-model="inputs.link"
        type="text"
        placeholder="https://example.com"
        class="flex-1 appearance-none rounded shadow p-3 text-grey-dark focus:outline-none"
      />
    </div>
    <div class="flex" v-if="errors.link">
      <ul>
        <li
          class="text-red-600 font-medium"
          v-for="(error, index) in errors.link"
          :key="`link_error_${index}`"
        >
          {{ error }}
        </li>
      </ul>
    </div>
    <div class="flex mt-3">
      Укажите ниже срок действия ссылки <br />
      (если вы оставите поле пустым, ссылка будет считаться бессрочной):
    </div>
    <div class="flex mt-3">
      <input
        v-model="inputs.datetime"
        id="datetime"
        type="datetime-local"
        class="flex-1 appearance-none rounded shadow p-3 text-grey-darkfocus:outline-none"
      />
    </div>
    <div class="flex" v-if="errors.datetime">
      <ul>
        <li
          class="text-red-600 font-medium"
          v-for="(error, index) in errors.datetime"
          :key="`link_error_${index}`"
        >
          {{ error }}
        </li>
      </ul>
    </div>
    <div class="flex">
      <button
        class="flex-1 mt-5 border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
        type="submit"
      >
        Сгенерировать сокращенную ссылку
      </button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      inputs: {
        link: "",
        datetime: null,
      },
      errors: {},
    };
  },
  methods: {
    submitForm() {
      axios
        .post("link", this.inputs)
        .then((response) => {
          this.errors = {};
          this.$emit("submit-form", response.data);
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
