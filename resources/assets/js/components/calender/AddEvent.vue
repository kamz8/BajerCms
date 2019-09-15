<template>
  <div>
    <!-- Modal Component -->
    <b-modal
      id="modal-add"
      ref="'addEventModal'"
      centered
      title="Nowa rezerwacja"
      ok-title="Rezerwuj"
      cancel-title="Anuluj"
      @ok="submit()"
    >
      <b-container fluid>
        <b-row>
          <b-form class="event-form">
            <b-form-row class="text-center">
              <div class="col-2">
                <i class="fa fa-clock-o" />
              </div>
              <div class="col-10">
                <b-form-group
                  description="Wybierz datę w której chcesz zarezerwować salę."
                  class="text-left"
                >
                  <Datarenge v-model="rangeinput" />
                </b-form-group>
              </div>
              <div class="col-2">
                <i class="fa fa-pencil" />
              </div>
              <div class="col-10">
                <b-form-group
                  description="Pomoże to nam w wersyfikacji twojego zgłoszenia."
                  class="text-left"
                >
                  <b-form-textarea
                    id="textarea1"
                    v-model="event.description"
                    class="no-resize"
                    placeholder="Opisz w jakim celu potrzebujesz zarezerwować salę."
                    :rows="3"
                    :max-rows="6"
                  />
                </b-form-group>
              </div>
            </b-form-row>
          </b-form>
        </b-row>
      </b-container>
    </b-modal>
  </div>
</template>

<script>
// Import date picker css
import moment from 'moment';
import Datarenge from '../util/Daterange';
import HTTP from '../../http-comon';

export default {
  name: 'AddEvent',
  components: {
    Datarenge,
  },
  props: ['modalShow'],
  data() {
    return {
      event: {
        description: '',
        end_date: null,
        start_date: moment(),
      },
      rangeinput: {},
    };
  },
  methods: {
    submit() {
      HTTP.post('/events', {
        description: this.event.description,
        end_date: this.rangeinput.endDate,
        start_date: this.rangeinput.startDate,
      }).then(() => {
        this.$refs.addEventModal = false;
      }).catch((error) => {
        console.log(error);
        this.$refs.addEventModal = true;
      });
    },
  },
};
</script>

<style scoped>
    #modal-add * {
        color: #222;
    }

    form {
        min-width: 100%;
    }
</style>

<style>
    .modal-header {
        color: #222;
    }

    .event-form .fa {
        font-size: 20px;
    }
</style>
