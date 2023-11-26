import { IProduto } from "@/interfaces/produto.interface";
import axios from "axios";
import { ICategoria } from "../interfaces/categoria.interface";
import { helper } from "@/helpers/helper";

export const produtoService = {
    async getProdutos(): Promise<IProduto[]> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}produtos`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                console.log('333333333')
                helper.errorThrower(error.response);
            });
    },
    async filterProduto(search: string): Promise<IProduto[]> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}produtos?search=${search}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async excluirProduto(id: number): Promise<void> {
        const token = sessionStorage.getItem("token");
        return await axios
            .delete(`${import.meta.env.VITE_API_URL}produtos/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 204) {
                    console.log("excluido");
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async getCategorias(): Promise<ICategoria[]> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}categorias`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async getProdutoById(id: number): Promise<IProduto> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}produtos/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async deleteImage(id: number): Promise<IProduto> {
        const token = sessionStorage.getItem("token");
        return await axios
            .delete(`${import.meta.env.VITE_API_URL}produtos/${id}/image/delete`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async update(id: number, produto: IProduto): Promise<void>  {
        const token = sessionStorage.getItem("token");
        await axios
            .put(`${import.meta.env.VITE_API_URL}produtos/${id}`, produto, {
                headers: {
                    Authorization: `Bearer ${token}`
                },
            })
            .then(async (response) => {
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async create(produto: FormData): Promise<IProduto>  {
        const token = sessionStorage.getItem("token");
        return await axios
            .post(`${import.meta.env.VITE_API_URL}produtos`, produto, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "multipart/form-data"
                },
            })
            .then((response) => {
                if (response.status == 201) {
                    return response.data
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async updateImage(id: number, imagem: FormData): Promise<void>  {
        const token = sessionStorage.getItem("token");
        await axios
            .post(`${import.meta.env.VITE_API_URL}produtos/${id}/image/update`, imagem, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "multipart/form-data",
                },
            })
            .then(async (response) => {
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    }
};
