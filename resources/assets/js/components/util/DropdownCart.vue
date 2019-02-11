<template>
        <b-card no-body>
            <b-card-header  header-tag="header" @click="toggle()">{{title}} <i class="fa fa-4x fa-angle-up float-right " :class="{'fa-angle-down': isOpen}"></i></b-card-header>
            <b-collapse v-model="isOpen">
                <b-card-body>
                    <p class="card-text"><slot></slot></p>
                </b-card-body>
            </b-collapse>
        </b-card>
</template>

<script>
  export default {
    name: 'dropdown-cart',
    data: () => {
        return {
          isOpen: false
        }
    },
    props: ['title'],
    methods:{
      toggle: function(){
        this.isOpen = !this.isOpen
      }
    }
  }

</script>

<style scoped>
    .fa{

    }
    .card-header{
        cursor: pointer;
    }
    .card-header:hover {
        background-color: #e8e8e8;
    }
    .card-header .fa {
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
        font-size: 22px;
        color: #bbb;
    }
</style>