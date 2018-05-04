<template>
    <div>
        <!-- Modal Component -->
        <b-modal id="modal-add" ref="'addEventModal'" centered title="Dodaj wydarzenie">
            <b-container fluid>
                <b-row>
                    <b-form class="event-form">
                        <b-form-row class="text-center">
                            <div class="col-2"><i class="fa fa-clock-o"></i></div>
                            <div class="col-10">
                                <b-form-group>
                                    <datePicker v-model="event.start_date" :config="config"/>
                                </b-form-group>
                            </div>
                            <div class="col-2"><i class="fa fa-pencil"></i></div>
                            <div class="col-10">
                                <b-form-group>
                                    <b-form-textarea id="textarea1"
                                                     class="no-resize"
                                                     v-model="event.description"
                                                     placeholder="Enter something"
                                                     :rows="3"
                                                     :max-rows="6">
                                    </b-form-textarea>
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
import moment from "moment";

  export default {
    name: "add-event",
    props: ['modalShow'],
    components:{

    },
    data() {
      return {
        event: {
          description: "",
          end_date: null,
          start_date: moment(),
        },
        config: {
          // https://momentjs.com/docs/#/displaying/
          useCurrent: false,
        }
      }
    }
  }
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