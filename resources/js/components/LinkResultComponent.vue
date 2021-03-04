<template>
  <div>
    <div class="flex justify-center">Ссылка успешно создана</div>
    <table class="table-auto">
      <tbody>
        <tr>
          <td class="border px-3 py-3">Исходная ссылка</td>
          <td class="border px-3 py-3">
            <a :href="result.url" target="_blank">
              {{ result.url }}
            </a>
          </td>
        </tr>
        <tr>
          <td class="border px-3 py-3">Сокращенная ссылка</td>
          <td class="border px-3 py-3">
            <a :href="result.url_token" target="_blank">
              {{ result.url_token }}
            </a>
          </td>
        </tr>
        <tr>
          <td class="border px-3 py-3">Срок действия</td>
          <td class="border px-3 py-3">
            {{ result.expires ? dataParse(result.expires) : "Бессрочный" }}
          </td>
        </tr>
        <tr>
          <td class="border px-3 py-3">Дата создания</td>
          <td class="border px-3 py-3">{{ dataParse(result.created_at) }}</td>
        </tr>
      </tbody>
    </table>
    <div class="flex">
      <button
        class="flex-1 mt-5 border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
        type="button"
        @click="newLink"
      >
        Сгенерировать новую ссылку
      </button>
    </div>
  </div>
</template>

<script>
import dateMixin from "../mixins/date";

export default {
  props: { result: { type: Object, default: {} } },
  mixins: [dateMixin],
  methods: {
    newLink() {
      this.$emit("new-link");
    },
  },
};
</script>
