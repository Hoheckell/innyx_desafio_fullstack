import type { IAuthorization } from "./authorization.interface";
import type { IUser } from "./user.interface";

export interface IAuthData {
    status: string;
	user: IUser;
	authorization: IAuthorization;
}