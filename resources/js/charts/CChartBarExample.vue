<template>
<div class="pb-5">
  <CChartBar
    :datasets="defaultDatasets"
    :labels="days"
  />
</div>
</template>

<script>
import { CChartBar } from '@coreui/vue-chartjs'

export default {
  name: 'CChartBarExample',
  data () {
    return {
      clientId: 1,
      tableauData:[],
      days: ['Dimanche','Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi' , 'Samedi']
    }
  },

  components: { CChartBar },
  computed: {
    defaultDatasets () {
      return [
        {
          label: 'Déclenchement Jour par Jour',
          backgroundColor: '#3497DC',
          data: this.tableauData
        }
      ]
    }
  },
   mounted() {
    axios.get("/api/dashbord/getDataForDashbord/" + this.clientId).then(res => {
      this.tableauData = Object.values(res.data.nbWashWeek);

    });
  },
}
</script>
