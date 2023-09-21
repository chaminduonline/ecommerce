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
                        <div class="card-header">Register</div>

                        <div class="card-body">
                            <form method="POST" action="#">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" :class="{ 'is-invalid': errors.name && errors.name[0] }" class="form-control" v-model="user.name" name="name"
                                            value="" required autocomplete="name" autofocus>
                                        <span v-if="errors.name && errors.name[0]" class="invalid-feedback" role="alert">
                                            <strong>{{ errors.name[0] }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" :class="{ 'is-invalid': errors.email && errors.email[0] }" v-model="user.email"
                                            name="email" value="" required autocomplete="email">
                                        <span v-if="errors.email && errors.email[0]" class="invalid-feedback" role="alert">
                                            <strong>{{ errors.email[0] }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" :class="{ 'is-invalid': errors.password && errors.password[0] }" v-model="user.password"
                                            name="password" required autocomplete="new-password">

                                        <span v-if="errors.password && errors.password[0]" class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ errors.password[0] }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" v-model="user.password_confirmation"
                                            class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button :disabled="processing" type="button" v-on:click="register()"
                                            class="btn btn-primary">
                                            {{ processing ? "Please wait" : "Register" }}
                                        </button>
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
export default {
    name: 'register',
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            },
            processing: false,
            errors: []
        }
    },
    methods: {
        async register() {
            this.processing = true
            await axios.post('/api/register', this.user).then(response => {
                this.$router.push('login');
            }).catch(({ response: { data } }) => {
                if (data && data.errors) {
                    this.errors = data.errors;
                }
            }).finally(() => {
                this.processing = false
            })
        }
    }
}
</script>