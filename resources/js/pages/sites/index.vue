<template>
  <div class="card" :title="$t('IndexSites')">
    <div class="card-content">
      <div class="content">
        <table class="table is-hoverable">
          <thead>
            <tr>
              <th>#</th>
              <th>Sites</th>
              <th></th>
              <th></th>
              <th></th>
              <th>
                <router-link
                  :to="{ name: 'createSites', params: { campusId: campusId }}"
                  class="btn btn-primary"
                >Créer un nouveau site</router-link>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(site, index) in sites" v-bind:key="index">
              <td>{{ site.id }}</td>
              <td>
                <strong>{{ site.name }}</strong>
              </td>
              <td>
                <router-link
                  :to="{ name: 'showSites', params: { id: site.id, campusId: campusId } }"
                  class="btn btn-primary"
                >Voir</router-link>
              </td>
              <td>
                <router-link
                  :to="{ name: 'editSites', params: { id: site.id, campusId: campusId } }"
                  class="btn btn-warning"
                >Modifier</router-link>
              </td>
              <td>
                <router-link
                  :to="{ name: 'deleteSites', params: { id: site.id, campusId: campusId } }"
                  class="btn btn-danger"
                >Supprimer</router-link>
              </td>
              <td>
                <router-link
                  :to="{ name: 'objets', params: { id: site.id} }"
                  class="btn btn-primary"
                >Voir les objets</router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",
  resource: null,
  data() {
    return {
      sites: [],
      userId: 0,
      campusId: 0
    };
  },
  methods: {},
  mounted() {
    axios.get("/api/sites/indexByCampusId/" + this.campusId).then(res => {
      this.sites = res.data;
    });
  },
  created() {
    this.campusId = this.$route.params.id;
    axios.get("/api/user/getCurrentUserInformation").then(res => {
      this.userId = res.data.user.id;
    });
  },
  metaInfo() {
    return { title: this.$t("Sites") };
  }
};
</script>
