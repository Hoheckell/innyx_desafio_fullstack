import { useNotification } from "@kyvg/vue3-notification";
const { notify } = useNotification();
import router from "@/router";

export const helper = {
    errorThrower(response?: any): void {
        const erro = response?.status && response.status >= 400 ? "Erro" : "";
        const msg = response?.status === 401 ? "Erro" : erro + response?.status;
    
        const notification = {
            title: `${msg} ${response?.statusText}`,
            text: response?.status === 401 ? "Verifique suas permissões" : response?.data.message,
            type: response?.status === 401 ? "error" : response?.data.status || "error",
        };
    
        notify(notification);
    
        if (response?.status === 401) {
            router.push({ name: "home" });
        }
    },
    
    responseCop(response?: any): void {
        const msg = response?.status >= 400 ? `Erro ${response?.status}` : response?.status >= 200 ? "Sucesso" : "";
        
        const notification = {
            title: `${msg} ${response?.statusText}`,
            text: response?.status === 401 ? "Verifique suas permissões" : response?.data.message,
            type: response?.status === 401 ? "error" : response?.data.status || "error",
        };
    
        notify(notification);
    
        if (response?.status === 401) {
            router.push({ name: "home" });
        }
    }
};
