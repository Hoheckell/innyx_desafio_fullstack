<script setup lang="ts">
import moment from 'moment';
import { ref } from 'vue';
const props = defineProps(["produtos"])
defineEmits(['excluirProduto'])
const apiUrl = import.meta.env.VITE_API_URL;
</script>
<template>
    <div class="card mt-3" style="width: 15rem;" v-for="produto in props.produtos">
        <img v-if="produto.imagem" :src="apiUrl + 'image/' + produto.imagem" class="card-img-top produtoimg" alt="">
        <div class="card-body" style="display: grid;">
            <h5 class="card-title title">{{ produto.nome }}</h5>
            <p class="card-text">
                {{ produto.descricao }}<br />
                <strong>Validade: </strong><em>{{ moment(produto.validade).format('DD/MM/Y') }}</em><br />
                <strong>Categoria: </strong><em>{{ produto.categoria.nome }}</em><br />
            </p>
            <span class="preco">R${{ produto.preco }}</span>
            <div class="buttons">
                <router-link :to="{ name:'editar-produto', params: { id: produto.id } }" class="btn btn-primary m-1">Alterar</router-link>
                <button type="button" @click="$emit('excluirProduto',produto.id)" class="btn btn-primary">Excluir</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.title {
    color: chocolate;
    font-weight: bold;
    text-align: center;
}

.preco {
    color: green;
    font-weight: bold;
    text-align: center;
    font-size: 1.5rem;
}

.produtoimg {
    width: 150px;
    align-self: center;
    margin-top: 5px;
}

.buttons {
    align-self: center;
    justify-self: center;
}
</style>