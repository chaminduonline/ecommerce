/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form method="POST" action="#">

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" :class="{ 'is-invalid': errors.email && errors.email[0] }" class="form-control" v-model="auth.email"
                                            name="email" value="" required autocomplete="email" autofocus>
                                        <span class="invalid-feedback" v-if="errors.email && errors.email[0]" role="alert">
                                            <strong>{{ errors.email[0] }}</strong>
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" :class="{ 'is-invalid': errors.password && errors.password[0] }" v-model="auth.password" class="form-control"
                                            name="password" required autocomplete="current-password">

                                        <span v-if="errors.email && errors.email[0]" class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ errors.email[0] }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button :disabled="processing" type="button" v-on:click="login()"
                                            class="btn btn-primary">
                                            {{ processing ? "Please wait" : "Login" }}
                                        </button>
                                        <a class="btn btn-link" href="#">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name: "login",
    data() {
        return {
            auth: {
                email: "",
                password: ""
            },
            processing: false,
            errors: []
        }
    },
    methods: {
        ...mapActions({
            signIn: 'auth/login'
        }),
        async login() {
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/api/login', this.auth).then(({ data }) => {
                this.signIn(data)
            }).catch(({ response: { data } }) => {
                if (data && data.errors) {
                    this.errors = data.errors;
                }
            }).finally(() => {
                this.processing = false
            })
        },
    }
}
</script>