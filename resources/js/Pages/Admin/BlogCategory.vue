<template>
 <app-layout>
     <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Blog Category
         </h2>
     </template>
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <button @click="showModal()"
                 class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                 Add New Category
             </button>
             <dialog-modal :show="open" >
                 <template v-slot:title>
                    New Category Addition
                 </template>
                 <template v-slot:content>
                     Header content
                 </template>
                 <template v-slot:footer>
                     <div class="inline-flex">
                         <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            Add
                         </button>
                         <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                             Cancel
                         </button>
                     </div>
                 </template>
             </dialog-modal>
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <table class="table-fixed border-separate border border-green-800 ...">
                     <thead>
                     <tr>
                         <th class="w-1/8 border border-green-600 ...">ID</th>
                         <th class="w-1/4 border border-green-600 ...">Category</th>
                         <th class="w-1/4 border border-green-600 ...">State</th>
                         <th class="w-1/4 border border-green-600 ...">Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td class="border border-green-600 ...">1</td>
                         <td class="border border-green-600 ...">2</td>
                     </tr>
                     <tr>
                         <td class="border border-green-600 ...">Ohio</td>
                         <td class="border border-green-600 ...">Columbu222222222222222222222222222222222222222222s</td>
                     </tr>
                     <tr>
                         <td class="border border-green-600 ...">Michigan</td>
                         <td class="border border-green-600 ...">Detroit</td>
                     </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Button from "../../Jetstream/Button";
import DialogModal from "../../Jetstream/DialogModal";
export default {
    name: "BlogCategory",
    components: {
        DialogModal,
        Button,
        AppLayout,
    },
    data: function () {
        return {
            open: false
        }
    },
    methods:{
        showModal(){
            this.open= !this.open;
        }
    }
}
</script>

<style scoped>

</style>
