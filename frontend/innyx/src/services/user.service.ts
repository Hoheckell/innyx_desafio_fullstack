import type { IAuthData } from "@/interfaces/auth-data.interface";
import type { ILoginData } from "@/interfaces/login-data.interface";
import axios from "axios";
import { IUser } from "../interfaces/user.interface";
import { helper } from "@/helpers/helper";
import router from "@/router";

export const userService = {
    async login(loginData: ILoginData): Promise<IAuthData> {
        return await axios
            .post(`${import.meta.env.VITE_API_URL}login`, loginData)
            .then(async (response) => {
                if (response.status === 200) {
                    return response.data;
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
    async getUserById(id: number): Promise<IUser> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}users/${id}`, {
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
    async logout(id: number): Promise<void> {
        const token = sessionStorage.getItem("token");
        return await axios
            .get(`${import.meta.env.VITE_API_URL}logout`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(async (response) => {
                helper.responseCop(response);
                if (response.status === 200) {
                    sessionStorage.removeItem('user');
                    sessionStorage.removeItem('token');
                    router.push({ name: 'home'})
                }
            })
            .catch((error) => {
                helper.errorThrower(error.response);
            });
    },
};
