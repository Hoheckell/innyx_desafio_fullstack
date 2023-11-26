<script setup lang="ts">
import moment from 'moment';
import { ref } from 'vue';
import ImageBox from '../ImageBox.vue';
defineEmits(['excluirProduto'])
const props = defineProps(['produtos', 'page', 'limit', 'totalPage'])
const imageURL = ref();
const activeImageBox = ref(false);
const showImage = (image?: string) => {
    if (image) {
        activeImageBox.value = true;
        imageURL.value = image;
    } else {
        activeImageBox.value = false;
        imageURL.value = '';
    }
}
</script>
<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>validade</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Imagem</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="produto in props.produtos">
                                <td>{{ produto.nome }}</td>
                                <td>{{ produto.descricao }}</td>
                                <td>{{ moment(produto.validade).format('DD/MM/Y') }}</td>
                                <td>{{ produto.preco }}</td>
                                <td>{{ produto.categoria.nome }}</td>
                                <td><a href="#" @click="showImage(produto.imagem)">Imagem</a></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <router-link :to="{ name: 'editar-produto', params: { id: produto.id } }"
                                            class="btn btn-warning" title="Editar"><i
                                                class="bi bi-pencil-square"></i></router-link>
                                        <button type="button" class="btn btn-danger" title="Excluir"
                                            @click="$emit('excluirProduto', produto.id)"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ImageBox v-if="activeImageBox" :image="imageURL" @showImage="showImage" />
            </div>
        </div>
    </div>
</template>
<style>
.pagination-container {
    display: flex;
    column-gap: 10px;
}

.paginate-buttons {
    height: 40px;
    width: 40px;
    border-radius: 20px;
    cursor: pointer;
    background-color: rgb(242, 242, 242);
    border: 1px solid rgb(217, 217, 217);
    color: black;
}

.paginate-buttons:hover {
    background-color: #d8d8d8;
}

.active-page {
    background-color: #3498db;
    border: 1px solid #3498db;
    color: white;
}

.active-page:hover {
    background-color: #2988c8;
}</style>