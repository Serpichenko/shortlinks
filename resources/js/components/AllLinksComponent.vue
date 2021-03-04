<template>
  <div>
    <template v-if="links.length > 0">
      <table class="table-auto">
        <thead>
          <tr>
            <td class="border px-3 py-3">Исходная ссылка</td>
            <td class="border px-3 py-3">Сокращенная ссылка</td>
            <td class="border px-3 py-3">Срок действия</td>
            <td class="border px-3 py-3">Дата создания</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(link, index) in links" :key="`link_${index}`">
            <td class="border px-3 py-3">
              <a :href="`detail/${link.id}`">
                {{ link.url }}
              </a>
            </td>
            <td class="border px-3 py-3">
              <a :href="`detail/${link.id}`">
                {{ link.url_token }}
              </a>
            </td>
            <td class="border px-3 py-3">
              <a :href="`detail/${link.id}`">
                {{ link.expires ? dataParse(link.expires) : "Бессрочный" }}
              </a>
            </td>
            <td class="border px-3 py-3">
              <a :href="`detail/${link.id}`">
                {{ dataParse(link.created_at) }}
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </template>
    <template v-else>Пока нет сгенерированых ссылок</template>
  </div>
</template>

<script>
import dateMixin from "../mixins/date";

export default {
  mixins: [dateMixin],
  data() {
    return {
      links: [],
    };
  },
  created() {
    axios.get(`link/all`).then((response) => {
      this.links = response.data;
    });
  },
};
</script>
