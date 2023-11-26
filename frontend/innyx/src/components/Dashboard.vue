<script setup lang="ts">
import { onMounted, ref, computed, reactive } from 'vue';
import { type IUser } from '../interfaces/user.interface';
import { produtoService } from '../services/produto.service';
import { IProduto } from '../interfaces/produto.interface';
import Card from './produto/Card.vue'
import Tabela from './produto/Tabela.vue';
import Loader from './Loader.vue';
import { useNotification } from "@kyvg/vue3-notification";
import router from '@/router';
import { userService } from '../services/user.service';

const { notify } = useNotification()

const showSpinner = reactive({ show: false })
const search = ref("")
const user = ref({} as IUser)
const produtos = ref([] as IProduto[])
const showType = ref("table")
const page = ref(1);
const limit = ref(5);
const totalPage = ref(0);

const tableData = computed(() => {
    const start = (page.value - 1) * limit.value;
    const end = page.value * limit.value;
    return produtos.value.slice(start, end);
});

const excluirProduto = async (id: number) => {
    showSpinner.show = true;
    await produtoService.excluirProduto(id).then((response) => {
        if (Number(response) == 401)
            router.push({ name: 'home' })
        notify({
            title: "Ação Realizada",
            text: "Ecluido com sucesso",
            type: "success"
        });
    })
    await getProdutos();
    showSpinner.show = false;
}

const filter = async () => {
    showSpinner.show = true;
    if (search.value.length >= 3)
        await produtoService.filterProduto(search.value).then((response) => {
            if (Number(response) == 401)
                router.push({ name: 'home' })
            produtos.value = response
        });
    if (!search.value || search.value == "")
        await getProdutos();
    showSpinner.show = false;
}

const setShowType = (type: string) => {
    showType.value = type
}

const changePage = (pageNumber: number) => {
    page.value = pageNumber;
};

const getProdutos = async () => {
    showSpinner.show = true;
    await produtoService.getProdutos().then((response) => {
        produtos.value = response
        showSpinner.show = false;
    });
}

const logout = async () => {
    await userService.logout(user.value.id);
}

const checkUser = async () => {
    const stringUser = sessionStorage.getItem('user');
    const token = sessionStorage.getItem('token');
    if (stringUser && token) {
        const userData = JSON.parse(stringUser);
        user.value = await userService.getUserById(userData.id);
    } else {
        router.push({ name: 'home' });
    }
}

onMounted(async () => {
    await checkUser()
    if (produtos?.value?.length == 0)
        await getProdutos();
})
</script>
<template>
    <div class="container" style="background-color: #efebea;">
        <Loader v-if="showSpinner.show" />
        <div class="row">
            <div class="col-lg-6 col mt-5">
                <h1>Dashboard de Produtos</h1><br />
                Olá {{ user.name }} <a href="#" @click="logout">Logout</a>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Username"
                        aria-describedby="basic-addon1" @keyup="filter" v-model="search">
                </div>
                <button type="button" class="btn btn-sm btn-light m-3" @click="setShowType('cards')"><i
                        class="bi bi-postcard"></i> Cards</button>
                <button type="button" class="btn btn-sm btn-light" @click="setShowType('table')"><i class="bi bi-table"></i>
                    Table</button>
                <router-link :to="{name:'novo-produto' }" class="btn btn-sm btn-primary m-3" ><i class="bi bi-plus-square"></i>
                    Novo Produto</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="wrapper">
                    <KeepAlive>
                        <Card :produtos="produtos" v-if="showType == 'cards'" @excluirProduto="excluirProduto" />
                    </KeepAlive>
                    <KeepAlive>
                        <Tabela v-if="showType == 'table'" :produtos="tableData" :page="page" :limit="limit"
                            :totalPage="totalPage" @excluirProduto="excluirProduto" />
                    </KeepAlive>
                    <vue-awesome-paginate v-if="showType == 'table'" :total-items="produtos.length" :items-per-page="5"
                        :max-pages-shown="50" v-model="page" :on-click="changePage" />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: start;
    justify-content: space-between;
}

@media screen and (max-width: 480px) {
    .wrapper {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: start;
        justify-content: center;
    }
}
</style>