import { ICategoria } from "./categoria.interface";

export interface IProduto {
    id: number;
    nome: string;
	descricao: string;
	imagem: string | File;
	preco: string;
	validade: string;
	categoria_id: 1,
    categoria: ICategoria;
	created_at?: string;
	updated_at?: string;
}