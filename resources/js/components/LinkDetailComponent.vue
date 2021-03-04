<template>
  <div v-if="JSON.stringify(link) !== '{}'">
    <div class="flex justify-center">
      <table class="table-auto">
        <tbody>
          <tr>
            <td class="border px-3 py-3">Исходная ссылка</td>
            <td class="border px-3 py-3">
              <a :href="link.url" target="_blank">
                {{ link.url }}
              </a>
            </td>
          </tr>
          <tr>
            <td class="border px-3 py-3">Сокращенная ссылка</td>
            <td class="border px-3 py-3">
              <a :href="link.url_token" target="_blank">
                {{ link.url_token }}
              </a>
            </td>
          </tr>
          <tr>
            <td class="border px-3 py-3">Срок действия</td>
            <td class="border px-3 py-3">
              {{ link.expires ? dataParse(link.expires) : "Бессрочный" }}
            </td>
          </tr>
          <tr>
            <td class="border px-3 py-3">Дата создания</td>
            <td class="border px-3 py-3">{{ dataParse(link.created_at) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex mt-10 justify-center">
      <table class="table-auto">
        <thead>
          <tr>
            <td class="border px-3 py-3">Дата посещения</td>
            <td class="border px-3 py-3">IP адрес</td>
            <td class="border px-3 py-3">Юзерагент</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(view, index) in link.views" :key="`link_${index}`">
            <td class="border px-3 py-3">
              {{ dataParse(view.created_at) }}
            </td>
            <td class="border px-3 py-3">
              {{ view.ip_address }}
            </td>
            <td class="border px-3 py-3">
              {{ view.user_agent }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import dateMixin from "../mixins/date";
export default {
  mixins: [dateMixin],
  inject: ["id"],
  data() {
    return {
      link: {},
    };
  },
  created() {
    axios.get(`link/${this.id}`).then((response) => {
      this.link = response.data;
    });
  },
};
</script>
