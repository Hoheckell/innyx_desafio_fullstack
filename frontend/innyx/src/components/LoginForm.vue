<script setup lang="ts">
import { computed, ref } from 'vue'; 
import { useNotification } from "@kyvg/vue3-notification";
import { userService } from '@/services/user.service';
import router from '@/router';

const { notify } = useNotification()
const loginData = ref({ email: "", password: "" })
const submit = async () => {
  const userData = await userService.login({ email: loginData.value.email, password: loginData.value.password })
  if (userData?.authorization?.token?.length > 0) {
    sessionStorage.setItem("token", userData.authorization.token)
    sessionStorage.setItem("user", JSON.stringify(userData.user))
    notify({
      title: "Bem vindo",
      text: "Logado com sucesso!",
      type: "success"
    });
    router.push({ name: "dashboard" });
  } else {
    notify({
      title: "Houve um erro",
      text: "Credenciais inválidas!",
      type: "error"
    });
  }
}
</script>
<template>
  <div class="container">
    <div class="col-lg-4 offset-lg-4 col mt-5">
      <div class="loginPanel">
        <h1>Acesso Restrito</h1>
        <div class="form-group">
          <label for="email">Email</label>
          <input v-model.trim="loginData.email" type="email" id="email" name="email" class="form-control" />
        </div>
        <div class="form-group mt-3">
          <label for="senha">Senha</label>
          <input v-model.trim="loginData.password" type="password" id="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
          <button type="button" @click="submit" class="btn btn-sm btn-dark mt-3">Entrar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

.loginPanel {
  background-color: #C5C6CA;
  padding: 3rem;
  border: #a4a5a8 dashed;
  border-radius: 6px;
}
</style>