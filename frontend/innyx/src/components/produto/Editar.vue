<script setup lang="ts">
import { ICategoria } from '@/interfaces/categoria.interface';
import { produtoService } from '@/services/produto.service';
import { computed, onMounted, reactive, ref } from 'vue';
import { IProduto } from '../../interfaces/produto.interface';
import { useNotification } from "@kyvg/vue3-notification";
import Loader from '../Loader.vue';
import router from '@/router';
import moment from 'moment';

const showSpinner = reactive({ show: false })
const { notify } = useNotification()
const produto = ref({} as IProduto)
const props = defineProps(['id'])
const categorias = ref([] as ICategoria[])
const imagem = ref()
const file = ref(null)
const imageUrl = ref("")
const errors = ref({
    nome: "",
    descricao: "",
    validade: "",
    preco: ""
})

const chooseFiles = () => {
    if (imagem.value)
        imagem.value?.click()
}

const updateProduto = async (id: number) => {
    showSpinner.show = true;
    if (errors.value.nome == "" && errors.value.descricao == "" && errors.value.validade == "" && errors.value.preco == "") {
        await produtoService.update(id, produto.value);
        notify({
            title: "Ação Realizada",
            text: "Alterado com sucesso",
            type: "success"
        });
        router.push('/dashboard')
    } else {
        notify({
            title: "Houve um erro",
            text: "Verifique os dados no formulário",
            type: "error"
        });
    }
    showSpinner.show = false;
};

const uploadFile = async (e: any) => {
    showSpinner.show = true;
    const oldimage = produto.value.imagem
    if (e.target.files[0]) {
        const formData = new FormData();
        formData.append('imagem', e.target.files[0]);

        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);

        reader.onload = async () => {
            imageUrl.value = reader.result ? reader.result?.toString() : "";
        };
        await produtoService.updateImage(produto.value.id, formData);
        await getProduto(produto.value.id)
        if (produto.value.imagem != oldimage) {
            notify({
                title: "Ação Realizada",
                text: "Imagem atualizada",
                type: "success"
            });
        } else {
            notify({
                title: "Houve um erro",
                text: "Falha ao atualizar iamgem",
                type: "error"
            });
        }
    }
    showSpinner.show = false;
}

const getProduto = async (id: number) => {
    showSpinner.show = true;
    await produtoService.getProdutoById(id).then((response) => {
        produto.value = response
    });
    showSpinner.show = false;
}

const deleteImage = async (id: number) => {
    showSpinner.show = true;
    await produtoService.deleteImage(id).then((response) => {
        produto.value = response
    });
    showSpinner.show = false;
}
const getCategorias = async () => {
    showSpinner.show = true;
    await produtoService.getCategorias().then((response) => {
        categorias.value = response
    });
    showSpinner.show = false;
}
const validateNome = () => {
    errors.value.nome = produto.value.nome.length >= 3 && produto.value.nome.length <= 50 ? "" : "O Nome deve conter de 3 à 50 caracteres.";
}

const validateDescricao = () => {
    errors.value.descricao = produto.value.descricao.length <= 200 ? "" : "O Nome deve conter no máximo 200 caracteres.";
}

const validateValidade = () => {
    const valid = moment(produto.value.validade).isValid() && moment(produto.value.validade).isAfter(moment());
    errors.value.validade = valid ? "" : "Validade inválida, deve ser posterior a presente data";
}

const validatePreco = () => {
    errors.value.descricao = !isNaN(Number(produto.value.preco)) ? "" : "Não é um numero válido";
}

onMounted(async () => {
    if (categorias?.value?.length == 0)
        await getCategorias();
    if (props.id)
        await getProduto(props.id);
})
</script>
<template>
    <div class="container" style="background-color: #efebea;">
        <Loader v-if="showSpinner.show" />
        <div class="row mt-3" v-if="produto.id > 0">
            <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                <h4>Imagem</h4>
                <img :src="imageUrl" width="200" class="img-fluid" alt="produto.nome" v-if="imageUrl != ''">
                <img :src="'http://localhost:8000/api/image/' + produto.imagem" width="200" class="img-fluid"
                    alt="produto.nome" v-if="imageUrl == '' && produto.imagem"><br />
                <button type="button" class="btn btn-sm btn-ligth" title="Excluir imagem"
                    @click="deleteImage(produto.id)"><i class="bi bi-trash"></i></button>
                <input id="imagem" name="imagem" type="file" ref="imagem" @change="event => uploadFile(event)" hidden>
                <button type="button" class="btn btn-sm btn-ligth" title="Enviar nova imagem"
                    @click.prevent="chooseFiles"><i class="bi bi-upload"></i></button>
            </div>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <h2>Alterar produto</h2>
                <div class="form-group">
                    <label for="nome">Nome<span style="color:#F00">*</span></label>
                    <input type="text" name="nome" id="nome" v-model="produto.nome" class="form-control"
                        @change="validateNome" />
                    <p v-if="errors.nome" class="alert alert-danger">{{ errors.nome }}</p>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição<span style="color:#F00">*</span></label>
                    <input type="text" name="descricao" id="descricao" v-model="produto.descricao" class="form-control"
                        @change="validateDescricao" />
                    <p v-if="errors.descricao" class="alert alert-danger">{{ errors.descricao }}</p>
                </div>
                <div class="form-group">
                    <label for="validade">Validade<span style="color:#F00">*</span></label>
                    <input type="date" name="validade" id="validade" v-model="produto.validade" class="form-control"
                        @change="validateValidade" />
                    <p v-if="errors.validade" class="alert alert-danger">{{ errors.validade }}</p>
                </div>
                <div class="form-group">
                    <label for="preco">Preço<span style="color:#F00">*</span></label>
                    <input type="number" name="preco" id="preco" step="0.01" v-model="produto.preco" class="form-control"
                        @change="validatePreco" />
                    <p v-if="errors.preco" class="alert alert-danger">{{ errors.preco }}</p>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria<span style="color:#F00">*</span></label>
                    <select name="catgoria" id="catgoria" v-model="produto.categoria_id" class="form-control">
                        <option disabled>Selecione</option>
                        <option v-for="(categoria, i) in categorias" :value="categoria.id" :key="i">{{ categoria.nome }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-primary m-3" title="Excluir imagem"
                        @click="updateProduto(produto.id)">Alterar</button>
                    <router-link :to="{ name: 'dashboard' }" class="btn btn-sm btn-warning m-3">Voltar</router-link>
                </div>

            </div>
        </div>
    </div>
</template>